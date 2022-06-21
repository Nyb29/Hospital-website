<?php

include 'dbh.php';
session_start();


if($_SESSION["user"]["usertype"]=="admin"){
    //ADMIN VIEW

    $sql="
    SELECT l.firstname,l.surname,b.patientID,b.date,b.id
    FROM booking AS b, Login AS l
    WHERE b.patientID=l.id";
}else{ //DOCTOR VIEW
    $sql="
    SELECT l.firstname,l.surname,b.patientID,b.date,b.id
    FROM booking AS b, Login AS l
    WHERE b.doctorID = ".$_SESSION['user']['id']."
    AND b.patientID=l.id
";
}



$result = mysqli_query($conn,$sql);

$bookings = [];

while($row = mysqli_fetch_assoc($result)) {
    $bookings[] = $row;
}


if(!isset($_SESSION["username"]))
{
	header("location:Login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Patients List</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<h1>Patients List</h1>
<b><?php echo $_SESSION["username"] ?></b><br>
<a class="button" href="patients-list.php">Patients List</a>
<a class="button" href="logout.php">Logout</a><br>

<?php if(isset($bookings) && is_array($bookings) && count($bookings)>0){?>
    <table>
        <tr>
            <td>Booking ID</td>
            <td>Patient</td>
            <td>Date</td>
            <td></td>
        </tr>
        <?php foreach ($bookings as $booking){?>
                <tr>
                    <td><?php echo $booking['id']; ?></td>
                    <td><a href="patient.php?pid=<?php echo $booking['patientID']; ?>"><?php echo $booking['firstname']." ".$booking['surname']; ?></a></td>
                    <td><?php echo $booking['date']; ?></td>
                    <td>
                        <a class="actionButton" href="deleteBooking.php?bid=<?php echo $booking['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
    </table>
<?php }else{ ?>
    <br style="clear:both">
    <p>No appointment booked so far!</p>
<?php } ?>
</body>
</html>