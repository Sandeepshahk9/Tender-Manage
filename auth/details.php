
<?php 

include_once('../admin/include/config.php');
include_once('../admin/include/function.php');

include_once('login_check.php');
include_once('response.php');


$head=select_table('admin_setting','id');
$head=mysql_fetch_array($head);


$date= decryptStringArray($_REQUEST['iz']);

$count=$_REQUEST['no'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

     <?php include_once('hlink.php'); ?>
	<title>tender/details</title>
	
</head>
<style>

</style>
<body style="background:#86a1b1">
   <section class="user-dashboard-sec">
		<div class="container-fluid">
			<div class="row">
			
			
					<?php  include_once('menu_sidebar_index.php') ;?>
				
				<?php include_once('header.php'); ?>
				
		<section class="header-below-details-sec">
			<div class=" etd">
			<div class="back-row-det-1">
				
					
				<div class="row et-top-d">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="name-details-tab-sec-1">
							<h2>Dear  <?php echo $custob['name'];  ?></h2>
							<p><?php echo $custob['c_name'];  ?></p>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="name-details-tab-sec-2">
								<h2>New Tenders </h2>
							<p><?php echo date('d F Y',strtotime($date)) ; ?></p>
							<p><?php echo $count ; ?> New Tenders Related to Your Business</p>
						</div>
					</div>
					
				</div>
				
				<div class="row et-top-d">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="tend-deta-sec-desp-2">
								<table class="table sub-tab">
									<thead>
									  <tr>										
										<th class="text-center"></th>
									</tr>
									</thead>
									<tbody>
									
									
									
<?php
									


$pagename="details.php?iz=".$_GET['iz']."&no=".$_GET['no']."&"; 

$numub=$_GET['no'];
									
									
									
	 $cat=explode(",",$plan['sub_category']) ; foreach($cat as $key) { 
					 
					         
					     $stat=explode(",",$plan['state']) ; foreach($stat as $san) { 
						        
								 ///////////////////li code///////////////////////////////////////////// 
								
			    $sqlb="select * from tender where added_date='".$date."' AND sub_category='".$key."' AND state='".$san."' ";
								  		
			
									
									
									
	
if($numub>0)

	{
    
	

		$pageentry=50;
	
		$totalpage=ceil($numub/$pageentry);

		if(isset($_GET['pageno']))

		{

			$pageno=$_GET['pageno'];

			$pagestart=($pageno-1)*($pageentry);

			$pageend=$pagestart+$pageentry;

			$cont=$pagestart;

	

	    }

		else

		{

			$pagestart=0;	

			$pageno=1;

			$pageend=$pagestart+$pageentry;	

			$cont=0;



		}

	$sqlgb = $sqlb." ORDER BY id DESC LIMIT ".$pagestart.",".$pageentry;

	$sqlub=mysql_query($sqlgb);




	while($custob=mysql_fetch_array($sqlub))

	{
	
					
									?>									
									
									
									  
									  
									  
									  <tr>
											<td>
											<table class="table sub-sub-table-sub">												
												<tbody>
												  <tr>	
                                                     <td>
													    <table class="table sub-sub-table-sub">												
												        <tbody>
												           <tr>													
													        <td class="tedh" style="padding:0px; font-size:20px !important; font-weight:bold;color: #000;"><?php echo $custob['c_name'] ; ?></td>
													        <td class="tedh" style="padding:0px; font-size:20px !important;text-align:right; font-weight:bold;color: #000;">
															<?php $city=mysql_query("select * from city where id='".$custob['city']."'"); $cit=mysql_fetch_array($city); echo $cit['city']." - ";

                                                $state=mysql_query("select * from state where id='".$custob['state']."'"); $sta=mysql_fetch_array($state); echo $sta['statename'];?>
															
															
															</td>  
												          </tr>
												        </tbody>
										              </table>
                                                      </td>													 
													
												  </tr>
                                                  <tr>
										              <td style="padding: 0px 8px;letter-spacing: 1px;">TDR :  <?php echo $custob['tender_id'] ; ?></td>										
										             									
									              </tr>
                                                  <tr>
										            <td style="padding: 0px 8px;"><?php echo $custob['tittle'] ; ?></td>
                                                
                                                 <tr>
										            <td>									  
										              <table class="table sub-sub-table-sub">												
												       <tbody>
												           <tr>			<?php  $encrypted = encryptStringArray($custob['id']); 		?>								
													          <td style="padding:0px;letter-spacing: 1px;">Tender Value:  <strong> <?php echo convertCurrency($custob['price']); ?></strong> </td>
													          <td style="letter-spacing: 1px;">Due Date:<strong> <?php echo date('d-F Y',strtotime($custob['last_date'])) ; ?></strong></td>													
													           <td style="text-align:right;"><a href="tender_details.php?tz=<?php echo $encrypted ; ?>" style="color:#000;">View Tender</a></td>
												          </tr>
												        </tbody>
										              </table>									
									                </td>
									             </tr>
									  
												</tbody>
										</table>																				
									  
									  </td>
									  </tr>
									  
									  
							 
									  
									  
						 <?php }  }  }
  }
  
?>  				  
									  
									  
							  
									  
									</tbody>
								  </table>
								  
								 

    <tr class="gradeA">
                                                    <td colspan="8">
                                        <div class="pagination">

<?php if($totalpage!=0) { ?>



<?php if($pageno>1) { ?>

<li><a href="<?php echo $pagename; ?>pageno=1">First</a></li>

<li><a class="page-nav" href="<?php echo $pagename; ?>pageno=<?php echo $pageno-1; ?>"><i class="icon iPrev">&larr;</i></a></li>

<?php if($pageno>2) { ?>

<li><a class="page-num" href="<?php echo $pagename; ?>pageno=<?php echo $pageno-2; ?>"><?php echo $pageno-2; ?></a></li>

<?php } ?>

<li><a class="page-num" href="<?php echo $pagename; ?>pageno=<?php echo $pageno-1; ?>"><?php echo $pageno-1; ?></a></li>

<?php } ?>

<li><a class="page-num active" href="<?php echo $pagename; ?>pageno=<?php echo $pageno; ?>"><?php echo $pageno; ?></a></li>

<?php if($pageno<$totalpage) { ?>

<li><a class="page-num" href="<?php echo $pagename; ?>pageno=<?php echo $pageno+1; ?>"><?php echo $pageno+1; ?></a></li>

<?php if($pageno<$totalpage-1) { ?>

<li><a class="page-num" href="<?php echo $pagename; ?>pageno=<?php echo $pageno+2; ?>"><?php echo $pageno+2; ?></a></li>

<?php } ?>

<li><a class="page-nav" href="<?php echo $pagename; ?>pageno=<?php echo $pageno+1; ?>"><i class="icon iNext" >&rarr;</i></a></li>

<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $pagename; ?>pageno=<?php echo $totalpage; ?>">Last</a></li>

<?php }} ?>                            </div>
                                        
                                        
                                        
                                        
                                        </td>
                                                   
                                                </tr>
								  
								  
								  
							</div>
					</div>
				</div>
				
				
			</div>					
			</div>
		</section>
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