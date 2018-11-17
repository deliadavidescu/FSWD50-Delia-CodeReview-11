<?php
 
require_once '../connection.php';
 
if($_POST) {
    $username= $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['userRole'];
    $id = $_POST['id'];
 
   
    $sql="UPDATE `user` SET username = '$username', user_email = '$email', fk_user_roleID=$role WHERE userID = $id";
    if($conn->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='../update.php?id=".$id."'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
        echo "Erorr while updating record : ". $conn->error;
    }
 
    $conn->close();
 
}
 
?>