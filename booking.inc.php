<?php
include 'dbh.php';

session_start();
// from line 6 till 15 we make sure the doctor is the one logging in sanitising all of the input
//from line 17 till 30 we inserting the detail about the patient id , doctor id and date to distinguish bookings
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
  <!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="admin.css">
	<title>Booking page</title>
</head>
<body>



<a class="button" href="Assessment.html">Homepage</a>


</body>
</html>


