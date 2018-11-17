<?php
 
require_once 'connection.php';
ob_start();
session_start();
if( !isset($_SESSION['admin'])) {
 header("Location: index.php");
 exit;
}

 
if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT places.placeID, places.name, places.description, places.fk_typeID, address.street, address.city, address.country, Type.type_name, address.ZIP FROM places
            left join address
            on address.fk_placeID=places.placeID
            left join Type 
            on Type.typeID=places.fk_typeID where places.placeID={$id};";

    $result = $conn->query($sql);
 
    $data = $result->fetch_assoc();


 
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Edit Location</title>
    <link rel="stylesheet" href="./css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
 
</head>
<body>
 
  <form class="form my-5" action="./actions/a_update_place.php" method="post" id="user-form">
        <h3>Update Location</h3>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label>Street</label>
            <input type="text" class="form-control" name="street" placeholder="Street">
        </div>
        <div class="form-group">
            <label>ZIP</label>
            <input type="text" class="form-control" name="zip" placeholder="ZIP">
        </div>
         <div class="form-group">
            <label>City</label>
            <input type="text" class="form-control" name="city" placeholder="City">
        </div>
         <div class="form-group">
            <label>Country</label>
            <input type="text" class="form-control" name="country" placeholder="Country">
        </div>
        <div class="form-group">
            <label>Description</label><br>
            <textarea name="description" placeholder="Description"></textarea>
        </div>

        <div class="form-group">
            <label>Location type</label>
                <select class="form-control" name="type">
                <option>Choose....</option>
            
                <?php  
                $sql1=mysqli_query($conn, "SELECT type_name, typeID FROM Type where fk_categoryID=3");
                $rows = $sql1->fetch_all(MYSQLI_ASSOC);
                foreach($rows as $key){
                ?>
                <option value="<?php echo $key['typeID']; ?>"><?php echo $key['type_name']; ?></option>
                <?php } ?>
            </select>  
            </div>
            <input type="hidden" name="id" value="<?php echo $data['placeID']?>" />
            <button class="btn btn-success" type="submit">Save changes</button>
            <button class="btn btn-danger" type="button"><a href="locations.php">Back</a></button>
         
    </form>
 
    
 
</body>
</html>
 
<?php
}
$conn->close();
?>