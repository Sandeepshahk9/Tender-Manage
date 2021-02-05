<?php 

if(isset($_REQUEST['subscri']))  {

$email=$_POST['email'] ;

$em=mysql_query("select * from subscription where email='".$email."'");
$emn=mysql_num_rows($em);

     if(!empty($emn)) {
            
			 echo "<script>alert(' You’re Already Subscribed! ')</script>";
	 	 
         } 

		 else{
		 
		 $emi=mysql_query("insert into subscription( email ) Values ('".$email."') ") ;
		  echo "<script>alert(' Thanks for Subscribe! ')</script>";
		 }

}



?>




   <section class="footer-sec">
	
	<div class="container" style="border-bottom:1px solid #abb7c463">
		<div class="row" style="    padding-bottom: 40px;">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="footer-sec-1">
					<h3>Contact Us</h3>
					
					<p><?php echo $head['address'] ;?></p>
					<h4>Call Us: <span>(+91) <?php echo $head['number'] ;?></span></h4>
					<h4>E-mail: <span><?php echo $head['email'] ;?></span></h4>
					<ul>
						<li><a href="<?php echo $head['facebook'] ;?>" style="padding: 9px 13px;"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="<?php echo $head['google'] ;?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li><a href="<?php echo $head['twitter'] ;?>" style="padding: 9px 11px;" ><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					    <li><a href="<?php echo $head['insta'] ;?>" style="padding: 9px 11px;" ><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="footer-sec-2">
					<h3>Services</h3>
					<ul>
						<li><a href="#">Indian Tender</a></li>
					<!--	<li><a href="#">Global Tenders</a></li>  -->
						<li><a href="#">Indian Government Tender</a></li>
						<li><a href="#">Online tender</a></li>
						
					
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="footer-sec-3">
					<h3>Browse Tenders</h3>
					<ul>
							<li><a href="all_state.php">State</a></li>
							<li><a href="all_city.php?fv=A">City</a></li>
							<li><a href="authority.php">Authority</a></li>
							
							
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="footer-sec-4">
						<h3>Tenders Forum</h3>
					 <!--	 <ul>
							<li><a href="#">Tenders Blog</a></li>
							<li><a href="#">State Tenders Blog</a></li>	
						 </ul>   -->
						<p>Subscribe us.</p><form action="" method="post">	
						<div class="input-group">
							<input type="email" name="email" placeholder="E-mail" class="form-control" required>
							
								<div class="input-group-btn">
								
									<button type="submit" name="subscri" class="btn btn-default">Subscribe</button>
									</form>
								</div>
						</div>
				</div>
			</div>			
		</div>
	</div>
	
	<div class="copyright-sec-combine">
         <h5>© 2017 Tendertm. All Rights Reserved. Designed by <a href="https://technohills.com/">Technohills</a></h5>
	</div>
	
</section>
   