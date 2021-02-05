<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

   
   
   
    <?php include_once('headerlink.php'); ?>
	
	
        <title>Tender/Home</title>
        
  
</head>

<body>
   
   
  <?php include_once('header.php'); ?>
  
  
					
					
					<div class="container">
						<div class="section-tab-banner-slider">
						<div class="row">
							<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 image-slider-class-sec-1" >
								<div class="images-slider">
									<div>
										<img src="images/banner1.png" class="img-responsive" alt="slider"/>
									</div>
									<div>
										<img src="images/banner2.png" class="img-responsive" alt="slider"/>
									</div>
									<div>
										<img src="images/banner3.png" class="img-responsive" alt="slider"/>
									</div>
									
								
								</div>
							
							</div>
							<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 image-slider-class-sec-2">
								<div class="new-upcooming-event-sec-up">
									<h2><i class="fa fa-refresh fa-spin fa-fw"></i> Latest Tender</h2>								
									<marquee direction="up" scrollamount="2" scrolldelay="2" class="marq-slide-up">
										<ul>
										<?php $str=$str=mysql_query("select * from tender where status='1' AND last_date>='".date('Y-m-d')."' ORDER BY id DESC limit 0,5");
     								     while( $row=mysql_fetch_array($str)){  $seo = generateSeoURL($row['tittle']);                                    ?>
											<li><a href="Tender/<?php echo $row['id'].'/'.$seo ;?>" style="text-decoration:none;">
											
												<h3><?php echo $row['tittle']; ?></h3><h4></h4>
												
						
						           <p>Tender value:<span><?php $price= convertCurrency($row['price']); if(!empty($price)) {  echo "₹ ".$price ; } else { echo " Ref. to document" ; } ?></span> | 
									Closing Date: <span><?php echo date('M d, Y', strtotime($row['last_date'])); ?></span></p>
											</a>
											</li>
											
										<?php }  ?>
											
											
										</ul>
									</marquee>
									
									
								</div>
							
							</div>						
						</div>
						
						<div class="row" style="margin-top:30px;">
						
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="search-tender-category">
									<h2><i class="fa fa-bars" aria-hidden="true"></i> Tenders by Categories</h2>
										
										<ul>
										<?php $arr_cat=mysql_query("select * from category where status='1' ORDER BY name ASC limit 0,12");
												   while($row=mysql_fetch_array($arr_cat)){   ?>
										
										
											<li><a href="sub_category.php?category=<?php echo $row['name'];?>" style="text-decoration:none;"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> 
											<?php echo $row['name'];?>  Tenders</a></li>
											
											   <?php  }  ?>
										<li style="text-align:right"><a href="category.php">more...</a></li>
										</ul>
									
									
								</div>							
							</div>
							<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
								<div class="featured-tender-locations">
									<h3><i class="fa fa-star" aria-hidden="true"></i>  Online tender </h3>
									<ul>
								<?php $str=mysql_query("select * from tender where status='1' AND last_date>='".date('Y-m-d')."' ORDER BY id DESC limit 0,4");
     								 while($row=mysql_fetch_array($str)){
									 $strr=san_select('state','id',$row['state']);
                                     $rowr=mysql_fetch_array($strr); 
									 $st=san_select('city','id',$row['city']);
                                     $ror=mysql_fetch_array($st);
					              
									$seo = generateSeoURL($row['tittle']);
									
									?>
										<li><a href="Tender/<?php echo $row['id'].'/'.$seo ;?>" style="text-decoration:none;">
										<h4><?php echo $row['tittle']; ?></h4></a>
										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
												<p>Due Date: <span> <?php echo date('d F , Y', strtotime($row['last_date'])); ?> </span></p>
								        <p>Tender ID:<span> <?php echo $row['tender_id']; ?></span></p>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
												<p style="text-align:right">Location: <span> <?php  echo $rowr['statename'] ; ?> </span></p>
												<p style="text-align:right">Value:<span> <?php $price= convertCurrency($row['price']); if(!empty($price)) {  echo "₹ ".$price ; } else { echo " Ref. to document" ; } ?></span></p>
											</div>
										</div>
										
							
										</li>
										
											<?php }  ?>
											
										
									</ul>
									<a href="Tender-listing.php"><button type="button" class="btn btn-link viewall">more...</button></a>
								</div>							
							</div>
							
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<div class="search-tender-category-location">
									<h2><i class="fa fa-bars" aria-hidden="true"></i> Tender By States</h2>
									<ul>
									<?php  $state=mysql_query("select * from state where status='1' AND countryid='3' ORDER by id ASC Limit 0,12") ;
                                       	while($st=mysql_fetch_array($state)){		?>
									
								<li><a href="tender_search.php?state=<?php echo $st['id']; ?>" style="text-decoration:none;"><span>
								<i class="fa fa-map-marker" aria-hidden="true"></i></span> Tender in <?php echo $st['statename']; ?></a></li>
										
										
										<?php }  ?>
										<li style="text-align:right"><a href="all_state.php">more...</a></li>
									</ul>
								</div>			
							
							</div>
							
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="testimonial-sec">
								<h1><i class="fa fa-comments" aria-hidden="true"></i> Testimonails</h1>
								<div class="testimonial-sec-main">
									
                             <?php $str=select_table_status_DESC('testmo','1','id');
							 while($row=mysql_fetch_array($str)) {?>
									<div>
											<div class="user-review">
												<h2><?php echo $row['name'];?></h2>
												<p><?php echo $row['descp']; ?></p>
											
											</div>										
										</div>
										<?php } ?>
									
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