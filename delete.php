<?php
 
require_once 'connection.php';
 
if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT * FROM user WHERE userID = {$id}";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
 
    $conn->close();
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
</head>
<body>
 
<h3>Do you really want to delete this user?</h3>
<form action="actions/a_delete.php" method="post">
 
    <input type="hidden" name="id" value="<?php echo $data['userID'] ?>" />
    <button type="submit">Yes, delete it!</button>
    <a href="admin.php"><button type="button">No, go back!</button></a>
</form>
 
</body>
</html>
 
<?php
}
?>
