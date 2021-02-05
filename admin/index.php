<?php 

require('include/config.php'); 

include_once("include/function.php");
$head=mysql_query("select * from admin_setting where id='1' AND status='1'");
$headr=mysql_fetch_array($head);
?>
<!doctype html>

<html>

<head>

<meta charset="utf-8">

<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />

<link rel="icon" 

      type="image/png" >

     
<title>Admin</title>
<style>





/*body{ background:url(assets/images/earthfriendly.jpg) no-repeat center fixed; background-size:cover;}*/





.loginbox{ position:relative;}

 

 

 .login_inner{padding:30px 30px 40px 30px; background:rgba(255,255,255,0.8); margin-top:20px;}

 

 .login_main{ position:absolute; top:0; left:0; width:100%; height:100%;}

 

 .login_main a{ display:inline-block; text-align:center; margin-top:100px;}



</style>



</head>



<body>

<section class="loginbox">

<section class="login_main">

<div class="container">

<div class="row">

<div class="col-md-5" style="margin-left:auto; margin-right:auto; float:none;">

<div class="text-center">

<a href="#"><img src="photo/<?php echo $headr['logo']; ?>" class="img-responsive"></a>

</div>

<br>

<div class="login_inner">

<div class="logintitle text-center">

<h2>LOGIN</h2>

</div>

<br>



                    <form class="form-horizontal" method="post" action="action.php" >

  <div class="form-group">

    <label for="inputEmail3" style="margin-top:0;" class="col-sm-2 control-label">Email</label>

    <div style="margin-top:0;" class="col-sm-10">

    <input type="text" name="username" id="" class="form-control"  placeholder="Username" required>
    </div>
  </div>
  <br>

  <div class="form-group">

    <label for="inputPassword3" style="margin-top:0;" class="col-sm-2 control-label">Password</label>

    <div class="col-sm-10"  style="margin-top:0;">

      <input type="password" name="password" id=" " class="form-control"   placeholder="Password" required>

    </div>

  </div>

  

  

  <div class="form-group">

    <label for="inputPassword3" style="margin-top:0;" class="col-sm-2 control-label">&nbsp;</label>

    <div class="col-sm-10"><br>



      <input type="submit" style="margin-top:0;" name="admin" class="btn btn-warning btn-block btn-lg" value="LOGIN">

    </div>

  </div>

  </form>

</div>

</div>

</div>

</div>

</section>

</section>

</body>

</html>

