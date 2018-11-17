<?php

include_once 'connection.php';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "SELECT restaurants.restID, restaurants.rest_name, restaurants.rest_description,restaurants.website,address.street, address.city, address.country, address.ZIP, images.url FROM restaurants
            left join address
            on address.fk_restID=restaurants.restID
            left join images
            on restaurants.restID=images.fk_restID
            where restaurants.rest_name LIKE '%".$search."%'";


}
else
{
  $query = "SELECT restaurants.restID, restaurants.rest_name, restaurants.rest_description,restaurants.website, address.street, address.city, address.country, address.ZIP, images.url FROM restaurants
            left join address
            on address.fk_restID=restaurants.restID
            left join images
            on restaurants.restID=images.fk_restID";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
 while($row = mysqli_fetch_array($result))
 {
?>
<div class="col-lg-3 col-md-6 col-sd-12 py-2">
        <div class="card">
          <img class="card-img-top" src="<?php echo $row['url'];?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['rest_name'];?></h5>
          <div class="card-text">
            <p>Address: <?php echo $row['street'].', '.$row['ZIP'];?> </p>
            <p><a href="#"><?php echo $row['website']; ?></a></p> 
          </div>
        </div>
      </div>
</div>

<?php  
 }
}else
{
 echo 'Data Not Found';
}

?>