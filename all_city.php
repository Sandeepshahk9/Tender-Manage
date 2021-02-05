<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

   <?php include_once('headerlink.php'); ?>
	<title>tendertm/City</title>
  
  
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
				</div>    -->
				
<?php      $fv=$_GET['fv'];    ?>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="browse-city">
										<h2><i class="fa fa-search" aria-hidden="true"></i> Browse letter By '<?php echo $fv ; ?>'</h2>
										<ul class="pagination">
 <li><a href="all_city.php?fv=A" <?php if($fv=='A') echo 'class="active"' ;?> >A</a></li>
 <li><a href="all_city.php?fv=B" <?php if($fv=='B') echo 'class="active"' ;?> >B</a></li>
 <li><a href="all_city.php?fv=C" <?php if($fv=='C') echo 'class="active"' ;?> >C</a></li>
 <li><a href="all_city.php?fv=D" <?php if($fv=='D') echo 'class="active"' ;?> >D</a></li> 
 <li><a href="all_city.php?fv=E" <?php if($fv=='E') echo 'class="active"' ;?> >E</a></li>
 <li><a href="all_city.php?fv=F" <?php if($fv=='F') echo 'class="active"' ;?> >F</a></li>
 <li><a href="all_city.php?fv=G" <?php if($fv=='G') echo 'class="active"' ;?> >G</a></li>
 <li><a href="all_city.php?fv=H" <?php if($fv=='H') echo 'class="active"' ;?> >H</a></li> 
 <li><a href="all_city.php?fv=I" <?php if($fv=='I') echo 'class="active"' ;?> >I</a></li> 
 <li><a href="all_city.php?fv=J" <?php if($fv=='J') echo 'class="active"' ;?> >J</a></li> 
 <li><a href="all_city.php?fv=K" <?php if($fv=='K') echo 'class="active"' ;?> >K</a></li> 
 <li><a href="all_city.php?fv=L" <?php if($fv=='L') echo 'class="active"' ;?> >L</a></li>
 <li><a href="all_city.php?fv=M" <?php if($fv=='M') echo 'class="active"' ;?> >M</a></li>
 <li><a href="all_city.php?fv=N" <?php if($fv=='N') echo 'class="active"' ;?> >N</a></li> 
 <li><a href="all_city.php?fv=O" <?php if($fv=='O') echo 'class="active"' ;?> >O</a></li> 
 <li><a href="all_city.php?fv=P" <?php if($fv=='P') echo 'class="active"' ;?> >P</a></li> 
 <li><a href="all_city.php?fv=Q" <?php if($fv=='Q') echo 'class="active"' ;?> >Q</a></li> 
 <li><a href="all_city.php?fv=R" <?php if($fv=='R') echo 'class="active"' ;?> >R</a></li> 
 <li><a href="all_city.php?fv=S" <?php if($fv=='S') echo 'class="active"' ;?> >S</a></li> 
 <li><a href="all_city.php?fv=T" <?php if($fv=='T') echo 'class="active"' ;?> >T</a></li> 
 <li><a href="all_city.php?fv=U" <?php if($fv=='U') echo 'class="active"' ;?> >U</a></li> 
 <li><a href="all_city.php?fv=V" <?php if($fv=='V') echo 'class="active"' ;?> >V</a></li> 
 <li><a href="all_city.php?fv=W" <?php if($fv=='W') echo 'class="active"' ;?> >W</a></li> 
 <li><a href="all_city.php?fv=X" <?php if($fv=='X') echo 'class="active"' ;?> >X</a></li> 
 <li><a href="all_city.php?fv=Y" <?php if($fv=='Y') echo 'class="active"' ;?> >Y</a></li> 
 <li><a href="all_city.php?fv=Z" <?php if($fv=='Z') echo 'class="active"' ;?> >Z</a></li>								  
									 
									</ul>
								</div>
								<div class="search-tender-category-location">
								
									
									<h2><i class="fa fa-bars" aria-hidden="true"></i> Tender By City</h2>
									<ul>
									
									
									
									
								
									
<?php  
						         
								 $sqlb="select * from city where status='1' AND countryid='3'
								AND city like '$fv%' ";
								 
								 $pagename="all_city.php?fv=".$fv."&";
									 
                                 $tabletb=mysql_query($sqlb);
                                 $numub=mysql_num_rows($tabletb);
										 

										 
										 
if($numub>0)

	{
    
		$pageentry=15;
	
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

	$sqlgb = $sqlb." ORDER BY city ASC LIMIT ".$pagestart.",".$pageentry;

	$sqlub=mysql_query($sqlgb);




	while($row=mysql_fetch_array($sqlub))

	{

?>                              								
									
				
									
								<li><a href="tender_search.php?city=<?php echo $row['id']; ?>"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Tender in <?php echo $row['city']; ?></a></li>
										
										
	<?php }  } ?>
				
							</ul>
					</div>	
<!--------------------------pagination --------------------------->	
										
						
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