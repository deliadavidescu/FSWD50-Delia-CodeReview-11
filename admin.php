<?php 
ob_start();
session_start();
include "./connection.php" ;

if( !isset($_SESSION['admin'])) {
 header("Location: index.php");
 exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Panel-Users</title>
	<link rel="stylesheet" href="./css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
</head>
<body>
<?php include 'header.php'; ?>
	
 
<div class="manageUser">
    <a href="./actions/create.php"><button class="btn my-3" type="button">Add User</button></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
              <?php
            $sql = "SELECT user.userID, user.username, user.user_email, user_role.user_role FROM user
            join user_role
            on user_role.roleID=user.fk_user_roleID";
            $result = $conn->query($sql);
 
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>".$row['username']."</td>
                        <td>".$row['user_email']."</td>
                        <td>".$row['user_role']."</td>
                        <td>
                            <a href='update.php?id=".$row['userID']."'><button class='btn btn-success' type='button'>Edit</button></a>
                            <a href='delete.php?id=".$row['userID']."'><button class='btn btn-danger' type='button'>Delete</button></a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }
            ?>
             
        </tbody>
    </table>
</div>
 
</body>
</html>
	
</body>
</html>