<?php
session_start();
?>
<html>
	<head>
		<style>
			.error {
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
		include("connect.php");                             //database connection file
		?>

		<?php
		$Err = "";

		if ( isset( $_POST['submit']) ) {
			if ( empty( $_POST['pname']) ) {                //check if project name is empty  
				$Err = "project name is empty";
			} else {
				$regi_info = "INSERT INTO projectname ( projname ) 
						VALUES('" . $_POST['pname'] . "')";
				mysqli_query ($conn , $regi_info);        //query to insert data into database
	 	?>  
			<h2 class="class1">project added successfully</h2>	
		<?php   }
		}

		?>

		<h2>Enter new project here </h2>
		<form method="POST" action="">
			Project Name : <input type="text" name="pname" value="">
			<span class="error">*<?php echo $Err;?> </span><br><br>

			<input type="submit" name="submit" value="Add Project">
			<button formaction="testtable.php">Back</button>
			<p>Click here to <button><a href="homepage.php">home page</a></button></p>
		</form>
	</body>
</html>
