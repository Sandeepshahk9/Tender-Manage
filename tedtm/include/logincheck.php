<?php 
session_start();
 if ($_SESSION['sub_admin_uniq_user_id']!=''|| $_SESSION['sub_admin_type']=='sub_admin')
	{    
      $sky=" SELECT * from sub_admin where id=".$_SESSION['sub_admin_uniq_user_id'];
      $skyq=mysql_query($sky);
      $admina=mysql_fetch_array($skyq);
	  
	}
else
	{ 
     echo "<script>location.href='index.php?msg=Please Login First';</script>";
	
     
	 }
	 
	

?>