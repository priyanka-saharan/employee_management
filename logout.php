<?php
session_start();

if ( session_destroy() ) {     //session destroyed
	header('location:login.php');    //redirect to login page
}	
?>
