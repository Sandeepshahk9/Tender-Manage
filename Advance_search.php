<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

   <?php include_once('headerlink.php'); ?>
	<title>tendertm/Advance_Search</title>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 
 
</head>
	
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script>
         $( function() {
         
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
</script>
    
 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="typeahead.js"></script>
	<style>
	.typeahead { border: 2px solid #FFF;border-radius: 4px;padding: 8px 12px;max-width: auto;min-width: auto;background: rgba(66, 52, 52, 0.5);color: #FFF;}
	.tt-menu { width:300px; }
	ul.typeahead{margin:0px;padding:10px 0px;}
	ul.typeahead.dropdown-menu li a {padding: 10px !important;	border-bottom:#CCC 1px solid;color:#FFF;}
	ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
	.bgcolor {max-width: 550px;min-width: 290px;max-height:340px;background:url("world-contries.jpg") no-repeat center center;padding: 100px 10px 130px;border-radius:4px;text-align:center;margin:10px;}
	.demo-label {font-size:1.5em;color: #686868;font-weight: 500;color:#FFF;}
	.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
		text-decoration: none;
		background-color: #1f3f41;
		outline: 0;
	 }
	 </style>	
 
<body>
   
   <?php include('header.php'); ?>
   
  <section class="advance-search-form-sec">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="advance-top-sec">
					<ul class="breadcrumb">
						  <li><a href="index.php">Home</a></li>						 
						  <li>Advanced search</li>						
					</ul>
					<div class="inner-sec-box-1">
							<h2>Advanced Search</h2>
							<form action="Tender_serch.php" method="post">
									
								<div class="form-group row">								
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<div class="form-group row">
														<div class=" col-lg-3 col-md-3 col-sm-12 col-xs-12">
															<label>With this word::</label>
														</div>
														<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
															<input type="text" name="word" class="form-control" placeholder="Search word">
														</div>
													</div>
												
											</div>								
											
								</div>
								
								
								
							
						
					
					</div>
					<div class="inner-sec-box-2">
							<h2>Filter By</h2>
																
								<div class="form-group row">								
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<div class="form-group row">
														<div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<label>State:</label>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<select name="stateid" class="form-control" id="stateid">
															 <option value="">Select state</option>
															<?php   
															$stt=mysql_query("select * from state Order by statename Asc");
															while($state=mysql_fetch_array($stt)){
															?>
												  
												   <option value="<?php echo $state['id']; ?>"><?php echo $state['statename']; ?></option>
												   <?php  }  ?>
												  </select>

													</div>
													</div>
												
											</div>								
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<div class="form-group row">
														<div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<label>City:</label>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
																<select name="city" class="form-control" id="cityid">
												   <option value="">Select City</option>
												  </select>
															
															
														</div>
													</div>
												
											</div>
									</div>
								<div class="form-group row">								
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<div class="form-group row">
														<div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<label>Tender Value >=:</label>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<input type="number"  min="0" name="t_min" class="form-control" placeholder="">
														</div>
													</div>
												
											</div>								
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<div class="form-group row">
														<div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<label>Tender Value <=:</label>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<input type="number" min="0" name="t_max" class="form-control" placeholder="">
														</div>
													</div>
												
											</div>
									</div>
								<div class="form-group row">								
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<div class="form-group row">
														<div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<label>EMD >=:</label>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<input type="number" min="0" name="e_min" class="form-control" placeholder="">
														</div>
													</div>
												
											</div>								
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<div class="form-group row">
														<div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<label>EMD <=:</label>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<input type="number" min="0" name="e_max" class="form-control" placeholder="">
														</div>
													</div>
												
											</div>
									</div>
								<div class="form-group row">								
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<div class="form-group row">
														<div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<label>Publish date from:</label>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<input type="date" name="pub_date_from" class="form-control" placeholder="">
														</div>
													</div>
												
											</div>								
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<div class="form-group row">
														<div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<label>Publish date to:</label>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<input type="date" name="pub_date_to" class="form-control" placeholder="">
														</div>
													</div>
												
											</div>
									</div>
									
									
									<div class="form-group row">								
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<div class="form-group row">
														<div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<label>Closing date from:</label>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<input type="date" name="close_from" class="form-control" placeholder="">
														</div>
													</div>
												
											</div>								
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<div class="form-group row">
														<div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<label>Closing date to:</label>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<input type="date" name="close_to" class="form-control" placeholder="">
														</div>
													</div>
												
											</div>
									</div>
									
									
									<div class="form-group row">								
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<div class="form-group row">
														<div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<label>Tender Type:</label>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
														
														<select name="type" class="form-control">
														<option value="">Select.</option>
														<option value="Buy">Buy</option>
														<option value="Sell">Sell</option>
														</select>
														
														</div>
													</div>
												
											</div>								
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<div class="form-group row">
														<div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<label>Agency Name:</label>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
															<input type="text" id="company" name="company" class="form-control" placeholder="Enter Agency Name">
														</div>
													</div>
												
											</div>
									</div>
									
									
									
								<div class="form-group row">								
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<button type="submit" name="adsearch" class="btn btn-default ser">Search</button>
														<button type="submit" class="btn btn-default clr">clear</button>
											</div>								
											
									</div>
								
								
								</form>
						
					
					</div>
					
					
				</div>
				</div>
			</div>		
		</div> 
  </section>
   
   
   
   
   <?php include('footer.php');?>
   
<script>
    $(document).ready(function () {
        $('#company').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "admin/getCompany.php",
					data: 'q=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>
 
		
		
</body>
<!--===================
			body 
		=====================-->

</html>