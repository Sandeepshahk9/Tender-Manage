<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
 <?php include_once('headerlink.php'); ?>
	<title>tendertm/State</title>
	
	
</head>

	
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script>
         $( function() {
           
            $("#countryid").change(function() {
               var countryid = $(this).val();
               //alert(state_id);
               $.ajax({
                  type:'POST',
                  url:"get_state.php",
                  data:"countryid="+countryid,
                  success:function(result){
                     $("#stateid").html(result);
               }

               });
            });
			
        $("#countryid").change(function() {
		 $("#stateid").change(function() {
               var stateid = $(this).val();
               //alert(state_id);
               $.ajax({
                  type:'POST',
                  url:"get_city.php",
                  data:"stateid="+stateid,
                  success:function(result){
                     $("#cityid").html(result);
               }

               });
            })
         });
	});
</script>

<body>
   
   <?php include('header.php'); ?>
   
   <section class="Tender_Listing_sec">
		<div class="container">
			<div class="row"> <!--
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="Tender_Listing_sec-1">						
									<h2><i class="fa fa-bars" aria-hidden="true"></i> Tenders</h2>
									
									
									<form action="Tender_search.php" method="post">
										<div class="form-group row">
											<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
												<label>Category </label>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
												<select name="category" class="form-control">
                                                      <option value="">Select..</option>
												   <?php $arr_cat=select_table_status('category','1','name');
												   while($row=mysql_fetch_array($arr_cat)){ ?>
												   <option value="<?php echo $row['name'];?>">
												   <?php echo $row['name'];?> </option><?php }?>
												   </select>
											</div>
										</div>
										<div class="form-group row">
											<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
												<label>Country</label>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
											 <select name="country"  class="form-control" id="countryid">
												   <option value="">Select Country</option>
												   <?php $row=select_table_status('country','1','country') ; 
												   while($roww=mysql_fetch_array($row)){?>
												   
												  <option value="<?php echo $roww['id']; ?>"><?php echo $roww['country']; ?></option>
                                                    
												   <?php } ?></select>
											</div>
										</div>
										<div class="form-group row">
										<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
												<label>State</label>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
												<select name="state" class="form-control" id="stateid">
												   <option value="">Select state</option>
												  </select>
											</div>
										</div>
										<div class="form-group row">
											<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
												<label>City</label>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
												<select name="city" class="form-control" id="cityid">
												   <option value="">Select City</option>
												  </select>
											</div>
										</div>
										
									
										
										<div class="form-group row">											
											<div class="col-md-12">
												<button type="submit" class="btn btn-default">Search</button>
											</div>
										</div>
										
									</form>
								
					
					</div>				
				</div>        -->
				

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="search-tender-category-location">
									<h2><i class="fa fa-bars" aria-hidden="true"></i> Tender By States</h2>
									<ul>
									<?php  $state=mysql_query("select * from state where status='1' AND countryid='3' ORDER by statename ASC ") ;
                                       	while($st=mysql_fetch_array($state)){		?>
									
								<li><a href="tender_search.php?state=<?php echo $st['id']; ?>"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Tender in <?php echo $st['statename']; ?></a></li>
										
										
										<?php }  ?>
										<li style=""><a href=""></a></li><br>
									</ul>
								</div>			
							
							</div>

<!--------------------------pagination --------------------------->	
										
					
					
					
					
					
					
				</div>
			</div>
		</div>	   
   </section>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   <?php include('footer.php');?>
   
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