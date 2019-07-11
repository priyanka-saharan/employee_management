<?php
session_start();     
?>
<html>
	<head>
		<style>
		.error{
			color:red;
		}
		.class2 {
			background-color:red;
			text-align:center;
			border:1px solid red;
		}
		</style>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>
	<body>

	<?php
	include('connect.php');      //database connection file
	?>

	<?php
	$emailErr = $passwordErr = "";         // define variables and set to empty values 
	if ( isset( $_POST['login']) ) { 
		if ( empty( $_POST['email']) ) {
			$emailErr = "email is required";
		} else if ( empty( $_POST['password']) ) {
			$passwordErr = "password is required";
		} else {
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			$_SESSION['login_userpwd'] = $password;      //session variable to store password
			$hash = $password;
			echo $query = "SELECT * FROM emp_info WHERE email = '$email' AND password = '$password'";
			$result = mysqli_query($conn , $query);         //query to select data from database
			$count = mysqli_num_rows($result);
			if ( $count == 1) { 
				$_SESSION['login_user'] = $email;
				echo "login successful";
				header('location:profile.php');       //redirect to profile page
			} else {
				?> <h2 class="class2">Invalid User/Password</h2><?php 
			}	
		}
	}
	?>
		<div class="container">
			<h2>Employee Login Page </h2>
			<p class="error">*Required fields</p>
			<form method="POST" action="" >
				<div class="form-group">
      					<label for="email">Email:</label>
     					<input type="email" class="form-control" name="email" value="" placeholder="Enter email">
					<span class="error">*<?php echo $emailErr;?> </span>
				</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" name="password" placeholder="Enter email">
				<span class="error">*<?php echo $passwordErr;?> </span>
			</div>
				<input type="submit" name="login" value="login">

				<p>If you are not registerd, Click Here <button style="background-color:lightgray;"><a href="registration.php">Register</a></button></p>
				<p>Click here to <button><a href="homepage.php">home page</a></button></p>
			</form>
		</div>
	</body>
</html>
