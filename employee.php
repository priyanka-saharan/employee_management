<?php
session_start();
?>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>		
		<style>
			.class1 {
				background-color:lightblue;
				text-align:center;
				border:1px solid lightblue;
			}
		</style>
	</head>
	<body>
		<?php
		include("connect.php");     //database connection file
		?>
<p id="result"></p>
		<script>
		//$(document).ready(function() {
			//var checkBoxArray = [];
			//$('#show').on("click" , function() {
				var checkBoxArray = sessionStorage.getItem('boxes');
				document.getElementById("result").innerHTML = checkBoxArray;
				$.ajax({
					url:"/testfiles1/employee management/employee.php",
					data:{"checkBoxArray":sessionStorage.getItem('boxes') },
					type:"POST",
					success:function(data){ 
						//console.info("Success");
					}
				//$(".checkbox").find('input:checkbox').each(function() {
				//$(this).prop("checked", ($.inArray($(this).val(), checkBoxArray) !== -1));
				//console.log(checkBoxArray);
    				//});
 				});
				
				
			//});
		//});
		</script>

		<?php
		if (isset($_POST['checkBoxArray']) ) { 
			$_SESSION['check_array'] = $_POST['checkBoxArray'];
		}	
		?>
		
<?php

if ( isset( $_GET['submit']) ) { 
	if ( isset( $_GET['radio']) ) {
		$_SESSION['str_proj'] = $_GET['radio'] ;          //declaring session variable
	}
}
?>
		<?php
				
		if (isset($_SESSION['check_array']) ) { 
			if ( !empty($_SESSION['str_proj']) ) {
				if ( !empty($_SESSION['check_array']) ) {
					$query = "INSERT INTO proj_assignment ( projname , name ) 
						VALUES ('" . $_SESSION['str_proj'] . "','" . $_SESSION['check_array'] . "')";    												//query to insert records into database
					mysqli_query($conn , $query);         
					//$delete_query = "DELETE FROM selected_emp" ;
					//mysqli_query($conn , $delete_query);
					
			
				}
			}
		}
		?>
		<h2 class="class1">Project successfully assigned to employees</h2>
<!--<button id="show">check</button>-->
		<form method="GET" action="">

			<br><br><button  name="proj_info" formaction="proj_assign.php">View </button>

			<button formaction="testtable.php">Back</button>

		</form>
	</body>
</html>
