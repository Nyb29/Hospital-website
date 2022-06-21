<?php

include 'dbh.php';
session_start();

if(!isset($_SESSION["username"]))
{
	header("location:Login.php");
}

if(isset($_POST['password']) && !empty($_POST['password'])){

    //update the password
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($conn,$password); 
	$password=md5($password);

	

	$sql="UPDATE Login SET password='".$password."' WHERE id=".$_SESSION['user']['id'];

	$result=mysqli_query($conn,$sql);

	print "The password has been updated!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>User | Change Password</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<h1>Change Password</h1>
<form action="changePassword.php" method="post">
    <label>New Password</label><input type="password" name="password">
    <input type="submit" value="Change">
</form>
</body>
</html>