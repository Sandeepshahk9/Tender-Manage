<?php 
 session_start();
include_once('../admin/include/config.php');
include_once('../admin/include/function.php');
include_once('login_check.php');


if(isset($_GET['logout'])){


		unset($_SESSION['user_id']); 
		unset($_SESSION['user_email']); 	
 		session_unset();session_destroy();
		header("location:../index.php?msg=You-Log-out-successfully");
		 
		exit(0);



}

?>