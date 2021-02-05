<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

     <?php include_once('headerlink.php'); ?>
	<title>tendertm/CMS</title>
	
	
</head>

<body>
   
	   <?php include('header.php'); ?>
   
    <section >
			<div class="container">
				<div class="content-about-us">
			
		<?php  $menu=mysql_query("select descp from cms where status=1 and id='".$_REQUEST['id']."'");
		        $men=mysql_fetch_array($menu);
		
		 echo $men['descp'];
		
		?>
		
		
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