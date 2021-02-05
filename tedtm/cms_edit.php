<?php require('include/config.php'); 
include("include/logincheck.php");
include_once("include/function.php");
if($admina["usertype"]=='sub_admin')
	{
		
///////////////////////////////////////////////////////////////
  if(isset($_REQUEST['upsubmit'])) {
	  
	
	$table='cms';
    $resState = update_data($table,$_POST);
    
    if($resState['flag'] == 'success') {
		
			echo '<script>location.href="cms_edit.php?editid='.$_GET['editid'].'& msg=1";</script>';
    } 
	else {
      echo '<div class="alert alert-danger">
              <strong>Error!</strong> '.$resState['msg'].'
            </div>';
    }
  }
////////////////////////////////////////////////////////////////


		
$sqlb="select * FROM cms where id='".$_GET['editid']."'";
$pagename="cms_edit.php?"; 
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

<h2 class="heading"> cms Edit</h2>

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
	<input type="hidden" name="id" value="<?php echo $_REQUEST['editid'] ;?>">

<table class="table">
<thead>
<tr>
<th colspan="2" class="col-md-12"> <ul class="breadcrumb t-breadcrumb-page">

            <li><a href="dashboard.php">Home</a></li>
			  <li><a href="cms.php">cms list</a></li>
          </ul></th>
		  
</tr>

</thead>

<tbody>
<tr>
                                                   <td class="col-md-4">Page Name</td>
												   <td class="col-md-8">
                                                     <input type="text" placeholder="Question" class="form-control" name="page" readonly value="<?php echo $getus['page']; ?>" required>
                                                     </td>
                                                </tr>
                                            
                                            <tr>   
									         <td class="col-md-4">Description</td>
                                                   <td class="col-md-8">
                                                     <textarea id="editor1" rows="8" col="80" name="descp" required><?php echo $getus['descp']; ?></textarea>
                                                     </td>
                                                </tr>
												
                                                <tr>
												<td class="col-md-4"></td>
												<td class="col-md-8"> <br>
												<button type="submit" class="btn btn-primary" name="upsubmit">update</button> </td>
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

</script> 

</body>

</html>

