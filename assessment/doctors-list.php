<?php

include 'dbh.php';
session_start();

    $sql="
    SELECT * FROM Login
    WHERE usertype='doctor'";


$result = mysqli_query($conn,$sql);

$doctors = [];

while($row = mysqli_fetch_assoc($result)) {
    $doctors[] = $row;
}


if(!isset($_SESSION["username"]))
{
	header("location:Login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctors List</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<h1>Doctors List</h1>
<b><?php echo $_SESSION["username"] ?></b><br>
<a class="button" href="patients-list.php">Patients List</a>
<a class="button" href="logout.php">Logout</a><br>

<?php if(isset($doctors) && is_array($doctors) && count($doctors)>0){?>
    <table>
        <tr>
            <td>Doctor ID</td>
            <td>Fullname</td>
        </tr>
        <?php foreach ($doctors as $doctor){?>
                <tr>
                    <td><?php echo $doctor['id']; ?></td>
                    <td><?php echo $doctor['firstname']." ".$doctor['surname']; ?></a></td>
                </tr>
            <?php } ?>
    </table>
<?php }else{ ?>
    <br style="clear:both">
    <p>No appointment booked so far!</p>
<?php } ?>
</body>
</html>