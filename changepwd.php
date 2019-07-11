<?php
session_start();
?>
<html>
	<head>
		<style>
			.error{
				color:red;
			}
			.class1 {
				background-color:lightblue;
				text-align:center;
				border:1px solid lightblue;
			}
		</style>
	</head>
	<body>

	<?php
	include('connect.php');       //database connection file
	?>

	<?php
	$Err = $Err1 = $Err2 = $Err3 = "";           // define variables and set to empty values

	if (isset ($_POST['submit']) ) {            
		$password = $_SESSION['login_userpwd'];
		if (!empty($_POST['currpwd']) ) {
			if ($password == $_POST['currpwd']) {
				if ( !empty($_POST['newpwd']) && !empty($_POST['conpwd']) ) {
					if ($_POST['newpwd'] == $_POST['conpwd']) {      //check if both the password fields are same 
						$new_password = $_POST['newpwd'];
						$hash = md5($new_password);
						$query = mysqli_query($conn , "UPDATE emp_info 		//query to update the data 
										SET password = '" . $hash . "' 
										WHERE ( email = '" . $_SESSION['login_user'] . "')");  		?>			<h2 class="class1">Password changed successfully</h2>
	<?php
					} else {
						$Err3 = "both password fields must be same";
					}
				} else {
					$Err2 = "both password fields are required";
				}
			} else {
				$Err1 = "current password is wrong";
			}
		} else {
			$Err = "all fields are required";
		}
	}	
	?>

		<h2>Change your password here </h2>
		<p class="error">*required field</p>
		<form method="POST" action="">

			Enter Current Password : <input type="password" name="currpwd">
			<span class="error">*<?php echo $Err;?> </span><br><br>
			<span class="error"><?php echo $Err1;?> </span>

			Enter New Password : <input type="password" name="newpwd">
			<span class="error">*<?php echo $Err2;?> </span><br><br>

			Confirm New Password : <input type="password" name="conpwd">
			<span class="error">*<?php echo $Err3;?> </span><br><br>

			<input type="submit" name="submit" value="submit">

			<p>Back to profile page, Click here <button><a href="profile.php">profile</a></button></p>

		</form>
	</body>
</html>
