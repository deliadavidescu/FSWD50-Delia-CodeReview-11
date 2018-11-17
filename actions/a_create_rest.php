<?php
include '../connection.php';
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
    $query = "INSERT INTO restaurants(rest_name, phone_number, rest_description, website, fk_typeID) VALUES ('$name', $phone,'$desc','$website', $type)";
    $query2="INSERT INTO address(street, city, country, ZIP, fk_restID) VALUES ('$street','$city','$country', $ZIP, LAST_INSERT_ID())";
  
    if($conn->query($query) === TRUE && $conn->query($query2) === TRUE) {
        echo "<p>New Record Successfully Created</p>";
        echo "<a href='create_rest.php'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
        echo "Error " . $query . ' ' . $conn->connect_error;
    }
 
    $conn->close();
}
?>