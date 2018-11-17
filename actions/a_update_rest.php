<?php
 
require_once '../connection.php';
 
if($_POST) {
    $name = $_POST['name'];
    $phone = $_POST['number'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $ZIP= $_POST['zip'];
    $desc = $_POST['description'];
    $website=$_POST['website'];
    $type = $_POST['type'];
 
    $id = $_POST['id'];
 
    $sql = "UPDATE restaurants join address on restaurants.restID=address.fk_restID SET rest_name = '$name', phone_number = $phone, rest_description = '$desc', fk_typeID=$type, website='$website', street='$street', city='$city', country='$country', ZIP=$ZIP WHERE restID = {$id}";
    if($conn->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='../update_rest.php?id=".$id."'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
        echo "Erorr while updating record : ". $conn->error;
    }
 
    $conn->close();
 
}
 
?>