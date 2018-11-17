<?php 
include 'connection.php';

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Restaurants</title>
	<link rel="stylesheet" href="./css/style.css">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
	<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"search_bar.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#rest').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});


	</script>
</head>
<body>
	<?php include 'header.php'; ?>

	  <div class="form-group my-3">
    <div class="input-group">
     <span class="input-group-addon">Search: </span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Name"/>
    </div>
   </div>
	<div class="row ">
      <div class="col-lg-12 py-3 pl-5 section1" id="restaurants">
        <h5>Traveler's Choice: Restaurants</h5>
      </div>
    </div>
    <div class="row my-5" id="rest"></div>


</body>
</html>