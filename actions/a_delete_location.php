<?php
 
require_once '../connection.php';
 
if($_POST) {
    $id = $_POST['id'];
 
    $sql = "DELETE FROM places WHERE placeID = {$id}";
    $sql1 = "DELETE FROM address WHERE fk_placeID = {$id}";
    if($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) {
        echo "<p>Successfully deleted!!</p>";
        echo "<a href='../locations.php'><button type='button'>Back</button></a>";
    } else {
        echo "Error updating record : " . $conn->error;
    }
 
    $conn->close();
}
 
?>
