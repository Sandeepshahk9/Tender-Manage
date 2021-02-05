<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 select-tabs-1">					
					<div class="user-dashboard-sec-1">
				<a href="../index.php">	<img src="../admin/photo/<?php echo $head['logo']; ?>" height="80px" width="238px" alt="banner-top" class="img-responsive" style="display: block;margin: auto;">
				</a>		<ul class="nav nav-tabs nav-stacked">
						<li class="panel panel-default" id="dropdown" style="background: none;border: none;    box-shadow: none;">
						<a data-toggle="collapse" href="#dropdown-lvl1"><i class="fa fa-newspaper-o" aria-hidden="true"></i>  My Category <span class="caret"></span>						</a>

						<!-- Dropdown level 1 -->
						<div id="dropdown-lvl1" class="panel-collapse collapse">
							<div class="panel-body ccs-s">
								<ul class="nav navbar-nav">	
                                   <?php 
								   $str=mysql_query("select sub_category from sub_plan where member_email='".$custob['email']."'");
								   $str=mysql_fetch_array($str);
								   $str=explode(",",$str['sub_category']) ; foreach($str as $key) { ?>								
									<li><a href="cat_result.php?cat=<?php echo $key ;?>"><i class="fa fa-cubes" aria-hidden="true"></i> <?php echo $key ;?></a></li>
									
									<?php } ?>
							   	</ul>
							</div>
						</div>
						</li>
						  <!--<li class="active"><a data-toggle="tab" href="#PROFILE"><i class="fa fa-user-o" aria-hidden="true"></i> Diesel Generator </a></li>-->
						  <li><a  href="index.php"><i class="fa fa-inbox" aria-hidden="true"></i>  Inbox</a></li>
						  <!-- Dropdown-->
						 
						  <li><a  href="fresh.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i>  Fresh</a></li>
						  <li><a  href="live.php"><i class="fa fa-sign-out" aria-hidden="true"></i>  Live</a></li>
						  <li><a  href="fav.php"><i class="fa fa-star-o" aria-hidden="true"></i> Favorite </a></li>
						  <li><a  href="noti.php"><i class="fa fa-bell" aria-hidden="true"></i> Notification </a></li>
						
						</ul>
					</div>				
				</div>	