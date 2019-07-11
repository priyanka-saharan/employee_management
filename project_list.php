<?php
session_start();
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>
	<body>
	<?php
	include("connect.php");     //database connection file
	?>

	<?php


	
	$limit = 7;
	if ( isset($_GET['page']) ) {
		$page_no = $_GET['page'];
	} else {
		$page_no = 1;
	}
	$start_from = ($page_no-1)*$limit;
	$sql = "SELECT * FROM projectname LIMIT $start_from,$limit ";
	$result = mysqli_query($conn , $sql);
	?>

		<form method="GET" action="employee.php?projname=<?php echo $data['projname'];?>">
			<div class="container">
				<h2>Project Table :</h2>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Proj_Id</th>
							<th>Project Name</th>		
						</tr>
					</thead>
					<tbody>
					<?php
					$info = "SELECT * 
						FROM projectname LIMIT $start_from,$limit ";           //query to select the data from database
					$query = mysqli_query ($conn , $info);
					while ( $data = mysqli_fetch_assoc ($query) ) {      //query to fetch the data
				       	?>	<tr> 
							<td><?php echo $data["proj_id"];?></td>
							<td><?php echo $data['projname'];?></td>  			
						</tr>
				<?php	}   
				?>
					</tbody>		
				</table>
				<ul class="pagination"> 
      				<?php   
					$sql = "SELECT COUNT(*) FROM projectname";   
					$result = mysqli_query($conn , $sql);   
					$row = mysqli_fetch_row($result);   
					$total_records = $row[0];   
          
					// Number of pages required. 
					$total_pages = ceil($total_records / $limit);   
					$pagLink = "";                         
					for ( $i = 1; $i <= $total_pages; $i++) { 
						if ( $i == $page_no) { 
							$pagLink .= "<p>Pages:</p><li class='active'><a href='project.php?page="
                                                . $i ."'>". $i ."</a></li>"; 
						} else { 
							$pagLink .= "<li><a href='project.php?page=". $i ."'>" . $i . "</a></li>";
						} 
					};   
					echo $pagLink;   
				?> 
				</ul>
			</div>

			<p>Click here to <button><a href="homepage.php">home page</a></button></p>
		</form>
	</body>
</html>
