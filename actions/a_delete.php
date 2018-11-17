<?php
 
require_once '../connection.php';
 
if($_POST) {
    $id = $_POST['id'];
 
    $sql = "DELETE FROM user WHERE userID = {$id}";
    if($conn->query($sql) === TRUE) {
        echo "<p>Successfully deleted!!</p>";
        echo "<a href='../admin.php'><button type='button'>Back</button></a>";
    } else {
        echo "Error updating record : " . $conn->error;
    }
 
    $conn->close();
}
 
?>
