<?php
 
include '../connection.php';
 
if($_POST) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $role1 = $_POST['userRole'];
    $password = hash('sha256', $pass);

    $query = "INSERT INTO user (username, user_email, password, fk_user_roleID) VALUES ('$username', '$email','$password', $role1)";
    if($conn->query($query) === TRUE) {
        echo "<p>New Record Successfully Created</p>";
        echo "<a href='../create.php'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
        echo "Error " . $query . ' ' . $conn->connect_error;
    }
 
    $conn->close();
}
 
?>