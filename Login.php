

<?php

include("dbh.php");
   
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST")
{
        print_r($_POST);
}


if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
  }
  echo "Welcome to the login page";

// cleaning input
if($_SERVER["REQUEST_METHOD"]=="POST")
{

	$username = stripslashes($_POST['username']);
	$username = mysqli_real_escape_string($conn,$username); 

	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($conn,$password); 
	$password=md5($password);

	
// connecting to the database 
	$sql="select * from Login where username='".$username."' AND password='".$password."' ";

	$result=mysqli_query($conn,$sql);

	$row=mysqli_fetch_array($result);
// this is how we make sure we redirect the user to the right page(admin, doctor, patient)
	$_SESSION['user'] = $row;
    $_SESSION["username"] = $username;

	if($row["usertype"]=="admin")
	{	
		header("location:adminhome.php");
	}

	if($row["usertype"]=="user")
	{
	    header("location:userhome.php");
		
	}
	if($row["usertype"]=="doctor")
	{
		header("location:doctorhome.php");
	}
    

 else {
	echo "<div class='form'>
		  <h2> Username or password are not correct.</h2><br/>
		  <p class='link'>Click here to the login page <a href='Login.php'>Login</a> again.</p>
		  </div>";
 }
}else


?>












<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<center>

	<h1>Login Form</h1>
	<br><br><br><br>
	<link rel="stylesheet" href="login.css">
		<br><br>


		<form action="#" method="POST">


	<div>
		<label>username</label>
		<input type="text" name="username" required>
	</div>
	<br><br>

	<div>
		<label>password</label>
		<input type="password" name="password" required>
	</div>
	<br><br>

	<div>
		
		<input type="submit" value="Login">
		<a href="signup.php">sign up</a>
	</div>


	</form>


	<br><br>
 </div>
</center>
<a href="Assessment.html">Homepage</a>
</body>
</html>



