<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

  <?php include_once('headerlink.php'); ?>
	<title>tendertm/Sub-category </title>
</head>

<body>
   
    <?php include('header.php'); ?>
    
   <?php $tender_id=$_REQUEST['tx'];
         $str=mysql_query("select * from tender where id='".$tender_id."'");
		 $row=mysql_fetch_array($str);
          ?>
   <section class="Tender_Desp_sec">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-12">
				<div class="sec-back">
					<div class="Tender_Desp_sec-1">
						<ul class="breadcrumb">
						
						  <li><a href="index.php">Home</a></li>
						  <li><a href="Tender-listing.php">Tender Notice </a></li>
						  <li><?php echo $row['tender_id']; ?></li>
						
						</ul>
					</div>
				<div class="Tender_Desp_sec-2">
						<p><i>Tender Id</i> :  <span><?php echo $row['tender_id']; ?></span></p>
						
				</div>
				<div class="Tender_Desp_sec-3">
						<p><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>  Location: <span> <?php  $strr=san_select('state','id',$row['state']);
                                                   $rowr=mysql_fetch_array($strr);        
                                                   echo $rowr['statename']; ?> -  
												   <?php  $strr=san_select('country','id',$row['country']);
                                                   $rowr=mysql_fetch_array($strr);        
                                                   echo $rowr['country']; ?>
												   
												   
												   
												   </span></p>
						<p><i class="fa fa-inr fa-lg" aria-hidden="true"></i>  Tender Value:  <span> <?php $price= convertCurrency($row['price']); if(!empty($price)) {  echo "₹ ".$price ; } else { echo " Ref. to document" ; } ?> </span></p>
				</div>
				<div class="Tender_Desp_sec-4">
					<h3><i class="fa fa-info-circle" aria-hidden="true"></i> Tender Information</h3>						
							
							<div class="row">
								<div class="col-sm-3">
									<h4>Name of Work</h4>		
								</div>
								<div class="col-sm-9">
										<h5><?php echo $row['tittle']; ?></h5>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-3">
									<h4>Tender No</h4>
									</div>
								<div class="col-sm-9">
									<h5><?php echo $row['tender_no']; ?></h5>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<h4>Tender Type</h4>		
								</div>
								<div class="col-sm-9">
								<h5><?php echo $row['category'].' / '.$row['sub_category']; ?></h5>	
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<h4>Competition Type</h4>		
								</div>
								<div class="col-sm-9">
									<h5> Indian</h5>		
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<h4>Document Fees</h4>	
								</div>
								<div class="col-sm-9">
								<h5><?php $es_price= convertCurrency($row['es_price']); if(!empty($es_price)) {  echo "₹ ".$es_price ; } else { echo " Ref. to document" ; } ?></h5>		
							  </div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<h4>EMD</h4>	
								</div>
								<div class="col-sm-9">
									<h5> <?php $emd= convertCurrency($row['emd']); if(!empty($emd)) {  echo "₹ ".$emd ; } else { echo " Ref. to document" ; } ?> </h5>		
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<h4>Tender Value</h4>
								</div>
								<div class="col-sm-9">
								   <h5> <?php $price= convertCurrency($row['price']); if(!empty($price)) {  echo "₹ ".$price ; } else { echo " Ref. to document" ; } ?> </h5>	
								</div>
							</div>

				</div>
				<div class="Tender_Desp_sec-4">
					<h3><i class="fa fa-calendar" aria-hidden="true"></i> Important Dates</h3>					
							<div class="row">
								<div class="col-sm-3">
									<h4>Last Date of Bid Submission</h4>									
								</div>
								<div class="col-sm-9">
									<h5><?php echo date('M d, Y', strtotime($row['last_date'])); ?></h5>									
								</div>
						</div>
						
				</div>
				<div class="Tender_Desp_sec-4">
					<h3><i class="fa fa-tasks" aria-hidden="true"></i> Other Information</h3>
						<div class="row">
							<div class="col-sm-3">								
								<h4>Attachments</h4>								
							</div>
							<div class="col-sm-9">
								  					
							 <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Click Here to download attachment</button> <br><br><br>
																	
									
								
							</div>
						</div>
						
				</div>
			
				</div>
				</div>
			</div>	   
		</div>	   
   </section>
   
   
   

<!-- Modal -->
<div id="myModal" class="modal fade owsm-md" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Fill Form</h4>
      </div>
      <div class="modal-body">
			<form action="action.php" method="POST">
						<div class="row form-group">
							<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
							<div class="col-md-12">
								<input type="text" name="name" class="form-control" placeholder="Full Name" required>	
							</div>			
						</div>
						<div class="row form-group">
							
							<div class="col-md-12">
								<input type="email" name="email" class="form-control" placeholder="Email" required>	
							</div>			
						</div>
						<div class="row form-group">							
							<div class="col-md-12">
									<input pattern="^[0-9]{10}$" type="text"  maxlength="10" required name="number" class="form-control" placeholder="Contact No." required>		
							</div>			
						</div>			
						
						<div class="form-group">
							<button type="submit" name="despsubmit" class="btn btn-default">Submit</button>						
						</div>
					</form>
        </div>
     
    </div>

  </div>
</div>
   
   
   
   
   
 <?php include('footer.php'); ?>
   
   
   
   
   
 <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/main.js"></script>
		<script src="js/slick.min.js" type="text/javascript" ></script>
		 <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
		<script src="./js/slick.js" type="text/javascript" charset="utf-8"></script>  
		
		<script>
		$('.images-slider').slick({
		  dots: true,
		  infinite: true,
		  speed: 500,
		  fade: true,
		  autoplay:true,
		  autoplaySpeed:1000,
		  dots:false,
		  arrows:false,
		  cssEase: 'linear'
		});

		</script>
		<script>
		$('.testimonial-sec-main').slick({		 
		  infinite: true,
		  autoplay:true,
		  autoplaySpeed:1500,
		  dots:false,
		  arrows:false,
		  cssEase: 'linear'
		});

		</script>
</body>
<!--===================
			body 
		=====================-->

</html>