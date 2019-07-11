
<html>
<head>
</head>
<body>


<?php
session_start();
?>
<html>
	<head>
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
		<style>
			.class1 {
				background-color:lightblue;
				text-align:center;
				border:1px solid lightblue;
			}
		</style>
	</head>

	<body>
		<div id="main" style="background-color:#bfbfbf; width:1170px; height:880px; outline-style: double; position: absolute;  ">
			<?php
			include('connect.php');   // database connection file
		
			?>

			<?php
			$query = "SELECT * 
				FROM emp_info 
				WHERE (email = '" . $_SESSION['login_user'] . "')";        //query to select data from database
			$result = mysqli_query ($conn ,$query);
			$data = mysqli_fetch_assoc($result);             //query to fetch data
			$emp_id = $data['emp_id']; 
			$_SESSION['user_id'] = $emp_id; 
			$name = $data['name'];
			//$_SESSION['user_name'] = $name;
			$email = $data['email'];
			$contact_no = $data['contact_no'];
			$altcontact_no = $data['altcontact_no'];
			$skills = $data['skills'];
			$image = $data['image'];

			?>


			<?php
			$target_dir = "gallery/";
			if (isset($_POST['delete']) ) {
				$query = "SELECT * 
					FROM emp_info 
					WHERE (email = '" . $_SESSION['login_user'] . "')";
				$result = mysqli_query ($conn , $query);
				$data = mysqli_fetch_assoc($result);		
				$add_image = $data['image'];	
				if ( $data['image'] ==  $_SESSION['user_image'] ) {
					unlink($target_dir.$_SESSION['user_image']);       //deleting the uploaded file
					$query = "UPDATE emp_info 
						SET image = NULL 
						WHERE (email = '" . $_SESSION['login_user'] . "')";    //query to update data 
					$result = mysqli_query($conn , $query);
					//echo "image is deleted"; 
				}	
			} 


			?>

			<?php
		      				 
			if ( isset($_POST['submit']) ) {               //check if value is set or not
			$target_dir = "gallery/"; 				//target directory to store files
				$target_path = $target_dir.basename( $_FILES['image']['name']);   
				if ( move_uploaded_file($_FILES['image']['tmp_name'] , $target_path) ) {    //uploading the image file
   					//echo "File uploaded successfully";  
					$_SESSION['user_image'] = $_FILES['image']['name'];
					$query = "UPDATE emp_info 
						SET image = '" . $_SESSION['user_image'] . "'
						WHERE (email = '" . $_SESSION['login_user'] . "')";    //query to update data 
					$result = mysqli_query($conn , $query);
				} else{  
   					//echo "file not uploaded";  
				}
		

				$newname = $_POST['name'];
				$newcontact_no = $_POST['contact_no'];
				$newaltcontact_no = $_POST['altcontact_no'];
				$newskills = $_POST['skills'];
				$query1 = "UPDATE emp_info SET name ='" . $newname . "', contact_no = '" . $newcontact_no . "', altcontact_no = '" .  $newaltcontact_no . "', skills = '" . $newskills . "' WHERE (email = '" . $_SESSION['login_user'] . " ')";     //query to update the data
				$result1 = mysqli_query ($conn , $query1);
				if ($result1) {

			 	//<h2 class="class1"> data updated </h2>

							
				} else {
					echo "error in updating data";
				}
			

			}

		
			$image = isset($_SESSION['user_image']) ? $_SESSION['user_image'] : 'no image' ;   //check if the value is set or not
			$result2 = mysqli_query ($conn , "SELECT * 
							FROM emp_info 
							WHERE (email = '" . $_SESSION['login_user'] ."')");
			$row = mysqli_fetch_assoc($result2);         //query to fetch the updated data
			$e_name = $row['name'];
			$e_contact_no = $row['contact_no'];
			$e_altcontact_no = $row['altcontact_no'];
			$e_skills = $row['skills'];
			$image = $row['image'];                  //storing the edited data into variables  

			?>

			<?php					//for employees active/inactive status
			$id = $_SESSION['user_id'];

			$result1 = mysqli_query($conn , "SELECT emp_id FROM emp_info WHERE emp_id ='$id'");

			if (mysqli_num_rows($result1) > 0) {
				mysqli_query($conn , "UPDATE emp_info SET active_status = 1 WHERE emp_id = $id");
			} else {
				mysqli_query($conn , "UPDATE emp_info SET active_status = 0 WHERE emp_id = $id");
			}
			?>

			<?php
			include('profile.css.php');
			?>
			<h2><?php echo "Profile of " . $name . "" ; ?> </h2>

			<form method="POST" action="" enctype="multipart/form-data">

			<?php

			if ( !empty($image) ) { ?>
				<img src="<?php echo (isset($image) ? $target_dir.$image : 'no image' ); ?>" width="150" height="160"> <br><br>
		<?php
			} else {
				echo "no image";
			}

		?>

				<input type="file" name="image">

				<!--&nbsp; &nbsp;<span><input type="submit" name="upload" value="upload"></span> --> 
				&nbsp; &nbsp;<span><input type="submit" name="delete" value="Delete Image"></span><br><br>
 
				Emp_Id : <input type="tel" name="emp_id" value="<?php echo (isset($emp_id) ? $emp_id : ''); ?>" disabled ><br><br>

				Name : <input type="text" name="name" value="<?php echo (isset($e_name) ? $e_name : $name ); ?> " ><br><br>

				Email : <input type="text" name="email" value="<?php echo (isset($email) ? $email : ''); ?>" disabled ><br><br> 

				Contact No : <input type="tel" name="contact_no" value="<?php echo (isset($e_contact_no) ? $e_contact_no : $contact_no); ?>"><br><br>

				Alternate Contact No : <input type="tel" name="altcontact_no" value="<?php echo (isset($e_altcontact_no) ? $e_altcontact_no : $altcontact_no); ?>"><br><br>

				Skills : <input type="text" name="skills" value="<?php echo (isset($e_skills) ? $e_skills : $skills ); ?> " ><br><br>

				<input type="submit" name="submit" value="submit" >&nbsp;
				<p>Click here to <button><a href="homepage.php">home page</a></button></p>
				<!--<button formaction="changepwd.php">Change Password</button>&nbsp;

				<button formaction="logout.php">logout</button> &nbsp;

				<button formaction="applyleave.php?id=<?php echo $emp_id ?>">apply leave</button>

				<button formaction="deactivate_emp.php?id=<?php echo $emp_id ?>">deactivate</button>-->
			</form>
		</div>
	</body>
</html>
<body>
</html>
