<?php 

include_once('admin/include/config.php');
include_once('admin/include/function.php');




$id=$_REQUEST['tx'];

$str=mysql_query("select * from tender where id='".$_REQUEST['tx']."'");
$ten=mysql_fetch_array($str);
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

   <?php include_once('headerlink.php'); ?>
	<title>tendertm/Tender-Search </title>
</head>
<style>

</style>
<body style="background:#86a1b1">



   <?php include_once('header.php'); ?>
		<section class="header-below-details-sec">
			<div class="container etd">
			<div class="back-row-det-1">
				
					 <div class="detail-sec">
						<div class="row">	
								<div class="main-div">
							<div class="detail-main">
									 <div class="content-container">
										   <div class="header-div">													
													<h2><i class="fa fa-tasks" aria-hidden="true"></i><?php echo $ten['c_name']; ?></h2>
													<div class="text-new-deg">
														<label>    Tender No : </label>  <?php echo $ten['tender_no']; ?> &nbsp;</br>
														<label> Location : </label> <?php $city=mysql_query("select * from city where id='".$ten['city']."' ") ; $cit=mysql_fetch_array($city) ; echo $cit['city']; ?> ,
														<?php $state=mysql_query("select * from state where id='".$ten['state']."' ") ; $stat=mysql_fetch_array($state) ; echo $stat['statename']; ?>
														
														- India</br><label>Tender Value : </label> <?php echo  empty($row['price']) ? "Ref. to Document" :  convertCurrency($row['price']); ?>  
													</div>
											  </div><!------header-div--------->
											   
											   
											   
										   <div class="content-div">
													<div class="share">
														<span class="st_twitter_hcount" displaytext="Tweet"></span>
														<span class="st_plusone_hcount" displaytext="Google +1"></span>
														<span class="st_fblike_hcount" displaytext="Facebook Like"></span>
													</div>
													<h2><i class="fa fa-info-circle" aria-hidden="true"></i> Tender Information</h2>
													
													
													<div class="row info-content">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
																<div class="left-heding">Name of Work</div>
																</div>
																
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
																<div class="right-content"><?php echo $ten['tittle']; ?></div>
													</div>
													</div>
													<div class="row info-content">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
																<div class="left-heding">Name of Work</div>
																</div>
																
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
																<div class="right-content"><?php echo $ten['tittle']; ?></div>
													</div>
													</div>
													<div class="row info-content">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
																<div class="left-heding">Category</div>
																</div>
																
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
																<div class="right-content"><?php echo $ten['category']." / ".$ten['sub_category']; ?></div>
													</div>
													</div>
													<div class="row info-content">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
																<div class="left-heding">Requirement Category</div>
																</div>
																
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
																<div class="right-content"><?php echo $ten['requirement_cat'] ; ?></div>
													</div>
													
													</div>
												<div class="row info-content">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
																<div class="left-heding"> Document Fees</div>
																</div>
																
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
																<div class="right-content"><?php echo  empty($row['es_price']) ? "Ref. to Document" : " ₹ ". convertCurrency($row['es_price']); ?>  </div>
																</div>
													</div>
                                                   
                                           	<div class="row info-content">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
																<div class="left-heding"> EMD</div>
																</div>
																
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
																<div class="right-content"><?php echo  empty($row['emd']) ? "Ref. to Document" : " ₹ ". convertCurrency($row['emd']); ?> </div>
																</div>
													</div>		
                                           	<div class="row info-content">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
																<div class="left-heding"> Tender Value</div>
																</div>
																
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
																<div class="right-content"> INR  <?php echo  empty($row['price']) ? "Ref. to Document" : " ₹ ". $row['price']; ?>  /-</div>
																</div>
											</div>	
										</div><!------content-div--------->
										  
								 <div class="content-div">
													<h2><i class="fa fa-calendar" aria-hidden="true"></i> Important Dates</h2>		  
										    	     <div class="row info-content">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
																<div class="left-heding">Tender Opening Date</div>
																</div>
																
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
																<div class="right-content"><?php echo date('d/m/Y',strtotime($ten['open_date'])); ?></div>
																</div>
													 </div>		
                                                 
                                                     <div class="row info-content">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
																<div class="left-heding">Last Date of Bid Submission</div>
																</div>
																
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
																<div class="right-content"><?php echo date('d/m/Y',strtotime($ten['last_date'])); ?></div>
																</div>
													 </div>												 
										  
								</div>	<!------content-div--------->	  
										  
							  				  
	
							  	<div class="content-div">
													<h2><i class="fa fa-compress" aria-hidden="true"></i> Other Information</h2>		  
									<?php if(!empty($ten['attachment'])) { ?>	    
											<div class="row info-content">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
																<div class="left-heding">Information Source : </div>
																</div>
																
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
																<div class="right-content">
																<a href="<?php echo $ten['attachment_link'] ; ?>"> <button>Click Here to view original site</button> </a>
																</div>
																</div>
													</div>	
													
													
													
										  	
											<div class="row table-content">
																	<div class="table-responsive">          
																	  <table class="table">
																		<thead>
																		  <tr>
																		
																			<th>FileName</th>
																			<th>File Description</th>
																			<th>File Size</th>
																			<th>Download</th>
																			
																		  </tr>
																		</thead>
																		<tbody>
																		  <tr>
																	
																			<td><?php echo $ten['attachment'] ?></td>
																			<td>Tender Notice</td>
																			<td><?php    $path="../file/".$ten['attachment'] ; echo filesizemb($path).' MB'; ?></td>
																			<td><a href="../file/<?php echo $ten['attachment'] ; ?>" download>Download</a></td>
																			
																		  </tr>
																		</tbody>
																	  </table>
																	  </div>                                                             
													</div>		
										  <?php  }  ?>
								</div>	<!------content-div--------->			
										  
					<?php if(!empty($ten['attachment'])) { ?>
						
										    	             <div class="row info-content">
																<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
																<div class="left-heding"></div>
																</div>
																
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
																<div class="right-content"><iframe src="http://docs.google.com/gview?url=<?php echo $base_url ; ?>/file/<?php echo $ten['attachment'] ; ?>&embedded=true" 
                                                                     style="width:100%; height:600px;" frameborder="0"></iframe></div>
																</div>
														
														
															<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
																<div class="left-heding"></div>
																</div>
															 
														</div>	
															
																
													
										  
										  
						 	<!------content-div--------->		<?php } ?>


							
										  
					 </div>
				 </div>
				</div>
				
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