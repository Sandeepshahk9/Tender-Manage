<?php require('include/config.php'); 
include("include/logincheck.php");
include_once("include/function.php");
if($admina["usertype"]=='admin')
	{
		
///////////////////////////////////////////////////////////////
  if(isset($_REQUEST['upsubmit'])) {
	  
	if(!empty($_FILES['image']['name'])){
    $name       = time()."_".$_FILES['image']['name'];
   $imgext     = explode(".", $name);
   $imgext     = end($imgext);
   $tmpname    = $_FILES['image']['tmp_name'];
   $extension  = array('jpg', 'jpeg', 'png', 'bmp');
    move_uploaded_file($tmpname,"photo/".$name);
    $_POST['image'] =$name;
  }	  
	$table='banner';
    $resState = update_data($table,$_POST);
    
    if($resState['flag'] == 'success') {
		
			echo '<script>location.href="banner_edit.php?editid='.$_GET['editid'].'& msg=1";</script>';
    } 
	else {
      echo '<div class="alert alert-danger">
              <strong>Error!</strong> '.$resState['msg'].'
            </div>';
    }
  }
////////////////////////////////////////////////////////////////


		
$sqlb="select * FROM banner where id='".$_GET['editid']."'";
$pagename="banner_edit.php?"; 
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

<h2 class="heading">  banner Edit</h2>

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
			  <li><a href="banner.php">banner list</a></li>
          </ul></th>
		  
</tr>

</thead>

<tbody>

                                                <tr>
                                                   <td class="col-md-4">Tittle</td>
												   <td class="col-md-8">
                                                     <input type="text" placeholder="tittle" class="form-control" name="tittle" required value="<?php echo $getus['tittle']; ?>">
                                                     </td>
                                                </tr>

                                                <tr>
                                                   <td class="col-md-4">Position</td>
												   <td class="col-md-8">
                                                     <select name="position"  id="dbType"  class="form-control" required>
												   <option value="">Select..</option>
												   <?php $sa= array("Home page","Inner page");
												   foreach($sa as $value){ ?>
												   
												   <option value="<?php echo $value ;?>" <?php if($value==$getus['position']){ ?>selected <?php } ?>><?php echo $value ;?></option>
												    <?php } ?>
                                                    </select>
													
                                                     </td>
                                                </tr>
												 <tr id="otherType" style="display:none;">
                                                   <td class="col-md-4">Text</td>
												   <td class="col-md-8">
                                                     <input type="text" placeholder="text" class="form-control" name="text" value="<?php echo $getus['text']; ?>">
                                                     </td>
                                                </tr>
                                           	    <tr>
                                                   <td class="col-md-4">Banner image</td>
												   <td class="col-md-8">
                                                    <img src="photo/<?php echo $getus['image']; ?>" height="80px" width="150px">
                                                     <input type="file" class="form-control" 
													 name="image">
                                                     </td>
                                                </tr>
												 <tr>
                                                   <td class="col-md-4">URL</td>
												   <td class="col-md-8">
                                                     <input type="text"  class="form-control" name="url" value="<?php echo $getus['url']; ?>">
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

<script type="text/javascript"
    src="jquery-ui-1.10.0/tests/jquery-1.9.0.js"></script>
<script src="jquery-ui-1.10.0/ui/jquery-ui.js"></script>
      <script>    
                                
								$('#dbType').on('change',function(){
                                    if( $(this).val()==="Home page"){
                                      $("#otherType").show();
                                        
										  }
                                         else{
                                   $("#otherType").hide();
                                
                                               }
                                                 });
       </script>


</body>

</html>
