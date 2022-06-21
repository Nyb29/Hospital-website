<?php

include 'dbh.php';
session_start();
// getting patiend id from the login database 

$sql="
    SELECT * FROM Login
    WHERE id=".$_GET['pid'];

$result = mysqli_query($conn,$sql);

$patient = mysqli_fetch_assoc($result);

if(!isset($_SESSION["username"]))
{
	header("location:Login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Patient Info</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<h1>Patient Info</h1>
<b><?php echo $_SESSION["username"] ?></b><br>
<a class="button" href="patients-list.php">Patients List</a>
<a class="button" href="logout.php">Logout</a><br>

<br><br style="clear:both;">
<div class="patientBox">
    <label>First Name:</label> <?php echo $patient['firstname']; ?><br>
    <label>Surname:</label> <?php echo $patient['surname']; ?><br>
    <label>Gender:</label> <?php echo $patient['gender']; ?><br>
    <label>DOB:</label> <?php echo $patient['dob']; ?><br>
</div>

</body>
</html>