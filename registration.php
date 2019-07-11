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
				border:0px solid lightblue;
			}
		</style>
	</head>
	<body>

		<?php
		include("connect.php");      //database connection file
		?>

		<?php 
		$nameErr = $emailErr1 = $emailErr2 = $emailErr3 = $passwordErr = $cpwdErr = $Err = " ";   // define variables and set 															to empty values
		
		if ( isset( $_POST['submit']) ) {
			if ( empty( $_POST['name']) ) {
				$nameErr = "name is required";
			} else {
				$name = $_POST['name'];
			}
			if ( empty( $_POST['email']) ) {
				$emailErr1 = "email is required";
			} else if ( preg_match ("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^" , $_POST['email']) ) {  		// check if e-mail address is well-formed		
				
				$sql = "SELECT email 
					FROM emp_info 
					WHERE (email = '" . $_POST['email'] . "'); " ; //query to select email from DB
				$result = mysqli_query ($conn , $sql);  
				$count = mysqli_num_rows ($result);
	
				if ( $count > 0) {
					$row = mysqli_fetch_assoc($result);    //query to fetch data from database
					$email = $row['email'];
					$_SESSION['u_email'] = $email;
					if ( $_POST['email'] == $row['email']) {
						$emailErr2 = "Email already exists";
					} else {
						echo "Insert email <br> ";
					}			
				//} else{
					//echo "new email entered";
				}
			} else {
				$emailErr3 = "email format is invalid";
			} 
			if ( !empty( $_POST['password']) && !empty( $_POST['cpwd']) ) { 
				if ( $_POST['password'] == $_POST['cpwd']) {      //check if password and confirm password fields are same
					$password = $_POST['password'];
					$hash = md5($password);
				} else {
					$cpwdErr = "Password and confirm password should match";
				}
			} else {
				$passwordErr = "both password fields are required";
			}
			

			if ( !empty( $_POST['name']) ) {
				if ( !empty( $_POST['email']) ) {
					if ( preg_match ( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^" , $_POST ['email']) ) {
						if ($_POST['email'] !== $row['email']) {	
							$email = $_POST['email'];
							if ( !empty( $_POST['password']) ) {
								if ( !empty( $_POST['cpwd']) ) {
									if ( $_POST['password'] == $_POST['cpwd']) {         // validating the form data
										$regi_info = "INSERT INTO emp_info ( name, email, password, remaining_CL, remaining_EL, active_status) VALUES('" . $name . "','" . $email . "', '" . $hash . "', 12, 3, 0)";
										mysqli_query ($conn , $regi_info); 
										$success = "registered successfully";      
									} else {
										$cpwdErr = "password should match";
									}
								} else {
									$passwordErr = "both password fields are required";
								}
							} else {
								$passwordErr = "both password fields are required";
							}
						}
					}
				} else {
					$emailErr1 = "email is required";
				}
			} else {
				$nameErr = "name is required";
			}
//else if ( !preg_match ( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^" , $_POST ['email']) ) {
//				$emailErr3 = "email format is not valid1";
//			} else if ( $_POST['email'] == $_SESSION['u_email']) {
//				$emailErr2 = "email already exists";
//			} else if ( $_POST['password'] <> $_POST['cpwd']) {         // validating the form data
//				$cpwdErr = "password should match";		 
	//		} 

		}
		?>

		<div align="center" style="background-color:#bfbfbf; width:800px; height:910px; outline-style: double; position: absolute; left:15em;">
			<h2 class="class1"><?php echo $success; ?> </h2>
			<form method="POST" action="" >

				<h2>Employee Registration Form</h2>
				<p class="error">*Required field</p>

				<span class="error"><?php echo $Err;?> </span><br>
				Name :<input type="text" name="name" value="">
				<span class="error">*<?php echo $nameErr;?> </span><br><br>

				E-mail : <input type="text" name="email" value="">
				<span class="error">*<?php echo $emailErr1;?> </span> 
				<span class="error"><?php echo $emailErr2;?> </span>
				<span class="error"><?php echo $emailErr3;?> </span><br><br>

				Password : <input type="password" name="password">
				<span class="error">*<?php echo $passwordErr;?> </span><br><br> 

				Confirm Password : <input type="password" name="cpwd">
				<span class="error">*<?php echo $cpwdErr;?> </span><br><br> 

				<input type="submit" name="submit" value="submit">

				<p>Click here to <button><a href="homepage.php">home page</a></button></p>

			</form>
		</div>
		
	</body>
</html>
