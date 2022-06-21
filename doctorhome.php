<?php
session_start();
// preventing access from the user
if(!isset($_SESSION["username"]))
{
	header("location:login.php");
}else if($_SESSION['user']['usertype']=="user"){
    print "You don't have the right to access this content<br>";
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="admin.css">
	<title>Doctor Homepage</title>
</head>
<body>

<h1>THIS IS DOCTOR HOME PAGE</h1>
<b><?php echo $_SESSION["username"] ?></b><br>
<a class="button" href="patients-list.php">Patients List</a>
<a class="button" href="changePassword.php">Change Password</a>
<a class="button" href="logout.php">Logout</a><br>

</body>
</html>
