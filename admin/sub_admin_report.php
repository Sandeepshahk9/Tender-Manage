<?php require('include/config.php'); 
include("include/logincheck.php");
include_once("include/function.php");
if($admina["usertype"]=='admin')
	{
		
	

		
///////////////////////////////////////////////////////////////
$san=mysql_query("select username from sub_admin where id='".$_GET['red']."'");
$sand=mysql_fetch_array($san); 
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
<title>Admin Panel : Tender </title>
<?php require('hscript.php'); ?>
<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
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
<h2 class="heading">sub_admin Report :-  <?php echo $sand['username'] ; ?></h2>
</header>

  <a  target="_blank"  href="http://tendertm.com/tedtm/">
 <button type="button" style="float:right" class="btn btn-primary btn-sm">Open Sub-Admin Link</button></a>
<div class="contents">


<a  href="javascript:history.back();"> <img src="assets/images/goBack.png" class="img-responsive" alt="#" style="float: right; margin-top:-55px;"> </a>
<div class="table-box">
                               <?php 

if($_GET['msg']=='1'){

echo "<div class='alert alert-success'>List Updated Successfully</div>";}

elseif($_GET['msg']=='2'){

echo "<div class='alert alert-danger'>Error !!! Please Try Again</div>";}

elseif($_GET['msg']=='3'){

echo "<div class='alert alert-danger'>Number is Already Exist. Please Try New</div>";}

elseif($_GET['msg']=='4'){

echo "<div class='alert alert-success'> Status Updated Successfully</div>";}

elseif($_GET['msg']=='5'){

echo "<div class='alert alert-success'> Deleted Successfully</div>";}
elseif($_GET['msg']=='555'){

echo "<div class='alert alert-danger'>Error !!! You cant delete this record.</div>";}


elseif($_GET['msg']=='6'){

echo "<div class='alert alert-success'>Added Successfully</div>";}

elseif($_GET['msg']=='32'){

echo "<div class='alert alert-success'> Sub admin updated Successfully</div>";}




 ?> 
 
 <?php if($_GET['delmsg']=='1'){echo "<div class='alert alert-success'>Host List Deleted Successfully</div>";}elseif($_GET['delmsg']=='2'){echo "<div class='alert alert-success'>No Host List Found</div>";} ?>

<table class="display table" id="example">
<thead>
<tr>
<td colspan="12" style="padding:0px !important;" > <ul class="breadcrumb t-breadcrumb-page">
<li><a href="dashboard.php">Home</a></li>
<li class="active"> sub_admin Report</li>
<li>
  
 </li>
 </td>
</tr>
  
  
                                                 <tr>
                                                    <td colspan="12" style="padding:0px !important;" >
                       
				
				  <form role="form" class="form-inline" method="post" action="sub_admin_report_tender_list.php">      
     				 <input type="hidden" placeholder="" name="red" value="<?php echo $_GET['red'] ?>" />
					  <input type="date" name="ded" />
                    <input type="submit" value="Report By Date" />
              </form>	
					
					
				                                    
                                                </tr>
    
                                         <tr>
                                                    <th>S.No</th>
                                                    <th>Date </th>
                                                    <th>Total Tender Added</th>
                                                    <th class="center">Tools</th>                                                    
                                                     <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                    <form name="" action="action.php" method="post">
<input type="hidden" name="colname" value="salln"> 
<input type="hidden" name="tabl" value="sub_admin"> 
<input type="hidden" name="pgname" value="sub_admin.php?">                                
<input type="hidden" name="delimju" value="image1,image2">                       
 <?php 
$cont=0;
 $start=$todate;
 $end_date = date ("Y-m-d", strtotime("-10 day", strtotime($start)));

	 while (strtotime($start) > strtotime($end_date)) 

	{
	$cont++;
	
$added_date = date ("Y-m-d", strtotime("+1 day", strtotime($start)));	
$sqlb="select id from tender where sub_admin_id='".$_GET['red']."' AND added_date='".$added_date."' ";
$tabletb=mysql_query($sqlb);
$numub=mysql_num_rows($tabletb);
	
?>                                                             
                                                                       
                    
                    <tr> 
                      <td><?php echo $cont; ?></td>
                      <td><?php echo date('d F Y',strtotime($start)) ; ?></td>
                      <td><?php echo $numub ; ?></td>
                     
					  <td> <a href="sub_admin_report_tender_list.php?red=<?php echo $_GET['red'].'&ded='.$start ; ?>" title="view">
					  <i class="fa fa-eye" style="font-size:20px;color:green"></i>  </a> </td>
                    </tr>
                    
  <?php
     $start = date ("Y-m-d", strtotime("-1 day", strtotime($start)));
  }
  
?>                 
													
          </form>                                              
                                            
                                                <tr class="gradeA">
                                                    <td colspan="12">
                                        <div class="pagination">

<?php if($totalpage!=0) { ?>



<?php if($pageno>1) { ?>

<li><a href="<?php echo $pagename; ?>pageno=1">First</a></li>

<li><a class="page-nav" href="<?php echo $pagename; ?>pageno=<?php echo $pageno-1; ?>"><i class="icon iPrev">&larr;</i></a></li>

<?php if($pageno>2) { ?>

<li><a class="page-num" href="<?php echo $pagename; ?>pageno=<?php echo $pageno-2; ?>"><?php echo $pageno-2; ?></a></li>

<?php } ?>

<li><a class="page-num" href="<?php echo $pagename; ?>pageno=<?php echo $pageno-1; ?>"><?php echo $pageno-1; ?></a></li>

<?php } ?>

<li><a class="page-num active" href="<?php echo $pagename; ?>pageno=<?php echo $pageno; ?>"><?php echo $pageno; ?></a></li>

<?php if($pageno<$totalpage) { ?>

<li><a class="page-num" href="<?php echo $pagename; ?>pageno=<?php echo $pageno+1; ?>"><?php echo $pageno+1; ?></a></li>

<?php if($pageno<$totalpage-1) { ?>

<li><a class="page-num" href="<?php echo $pagename; ?>pageno=<?php echo $pageno+2; ?>"><?php echo $pageno+2; ?></a></li>

<?php } ?>

<li><a class="page-nav" href="<?php echo $pagename; ?>pageno=<?php echo $pageno+1; ?>"><i class="icon iNext" >&rarr;</i></a></li>

<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $pagename; ?>pageno=<?php echo $totalpage; ?>">Last</a></li>

<?php }} ?>                            </div>
                                        
                                        
                                        
                                        
                                        </td>
                                                   
                                                </tr>
                                            </tbody>
                                            
                                        </table>
                                        
                                        
                                        
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
