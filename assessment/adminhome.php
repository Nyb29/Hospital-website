<?php
session_start();


if(!isset($_SESSION["username"]))
{
	header("location:login.php");
}else if($_SESSION['user']['usertype']!="admin"){
    print "You don't have the right to access this content<br>";
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="admin.css">
	<title>Admin Homepage</title>
</head>
<body>

<h1>THIS IS ADMIN HOME PAGE</h1>
<b><?php echo $_SESSION["username"] ?></b><br>
<a class="button" href="doctors-list.php">Doctors List</a>
<a class="button" href="patients-list.php">Patients List</a>
<a class="button" href="book.php">Book an appointment</a>
<a class="button" href="changePassword.php">Change Password</a>
<a class="button" href="logout.php">Logout</a><br>

</body>
</html>

