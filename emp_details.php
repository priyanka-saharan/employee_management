<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
	</head>
	<body>
	<body>
	<script>
		$(function() {
			$("#example").dataTable();
		});
	</script>
	<?php
		include("connect.php");        //database connection file
	?>
		<div class="container">
			<h2>Employee details:</h2>
			<table id="example" class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Emp_Id</th>
						<th>Name</th>
						<th>Email</th>		
						<th>Contact No</th>
						<th>Remaining CL</th>
						<th>Remaining EL</th>
						
					</tr>
				</thead>
				<tbody>
	
				<?php
					$info = "SELECT * 
						FROM emp_info";      //query to select data from database
					$query = mysqli_query ($conn,$info);
					while ( $data = mysqli_fetch_assoc ($query) ) {
				?>	<tr> 
						<td><?php echo $data['emp_id'];?></td>
						<td><?php echo $data['name'];?></td>
						<td><?php echo $data['email'];?></td>
						<td><?php echo $data['contact_no'];?></td> 
						<td><?php echo $data['remaining_CL'];?></td>
						<td><?php echo $data['remaining_EL'];?></td>
						
					</tr>
			<?php		}  
               
 			?>
				</tbody>		
			</table><hr>
			<form>
				<p>Back to Home page : <button formaction="homepage.php">Home page</button></p>
			</form>
		</div>
		
		
		
	</body>
</html>
