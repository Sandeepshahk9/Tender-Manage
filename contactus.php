<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <?php include_once('headerlink.php'); ?>
	<title>tendertm/Contactus</title>
	
</head>

<body>
   
	   <?php include('header.php'); ?>
   
   <section class="contactus-sec">
		<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="contact-us-sub-sec">
							<h1>Contact Us</h1>
							
						<form action="action.php" method="POST">
							<div class="row form-group">
								<div class="col-md-6">
									<label>Name:</label>
									<input type="text" required pattern="^[A-Za-z]+$" name="name" class="form-control" placeholder="Name">
								</div>
								<div class="col-md-6">
									<label>Email:</label>
									<input type="email" required name="email" class="form-control" placeholder="Email">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12">
									<label>Mobile No:</label>
									<input pattern="^[0-9]{10}$" type="text"  maxlength="10"required name="number" class="form-control"   >
								</div>								
							</div>
							<div class="row form-group">
								<div class="col-md-12">
									<label>Message:</label>
									<input type="text" required name="msg" class="form-control" placeholder="Messasge " style="padding-top: 29px;    padding-bottom: 100px;">
								</div>								
							</div>
							
							<div class="row form-group">
								<div class="col-sm-12">
									<button type="submit" name="contactus" class="btn btn-default btn-lg">Send</button>
								</div>
							</div>
						</form>
						
						</div>
						</div>
				
					</div>   
	   </div>
   </section>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
  <?php include('footer.php'); ?>
   
   
   
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
</body>
<!--===================
			body 
		=====================-->

</html>