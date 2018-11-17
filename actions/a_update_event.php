<?php
 
require_once '../connection.php';
 
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
 
    $id = $_POST['id'];
 
    $sql = "UPDATE events 
            left join address 
            on events.eventID=address.fk_eventID 
            SET event_name = '$name', event_date = $date, event_time = '$hour', fk_typeID=$type, price=$price, website='$website', street='$street', city='$city', country='$country', ZIP=$ZIP 
            WHERE eventID = {$id}";
    
    if($conn->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='../update_event.php?id=".$id."'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
        echo "Erorr while updating record : ". $conn->error;
    }
 
    $conn->close();
 
}
 
?>