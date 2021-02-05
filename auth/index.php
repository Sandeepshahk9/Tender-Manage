<?php 

include_once('../admin/include/config.php');
include_once('../admin/include/function.php');

include_once('login_check.php');
include_once('response.php');


$head=select_table('admin_setting','id');
$head=mysql_fetch_array($head);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

   
 <?php include_once('hlink.php'); ?>
	<title>tender/user/home</title>
   
</head>
<style>

</style>
<body style="background:#86a1b1">

   <section class="user-dashboard-sec">
		<div class="container-fluid">
			<div class="row">
			
				<?php  include_once('menu_sidebar_index.php') ; ?>
				
				<?php include_once('header.php'); ?>
				
					
    <div class="details-list-proj-rec">
	<table class="grid" style="width: 100%">
	<thead>
	      <th></th>
	    <th style="width:75px;">Date</th>
		<th style ="width:750px;">Subject</th>
	</thead>
	</table>	
	<ul>
					
			<li><a href="details.php"></a></li>
			
			
			<?php 
			
///////////////////////////////////////////////////////////status check code

			$status_check=check_status() ;if($status_check=='no'){ ?>
			 <li>Your Subscription Plan is currently Inactive . Please contact with Admin</li>
			 
			<?php }
			 else {

			 
 ///////////////////////////////// ////////////////////////////////////////////////////package check code
			
			     $packag_check=package_check($plan['duration'],$plan['plan_start_date']) ;
				 
		         if($packag_check < $todate){ echo "<li>Your Subscription Plan Ended. Please Renew!</li>" ;
				 
                      $start=$packag_check;
					  
				      } 
				  
				  else    {
      				 $start=$todate; }
				  
				  $end=$plan['plan_start_date'];
				  
				  while (strtotime($end) <= strtotime($start)) {
                      $encodeString='';
				      $count=0;
				      $res=0;
					 
					     $cat=explode(",",$plan['sub_category']) ; foreach($cat as $key) { 
					 
					         
					     $stat=explode(",",$plan['state']) ; foreach($stat as $san) { 
						        
								 ///////////////////li code///////////////////////////////////////////// 
								
								  $str="select id from tender where added_date='".$start."' AND sub_category='".$key."' AND state='".$san."' ";
								  $strr=mysql_query($str);
								  $res=mysql_num_rows($strr);
								  $count=$count+$res ;
								  
					              }
							
					 }
					 
			      if(!empty($count)){	
			
                // Encode the string
             $encrypted = encryptStringArray($start); 
				  
                
				  
	 ?>
	 	 
  <li><a href="details.php?iz=<?php echo $encrypted ;?>&no=<?php echo $count ;?>"><?php echo date('d/m/Y',strtotime($start)); ?>&nbsp;&nbsp; <?php echo $count ; ?>&nbsp; New Tenders Date <?php echo date('d-F Y',strtotime($start)); ?> - www.Tender.com</a></li>
              <?php 
			         $encrypted=0; 
                     }
               
                  $start = date ("Y-m-d", strtotime("-1 day", strtotime($start)));
                 

			 }  }   ?>  

			  <li></li>
			  
			  <!---------------------------------------------------pagination code ------------------->
              
			

		           
				
				</div>			
			</div>		
		</div>   
   </section>
   
	 <?php include_once('footer.php'); ?>
   

    <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/main.js"></script>
		<script src="js/slick.min.js" type="text/javascript" ></script>
		 <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
		<script src="./js/slick.js" type="text/javascript" charset="utf-8"></script>  
    
    
</body>
<!--===================
			body 
		=====================-->

</html>