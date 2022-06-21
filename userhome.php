<?php

include 'dbh.php';
session_start();
//selecting booking and login databases to get doctorid
$sql="
      SELECT b.*,l.firstname, l.surname 
      FROM booking AS b, Login AS l
      WHERE b.patientID=".$_SESSION['user']['id']."
      AND b.doctorID=l.id;";


//establishing connection
$result = mysqli_query($conn,$sql);
//array listing bookings
$bookings = [];
//return array rappresenting following row with a while loop
while($row = mysqli_fetch_assoc($result)) {
    $bookings[] = $row;
}



// if user has a username direct him to the login page

if(!isset($_SESSION["username"]))
{
	header("location:Login.php");
}
//from line 48 we count ,set and list id firstname and date of the booking 
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Homepage</title>
    <link rel="stylesheet" href="admin.css"> 
</head>
<body>


<h1>THIS IS USER HOME PAGE</h1>
<b><?php echo $_SESSION["username"] ?></b><br>
<a class="button" href="book.php">Book an appointment</a>
<a class="button" href="changePassword.php">Change Password</a> 
<a class="button" href="logout.php">Logout</a><br>

<?php if(isset($bookings) && is_array($bookings) && count($bookings)>0){?>
    <table>
        <tr>
          <td>Booking ID</td>
            <td>Doctor</td>
            <td>Date</td>
        </tr>
        <?php foreach ($bookings as $booking){?> 
                <tr>
                    <td><?php echo $booking['id']; ?></td>
                    <td><?php echo $booking['firstname']." ".$booking['surname']; ?></td> 
                    <td><?php echo $booking['date']; ?></td>
                </tr>
            <?php } ?>
    </table>
<?php }else{ ?>
    <br style="clear:both">
    <p>No appointment booked so far!</p>
<?php } ?>
</body>
</html>
