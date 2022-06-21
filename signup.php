<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SIGNUP</title>
<link rel="stylesheet" href="login.css" />
</head>
<body>
<?php
require('dbh.php');
// If form submitted, insert values into the database.
//cleaning and sanitizing input
if (isset($_REQUEST['username'])){
        // removes backslashes // to sanitize input be safe from sql injection.
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($conn,$username); 
	
	$password = stripslashes($_REQUEST['password']);
	$password = md5(mysqli_real_escape_string($conn,$password));

        $firstname = stripslashes($_REQUEST['firstname']);
	$firstname = mysqli_real_escape_string($conn,$firstname);

        $surname = stripslashes($_REQUEST['surname']);
	$surname = mysqli_real_escape_string($conn,$surname);

        $gender = stripslashes($_REQUEST['gender']);
	$gender = mysqli_real_escape_string($conn,$gender);

        $dob = stripslashes($_REQUEST['dob']);
	$dob = mysqli_real_escape_string($conn,$dob);

	// query to insert data into the databases
        //connecting to the database and using if and else to check if the connection has been estblished or not.
        $query = '
        INSERT INTO Login
        SET `username`="'.$username.'", 
        `password`="'.$password.'",
        `usertype`="user",
        `firstname`="'.$firstname.'",
        `surname`="'.$surname.'",
        `gender`="'.$gender.'",
        `dob`="'.$dob.'"
        ';
        $result = mysqli_query($conn,$query);
        if($result){
            echo "<div class='form'>
<h3>You are successfully register.</h3>
<br/>Click here to <a href='Login.php'>Login</a></div>";
        }
    }else{
            //simple html code storing user data when it inputed.
?>
<div class="form">
<h1>SIGN UP</h1>
<form name="SIGNUP" action="" method="post">
<input type="text" name="username" placeholder="Username" required /><br>
<input type="text" name="firstname" placeholder="First Name" required /><br>
<input type="text" name="surname" placeholder="Surname" required /><br>
<select name="gender">
        <option value="F">F</option>
        <option value="M">M</option>
</select><br>
<input type="date" name="dob" placeholder="Date Of Birth" required /><br>
<input type="password" name="password" placeholder="Password" required /><br>
<input type="submit" name="submit" value="SIGNUP" />
<br>
<br>
<a href="Login.php">LOG IN</a>
</form>
</div>
<?php
 } 
 ?>
</body>
</html>