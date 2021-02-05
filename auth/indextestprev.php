<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    
 <?php include_once('hlink.php'); ?>
	<title>tender/favourite</title>
   
</head>

<body style="background:#4c6675">
   <section class="user-dashboard-sec">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 select-tabs-1">					
					<div class="user-dashboard-sec-1">
					<img src="images/logo.png" alt="banner-top" class="img-responsive" style="display: block;margin: auto;">
						<ul class="nav nav-tabs nav-stacked">
						  <li class="active"><a data-toggle="tab" href="#PROFILE"><i class="fa fa-user-o" aria-hidden="true"></i>  My Profile</a></li>
						  <li><a data-toggle="tab" href="#favourite"><i class="fa fa-bookmark" aria-hidden="true"></i>  My Favorites</a></li>
						  <li><a data-toggle="tab" href="#Subscribed"><i class="fa fa-newspaper-o" aria-hidden="true"></i>  Subscribed Plans</a></li>
						  <li><a data-toggle="tab" href="#logout"><i class="fa fa-sign-out" aria-hidden="true"></i>  Logout</a></li>
						  <li><a data-toggle="tab" href="#demo"><i class="fa fa-cog" aria-hidden="true"></i>  Demo</a></li>
						
						</ul>
					</div>				
				</div>	
				<div class="col-lg-9 col-md-9 col-sm-8 col-xs-8 select-tabs-2">
						<div class="header-logout-sec">
								<nav class="navbar navbar-inverse">
								  <div class="container-fluid">
									<div class="navbar-header">
									  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span> 
									  </button>
									  <a class="navbar-brand" href="#" style="color:#fff">Welcome :<strong> USER</strong></a>
									</div>
									<div class="collapse navbar-collapse" id="myNavbar">									 
									  <ul class="nav navbar-nav navbar-right">
										
										<li><a href="#"><img src="images/logout.png" class="img-responsive" alt="logout" style="width:30px;"/></a></li>
									  </ul>
									</div>
								  </div>
								</nav>
						</div>
						<div class="user-dashboard-sec-2">						
							<div class="tab-content">
								<div id="PROFILE" class="tab-pane fade in active">
									<div class="tab-con-edit-form">
											<ul class="nav nav-tabs">
												  <li class="active"><a data-toggle="tab" href="#home">Edit Profile</a></li>
												  <li><a data-toggle="tab" href="#menu1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Change Password</a></li>
											</ul>
									</div>		
									<div class="form-edit-proilfe">
										<div class="tab-content">
											<div id="home" class="tab-pane fade in active">
											<form>
													<div class="form-group row">
														<div class="col-sm-4">
															<input type="text" class="form-control" placeholder="Name">												
														</div>
														<div class="col-sm-4">
															<input type="text" class="form-control" placeholder="Contact Number">												
														</div>
														<div class="col-sm-4">
															<input type="email" class="form-control" placeholder="Email-ID">												
														</div>
															
													</div>
													<h5>Company Details</h5>
													<div class="form-group row">
														<div class="col-sm-4">
															<input type="text" class="form-control" placeholder="Company Name">												
														</div>
														<div class="col-sm-4">
															<input type="text" class="form-control" placeholder="Company Contact Number">												
														</div>
														<div class="col-sm-4">
															<input type="email" class="form-control" placeholder="Official Email-ID">												
														</div>
													</div>
													<div class="form-group row">
														<div class="col-sm-4">
															<select class="form-control">
																<option>-Deals In-</option>
																<option>Select 1</option>
																<option>Select 2</option>
																<option>Select 3</option>
																<option>Select 4</option>
															
															</select>										
														</div>
														<div class="col-sm-4">
															<input type="text" class="form-control" placeholder="Address">												
														</div>
														<div class="col-sm-4">
															<select class="form-control">
																		<option value="">-Select country-</option>
																		<option value="a">India</option>
																		<option value="a">USA</option>
																		<option value="a">CANADA</option>
																		<option value="a">UK</option>
																		
																	</select>											
														</div>
													</div>
													<div class="form-group row">
														<div class="col-sm-4">
															<select class="form-control">
																		<option value="">-Select State-</option>
																		<option value="a"> UP</option>
																		<option value="a">MP</option>
																		<option value="a">Punjab</option>
																		<option value="a">Delhi NCR</option>
																	</select>								
														</div>
														<div class="col-sm-4">
															<select class="form-control">
																		<option value="">-Select City-</option>
																		<option value="a">City 1</option>
																		<option value="a">City 2</option>
																		<option value="a">City 3</option>
																		
																	</select>										
														</div>
														<div class="col-sm-4">
															<select class="form-control">
																		<option value="">-Select location-</option>
																		<option value="a">asdfgh</option>
																		<option value="a">wergthj</option>
																		<option value="a">sdfghjk</option>
																		<option value="a">dgtfhyu</option>
																		
																	</select>											
														</div>
													</div>
													<div class="form-group row">
														<div class="col-sm-4">
															<input type="text" class="form-control" placeholder="Pin Code">												
														</div>
														<div class="col-sm-4">
																									
														</div>
														<div class="col-sm-4">
															
															</div>										
													</div>
													<div class="form-group row">
														<div class="col-sm-12">
															<button type="button" class="btn btn-default">Update</button>											
														</div>
														
													</div>
										</form>
										</div>	
										 <div id="menu1" class="tab-pane fade">										 
										 <div class="form-edit-proilfe">									
											<form>
													<div class="row form-group">
														<div class="col-md-4">
															<label>Old Password</label>
														</div>
														<div class="col-md-8">
															<input type="text" class="form-control" placeholder="old password">	
														</div>			
													</div>
													<div class="row form-group">
														<div class="col-md-4">
														<label>New Password</label>
														</div>
														<div class="col-md-8">
															<input type="text" class="form-control" placeholder="new password">	
														</div>			
													</div>
													<div class="row form-group">
														<div class="col-md-4">
															<label>Confirm Password</label>
														</div>
														<div class="col-md-8">
																<input type="text" class="form-control" placeholder="Confirm password">		
														</div>			
													</div>			
													
													<div class="form-group">
														<button type="button" class="btn btn-default">Change Password</button>						
													</div>
												</form>
											
											</div>
											
											
											
										  </div>
									</div>	
								</div>	
							
						</div>	
						
						
						
						
						
								
							 <div id="favourite" class="tab-pane fade">
								<div class="my-fav-tender-list">
								
									<h3>My Favorite Tenders</h3>
								
								</div>
							 
							 
								
								
								
								
								
							  </div>
							  <div id="Subscribed" class="tab-pane fade">
								<h3>Subscribed</h3>
								<p>Some content in Subscribed 2.</p>
							  </div>
							  <div id="logout" class="tab-pane fade">
								<h3>logout</h3>
								<p>Some content in logout 2.</p>
							  </div>
							  <div id="demo" class="tab-pane fade">
								<h3>demo</h3>
								<p>Some content in demo 2.</p>
							  </div>
							</div>
						</div>
				
				</div>			
			</div>		
		</div>   
   </section>
   
  
   
   
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