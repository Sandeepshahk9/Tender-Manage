<?php require('include/config.php'); 
include("include/logincheck.php");
include_once("include/function.php");
if($admina["usertype"]=='sub_admin')
	{
		
///////////////////////////////////////////////////////////////



  if(isset($_REQUEST['submit'])) {
	  
	
	
	$username=trim($_POST['username']);
	$password=mysql_real_escape_string($_POST['password']);
	
	$str=mysql_query("select * from sub_admin where username='".$username."'");
	$num_row=mysql_num_rows($str);
	if($num_row>0)
	{       echo "<script>alert('Username already Exit !')</script>";
			echo '<script>location.href="sub_admin.php";</script>';          }
    else {
        
		$str=mysql_query("insert into sub_admin(username,password)values('".$username."','".$password."')");
		  echo '<script>location.href="sub_admin.php?msg=6";</script>';
		}
		
   
	
  }
////////////////////////////////////////////////////////////////




}
	else
	{
  header("Location:index.php?msg=Please Login First.");
		
	}
	
	
?>

<!DOCTYPE HTML>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Admin Panel : Tender</title>

<?php require('hscript.php'); ?>




</head>



<body onload="doOnLoad();">

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

<h2 class="heading">sub_admin Details</h2>

</header>

<div class="contents">

<a  href="javascript:history.back();"> <img src="assets/images/goBack.png" class="img-responsive" alt="#" style="float: right; margin-top:-55px;"> </a>

<div class="table-box">

                               <?php 



if($_GET['msg']=='1'){



echo "<div class='alert alert-success'>Added Successfully</div>";}



elseif($_GET['msg']=='2'){



echo "<div class='alert alert-danger'>Error !!! Please Try Again</div>";}



elseif($_GET['msg']=='3'){



echo "<div class='alert alert-danger'>Number is Already Exist. Please Try New</div>";}







 ?> 

    <form role="form" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
	<input type="hidden" name="usertype" value="sub_admin">
	
<table class="table">
<thead>
<tr>
<th colspan="2" class="col-md-12"> <ul class="breadcrumb t-breadcrumb-page">

            <li><a href="dashboard.php">Home</a></li>
			 <li><a href="sub_admin.php">sub_admin List</a></li>
          </ul></th>
		  
</tr>

</thead>

<tbody>                                  


                                                <tr>
                                                   <td class="col-md-4">Username</td>
												   <td class="col-md-8">
                                                     <input type="text" placeholder="username" class="form-control" name="username" required>
                                                     </td>
                                                </tr>
                                            
                                            <tr>   
									         <td class="col-md-4">Password</td>
                                                   <td class="col-md-8">
                                                    <input type="text" placeholder="Password (UpperCase, LowerCase, Number/SpecialChar and min 8 Chars)" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"  
													class="form-control" name="password" required>
                                                </tr>
												
                                                <tr>
												<td class="col-md-4"></td>
												<td class="col-md-8"> <br>
												<button type="submit" class="btn btn-primary" name="submit">Submit</button> </td>
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

<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> 
<script>
        // Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace( 'editor1' );
		
		
 </script> 


</body>

</html>

