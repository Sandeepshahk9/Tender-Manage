<?php require('include/config.php'); 
include("include/logincheck.php");
include_once("include/function.php");
if($admina["usertype"]=='sub_admin')
	{
		
///////////////////////////////////////////////////////////////
  if(isset($_REQUEST['upsubmit'])) {
	  
	if(!empty($_FILES['logo']['name'])){
    $name       = time()."_".$_FILES['logo']['name'];
   $imgext     = explode(".", $name);
   $imgext     = end($imgext);
   $tmpname    = $_FILES['logo']['tmp_name'];
   $extension  = array('jpg', 'jpeg', 'png', 'bmp');
    move_uploaded_file($tmpname,"photo/".$name);
    $_POST['logo'] =$name;
  }	  
	
	
	$table='admin_setting';
    $resState = update_data($table,$_POST);
    
    if($resState['flag'] == 'success') {
		
			echo '<script>location.href="asetting.php?msg=1";</script>';
    } 
	else {
      echo '<div class="alert alert-danger">
              <strong>Error!</strong> '.$resState['msg'].'
            </div>';
    }
  }
////////////////////////////////////////////////////////////////


		
$sqlb="select * FROM admin_setting ";
$pagename="asetting.php?"; 
$tabletb=mysql_query($sqlb);
$getus=mysql_fetch_array($tabletb);

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

<h2 class="heading">Admin Setting</h2>

</header>

<div class="contents">

<a  href="javascript:history.back();"> <img src="assets/images/goBack.png" class="img-responsive" alt="#" style="float: right; margin-top:-55px;"> </a>

<div class="table-box">

                               <?php 



if($_GET['msg']=='1'){



echo "<div class='alert alert-success'>Updated Successfully</div>";}



elseif($_GET['msg']=='2'){



echo "<div class='alert alert-danger'>Error !!! Please Try Again</div>";}



elseif($_GET['msg']=='3'){



echo "<div class='alert alert-danger'>Number is Already Exist. Please Try New</div>";}







 ?> 

    <form role="form" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
	<input type="hidden" name="id" value="1">

<table class="table">
<thead>
<tr>
<th colspan="2" class="col-md-12"> <ul class="breadcrumb t-breadcrumb-page">

            <li><a href="dashboard.php">Home</a></li>
			 
          </ul></th>
		  
</tr>
  </thead>

     <tbody>
                                          
                                              <tr>
                                                   <td class="col-md-4">Website Logo</td>
												   <td class="col-md-8">
                                                    <img src="photo/<?php echo $getus['logo']; ?>" height="80px" width="150px">
                                                     <input type="file" class="form-control" 
													 name="logo" accept="image/png" >
                                                     </td>
                                                </tr>

        										  <tr>
                                                   <td class="col-md-4">Email</td>
												   <td class="col-md-8">
                                                     <input type="text" placeholder="" class="form-control" name="email" value="<?php echo $getus['email']; ?>">
                                                     </td>
                                                </tr>
                                            
											 <tr>
                                                   <td class="col-md-4">Phone number</td>
												   <td class="col-md-8">
                                                     <input type="text" placeholder="" class="form-control" name="number" value="<?php echo $getus['number']; ?>">
                                                     </td>
                                                </tr>
												
											
											
											   <tr>
                                                   <td class="col-md-4">Address</td>
												   <td class="col-md-8">
                                                     <input type="text" placeholder="" class="form-control" name="address" value="<?php echo $getus['address']; ?>">
                                                     </td>
                                                </tr>
												
                                              
											    <tr>
                                                   <td class="col-md-4">Google analytic code</td>
												   <td class="col-md-8">
                                                     <input type="text" placeholder="" class="form-control" name="gac" value="<?php echo $getus['gac']; ?>">
                                                     </td>
                                                </tr>
											   
											    <tr>
                                                   <td class="col-md-4">Google web master code</td>
												   <td class="col-md-8">
                                                     <input type="text" placeholder="" class="form-control" name="gbmc" value="<?php echo $getus['gbmc']; ?>">
                                                     </td>
                                                </tr>
												
												 <tr>
                                                   <td class="col-md-4">Social media links</td> 
                                                </tr>
											
											    <tr>
                                                   <td class="col-md-4">Facebook</td>
												   <td class="col-md-8">
                                                     <input type="url" placeholder="" class="form-control" name="facebook" value="<?php echo $getus['facebook']; ?>">
                                                     </td>
                                                </tr>
											
                                                     <tr>
                                                   <td class="col-md-4">Instagram</td>
												   <td class="col-md-8">
                                                     <input type="url" placeholder="" class="form-control" name="insta" value="<?php echo $getus['insta']; ?>">
                                                     </td>
                                                </tr>											
												 <tr>
                                                   <td class="col-md-4">Twitter</td>
												   <td class="col-md-8">
                                                     <input type="url" placeholder="" class="form-control" name="twitter" value="<?php echo $getus['twitter']; ?>">
                                                     </td>
                                                </tr>
											 <tr>
                                                   <td class="col-md-4">Google+</td>
												   <td class="col-md-8">
                                                     <input type="url" placeholder="" class="form-control" name="google" value="<?php echo $getus['google']; ?>">
                                                     </td>
                                                </tr>
                                                <tr>
												<td class="col-md-4"></td>
												<td class="col-md-8"> <br>
												
												<?php if($admina['adm_set_e']=='1') { ?>
												<button type="submit" class="btn btn-primary" name="upsubmit">update</button> </td>
                                              <?php } ?>

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

<script src="ckeditor/ckeditor.js"></script>

<script>
        // Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace( 'editor1' );
		CKEDITOR.replace( 'editor2' );
		
 </script> 

</body>

</html>

