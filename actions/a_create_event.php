<?php
include '../connection.php';
if($_POST) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $hour = $_POST['hour'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $ZIP= $_POST['zip'];
    $street = $_POST['street'];
    $website=$_POST['website'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $query = "INSERT INTO events(event_name, event_date, event_time, website, fk_typeID, price) VALUES ('$name', '$date','$hour','$website', $type, $price)";
    $query2="INSERT INTO address(street, city, country, ZIP, fk_eventID) VALUES ('$street','$city','$country', $ZIP, LAST_INSERT_ID())";
  
    if($conn->query($query) === TRUE && $conn->query($query2) === TRUE) {
        echo "<p>New Record Successfully Created</p>";
        echo "<a href='create_event.php'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
        echo "Error " . $query . ' ' . $conn->connect_error;
    }
 
    $conn->close();
}
?>