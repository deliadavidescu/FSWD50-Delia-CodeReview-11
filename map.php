<?php 
ob_start();
session_start();
include 'connection.php';


  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Map</title>
	<link rel="stylesheet" href="./css/style.css">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
	 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js">
  </script>
  <script src="https://apis.google.com/js/client:platform.js?onload=start" async defer>
  </script>

  <script>
    function start() {
      gapi.load('auth2', function() {
        auth2 = gapi.auth2.init({
          client_id: '640174105420-u4hf90s6m1n7gvk4kmaspbfb038arhpt.apps.googleusercontent.com',
          // Scopes to request in addition to 'profile' and 'email'
          //scope: 'additional_scope'
        });
      });
    }
  </script>
</head>
<body>
	<?php include 'header.php'; ?>

	<div class="container my-5" id="map" style="width:100%;height:900px;"></div>

	<script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 48.2082, lng:  16.3738},
          zoom: 10
        });

        <?php 
        $query = mysqli_query($conn,"SELECT * FROM markers");
		while($row = mysqli_fetch_array($query))
			{
			  $id= $row['id'];
			  $lat = $row['lat'];
			  $lon = $row['lng'];
 		?>

     var marker = new google.maps.Marker({
          position: {lat: <?php echo $lat ?>, lng: <?php echo $lon ?>},
          map: map,
          label:"R"
        });
     <?php } ?>
  
 }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0D70R2l6AR0umH4lGTDmglKGlYhK1QZQ&callback=initMap"
    async defer></script>
     <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0D70R2l6AR0umH4lGTDmglKGlYhK1QZQ&libraries=places&callback=initMap">
    </script>
	
</body>
</html>

