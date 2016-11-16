<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php 

	include "template.php";
	include "connection.php";
	if(isset($_SESSION['username'])) {
		if(isset($_GET['id'])) {
			$id = $_GET['id'];
	$qry = "select *, (X(loc)) as lat, (Y(loc)) as lng 
	FROM wisata
	WHERE wisata.id = $id";
	if(mysqli_query($con, $qry)){
		$row = mysqli_fetch_array(mysqli_query($con,$qry ));	
?>


	<div class="section">
		<div class="wrapper">
			<div class="panel panel-default">
			  <div class="panel-heading turqoise places">Tambah Tempat Wisata</div>
			  <div class="panel-body">
			  <form action="save_wisata.php" method="post" enctype="multipart/form-data">
				  <?php 
				  	if(isset($_SESSION['error']) && $_SESSION['error']!='')
				  	{
				  ?>
				  	<div class="alert alert-danger">
				  		<?php echo $_SESSION['error'] ;?>
				  	</div>
				  	<?php 
				  		unset($_SESSION['error']);
				  	}
				  	?>
				  <?php 
				  	if(isset($_SESSION['message']) && $_SESSION['message']!='')
				  	{
				  ?>
				  	<div class="alert alert-success">
				  		<?php echo $_SESSION['message'] ;?>
				  	</div>
				  	<?php 
				  		unset($_SESSION['message']);
				  	}
				  	?>	
					  <div class="form-group">
					    <input type="text" name="nama" class="form-control as1" value="<?php echo $row['nama'] ?>" placeholder="Nama">
					  </div>
					  <div class="form-group">
					    <input type="text" name="alamat" class="form-control" value="asdsad" placeholder="Alamat">
					  </div>
					  <div class="form-group">

						<textarea name="isi" id="editor1" rows="30" cols="80">
                            <?php echo $row['deskripsi'] ?>
                        </textarea>
					  </div>
					  
				<div class="row">
			  		<div class="col-md-6">
						<div class="form-group">
						  <label>Latitude</label>
						  <input type="text" class="form-control data-lat"  name="locLat" value="<?php echo $row['lat'] ?>" placeholder="Latitude">
						</div>    
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Logitude</label>
						  <input type="text" name="locLng" class="form-control data-lng"  value="<?php echo $row['lng'] ?>" placeholder="Logitude">
						</div>    
					</div>
				</div>
				<div class="row">
			  		<div class="col-md-12">
						<div id="map"></div>    
					</div>
				</div>
				<br>
					  <div class="form-group">

					    <input type="file" name="img" >
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
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
	<script>
         CKEDITOR.replace( 'editor1' );
    </script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
	
     dataLat = parseFloat($('.data-lat').attr('value'));
      dataLng = parseFloat($('.data-lng').attr('value'));
      var myLatLng = {lat: dataLat, lng: dataLng};
      var map;
      var refMarker;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat:dataLat,  lng:dataLng},
          zoom: 14,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var drag;
       

      

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
  				//marker.setPosition(new google.maps.LatLng(dataLat, parseFloat($(this).val())));
		
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
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8V020aIxzsnq7PlhFS0a0z50wgIgW7rM&callback=initMap">
    </script>
	<?php }} ?>
</body>
</html>