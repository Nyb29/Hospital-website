<?php
include 'dbh.php';

session_start();

if(isset($_POST['submit'])){
    $patientID = $_SESSION['user']['id'];

    $doctorID = stripslashes($_POST['doctor']);
	$doctorID = mysqli_real_escape_string($conn,$doctorID); 

    $date = stripslashes($_POST['date']);
	$date = mysqli_real_escape_string($conn,$date); 


    $insert = mysqli_query($conn,'
     INSERT INTO booking SET patientID='.$patientID.', doctorID='.$doctorID.', date="'.$date.'"');


    if(!$insert){
            echo mysqli_error();
    }
    else{
        echo "you booked succesfully.";
    }

    mysqli_close($conn);
}
?>
  

