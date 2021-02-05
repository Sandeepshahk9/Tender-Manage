<?php 

include_once('../admin/include/config.php');
include_once('../admin/include/function.php');

include_once('login_check.php');
include_once('response.php');


$head=select_table('admin_setting','id');
$head=mysql_fetch_array($head);


if(isset($_POST['changepassword']))  {  


$opassword=mysql_real_escape_string($_REQUEST['opassword']);

$password=mysql_real_escape_string($_REQUEST['password']);

$cpassword=mysql_real_escape_string($_REQUEST['cpassword']);

if($password!=$cpassword){

 echo "<script>alert('Please enter same password.')</script>";
}


$str=mysql_query("select id from member where password='".$opassword."' AND id='".$_SESSION['user_id']."'");

$num=mysql_num_rows($str);

   if(!empty($num)) {
        
	    $tre=mysql_query("update member set  password='".$password."' where id='".$_SESSION['user_id']."' ");
		 echo "<script>alert('Password change successfully !')</script>";
     }

	 
	 else{
	      echo "<script>alert('Please enter valid current password.')</script>";
	 
	 }
	 
}




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

   
    <?php include_once('hlink.php'); ?>
	<title>tender/changepassword</title>
  
</head>
<style>

</style>
<body style="background:#86a1b1">
   <section class="user-dashboard-sec">
		<div class="container-fluid">
			<div class="row">
			
			
					<?php  include_once('menu_sidebar_index.php') ;?>
				
				<?php include_once('header.php'); ?>
				
					
			<div class="chg-pass-sec">
			<div class="row">
				<div class="col-lg-7 col-lg-offset-2 col-md-7 col-md-offset-2 col-sm-12 col-xs-12">
					<div class="form-login-us-sec">
						<h2>Change Password</h2>
						
						<form method="post" action="" >
							<div class="form-group row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<input type="password" name="opassword" class="form-control" placeholder="Old password" required="">
								</div>							
							</div>
							<div class="form-group row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<input type="password" id="password"  name="password" class="form-control" placeholder="New Password" required="">
								</div>							
							</div>
							<div class="form-group row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<input type="password" id="confirm_password" name="cpassword" class="form-control" placeholder="Confirm new Password" required="">
								</div>							
							</div>
							
														
							
							<div class="form-group row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<button type="submit" name="changepassword" class="btn btn-default logi-btn">Change Password  <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
								</div>							
							</div>
						</form>
					</div>
				</div>
			</div>
			
			</div>
						
		           
	
		
				</div>			
			</div>		
		</div>   
     </section>
   
	 <?php include_once('footer.php'); ?>
  
  
  
 			
<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>	 
  

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