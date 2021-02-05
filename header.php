<?php   

include_once('include/config.php');
include_once('include/function.php');


$head=select_table('admin_setting','id');
$head=mysql_fetch_array($head);

?>
	   <Section class="top-header-sec">
		<nav class="navbar">
				  <div class="container mob-t">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
					  </button>
						 <a class="navbar-brand" href="/Home">tendertm.com</a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">					  
					  <ul class="nav navbar-nav navbar-right">
											
						
						<li class="dropdown Tender-drp">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Tender
						</a>
							<ul class="dropdown-menu prc">
							<?php $arr_cat=mysql_query("select * from category where status='1' ORDER BY name ASC");
												   while($row=mysql_fetch_array($arr_cat)){ ?>
							
							  <li class="dropdown subdrp">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo $row['name'];?></a>
									<ul class="dropdown-menu subdrp-opn">
									    <?php $sub_cat=mysql_query("select * from sub_category where status='1' AND category='".$row['name']."' ORDER BY name ASC"); 
									          while($sub_catt=mysql_fetch_array($sub_cat)){ ?>
									  <li><a href="Tender_search.php?sub_cat=<?php echo $sub_catt['name'];?>"><?php echo $sub_catt['name'];?></a></li>
									  <?php  }  ?>
									</ul>
								  </li>	    	<?php  }  ?>
							</ul>
						  </li>		
						
						
						
						
           <?php         $menu=select_table('cms','id');
                      while($men=mysql_fetch_array($menu)){           ?>
						<li><a href="cms.php?id=<?php echo $men['id'] ;?>"> <?php echo $men['page'] ;?></a></li>						
								
					  <?php }  ?>
						
						<li><a href="contactus.php">Contact Us</a></li>
						
						
						<?php if(!empty($_SESSION['user_id'])){ ?>
						<li><a href="auth/"><i class="fa fa-user-circle" style="font-size: 20px;"></i></a></li>
						<li><a href="auth/action.php?logout=1"><i class="fa fa-sign-out" style="color:red;    font-size: 20px;"></i></a></li>
					<?php	} else { ?>
				
						<li><a href="login.php">Login/Register</a></li>
						<?php  }  ?>
						
					  </ul>
					</div>
				  </div>
				</nav>
   </Section>
  

   <section class="new-sec-heder-top">
					 
					<div class="container mob-t">
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<a href="/Home">
									<img src="admin/photo/<?php echo $head['logo']; ?>" height="80px" width="238px" alt="logo" class="img-responsive" style="display: block;margin: auto;"/></a>
									
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
									<div class="home-sec-search">
										<form action="Tender_search.php" method="post">
											<div class="form-group row">
												<div class="col-sm-4">
												<input type="text" name="qw" class="form-control"  placeholder="Search product"/>
                                                   											
												</div>
												<div class="col-sm-4">
														<select class="form-control">
															<option value="">Indian Tender</option>
															
														</select>
												</div>
												<div class="col-sm-4">
												<button type="submit" name="header_search" class="btn btn-default" >Search</button>											
												<a href="Advance_search.php"<button type="button"   class="btn btn-link advnce-search" >Advance Search</button></a>
												</div>
											</div>
										
										</form>
									</div>
								</div>
							</div>
					</div>    
   
   
   
   