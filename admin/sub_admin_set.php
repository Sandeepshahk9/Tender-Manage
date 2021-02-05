<?php require('include/config.php'); 
include("include/logincheck.php");
include_once("include/function.php");
if($admina["usertype"]=='admin')
	
	{
		
///////////////////////////////////////////////////////////////
  if(isset($_POST['upsubmit'])) {
	  
	  $data['id']=$_POST['id'];
	  $data['adm_set']=$_POST['adm_set'];$data['adm_set_a']=$_POST['adm_set_a'];$data['adm_set_e']=$_POST['adm_set_e'];$data['adm_set_d']=$_POST['adm_set_d'];
	  
	  $data['sub_cat']=$_POST['sub_cat'];$data['sub_cat_a']=$_POST['sub_cat_a'];$data['sub_cat_e']=$_POST['sub_cat_e'];$data['sub_cat_d']=$_POST['sub_cat_d'];
	  
	  $data['cat']=$_POST['cat'];$data['cat_a']=$_POST['cat_a'];$data['cat_e']=$_POST['cat_e'];$data['cat_d']=$_POST['cat_d'];
	  
	  $data['com']=$_POST['com'];$data['com_a']=$_POST['com_a'];$data['com_e']=$_POST['com_e'];$data['com_d']=$_POST['com_d'];
	  
	  $data['enq']=$_POST['enq'];$data['enq_a']=$_POST['enq_a'];$data['enq_e']=$_POST['enq_e'];$data['enq_d']=$_POST['enq_d'];
	  
	  $data['faq']=$_POST['faq'];$data['faq_a']=$_POST['faq_a'];$data['faq_e']=$_POST['faq_e'];$data['faq_d']=$_POST['faq_d'];
	  
      $data['loc_cou']=$_POST['loc_cou'];$data['loc_cou_a']=$_POST['loc_cou_a'];$data['loc_cou_e']=$_POST['loc_cit_e'];$data['loc_cou_d']=$_POST['loc_cou_d'];
	  
	  $data['loc_sta']=$_POST['loc_sta'];$data['loc_sta_a']=$_POST['loc_sta_a'];$data['loc_sta_e']=$_POST['loc_sta_e'];$data['loc_sta_d']=$_POST['loc_sta_d'];
	  
	  $data['loc_cit']=$_POST['loc_cit'];$data['loc_cit_a']=$_POST['loc_cit_a'];$data['loc_cit_e']=$_POST['loc_cit_e'];$data['loc_cit_d']=$_POST['loc_cit_d'];
	  
	  $data['mem']=$_POST['mem'];$data['mem_a']=$_POST['mem_a'];$data['mem_e']=$_POST['mem_e'];$data['mem_d']=$_POST['mem_d'];
	  
	  $data['sub_ema']=$_POST['sub_ema'];$data['sub_ema_a']=$_POST['sub_ema_a'];$data['sub_ema_e']=$_POST['sub_ema_e'];$data['sub_ema_d']=$_POST['sub_ema_d'];
	  
	  $data['sub_pla']=$_POST['sub_pla'];$data['sub_pla_a']=$_POST['sub_pla_a'];$data['sub_pla_e']=$_POST['sub_pla_e'];$data['sub_pla_d']=$_POST['sub_pla_d'];
	  
	  $data['sub_pay']=$_POST['sub_pay'];$data['sub_pay_a']=$_POST['sub_pay_a'];$data['sub_pay_e']=$_POST['sub_pay_e'];$data['sub_pay_d']=$_POST['sub_pay_d'];
	  
	  $data['tes']=$_POST['tes'];$data['tes_a']=$_POST['tes_a'];$data['tes_e']=$_POST['tes_e'];$data['tes_d']=$_POST['tes_d'];
	  
	  $data['ten']=$_POST['ten'];$data['ten_a']=$_POST['ten_a'];$data['ten_e']=$_POST['ten_e'];$data['ten_d']=$_POST['ten_d'];
	  
	  $data['cms']=$_POST['cms'];$data['cms_a']=$_POST['cms_a'];$data['cms_e']=$_POST['cms_e'];$data['cms_d']=$_POST['cms_d'];
	  
	  $data['sub_adm']=$_POST['sub_adm'];$data['sub_adm_a']=$_POST['sub_adm_a'];$data['sub_adm_e']=$_POST['sub_adm_e'];$data['sub_adm_d']=$_POST['sub_adm_d'];
    	$data['sub_adm_p']=$_POST['sub_adm_p'];$data['sub_adm_r']=$_POST['sub_adm_r'];$data['pro_ema']=$_POST['pro_ema'];
	 $table='sub_admin';
     $resState = update_data($table,$data);
    
    if($resState['flag'] == 'success') {
		
		echo '<script>location.href="sub_admin.php?msg=32";</script>';
    } 
	else {
      echo '<div class="alert alert-danger">
              <strong>Error!</strong> '.$resState['msg'].'
            </div>';
    } 
	
  }
////////////////////////////////////////////////////////////////

	
$sqlb="select * FROM sub_admin where id='".$_GET['setid']."'";
$pagename="sub_admin_set.php?"; 
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

<h2 class="heading">  Sub Admin :   <?php echo $getus['username']; ?></h2>

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
	<input type="hidden" name="id" value="<?php echo $_REQUEST['setid'] ;?>">

<table class="table">
<thead>
<tr>
<th colspan="2" class="col-md-12"> <ul class="breadcrumb t-breadcrumb-page">

            <li><a href="dashboard.php">Home</a></li>
			  <li><a href="sub_admin.php">sub_admin list </a></li>
          </ul></th>
		  
</tr>

</thead>

<tbody>
                                           

</tbody>

</table>



	<div class="sected-fm" style="background:#D4D292">
	
			
                <div class="row form-group" >
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label for="checkbox_id">1- Manage Admin Settings</label>
						<input  class="adm_set" type="checkbox" name="adm_set" id="adm_set" <?php echo empty($getus['adm_set'])?"":"Checked"; ?> value="1" onchange="sadm()" >
					 </div>
					    <fieldset class="adm_set_answer" id="adm_set_answer" style="display:none;" >
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="adm_set_a" id="checkbox_id" value="1" <?php echo empty($getus['adm_set_a'])?"":"Checked"; ?>>
						<label for="checkbox_id">Add</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="adm_set_e" id="checkbox_id" value="1" <?php echo empty($getus['adm_set_e'])?"":"Checked"; ?>>
						<label for="checkbox_id">Edit</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="adm_set_d" id="checkbox_id" value="1" <?php echo empty($getus['adm_set_d'])?"":"Checked"; ?>>
						<label for="checkbox_id">Delete</label>
						</div>
						</fieldset>
				</div>
				 <div class="row form-group" >
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label for="checkbox_id">2- Managed Category</label>
						<input  class="cat" type="checkbox" name="cat" id="checkbox_id" value="1" onchange="scat()"<?php echo empty($getus['cat'])?"":"Checked"; ?>>
					 </div>
					    <fieldset class="cat_answer" style="display:none;">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="cat_a" id="checkbox_id" value="1"<?php echo empty($getus['cat_a'])?"":"Checked"; ?>>
						<label for="checkbox_id">Add</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="cat_e" id="checkbox_id" value="1"<?php echo empty($getus['cat_e'])?"":"Checked"; ?>>
						<label for="checkbox_id">Edit</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="cat_d" id="checkbox_id" value="1"<?php echo empty($getus['cat_d'])?"":"Checked"; ?>>
						<label for="checkbox_id">Delete</label>
						</div>
						</fieldset>
				</div>
				 <div class="row form-group" style="background:#F6F5C9">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label for="checkbox_id">4- Manage Subcategory</label>
						<input  class="sub_cat" type="checkbox" name="sub_cat" id="checkbox_id" value="1" onchange="ssub_cat()"<?php echo empty($getus['sub_cat'])?"":"Checked"; ?>>
					 </div>
					    <fieldset class="sub_cat_answer" style="display:none;">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="sub_cat_a" id="checkbox_id" value="1"<?php echo empty($getus['sub_cat_a'])?"":"Checked"; ?>>
						<label for="checkbox_id">Add</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="sub_cat_e" id="checkbox_id" value="1"<?php echo empty($getus['sub_cat_e'])?"":"Checked"; ?>>
						<label for="checkbox_id">Edit</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="sub_cat_d" id="checkbox_id" value="1"<?php echo empty($getus['sub_cat_d'])?"":"Checked"; ?>>
						<label for="checkbox_id">Delete</label>
						</div>
						</fieldset>
				</div>
				   <div class="row form-group" >
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label for="checkbox_id">3- Managed Company</label>
						<input  class="com" type="checkbox" name="com" id="checkbox_id" value="1" onchange="scom()"<?php echo empty($getus['com'])?"":"Checked"; ?>>
					 </div>
					    <fieldset class="com_answer" style="display:none;">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="com_a" id="checkbox_id" value="1"<?php echo empty($getus['com_a'])?"":"Checked"; ?>>
						<label for="checkbox_id">Add</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="com_e" id="checkbox_id" value="1"<?php echo empty($getus['com_e'])?"":"Checked"; ?>>
						<label for="checkbox_id">Edit</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="com_d" id="checkbox_id" value="1"<?php echo empty($getus['com_d'])?"":"Checked"; ?>>
						<label for="checkbox_id">Delete</label>
						</div>
						</fieldset>
				</div>
				
				
				 <div class="row form-group" >
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label for="checkbox_id">5- Manage Enquiries</label>
						<input  class="enq" type="checkbox" name="enq" id="checkbox_id" value="1" onchange="senq()"<?php echo empty($getus['enq'])?"":"Checked"; ?>>
					 </div>
					    <fieldset class="enq_answer" style="display:none;">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="enq_a" id="checkbox_id" value="1"<?php echo empty($getus['enq_a'])?"":"Checked"; ?>>
						<label for="checkbox_id">Add</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="enq_e" id="checkbox_id" value="1"<?php echo empty($getus['enq_e'])?"":"Checked"; ?>>
						<label for="checkbox_id">Edit</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="enq_d" id="checkbox_id" value="1"<?php echo empty($getus['enq_d'])?"":"Checked"; ?>>
						<label for="checkbox_id">Delete</label>
						</div>
						</fieldset>
				</div>
				 <div class="row form-group" style="background:#96B7B5" >
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label for="checkbox_id">6- Manage Faq's</label>
						<input  class="faq" type="checkbox" name="faq" id="checkbox_id" value="1" onchange="sfaq()"<?php echo empty($getus['faq'])?"":"Checked"; ?>>
					 </div>
					    <fieldset class="faq_answer" style="display:none;">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="faq_a" id="checkbox_id" value="1"<?php echo empty($getus['faq_a'])?"":"Checked"; ?>>
						<label for="checkbox_id">Add</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="faq_e" id="checkbox_id" value="1"<?php echo empty($getus['faq_e'])?"":"Checked"; ?>>
						<label for="checkbox_id">Edit</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="faq_d" id="checkbox_id" value="1"<?php echo empty($getus['faq_d'])?"":"Checked"; ?>>
						<label for="checkbox_id">Delete</label>
						</div>
						</fieldset>
				</div>
				 <div class="row form-group" >
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label for="checkbox_id">7- Manage location's Country</label>
						<input  class="loc_cou" type="checkbox" name="loc_cou" id="checkbox_id" value="1" onchange="sloc_cou()"<?php echo empty($getus['loc_cou'])?"":"Checked"; ?>>
					 </div>
					    <fieldset class="loc_cou_answer" style="display:none;">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="loc_cou_a" id="checkbox_id" value="1"<?php echo empty($getus['loc_cou_a'])?"":"Checked"; ?>>
						<label for="checkbox_id">Add</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="loc_cou_e" id="checkbox_id" value="1"<?php echo empty($getus['loc_cou_e'])?"":"Checked"; ?>>
						<label for="checkbox_id">Edit</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="loc_cou_d" id="checkbox_id" value="1"<?php echo empty($getus['loc_cou_d'])?"":"Checked"; ?>>
						<label for="checkbox_id">Delete</label>
						</div>
						</fieldset>
				</div>
				 <div class="row form-group" >
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label for="checkbox_id">8- Manage location's State</label>
						<input  class="loc_sta" type="checkbox" name="loc_sta" id="checkbox_id" value="1" onchange="sloc_sta()"<?php echo empty($getus['loc_sta'])?"":"Checked"; ?>>
					 </div>
					   <fieldset class="loc_sta_answer" style="display:none;">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="loc_sta_a" id="checkbox_id" value="1"<?php echo empty($getus['loc_sta_a'])?"":"Checked"; ?>>
						<label for="checkbox_id">Add</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="loc_sta_e" id="checkbox_id" value="1"<?php echo empty($getus['loc_sta_e'])?"":"Checked"; ?>>
						<label for="checkbox_id">Edit</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="loc_sta_d" id="checkbox_id" value="1"<?php echo empty($getus['loc_sta_d'])?"":"Checked"; ?>>
						<label for="checkbox_id">Delete</label>
						</div>
						</fieldset>
				</div>
				 <div class="row form-group" style="background:#A59AA9">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label for="checkbox_id">9-  Manage location's City</label>
						<input  class="loc_cit" type="checkbox" name="loc_cit" id="checkbox_id" value="1" onchange="sloc_cit()"<?php echo empty($getus['loc_cit'])?"":"Checked"; ?>>
					 </div>
					    <fieldset class="loc_cit_answer" style="display:none;">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="loc_cit_a" id="checkbox_id" value="1"<?php echo empty($getus['loc_cit_a'])?"":"Checked"; ?>>
						<label for="checkbox_id">Add</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="loc_cit_e" id="checkbox_id" value="1"<?php echo empty($getus['loc_cit_e'])?"":"Checked"; ?>>
						<label for="checkbox_id">Edit</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="loc_cit_d" id="checkbox_id" value="1"<?php echo empty($getus['loc_cit_d'])?"":"Checked"; ?>>
						<label for="checkbox_id">Delete</label>
						</div>
						</fieldset>
				</div>
				 <div class="row form-group" >
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label for="checkbox_id">10- Manage Members</label>
						<input  class="mem" type="checkbox" name="mem" id="checkbox_id" value="1" onchange="smem()"<?php echo empty($getus['mem'])?"":"Checked"; ?>>
					 </div>
					    <fieldset class="mem_answer" style="display:none;">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="mem_a" id="checkbox_id" value="1"<?php echo empty($getus['mem_a'])?"":"Checked"; ?>>
						<label for="checkbox_id">Add</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="mem_e" id="checkbox_id" value="1"<?php echo empty($getus['mem_e'])?"":"Checked"; ?>>
						<label for="checkbox_id">Edit</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="mem_d" id="checkbox_id" value="1"<?php echo empty($getus['mem_d'])?"":"Checked"; ?>>
						<label for="checkbox_id">Delete</label>
						</div>
						</fieldset>
				</div>
				 <div class="row form-group" >
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label for="checkbox_id">11- Manage Subscribed Emails</label>
						<input  class="sub_ema" type="checkbox" name="sub_ema" id="checkbox_id" value="1" onchange="ssub_ema()"<?php echo empty($getus['sub_ema'])?"":"Checked"; ?>>
					 </div>
					    <fieldset class="sub_ema_answer" style="display:none;">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="sub_ema_a" id="checkbox_id" value="1"<?php echo empty($getus['sub_ema_a'])?"":"Checked"; ?>>
						<label for="checkbox_id">Add</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="sub_ema_e" id="checkbox_id" value="1"<?php echo empty($getus['sub_ema_e'])?"":"Checked"; ?>>
						<label for="checkbox_id">Edit</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="sub_ema_d" id="checkbox_id" value="1"<?php echo empty($getus['sub_ema_d'])?"":"Checked"; ?>>
						<label for="checkbox_id">Delete</label>
						</div>
						</fieldset>
				</div>
				 <div class="row form-group" style="background:#B986B8    ">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label for="checkbox_id">12- Manage Subscription Plans</label>
						<input  class="sub_pla" type="checkbox" name="sub_pla" id="checkbox_id" value="1" onchange="ssub_pla()"<?php echo empty($getus['sub_pla'])?"":"Checked"; ?>>
					 </div>
					    <fieldset class="sub_pla_answer" style="display:none;">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="sub_pla_a" id="checkbox_id" value="1"<?php echo empty($getus['sub_pla_a'])?"":"Checked"; ?>>
						<label for="checkbox_id">Add</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="sub_pla_e" id="checkbox_id" value="1"<?php echo empty($getus['sub_pla_e'])?"":"Checked"; ?>>
						<label for="checkbox_id">Edit</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="sub_pla_d" id="checkbox_id" value="1"<?php echo empty($getus['sub_pla_d'])?"":"Checked"; ?>>
						<label for="checkbox_id">Delete</label>
						</div>
						</fieldset>
				</div>
				 <div class="row form-group" >
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label for="checkbox_id">13- Manage Subscription Payments</label>
						<input  class="sub_pay" type="checkbox" name="sub_pay" id="checkbox_id" value="1" onchange="ssub_pay()"<?php echo empty($getus['sub_pay'])?"":"Checked"; ?>>
					 </div>
					     <fieldset class="sub_pay_answer" style="display:none;">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="sub_pay_a" id="checkbox_id" value="1"<?php echo empty($getus['sub_pay_a'])?"":"Checked"; ?>>
						<label for="checkbox_id">Add</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="sub_pay_e" id="checkbox_id" value="1"<?php echo empty($getus['sub_pay_e'])?"":"Checked"; ?>>
						<label for="checkbox_id">Edit</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="sub_pay_d" id="checkbox_id" value="1"<?php echo empty($getus['sub_pay_d'])?"":"Checked"; ?>>
						<label for="checkbox_id">Delete</label>
						</div>
						</fieldset>
				</div>
				
				
				 <div class="row form-group" >
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label for="checkbox_id">13- Manage Promotional Email </label>
						<input  class="pro_ema" type="checkbox" name="pro_ema" id="checkbox_id" value="1" <?php echo empty($getus['pro_ema'])?"":"Checked"; ?>>
					 </div>
					  
				</div>
				
				
				
				
				
				
				
				
				
				 <div class="row form-group" >
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label for="checkbox_id">14- Manage Testimonials</label>
						<input  class="tes" type="checkbox" name="tes" id="checkbox_id" value="1" onchange="stes()"<?php echo empty($getus['tes'])?"":"Checked"; ?>>
					 </div>
					    <fieldset class="tes_answer" style="display:none;">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="tes_a" id="checkbox_id" value="1"<?php echo empty($getus['tes_a'])?"":"Checked"; ?>>
						<label for="checkbox_id">Add</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="tes_e" id="checkbox_id" value="1"<?php echo empty($getus['tes_e'])?"":"Checked"; ?>>
						<label for="checkbox_id">Edit</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="tes_d" id="checkbox_id" value="1"<?php echo empty($getus['tes_d'])?"":"Checked"; ?>>
						<label for="checkbox_id">Delete</label>
						</div>
						</fieldset>
				</div>
				 <div class="row form-group" style="background:#D86135">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label for="checkbox_id">15- Manage Tender</label>
						<input  class="ten" type="checkbox" name="ten" id="checkbox_id" value="1" onchange="sten()"<?php echo empty($getus['ten'])?"":"Checked"; ?>>
					 </div>
					    <fieldset class="ten_answer" style="display:none;">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="ten_a" id="checkbox_id" value="1"<?php echo empty($getus['ten_a'])?"":"Checked"; ?>>
						<label for="checkbox_id">Add</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="ten_e" id="checkbox_id" value="1"<?php echo empty($getus['ten_e'])?"":"Checked"; ?>>
						<label for="checkbox_id">Edit</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="ten_d" id="checkbox_id" value="1"<?php echo empty($getus['ten_d'])?"":"Checked"; ?>>
						<label for="checkbox_id">Delete</label>
						</div>
						</fieldset>
				</div>
				  <div class="row form-group" >
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label for="checkbox_id">16- Manage CMS Pages</label>
						<input  class="cms" type="checkbox" name="cms" id="checkbox_id" value="1" onchange="scms()"<?php echo empty($getus['cms'])?"":"Checked"; ?>>
					 </div>
					     <fieldset class="cms_answer" style="display:none;">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="cms_a" id="checkbox_id" value="1"<?php echo empty($getus['cms_a'])?"":"Checked"; ?>>
						<label for="checkbox_id">Add</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="cms_e" id="checkbox_id" value="1"<?php echo empty($getus['cms_e'])?"":"Checked"; ?>>
						<label for="checkbox_id">Edit</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="cms_d" id="checkbox_id" value="1"<?php echo empty($getus['cms_d'])?"":"Checked"; ?>>
						<label for="checkbox_id">Delete</label>
						</div>
						</fieldset>
				</div>
				  <div class="row form-group">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label for="checkbox_id">17- Manage Sub Admin</label>
						<input  class="sub_adm" type="checkbox" name="sub_adm" id="checkbox_id" value="1" onchange="ssub_adm()"<?php echo empty($getus['sub_adm'])?"":"Checked"; ?>>
					 </div>
					     <fieldset class="sub_adm_answer" style="display:none;">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="sub_adm_a" id="checkbox_id" value="1"<?php echo empty($getus['sub_adm_a'])?"":"Checked"; ?>>
						<label for="checkbox_id">Add</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="sub_adm_e" id="checkbox_id" value="1"<?php echo empty($getus['sub_adm_e'])?"":"Checked"; ?>>
						<label for="checkbox_id">Edit</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="sub_adm_d" id="checkbox_id" value="1"<?php echo empty($getus['sub_adm_d'])?"":"Checked"; ?>>
						<label for="checkbox_id">Delete</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="sub_adm_p" id="checkbox_id" value="1"<?php echo empty($getus['sub_adm_p'])?"":"Checked"; ?>>
						<label for="checkbox_id">Power</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							
						<input type="checkbox" name="sub_adm_r" id="checkbox_id" value="1"<?php echo empty($getus['sub_adm_r'])?"":"Checked"; ?>>
						<label for="checkbox_id">Report</label>
						</div>
						
						</fieldset>
				</div>
				  
				
				
				
		
			  <input type="submit" class="form-control cod-p" name="upsubmit" value="Submit">
			  
			  
			</form>
	
	</div>




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


<!----------------------javascript code ------------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">


function sadm()
{
    if($('.adm_set').is(":checked"))   
        $(".adm_set_answer").show();
    else
        $(".adm_set_answer").hide();
}
function scat()
{
    if($('.cat').is(":checked"))   
        $(".cat_answer").show();
    else
        $(".cat_answer").hide();
}
function scom()
{
    if($('.com').is(":checked"))   
        $(".com_answer").show();
    else
        $(".com_answer").hide();
}
function ssub_cat()
{
    if($('.sub_cat').is(":checked"))   
        $(".sub_cat_answer").show();
    else
        $(".sub_cat_answer").hide();
}function senq()
{
    if($('.enq').is(":checked"))   
        $(".enq_answer").show();
    else
        $(".enq_answer").hide();
}function sfaq()
{
    if($('.faq').is(":checked"))   
        $(".faq_answer").show();
    else
        $(".faq_answer").hide();
}function sloc_cou()
{
    if($('.loc_cou').is(":checked"))   
        $(".loc_cou_answer").show();
    else
        $(".loc_cou_answer").hide();
}
function sloc_sta()
{
    if($('.loc_sta').is(":checked"))   
        $(".loc_sta_answer").show();
    else
        $(".loc_sta_answer").hide();
}
function sloc_cit()
{
    if($('.loc_cit').is(":checked"))   
        $(".loc_cit_answer").show();
    else
        $(".loc_cit_answer").hide();
}function smem()
{
    if($('.mem').is(":checked"))   
        $(".mem_answer").show();
    else
        $(".mem_answer").hide();
}
function ssub_ema()
{
    if($('.sub_ema').is(":checked"))   
        $(".sub_ema_answer").show();
    else
        $(".sub_ema_answer").hide();
}
function ssub_pla()
{
    if($('.sub_pla').is(":checked"))   
        $(".sub_pla_answer").show();
    else
        $(".sub_pla_answer").hide();
}
function ssub_pay()
{
    if($('.sub_pay').is(":checked"))   
        $(".sub_pay_answer").show();
    else
        $(".sub_pay_answer").hide();
}
function stes()
{
    if($('.tes').is(":checked"))   
        $(".tes_answer").show();
    else
        $(".tes_answer").hide();
}
function sten()
{
    if($('.ten').is(":checked"))   
        $(".ten_answer").show();
    else
        $(".ten_answer").hide();
}
function scms()
{
    if($('.cms').is(":checked"))   
        $(".cms_answer").show();
    else
        $(".cms_answer").hide();
}
function ssub_adm()
{
    if($('.sub_adm').is(":checked"))   
        $(".sub_adm_answer").show();
    else
        $(".sub_adm_answer").hide();
}

</script>


<!----------------------javascript code ------------->



</body>

</html>

