
<?php/*
if (isset($_GET['page']) ) {
$page = $_GET['page'];
$cookiename = "emp";
// GET COOKIE TO NOT OVERWRITE.
$cookie = isset($_COOKIE[$cookiename]) ? unserialize($_COOKIE[$cookiename]) : [];

	if (isset($_GET['check_list']) ) {
		$cookie[$page] = $_GET['check_list'];
		setcookie($cookiename , serialize($cookie), time()+(86400/86400*30) );
	}
}*/
?>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script src="js/sisyphus.min.js"></script>
	</head>
	<body>
<p id="p1"> </p>


<script>/*
function myFunction() {

	var all_checked_list = document.querySelectorAll('input[name="check_list[]"]:checked');
	var vals = [];
	for(var x = 0, l = all_checked_list.length; x < l;  x++) {
		if (all_checked_list[x].checked) {
			vals.push(all_checked_list[x].value);
		}	
	}
	var str = vals.join(', ');
	document.getElementById('p1').innerHTML = str;

} */
</script>
	<?php
	include("connect.php");     //database connection file
	?>
<form method="GET" action="" id="my-form">
<?php /*
$checked_emp = array();
if (isset($_GET['submit']) ) {
	if (isset($_GET['check_list']) ) {

		$checked_emp = $_GET['check_list'];
		$_SESSION['emp_selected'] = $checked_emp;
		//$_SESSION['emp_fetched'] = array_merge($_SESSION['emp_selected'],$checked_emp);
		print_r($_SESSION['emp_selected']);
		$str_emp = implode(',' , $_GET['check_list']); 
		$stripped = trim(preg_replace('/\s+/', ' ', $str_emp));
		$insert_query = "INSERT INTO selected_emp (sel_emp) VALUES ('" . $stripped . "')";
		$result_query = mysqli_query($conn , $insert_query);
	}

} */
?>

<?php/* 

if (isset($_GET['submit']) ) {
	if (isset($_COOKIE[$cookiename]) ) {
		print_r(unserialize($_COOKIE[$cookiename]));
	}
}*/

?>

	<?php
	$limit = 7;
		if ( isset($_GET['page']) ) {
			$page_no = $_GET['page'];
		} else {
			$page_no = 1;
		}
		$start_from = ($page_no-1)*$limit;
		$sql = "SELECT * FROM emp_info LIMIT $start_from,$limit ";
		$result = mysqli_query($conn , $sql);
	?>

		<!--<form method="GET" action="">-->

			<div class="container">
				<h2>employee information:</h2>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>EmpId</th>
							<th>Name</th>
							<th>Email</th>		
						</tr>
					</thead>
					<tbody>
	
					<?php
					$info = "SELECT * 
						FROM emp_info LIMIT $start_from,$limit ";           //query to select the data from database
					$query = mysqli_query ($conn , $info);
					while ( $data = mysqli_fetch_assoc ($query) ) {       //query to fetch the data

       	 				?>	<tr> 
							<td><?php echo $data['emp_id'];?></td>
							<td><a href="datatable.php?id=<?php echo $data['emp_id'];?>&name=<?php echo $data['name']; ?>"> <input id="id1" type="checkbox" name="check_list[]" value="<?php echo $data['name'];?>"> </a> <?php echo $data['name'];?></td>  
							<td><?php echo $data['email'];?></td>			
						</tr>
             		<?php        	}  
               
			?>
					</tbody>		
	    
				</table>
				<ul class="pagination"> 
   				<?php   
     					$sql = "SELECT COUNT(*) FROM emp_info";   
       					$result = mysqli_query($conn , $sql);   
        				$row = mysqli_fetch_row($result);   
       					$total_records = $row[0];   
          				
        				// Number of pages required. 
       					$total_pages = ceil($total_records / $limit);   
        				$pagLink = "";                         
        				for ( $i = 1; $i <= $total_pages; $i++) { 
          					if ( $i == $page_no) { 
           						$pagLink .= "<li class='active'><a id='a1' onclick='myFunction()' href='datatable.php?page=" . $i ."'>". $i ."</a></li>";
								
						} else  { 
							$pagLink .= "<li><a id='a1' onclick='myFunction()' href='datatable.php?page=". $i ."'>". $i ."</a></li>";   
						} 
					};   
       					echo $pagLink;    
				?> 
				</ul> 
			</div>

<button type="submit" name="submit" >choose emp</button> 
			&nbsp; <button type="submit" formaction="project.php" name="select_proj">Select Project</button>
			&nbsp; <button type="submit" formaction="addnewproj.php"  name="add_proj">Add New Project</button>

		</form>
	</body>
</html>
