<?php require('include/config.php'); 
include("include/logincheck.php");
include_once("include/function.php");
if($admina["usertype"]=='sub_admin')
	{
		
///////////////////////////////////////////////////////////////



  
  if(isset($_REQUEST['submit'])) {
	  
	$table='city';
	$resState = insert_data($table,$_POST);
    if($resState['flag'] == 'success') {
		
			echo '<script>location.href="city.php?msg=6";</script>';
    } 
	else {
      echo '<div class="alert alert-danger">
              <strong>Error!</strong> '.$resState['msg'].'
            </div>';
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
            })
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

<h2 class="heading">city Details</h2>

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
	
	
<table class="table">
<thead>
<tr>
<th colspan="2" class="col-md-12"> <ul class="breadcrumb t-breadcrumb-page">

            <li><a href="dashboard.php">Home</a></li>
			 <li><a href="city.php">city List</a></li>
          </ul></th>
		  
</tr>

</thead>

<tbody>

                                                <tr>
                                                   <td class="col-md-4">City Name</td>
												   <td class="col-md-8">
                                                     <input type="text" class="form-control" name="city" required>
                                                     </td>
                                               
											   </tr>
                                            
											  <tr>   
									         <td class="col-md-4">Country</td>
                                                    <td class="col-md-8">
                                                    
													 <select name="countryid"  class="form-control" id="countryid" required>
												   <option value="">Select..</option>
												   <?php $row=select_table_status('country','1','country') ; 
												   while($roww=mysql_fetch_array($row)){?>
												   
												  <option value="<?php echo $roww['id']; ?>"><?php echo $roww['country']; ?></option>
                                                    
												   <?php } ?></select>
                                                     </td>
                                                </tr>
												
											
											
											 <tr>   
									         <td class="col-md-4">State</td>
                                                   <td class="col-md-8">
                                                    
													 <select name="stateid"  class="form-control" id="stateid" required>
												   <option value="">Select..</option>
												  </select>
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

<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> 
<script>
        // Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace( 'editor1' );
		
		
 </script> 


</body>

</html>

