<?php
 
require_once '../connection.php';
 
if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT * FROM events
    join address 
    on events.eventID=address.fk_eventID
    WHERE events.eventID = {$id}";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
 
    $conn->close();
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Delete Event</title>
</head>
<body>
 
<h3>Do you really want to delete this user?</h3>
<form action="a_delete_event.php" method="post">
 
    <input type="hidden" name="id" value="<?php echo $data['eventID'] ?>" />
    <button type="submit">Yes, delete it!</button>
    <a href="../events.php"><button type="button">No, go back!</button></a>
</form>
 
</body>
</html>
 
<?php
}
?>