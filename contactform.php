<html>
	<head>
		<style>
			.error {
				color : red;
			}
		</style>
	</head>
	<body>
	<?php
	include('connect.php');
	?>

	<?php
	$name=$email=$contact_no=$message=$department ="";
	$emailErr=$messageErr="";
	if (isset($_POST['submit']) ) {

		if ( !empty($_POST['email']) && preg_match ( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^" , $_POST ['email']) ) {
			echo "email not empty and valid <br>"; 
			$sql = "SELECT email FROM contact_form WHERE (email = '" . $_POST['email'] . "'); " ; 
			$result = mysqli_query ($conn,$sql);  
			$count = mysqli_num_rows ($result);
	
			if ( $count > 0) {
				$row = mysqli_fetch_assoc($result);
				if ( $_POST['email'] == $row['email']) {
					$emailErr = "Email already exists <br>";
				} else {
					echo "Insert email <br> ";
				}			
			} else {
				echo "New email inserted <br>";
			}
		} else {
			$emailErr = "Email invalid OR Empty <br>";
		}
		if ( empty($_POST['message']) ) {
			$messageErr = "message is required ";
		} else {
			$message = $_POST['message'];		
		}


		if ( empty($_POST['email']) && empty($_POST['message'])  ) {
			echo "email and message are required fields <br>";
		} else if ( !preg_match ( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^" , $_POST ['email']) ) {
			echo "invalid email <br>";
		} else if ($_POST['email'] == $row['email'] ) {
			echo "email already exists";
		} else {
			$insert_query ="INSERT INTO contact_form ( name, email, contact_no, message, department) 
				VALUES('" . $_POST['name'] . "','" . $_POST  ['email'] . "','" . $_POST['contact_no'] . "', '" . $_POST['message'] . "', '" . $_POST['department'] . "')";
			$result=mysqli_query ($conn,$insert_query);
        
			$to = "contact@domain.com";
			$message = $_POST['message'];
			$subject = "site contact form";
			$header = "From :" . $_POST['email'] . "";
			/*if (isset($_POST['department']) && !empty($_POST['department']) ) {
				if ( $_POST['department'] == "billing") {
					$to = "billing@domain.com";
				} else if ( $_POST['department'] == "marketing") {
					$to = "marketing@domain.com";
				} else if ( $_POST['department'] == "technical") {
					$to = "technical@domain.com";
				} else {
					$to = "contact@domain.com";
				}
			}*/
			mail( $to, $subject, $message, $header ); 
			echo "Mail Sent. Thank you " . $_POST['email'] . ", we will contact you shortly.";

		}
	}
	?>


		<h2>Contact Us :</h2>
		<p class="error">*required field</p>
		<form method="POST" action="">
			Name : <br>
			<input type="text" name="name" value="" placeholder="Your name"><br><br>

			Email : <br>
			<input type="text" name="email" value="" placeholder="Your email">
			<span class="error">*<?php echo $emailErr;?> </span><br><br>  

			Contact_no : <br>
			<input type="tel" name="contact_no" value="" placeholder="Your contact no"><br><br>

			Message : <br>
			<textarea name="message" rows="10" cols="30" placeholder="say whatever you want"></textarea>
			<span class="error">*<?php echo $messageErr;?> </span><br><br> 

			Department : <select name="department">
					<option value="select a value">select a value</option>
					<option value="billing">Billing</option>
					<option value="marketing">Marketing</option>
					<option value="technical">Technical</option>
					<option value="hr">HR</option>
	     			</select><br><br>

			<input type="submit" name="submit" value="submit">
			<p>Back to Home page : <button formaction="homepage.php">Home page</button></p>
		</form>
	</body>
</html>
