<?php require('include/config.php'); 
include("include/logincheck.php");
include_once("include/function.php");
if($admina["usertype"]=='sub_admin')
	{


	
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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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

<h2 class="heading">  Emails</h2>

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

    <form role="form" class="form-horizontal" method="post" action="promotion-tender-list.php" enctype="multipart/form-data">
	
	
	
	<div class="">
  <div class="panel panel-default">
    <div class="panel-heading">Enter Emails to send promotional emails </div>
    <div class="panel-body">


       


      <div class="input-group control-group after-add-more">
           <input type="email" name="addmore[]" required class="form-control" placeholder="Enter Email Here">
          <div class="input-group-btn"> 
            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
          </div>
        </div>


      


        <!-- Copy Fields -->
        <div class="copy hide">
          <div class="control-group input-group" style="margin-top:10px">
            <input type="email" name="addmore[]"  class="form-control" placeholder="Enter Email Here">
            <div class="input-group-btn"> 
              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
          </div>
        </div>
          <br><br>
		  <div class="">
           
             <button class="btn btn-success" name="emailmanuall" type="submit"> Continue</button>
         
        </div>
		
  </form>
    </div>
  </div>
</div>


<script type="text/javascript">


    $(document).ready(function() {


      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });


      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });


    });


</script>

	
	
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

