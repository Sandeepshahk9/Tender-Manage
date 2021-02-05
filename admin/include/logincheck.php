<?php 
@session_start();
 if ($_SESSION['uniq_user_id']!==''|| $_SESSION['admin_type']=='admin')
	{    
      $sky="SELECT * from admin where id=".$_SESSION['uniq_user_id'];
      $skyq=mysql_query($sky);
      $admina=mysql_fetch_array($skyq);
	  
	}
else
	{ 
     
	 header("Location:index.php?msg=Please Login First.");
     
	 }

?>