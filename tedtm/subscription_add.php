<?php require('include/config.php'); 
include("include/logincheck.php");
include_once("include/function.php");
if($admina["usertype"]=='sub_admin')
	{
		
///////////////////////////////////////////////////////////////


  if(isset($_REQUEST['submit'])) {
  
     $str=mysql_query("select id from sub_plan where member_email='".$_POST['member_email']."'");
	 $st=mysql_num_rows($str);
	 if($st>0){
	                   echo '<script>alert("This email Subscription Is alredy Added!")</script>';
					   echo '<script>location.href="subscription.php";</script>';
	 }else{
  
	$table='sub_plan';
	
	$data['sub_category'] = implode(',', $_POST['sub_category']);
	$data['state']=implode(',', $_POST['state']);
	$data['member_email']=$_POST['member_email'] ;
	$data['fee']=$_POST['fee'] ;
	$data['duration']=$_POST['year']+$_POST['month'] ;
	$data['descp']=$_POST['descp'] ;
	$data['created']=$_POST['created'] ;
	$data['modified']=$_POST['modified'] ;
	$data['plan_start_date']=$_POST['plan_start_date'];
	
    $resState = insert_data($table,$data);
    
    if($resState['flag'] == 'success') {
		
			echo '<script>location.href="subscription.php?msg=6";</script>';
    } 
	else {
      echo '<div class="alert alert-danger">
              <strong>Error!</strong> '.$resState['msg'].'
            </div>';
    }
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
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 
<?php require('hscript.php'); ?>


 <link href="js/jquery.multiselect.css" rel="stylesheet" type="text/css">
<script src="js/jquery.min.js"></script>
<script src="js/jquery.multiselect.js"></script>

</head>

  
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="typeahead.js"></script>
	<style>
	.typeahead { border: 2px solid #FFF;border-radius: 4px;padding: 8px 12px;max-width: auto;min-width: auto;background: rgba(66, 52, 52, 0.5);color: #FFF;}
	.tt-menu { width:300px; }
	ul.typeahead{margin:0px;padding:10px 0px;}
	ul.typeahead.dropdown-menu li a {padding: 10px !important;	border-bottom:#CCC 1px solid;color:#FFF;}
	ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
	.bgcolor {max-width: 550px;min-width: 290px;max-height:340px;background:url("world-contries.jpg") no-repeat center center;padding: 100px 10px 130px;border-radius:4px;text-align:center;margin:10px;}
	.demo-label {font-size:1.5em;color: #686868;font-weight: 500;color:#FFF;}
	.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
		text-decoration: none;
		background-color: #1f3f41;
		outline: 0;
	 }
	 </style>	 

  
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

<h2 class="heading">Subscription Plan Add</h2>

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
	 <input type="hidden" name="created" value=" <?php echo $todate ; ?>">
	 <input type="hidden" name="modified" value=" <?php echo $todate ; ?>">
	 
<table class="table">
<thead>
<tr>
<th colspan="2" class="col-md-12"> <ul class="breadcrumb t-breadcrumb-page">

            <li><a href="dashboard.php">Home</a></li>
			 <li><a href="subscription.php">Subscription List</a></li>
          </ul></th>
		  
</tr>

</thead>

<tbody>

                                                <tr>
                                                   <td class="col-md-4">Sub Category</td>
												   <td class="col-md-8">
                                                     <select name="sub_category[]" id="sub_category" class="form-control" multiple required>
												 
												  <?php $str=select_table_status('sub_category','1','name');while($row=mysql_fetch_array($str)){?>
											<option value="<?php echo $row['name'];?>"><?php echo $row['name'] ;?></option>
												  <?php  }  ?>
												   </select>
                                                     </td>
                                                </tr>

												
												
												 <tr>
                                                   <td class="col-md-4">State</td>
												   <td class="col-md-8">
                                                     <select name="state[]" id="state" class="form-control" multiple required>
												 
												  <?php $str=select_table_status('state','1','statename');while($row=mysql_fetch_array($str)){?>
											<option value="<?php echo $row['id'];?>"><?php echo $row['statename'] ;?></option>
												  <?php  }  ?>
												   </select>
                                                     </td>
                                                </tr>
												
												
												
                                                <tr>
                                                   <td class="col-md-4">Subscriber Email(Member Email)</td>
												   <td class="col-md-8"><div class="ui-widget">
                                                     <input type="text"  class="form-control" id="member_email" name="member_email" placeholder ="Please type slow" id="member" required></div>
                                                     </td>
                                                </tr>
                                              <tr>
                                                   <td class="col-md-4">Fees</td>
												   <td class="col-md-8">
                                                     <input type="number"  class="form-control" name="fee" min="0" required>
                                                     </td>
                                                </tr>
                                             
										         <tr>
                                                   <td class="col-md-4">Subscriptions Start Date</td>
												   <td class="col-md-8">
                                                     <input type="date" class="form-control" name="plan_start_date" required>
                                                     </td>
                                                </tr>	 
											 
											 
											 
											 <tr>
                                                   <td class="col-md-4">Duration (In Years)</td>
												   <td class="col-md-8">
															<table class="table">
																<tr>
																  <td class="col-md-6">
																  
																   <select name="year" class="form-control" required>
												   <option value="">Select Year</option>
												  <?php for($i=1;$i<=5;$i++){?>
											<option value="<?php echo $i*12 ;?>"><?php echo $i ;?></option>
												  <?php  }  ?>
												   </select>
																 </td>
																  
																  
																  <td class="col-md-6">
																  
																  <select name="month" class="form-control" required>
												   <option value="">Select Month</option>
												  <?php for($i=1;$i<=12;$i++){?>
											<option value="<?php echo $i ;?>"><?php echo $i ;?></option>
												  <?php  }  ?>
												   </select>
																   </td>
																  
																  
																  
																</tr>																
															  </table>
                                                     </td>
                                                </tr>
                                            
											 
											 
												
												
                                              <tr>
                                                   <td class="col-md-4">Description (CMS)</td>
												   <td class="col-md-8">
                                                     <textarea id="editor1" rows="5" col="80" name="descp"></textarea>
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


	
<script>
     $(document).ready(function () {
        $('#member_email').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "getmember.php",
					data: 'q=' + query,            
                    dataType: "json",
                    type: "GET",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>
 

 
<script>
$('#sub_category').multiselect({
    columns: 1,
    placeholder: 'Select Sub Category'
   });
   
  $('#state').multiselect({
    columns: 1,
    placeholder: 'Select State'
   });
  </script>
  
  
<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> 
<script>
        // Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace( 'editor1' );
		
		
 </script> 

</body>

</html>

