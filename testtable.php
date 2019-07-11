<?php
session_start();
include('connect.php');
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
	</head>
	<body>
	<script>
	$(function() {
	$("#example").dataTable();
	})
	</script>
<p id="p1"> </p>
	<script>
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

	} 
	</script>
<script>	

$(document).ready(function() {
	let checkBoxArray = [];
	$('#save').on("click" , function() {
		$('input:checkbox:checked').each(function() {
			checkBoxArray.push($(this).val());
		});
		sessionStorage.setItem('boxes', (checkBoxArray));
	});



/*  $('#clear').click(function() {
    $(".checkbox").find('input:checkbox').each(function() {
      $(this).prop("checked", false);
    });
  }); */

});
</script>	
		<form method="GET" action="testtable.php">
			<table id="example">
				<h2 align="center">employee information:</h2>
				<thead>      
					<tr>
						<th>emp_id</th>
						<th>select</th>
						<th>name</th>
						<th>email</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$info = "SELECT * 
						FROM emp_info" ;           //query to select the data from database
					$query = mysqli_query ($conn , $info);
					while ( $data = mysqli_fetch_assoc ($query) ) {       //query to fetch the data
					?>	
					<tr align="center">
						<td><?php echo $data['emp_id'];?></td>
						<td><a href="testtable.php?name=<?php echo $data['name']; ?>"> <input type="checkbox"  name="check_list[]" onclick="myFunction()" value="<?php echo $data['name'];?>" > </a> 
						<td><?php echo $data['name'];?></td>
						<td><?php echo $data['email'];?></td>
					</tr>
				<?php   }  
               
				?> 
				</tbody>
				<tfoot>
            <tr>
                <th></th>
                <th><button id="save" type="button">selected </button></th>
                <th></th>
                <th></th>
                
            </tr>
        </tfoot>
			</table>
			
<!--<br><br> <button id="save" type="button" class="btn btn-primary btn-sm btn-block">Save </button>-->


<!--<button id="clear" type="button" class="btn btn-warning btn-sm btn-block">Unselect all</button>-->

			<br><br>&nbsp; <button type="submit" formaction="project.php" name="select_proj">Select Project</button>
			&nbsp; <button type="submit" formaction="addnewproj.php"  name="add_proj">Add New Project</button>
			<p>Click here to <button><a href="homepage.php">home page</a></button></p>
		</form>

	</body>
</html>
