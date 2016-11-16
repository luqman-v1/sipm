@extends("layouts.template")
<title>Detail Laporan</title>
@section("content")
	
	<div class="section">
		<div class="wrapper">
			<div class="panel panel-default">
			  <div class="panel-heading"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> &nbsp Detail Laporan</div>
			  
				</div>
			  </div>
			</div>		
		</div>
	</div>

	<input type="hidden" value="{{$artikel->locLat}}" class="data-lat">
	<input type="hidden" value="{{$artikel->locLng}}" class="data-lng">
	
	<div class="section">
		<div class="wrapper">
		 <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="active">{{App\Category::find($artikel->id_category)->category}}</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
			<div class="panel panel-default">
			  <div class="panel-heading turqoise judul"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> &nbsp Laporan {{$artikel->id}}</div>
			  <div class="panel-body">
			  <div class="">
			  	<div class="row">

			  		<div class="col-md-12">
			  			<div style="background-image:url({{url('uploads/'.$artikel->pict)}})" class="img-col">
			  				<div class="content">
			  					<span><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> {{$artikel->created_at}}</span></br>
			  					<span><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$artikel->nama}}</span></br>
			  					<div class="sub"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span><small> {{$artikel->alamat}}</small></div>
			  				</div>
			  			</div>
			  			<hr>
			  			<h3>Deskripsi</h3>
			  			<hr>
							<div class="row news-pad pages">
						    	<div class="col-xs-12">
						        	<div class="news-pad-sub tpad">
						            	<div class="inner-pad">
									  		<p>{{$artikel->deskripsi}}</p>
									  	</div>	
									</div>
								</div>
							</div>
						<hr>					 		
			  			<h3>Peta Lokasi</h3>
			  			<div id="map"></div>
			  		</div>	  	
			  	</div>
			  </div>
			</div>  
			</div>		
		</div>
	</div>
	   
@endsection
@section('extensions')
<script type="text/javascript">
     dataLat = parseFloat($('.data-lat').attr('value'));
      dataLng = parseFloat($('.data-lng').attr('value'));
      var myLatLng = {lat: dataLat, lng: dataLng};
      var map;
      
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat:dataLat,  lng:dataLng},
          zoom: 15,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var drag;
       
        if($('.isEdit').attr('value')=='0') { drag = false;} else {drag = true;}
      
		  var marker = new google.maps.Marker({
		    position: myLatLng,
		    map: map,
		    title: 'Tempat',
		    draggable: drag
		  });
		  var contentString = 'Lat : ' + marker.getPosition() ;		  
		  
		    
			google.maps.event.addListener(marker, 'dragend', function (event) {
			    document.getElementById("aa1").value = this.getPosition().lat();
			    document.getElementById("aa2").value = this.getPosition().lng();
			});		   

		  google.maps.event.addListener(marker, 'click', function() {
		 	var infowindow = new google.maps.InfoWindow({
		    	content: '<a href="https://www.google.com/maps?ll=&z=14&t=m&hl=en-US&gl=ID&mapclient=embed&daddr='+dataLat+','+dataLng+'" class="btn btn-info" target="_blank">Menuju</a>'
		  	});	 	
		    infowindow.open(map, this);
		  });		  
      }
      
    </script>
	<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8V020aIxzsnq7PlhFS0a0z50wgIgW7rM&callback=initMap">
    </script>
@endsection