<?php
include '../connection.php';
if($_POST) {
    $name = $_POST['name'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $ZIP= $_POST['zip'];
    $desc = $_POST['description'];
    $type = $_POST['type'];
    $query = "INSERT INTO places(name, description,fk_typeID) VALUES ('$name','$desc', $type)";
    $query2="INSERT INTO address(street, city, country, ZIP, fk_placeID) VALUES ('$street','$city','$country', $ZIP, LAST_INSERT_ID())";
  
    if($conn->query($query) === TRUE && $conn->query($query2) === TRUE) {
        echo "<p>New Record Successfully Created</p>";
        echo "<a href='create_place.php'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
        echo "Error " . $query . ' ' . $conn->connect_error;
    }
 
    $conn->close();
}
?>