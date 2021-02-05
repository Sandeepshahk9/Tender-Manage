
<?php require('include/config.php'); 
include("include/logincheck.php");
include_once("include/function.php");





 $str=mysql_query("select * from tender where c_name='".$_POST['c_name']."' AND  sub_category='".$_POST['sub_category']."' AND tittle ='".$_POST['tittle']."' AND  price ='".$_POST['price']."' AND emd ='".$_POST['emd']."' AND 	state ='".$_POST['state']."' AND city ='".$_POST['city']."' AND  status='1' ") ;
	  
	  $num_row=mysql_num_rows($str);
	  
	 
	  
	  if(!empty($num_row)){


     echo  $_POST['tittle']."   -    Tender Already added . If You want to add again then click submit.";
	  }
	  
	
	  
	  
	  
	  
	  ?>