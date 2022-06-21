<?php
    include 'dbh.php';
    session_start();

    

$sql="DELETE FROM booking WHERE id=".$_GET['bid'];

$result = mysqli_query($conn,$sql);

print "The booking has been deleted!";

?>