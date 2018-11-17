<?php
 
require_once '../connection.php';
 
if($_POST) {
    $name = $_POST['name'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $ZIP= $_POST['zip'];
    $desc = $_POST['description'];
    $type = $_POST['type'];
 
    $id = $_POST['id'];
 
    $sql = "UPDATE places join address on places.placeID=address.fk_placeID SET name = '$name', description = '$desc', fk_typeID=$type, street='$street', city='$city', country='$country', ZIP=$ZIP WHERE placeID = {$id}";
    if($conn->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='../update_place.php?id=".$id."'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
        echo "Erorr while updating record : ". $conn->error;
    }
 
    $conn->close();
 
}
 
?>