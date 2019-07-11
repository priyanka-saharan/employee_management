<html>
	<head>
	<style>	
		.error {
			color:red;
		}
	</style>
	</head>
	<body style="background-color:#bfbfbf;" >
		<?php
			$err = "";
			if (isset($_POST['submit']) ) {
				if (!empty($_POST['radio']) && !empty($_POST['message']) && !empty($_POST['fname']) && !empty($_POST['email']) ) {
					
				} else {
					$err = "* Fill all required fields";	
				}
			}
		?>


		<div style="width: 600px; outline-style: double; position: absolute; left: 20em;">
			<form method="POST" action="">
				<div align="center">
					<h2>Feedback Form</h2>
					<p>We would love to hear your thoughts, concerns or problems with anything so we can improve!</p>
					<hr style="max-width: 700px;">
				</div>
				<div style="position: absolute; left: 6em;">
					&nbsp;<b><p>Feedback Type : <span class="error">*</span></p></b>
					
					&nbsp;<input type="radio" name="radio" value="comments">Comments
					<input type="radio" name="radio" value="bug report">Bug report
					<input type="radio" name="radio" value="questions">Questions
				</div>
				<div  style="width: 277px; margin-top: 5em; margin-left: 6em;">
					&nbsp;<b><p>Describe Feedback : <span class="error">*</span></p></b>
					
					&nbsp;<textarea name="message" rows="5" cols="25"></textarea>
				<div>
					<b><p>Name : <span class="error">*</span></p></b>
					
					<input type="text" name="fname" value="" placeholder="enter full name">
					
				</div>
				<div>
					<b><p>Email : <span class="error">*</span></p></b>	
					
					<input type="email" name="email" value="" placeholder="enter email">
				</div>
				<br><br><span class="error"><?php echo $err;?> </span>
				<div>				
					<input type="submit" name="submit" value="submit " style="background-color: #4CAF50; width:80px; height:30px; color:#ffffff;">
					<p>Back to Home page : <button formaction="homepage.php">Home page</button></p>
				</div>
			</form>
		</div>
	</body>
</html>
