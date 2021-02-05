<?php require('include/config.php'); 
include("include/logincheck.php");
if($admina["usertype"]=='Admin')
	{
if($_REQUEST['editid']!='')
{
 $sqlb=mysql_query("select * FROM users where id='".$_REQUEST['editid']."'");
	$custob=mysql_fetch_array($sqlb);
}

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
<h2 class="heading">Host Panel - <?php echo $custob['fname'].' '.$custob['lname']; ?></h2>
</header>
<div class="contents">
<a  href="javascript:history.back();"> <img src="assets/images/goBack.png" class="img-responsive" alt="#" style="float: right; margin-top:-55px;"> </a>
<div class="table-box">
                               <?php 

if($_GET['msg']=='1'){

echo "<div class='alert alert-success'>User Updated Successfully</div>";}

elseif($_GET['msg']=='2'){

echo "<div class='alert alert-danger'>Error !!! Please Try Again</div>";}

elseif($_GET['msg']=='3'){

echo "<div class='alert alert-danger'>Number is Already Exist. Please Try New</div>";}



 ?> 
  <table class="display table" id="example">
<thead>
<tr>
<td colspan="8" style="padding:0px !important;" > <ul class="breadcrumb t-breadcrumb-page">
<li><a href="dashboard.php">Home</a></li>
<li class="active"><a href="hostlist.php">Host List</a></li>
</ul></td>
</tr></thead></table>            
              
              <div class="row">
              <div class="col-md-3">
              <a href="useredit.php?editid=<?php echo $custob['id']; ?>">
              <div class="first_box">
              
              <div class="info-data open">
                      <h4><img src="assets/images/useri.png"> </h4>
                      <hr>
                      <p><span>Personal</span> Info 
                      </p>
                     
              
              </div>
             
              </div>
               </a>
              </div>
              
              <div class="col-md-3">
                                          <a href="eventlisth.php?userid=<?php echo $custob['id']; ?>">

              <div class="third_box">
              
              <div class="info-data open">
                      <h4><img src="assets/images/schedule.png"> </h4>
                      <hr>
                      <p><span>Events</span> 
                      </p>
                     
              
              </div>
              
              </div>
              </a>
              </div>
              
              
              
              
              
              
              <?php /*?><div class="col-md-3">
                            <a href="userrating.php?editid=<?php echo $custob['id']; ?>">

              <div class="fourth_box">
              
              <div class="info-data open">
                      <h4><img src="assets/images/meter.png"> </h4>
                      <hr>
                      <p><span>Payment History</span> 
                      </p>
                     
              
              </div>
              
              </div>
              </a>
              </div><?php */?>
              
              
              
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

</body>
</html>
