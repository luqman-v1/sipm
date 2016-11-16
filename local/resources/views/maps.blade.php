@extends("layouts.template")
<style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
<title>Maps</title>
@section("content")

  
  <div class="section">
    <div class="wrapper">
      <div class="panel panel-default">
        <div class="panel-heading"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> &nbsp Maps</div>
        
        </div>
        </div>
      </div>    
    </div>
  </div>

  <input type="hidden" value="" class="data-lat">
  <input type="hidden" value="" class="data-lng">
  
  <div class="section">
    <div class="wrapper">
     <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="active">Maps</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
      <div class="panel panel-default">
        <div class="panel-heading turqoise judul">Maps</div>
        <div class="panel-body">
        <div class="">
          <div class="row">
            <div class="col-md-12">             
         <form action="{{url('maps')}}" method="get"> 
              <div class="form-group">
             <label>Category</label>
             <div>
              <select name="category">
               <option  value="">--Pilih Category--</option>
               @foreach($kate as $kategori)
                <option value="{{$kategori->id}}" {{$kategori->id==$id?'selected':''}}>
                  {{$kategori->category}}
                </option>
                  @endforeach
              </select>
              </div>
            </div>
               <div class="form-group">
              <input type="Submit" class="btn btn-success" value="Cari" >
            </div>
            </form>
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
 
<script>

      // The following example creates complex markers to indicate beaches near
      // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
      // to the base of the flagpole.

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: {lat:-7.717594, lng: 110.329764}
        });

        setMarkers(map);
      }

      // Data for the markers consisting of a name, a LatLng and a zIndex for the
      // order in which these markers should display on top of each other.
      var beaches = [
      @foreach($articles as $artikel)
        ['hasil pencarian', {{$artikel->locLat}} , {{$artikel->locLng}}, 1 ],
      @endforeach      
      ];

      function setMarkers(map) {
        // Adds markers to the map.

        // Marker sizes are expressed as a Size of X,Y where the origin of the image
        // (0,0) is located in the top left of the image.

        // Origins, anchor positions and coordinates of the marker increase in the X
        // direction to the right and in the Y direction down.
        var image = {
          url: 'https://lh6.googleusercontent.com/-W5AKpnsooTY/V6mQ-yMOv1I/AAAAAAAABSo/ekFrWT2WUKM2hvjatxw0CtF5UGQ1_cS4ACL0B/w19-h28-no/mark.png',
          // This marker is 20 pixels wide by 32 pixels high.
          size: new google.maps.Size(20, 32),
          // The origin for this image is (0, 0).
          origin: new google.maps.Point(0, 0),
          // The anchor for this image is the base of the flagpole at (0, 32).
          anchor: new google.maps.Point(0, 32)
        };
        // Shapes define the clickable region of the icon. The type defines an HTML
        // <area> element 'poly' which traces out a polygon as a series of X,Y points.
        // The final coordinate closes the poly by connecting to the first coordinate.
        var shape = {
          coords: [1, 1, 1, 20, 18, 20, 18, 1],
          type: 'poly'
        };
        for (var i = 0; i < beaches.length; i++) {
          var beach = beaches[i];
          var marker = new google.maps.Marker({
            position: {lat: beach[1], lng: beach[2]},
            map: map,
            icon: image,
            shape: shape,
            title: beach[0],
            zIndex: beach[3]
          });
        }
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8V020aIxzsnq7PlhFS0a0z50wgIgW7rM&callback=initMap">
    </script>

@endsection