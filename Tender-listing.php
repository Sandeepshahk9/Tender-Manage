<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

   
  <?php include_once('headerlink.php'); ?>
	<title>tendertm/Tender-list </title>
	
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
			<div class="row">
			
			<!--
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
				</div>   -->
				
				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="Tender_Listing_sec-2">
						
									<h3><i class="fa fa-star" aria-hidden="true"></i> Online tender </h3>
									<ul>
					  <?php  
								 $sqlb="select * from tender where status='1' AND last_date>='".date('Y-m-d')."' ";
									
									    $pagename="Tender-listing.php?"; 
                                         $tabletb=mysql_query($sqlb);
                                         $numub=mysql_num_rows($tabletb);
										 

if($numub>0)

	{
    
		$pageentry=10;
	
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




	while($row=mysql_fetch_array($sqlub))

	{
$seo = generateSeoURL($row['tittle']); 
?>                                                             
               
     								    
										
										<li>
											<h4><a style="color:#00abff" href="Tender/<?php echo $row['id'].'/'.$seo ;?>">
											<?php echo $row['tittle']; ?> -[ 
											<?php  $strr=san_select('state','id',$row['state']);
                                                   $rowr=mysql_fetch_array($strr);        
                                                   echo $rowr['statename']; ?> ]  </h4>
										<p>Tender ID:  <span><?php echo $row['tender_id']; ?></span></p>
										<!--	<p>Company Name: <span><?php echo $row['c_name']; ?> </span></p>  -->
											
											<button type="button" class="btn btn-link view-more">View more..</button>	</a>
											
											<p>Closing Date: <span><?php echo date('M d, Y', strtotime($row['last_date'])); ?> </span></p>											
											<p>Location:<span><?php  $st=san_select('city',                    'id',$row['city']);
                                                   $ror=mysql_fetch_array($st); ?>
												    <?php echo $ror['city']; ?>  , 
													<?php echo $rowr['statename']; ?> </span></p>										
													<p>Tender Value : <span><?php $price= convertCurrency($row['price']); if(!empty($price)) {  echo "₹ ".$price ; } else { echo " Ref. to document" ; } ?></span></p>
																		
										</li>
										
										
						
	<?php } } ?>
										
										
										
										
										
										
										
										
							</ul>
					</div>	
					
					
					
								<!--------------------------pagination --------------------------->

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

<?php }} ?>               </div>





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