@extends("layouts.template")
<title>Tambah Laporan</title>
@section('content')
<div class="section">
        <div class="wrapper">
            <div class="panel panel-default">
              <div class="panel-heading"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> &nbsp Tambah Laporan</div>
              
                </div>
              </div>
            </div>      
        </div>
    </div>

<div class="section">
        <div class="wrapper">
         <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="active">Tambah Laporan</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
            <div class="panel panel-default">
              <div class="panel-heading turqoise"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp Tambah Laporan</div>
					@if(Session::has('message'))
					   <div class="alert alert-success">
					  		{{ Session::get('message') }}
					    </div>
					@endif
				
				@if (count($errors) > 0)
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif

              <div class="panel-body">
            <form action="{{route('add.store')}}" method="post" enctype="multipart/form-data"> 
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
				  	 <div class="form-group">
					    <input required type="text" name="nama" class="form-control" value="{{old('nama')}}" placeholder="Nama Pelapor">
					  </div>

					  <div class="form-group">
					    <input required type="text" name="alamat" class="form-control" value="{{old('alamat')}}" placeholder="Alamat">
					  </div>

					  <div class="form-group">
					   <label>Category</label>
					   <div>
					    <select name="category">
					     <option value="">--Pilih Category--</option>
					 		 @foreach($kate as $kategori)
					    	<option value="{{$kategori->id}}" {{$kategori->id==old('category')?'selected':''}} >
					    		{{$kategori->category}}
					    	</option>
					    		@endforeach
					    </select>
					    </div>
					  </div>

					  <div class="form-group">
					    <textarea required name="deskripsi"  class="form-control" rows="5" placeholder="Deskripsi">{{old('deskripsi')}}</textarea >
					  </div>

					  <div class="row">
			  		<div class="col-md-6">
						<div class="form-group">
						  <label>Latitude</label>
						  <input type="text" class="form-control data-lat"  name="locLat" value="{{old('locLat')?old('locLat'):'-7.716232999999993'}}" placeholder="Latitude">
						</div>    
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Logitude</label>
						  <input type="text" name="locLng" class="form-control data-lng" value="{{old('locLng')?old('locLng'):'110.33534260314946'}}" placeholder="Logitude">
						</div>    
					</div>
					</div>

					<div class="row">
			  		<div class="col-md-12">
			  		<hr>
			  		<center><h4>=============== untuk lebih detailnya Zoom dengan Scrool lokasi tujuan kemudian geser tanda merah ===============</h4></center>
			  		<hr>
					    <input id="pac-input" class="controls" type="text" placeholder="Pencarian">
					    <div id="map"></div>

					</div>
					</div>
				<br>
					  <div class="form-group">
					    <input type="file" name="image" value="{{old('image')}}" >
					  </div>
					  	<div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
							<div class="col-md-offset-4 col-md-6">
							{!! app('captcha')->display() !!}
							{!! $errors->first('g-recaptcha-response', '<p class="help-block">:message</p>') !!}
							</div>
						</div>
					  <div class="form-group">
					    <input type="Submit" class="btn btn-success " value="Simpan" >
					  </div>
				  </div>
		      </form>
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
      var refMarker;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat:dataLat,  lng:dataLng},
          zoom: 15,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var drag;
       	
       	
       	  // Create the search box and link it to the UI element.
  var input = document.getElementById('pac-input');
  var searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);


  map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
  });
    var markers = [];

    searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

	    if (places.length == 0) {
	      return;
	    }
	       // Clear out the old markers.
    deleteMarkers();
    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {


      // Create a marker for each place.
      addMarker(place.geometry.location, map);

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);

	});


		  addMarker(myLatLng, map);
		    	  
		  	$('.data-lat').on("change", function () {
  				//alert($(this).val());
  				deleteMarkers();
  			    map.setCenter(new google.maps.LatLng(parseFloat($(this).val()), dataLng));
  			    addMarker(new google.maps.LatLng(parseFloat($(this).val()), dataLng),map);
	  		    //marker.setPosition(new google.maps.LatLng(parseFloat($(this).val()), dataLng));
				  		
			});
		  	$('.data-lng').on("change", function () {
  				//alert($(this).val());
  				deleteMarkers();
  				map.setCenter(new google.maps.LatLng(dataLat, parseFloat($(this).val())));
  				//marker.setPosition(new google.maps.LatLng(dataLat, parseFloat($(this).val())));mar
			});
		  
      }
function addMarker(latlng,map) {
    var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: 'hello',
            draggable:true
    });
    refMarker = marker;
    google.maps.event.addListener(refMarker, 'dragend', function (event) {
			   $('.data-lat').attr('value', this.getPosition().lat());
			   $('.data-lng').attr('value', this.getPosition().lng());
			    
			});		  
}
function deleteMarkers() {
  refMarker.setMap(null);
  refMarker=null;
}
	</script>
	<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8V020aIxzsnq7PlhFS0a0z50wgIgW7rM&libraries=places&callback=initMap">
    </script>
    
@endsection