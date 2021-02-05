<?php require('include/config.php'); 
include("include/logincheck.php");
if($admina["usertype"]=='admin'){}
else{
  header("Location:index.php?msg=Please Login First.");	}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel : Cultatrad </title>
<?php require('hscript.php'); ?>
</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">
	<div class="structure-row">
        <!-- Sidebar Start -->
        <?php require('sidebar.php'); ?>
        <!-- Sidebar End -->
        <!-- Right Section Start -->
        <div class="right-sec">
            <!-- Right Section Header Start -->
        <?php require('header.php'); ?>    
            <!-- Right Section Header End -->
            <!-- Content Section Start -->
<div class="content-section">
<div class="container-liquid">
<div class="row">
<div class="col-xs-12">
<div class="sec-box">
<header>
<h2 class="heading">Change Password</h2>
</header>
<div class="contents">
<a  href="javascript:history.back();"> <img src="../admin/assets/images/goBack.png" class="img-responsive" alt="#" style="float: right; margin-top:-55px;"> </a>
<div class="table-box">
      <?php 

if($_GET['msg']=='1'){

echo "<div class='alert alert-danger'>Please fill required fields</div>";}

elseif($_GET['msg']=='2'){

echo "<div class='alert alert-danger'>Minimum length of password is 5</div>";}

elseif($_GET['msg']=='3'){

echo "<div class='alert alert-danger'>Old Password is Wrong</div>";}

elseif($_GET['msg']=='4'){

echo "<div class='alert alert-danger'>New password and Retype password not matched</div>";}

elseif($_GET['msg']=='5'){

echo "<div class='alert alert-success'>Password Changed Successfully</div>";}

 ?> 
              <form role="form" class="form-horizontal" method="post" action="action.php">

<table class="table">
<thead>
<tr>
<th colspan="2" class="col-md-12"> <ul class="breadcrumb t-breadcrumb-page">
            <li><a href="dashboard.php">Home</a></li>
            <li class="active">Change Password</li>
			
          </ul></th>

</tr>
</thead>
<tbody>
<tr>
<td class="col-md-4">Old Password</td>
<td class="col-md-8">

                    <input id="" type="password" name="oldpass" placeholder="Old Password" class="form-control" required>

</td>
</tr>


<tr>
<td class="col-md-4">New Password </td>
<td class="col-md-8">

                    <input id="" type="password" name="newpass" placeholder="New Password" class="form-control" required>

</td>
</tr>


<tr>
<td class="col-md-4"> Confirm Password</td>
<td class="col-md-8">

                    <input id="basicPassword" name="conpass" type="password" placeholder="Confirm Password" class="form-control" required>

</td>
</tr>





<tr>
<td class="col-md-4"></td>
<td class="col-md-8">


<br>

 <button type="submit" name="changepassword" class="btn btn-primary">Change Password</button>

</td>




</tr>
















</tbody>
</table>
</form>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
<!-- Row End -->
</div>
</div>
            </div>
            <!-- Content Section End -->
        </div>
        <!-- Right Section End -->
    </div>
</div>
<!-- Wrapper End -->

</body>
</html>
