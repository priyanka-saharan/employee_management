<?php
session_start();

if ( session_destroy() ) {     //session destroyed
	header('location:testtable.php');    //redirect to login page
}	
?>
