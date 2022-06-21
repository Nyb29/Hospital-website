<?php
    include 'dbh.php';
    session_start();


$sql="DELETE FROM booking WHERE patientID=".$_GET['pid'];
$result = mysqli_query($conn,$sql);


$sql="DELETE FROM login WHERE id=".$_GET['pid'];
$result = mysqli_query($conn,$sql);


print "The user has been deleted!";

?>