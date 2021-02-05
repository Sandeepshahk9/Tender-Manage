<?php require('include/config.php'); 
include("include/logincheck.php");
include_once("include/function.php");
if($admina["usertype"]=='sub_admin')
	{
		
///////////////////////////////////////////////////////////////

  if(isset($_REQUEST['submit'])) {
	  
   $name       = time()."_".$_FILES['c_image']['name'];
   $imgext     = explode(".", $name);
   $imgext     = end($imgext);
   $tmpname    = $_FILES['c_image']['tmp_name'];
   $extension  = array('jpg', 'jpeg', 'png', 'bmp');
    move_uploaded_file($tmpname,"photo/".$name);

 	
	$table='member';
	if (isset($name)) {
        $_POST['c_image'] = $name;
     }
    $resState = insert_data($table,$_POST);
    
    if($resState['flag'] == 'success') {
		
			echo '<script>location.href="members.php?msg=6";</script>';
    } 
	else {
      echo '<div class="alert alert-danger">
              <strong>Error!</strong> '.$resState['msg'].'
            </div>';
    }
  }
///////////////////////////////////////////////////////////////////////////////////

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



<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script>
         $( function() {
           
            $("#countryid").change(function() {
               var countryid = $(this).val();
               //alert(state_id);
               $.ajax({
                  type:'POST',
                  url:"get_state.php",
                  data:"countryid="+countryid,
                  success:function(result){
                     $("#stateid").html(result);
               }

               });
            });
			
        $("#countryid").change(function() {
		 $("#stateid").change(function() {
               var stateid = $(this).val();
               //alert(state_id);
               $.ajax({
                  type:'POST',
                  url:"get_city.php",
                  data:"stateid="+stateid,
                  success:function(result){
                     $("#cityid").html(result);
               }

               });
            })
         });
	});
</script>

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

<h2 class="heading"> Member Add</h2>

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
	
	<input type="hidden" name="created" value="<?php echo $todate ; ?>">
	
<table class="table">
<thead>
<tr>
<th colspan="2" class="col-md-12"> <ul class="breadcrumb t-breadcrumb-page">

            <li><a href="dashboard.php">Home</a></li>
			 <li><a href="members.php">Members List</a></li>
          </ul></th>
		  
</tr>

</thead>

<tbody>

                                                <tr>
                                                   <td class="col-md-4">Name</td>
												   <td class="col-md-8">
                                                     <input type="text" placeholder="Name" class="form-control" name="name" required>
                                                     </td>
                                                </tr>

                                                <tr>
                                                   <td class="col-md-4">Number</td>
												   <td class="col-md-8">
                                                     <input type="number"  class="form-control" name="number">
                                                     </td>
                                                </tr>
                                              <tr>
                                                   <td class="col-md-4">email</td>
												   <td class="col-md-8">
                                                     <input type="email"  class="form-control" name="email">
                                                     </td>
                                                </tr>
                                                <tr>
                                                   <td class="col-md-4">Preferred Category</td>
												   <td class="col-md-8">
                                                     <input type="text"  class="form-control" name="preferred_cat">
                                                     </td>
                                                </tr>
                                              <tr>
                                                   <td class="col-md-4">Deals In</td>
												   <td class="col-md-8">
                                                     <input type="text"  class="form-control" name="deals_in">
                                                     </td>
                                                </tr>                                              
                                             <tr>
                                                   <td class="col-md-4">Company Name</td>
												   <td class="col-md-8">
                                                     <input type="text" class="form-control" name="	c_name">
                                                     </td>
                                                </tr>
                                             <tr>
                                                   <td class="col-md-4">Company Logo</td>
												   <td class="col-md-8">
                                                     <input type="file"  class="form-control"
													 name="c_image"  accept="image/*">
                                                     </td>
                                                </tr>
                                             <tr>
                                                   <td class="col-md-4">Company Number</td>
												   <td class="col-md-8">
                                                     <input type="number"  class="form-control" name="	c_number">
                                                     </td>
                                                </tr>												
                                             <tr>
                                                   <td class="col-md-4">Company Email</td>
												   <td class="col-md-8">
                                                     <input type="text"  class="form-control" name="c_email">
                                                     </td>
                                                </tr>												
                                             <tr>
                                                   <td class="col-md-4">Company Deals In</td>
												   <td class="col-md-8">
                                                     <input type="text"  class="form-control" name="c_deals_in">
                                                     </td>
                                                </tr>
                                            
                                             <tr>
                                                   <td class="col-md-4">Company Address</td>
												   <td class="col-md-8">
                                                     <input type="text"  class="form-control" name="c_address">
                                                     </td>
                                                </tr>
                                             <tr>
                                                   <td class="col-md-4">Company Country</td>
												   <td class="col-md-8">
                                                      <select name="c_country"  class="form-control" id="countryid" required>
												   <option value="">Select..</option>
												   <?php $row=select_table_status('country','1','country') ; 
												   while($roww=mysql_fetch_array($row)){?>
												   
												  <option value="<?php echo $roww['id']; ?>"><?php echo $roww['country']; ?></option>
                                                    
												   <?php } ?></select>
													 
													 
                                                     </td>
                                                </tr>
                                             <tr>
                                                   <td class="col-md-4">Company State</td>
												   <td class="col-md-8">
                                                     <select name="c_state" class="form-control" id="stateid" required>
												   <option value="">Select..</option>
												  </select>
													
													
                                                     </td>
                                                </tr>
                                             <tr>
                                                   <td class="col-md-4">Company City</td>
												   <td class="col-md-8">
                                                      <select name="c_city" class="form-control" id="cityid" required>
												   <option value="">Select..</option>
												  </select>
													 
													 
                                                     </td>
                                                </tr>
                                            
                                             <tr>
                                                   <td class="col-md-4">Company Pincide</td>
												   <td class="col-md-8">
                                                     <input type="text"  class="form-control" name="c_pincode">
                                                     </td>
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


</body>

</html>

