<?php

include("dbh.php");

session_start();

$sql="SELECT * FROM Login WHERE usertype='doctor'";

$result = mysqli_query($conn,$sql);

$doctors = [];

while($row = mysqli_fetch_assoc($result)) {
    $doctors[] = $row;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Book an appoinment with us</title>
        <link rel="stylesheet" href="stylebook.css">
    </head>
    <body>
    <form action="booking.inc.php" method= "POST">
            <input type="datetime-local" name="date" placeholder="pick a date" >
            <select name="doctor">
                <option value="">select doctor</option>
                <?php
                foreach ($doctors as $doctor){?>
                    <option value="<?php echo $doctor['id']; ?>"><?php echo $doctor['firstname']." ".$doctor['surname']; ?></option>
                <?php }  ?>

            </select>
            <input type="submit" name="submit">
 </form>

</div>
<?php
 
 ?>
    

    
       
