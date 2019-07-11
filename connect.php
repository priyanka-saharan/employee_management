
<html>
<head>
</head>
<body>
<?php
$localhost1="localhost";
$user_name="root";
$password="anktech@123";
$database_name="mysql";
$conn=mysqli_connect("$localhost1","$user_name","$password","$database_name");

	if(!$conn)
	{
		echo "connection not successful";
	}
	
?>




</body>
</html>
