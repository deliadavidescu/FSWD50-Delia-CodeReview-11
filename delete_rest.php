<?php
 
require_once 'connection.php';
 
if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT * FROM restaurants
    join address 
    on restaurants.restID=address.fk_restID
    WHERE restaurants.restID = {$id}";
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
<form action="actions/a_delete_rest.php" method="post">
 
    <input type="hidden" name="id" value="<?php echo $data['restID'] ?>" />
    <button type="submit">Yes, delete it!</button>
    <a href="restaurants.php"><button type="button">No, go back!</button></a>
</form>
 
</body>
</html>
 
<?php
}
?>