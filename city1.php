<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<style>
	   li
	   {
		   float:left;
		   display : block;
	   }
	   
	</style>

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
			<div class="row">
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
				</div>
				

                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
								<div class="search-tender-category-location">
									<h2><i class="fa fa-bars" aria-hidden="true"></i> Tender By City</h2>
									<div class="grid_11">
            <div class="td-header">
                <h2>Browse by City "<span  style= "color:orange">A</span>"
                </h2>
            </div>
            <br />
            <div class="alphabets">
                <ul>

                        <li>
                                <a href='/all_city/' rel="A" class="selected">A</a>
                        </li>
                        <li >
                                <a href='/City-tenders/B/1' rel="B" class="">B</a>
                        </li>
                        <li>
                                <a href='/City-tenders/C/1' rel="C" class="">C</a>
                        </li>
                        <li>
                                <a href='/City-tenders/D/1' rel="D" class="">D</a>
                        </li>
                        <li>
                                <a href='/City-tenders/E/1' rel="E" class="">E</a>
                        </li>
                        <li>
                                <a href='/City-tenders/F/1' rel="F" class="">F</a>
                        </li>
                        <li>
                                <a href='/City-tenders/G/1' rel="G" class="">G</a>
                        </li>
                        <li>
                                <a href='/City-tenders/H/1' rel="H" class="">H</a>
                        </li>
                        <li>
                                <a href='/City-tenders/I/1' rel="I" class="">I</a>
                        </li>
                        <li>
                                <a href='/City-tenders/J/1' rel="J" class="">J</a>
                        </li>
                        <li>
                                <a href='/City-tenders/K/1' rel="K" class="">K</a>
                        </li>
                        <li>
                                <a href='/City-tenders/L/1' rel="L" class="">L</a>
                        </li>
                        <li>
                                <a href='/City-tenders/M/1' rel="M" class="">M</a>
                        </li>
                        <li>
                                <a href='/City-tenders/N/1' rel="N" class="">N</a>
                        </li>
                        <li>
                                <a href='/City-tenders/O/1' rel="O" class="">O</a>
                        </li>
                        <li>
                                <a href='/City-tenders/P/1' rel="P" class="">P</a>
                        </li>
                        <li>
                                <a href='/City-tenders/Q/1' rel="Q" class="">Q</a>
                        </li>
                        <li>
                                <a href='/City-tenders/R/1' rel="R" class="">R</a>
                        </li>
                        <li>
                                <a href='/City-tenders/S/1' rel="S" class="">S</a>
                        </li>
                        <li>
                                <a href='/City-tenders/T/1' rel="T" class="">T</a>
                        </li>
                        <li>
                                <a href='/City-tenders/U/1' rel="U" class="">U</a>
                        </li>
                        <li>
                                <a href='/City-tenders/W/1' rel="W" class="">W</a>
                        </li>
                        <li>
                                <a href='/City-tenders/X/1' rel="X" class="">X</a>
                        </li>
                        <li>
                                <a href='/City-tenders/Y/1' rel="Y" class="">Y</a>
                        </li>
                        <li>
                                <a href='/City-tenders/Z/1' rel="Z" class="">Z</a>
                        </li>
                </ul>
                <div class="clear">
                </div>
            </div>

									<ul>
									<?php 
									 $alpha= $_REQUEST['ab'];
									$state=mysql_query("select * from city where status='1' AND countryid='3'  and city like '".$alpha."%'ORDER by city ASC ") ;
									 //$state=mysql_query("select * from city where status='1' AND countryid='3' ORDER by city ASC ") ;
                                       	while($st=mysql_fetch_array($state)){		?>
									
								<li><a href="tender_search.php?city=<?php echo $st['id']; ?>"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Tender in <?php echo $st['city']; ?></a></li>
										
										
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
   
   

    <!-------------- slick slider ------------------>
    <script src="js/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="./js/slick.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
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