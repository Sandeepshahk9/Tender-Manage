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
	<title>tender/favourite</title>
   
</head>
<style>

</style>
<body style="background:#86a1b1">
   <section class="user-dashboard-sec">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 select-tabs-1">					
					<div class="user-dashboard-sec-1">
					<img src="../admin/photo/<?php echo $head['logo']; ?>" height="80px" width="238px" alt="banner-top" class="img-responsive" style="display: block;margin: auto;">
						<ul class="nav nav-tabs nav-stacked">
						<li class="panel panel-default" id="dropdown" style="background: none;border: none;    box-shadow: none;">
						<a data-toggle="collapse" href="#dropdown-lvl1"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Your Category <span class="caret"></span>						</a>

						<!-- Dropdown level 1 -->
						<div id="dropdown-lvl1" class="panel-collapse collapse">
							<div class="panel-body ccs-s">
								<ul class="nav navbar-nav">	
                                   <?php 
								   $str=mysql_query("select sub_category from sub_plan where member_email='".$custob['email']."'");
								   $str=mysql_fetch_array($str);
								   $str=explode(",",$str['sub_category']) ; foreach($str as $key) { ?>								
									<li><a href="#"><i class="fa fa-cubes" aria-hidden="true"></i> <?php echo $key ;?></a></li>
									
									<?php } ?>
								</ul>
							</div>
						</div>
						</li>
						  <!--<li class="active"><a data-toggle="tab" href="#PROFILE"><i class="fa fa-user-o" aria-hidden="true"></i> Diesel Generator </a></li>-->
						  <li><a data-toggle="tab" href="#favourite"><i class="fa fa-inbox" aria-hidden="true"></i>Inbox</a></li>
						  <!-- Dropdown-->
						 
						  <li><a data-toggle="tab" href="#Subscribed"><i class="fa fa-newspaper-o" aria-hidden="true"></i>  Fresh</a></li>
						  <li><a data-toggle="tab" href="#logout"><i class="fa fa-sign-out" aria-hidden="true"></i>  Live</a></li>
						  <li><a data-toggle="tab" href="#demo"><i class="fa fa-star-o" aria-hidden="true"></i> Favorite </a></li>
						  <li><a data-toggle="tab" href="#demo"><i class="fa fa-bell" aria-hidden="true"></i> Notification </a></li>
						
						</ul>
					</div>				
				</div>	
				
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
					
			<li><a href="details.php">

		      <li><a href="details.php">14/01/2018 &nbsp;&nbsp; 84 New Tenders Date 14-January-2018 - www.TenderDetail.com</a></li>
			  <li><a href="details.php">14/01/2018 &nbsp;&nbsp; 84 New Tenders Date 14-January-2018 - www.TenderDetail.com</a></li>
	          <li><a href="details.php">14/01/2018 &nbsp;&nbsp; 84 New Tenders Date 14-January-2018 - www.TenderDetail.com</a></li>
             <li><a href="details.php">14/01/2018 &nbsp;&nbsp; 84 New Tenders Date 14-January-2018 - www.TenderDetail.com</a></li>
	         <li><a href="details.php">14/01/2018 &nbsp;&nbsp; 84 New Tenders Date 14-January-2018 - www.TenderDetail.com</a></li>
			 <li><a href="details.php">14/01/2018 &nbsp;&nbsp; 84 New Tenders Date 14-January-2018 - www.TenderDetail.com</a></li>					
		</ul>
    </div>	
						
		           
				
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