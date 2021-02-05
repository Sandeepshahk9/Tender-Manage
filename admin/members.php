<?php require('include/config.php'); 
include("include/logincheck.php");
include_once("include/function.php");
if($admina["usertype"]=='admin')
	{
		
$sqlb="select * FROM member";
$pagename="members.php?"; 
$tabletb=mysql_query($sqlb);
$numub=mysql_num_rows($tabletb);	

		
///////////////////////////////////////////////////////////////
  if(isset($_GET['deleteidh'])) {
	  $id=$_GET['deleteidh'];
	$table='member';
    $resState=single_delete($table,$id);
    
    if($resState['flag'] == 'success') {
		
			echo '<script>location.href="members.php?msg=5";</script>';
    } 
	else {
     echo '<script>location.href="members.php?msg=555";</script>';
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
<h2 class="heading">Member List</h2>
</header>
<div class="contents">
<a  href="javascript:history.back();"> <img src="assets/images/goBack.png" class="img-responsive" alt="#" style="float: right; margin-top:-55px;"> </a>
<div class="table-box">
                               <?php 

if($_GET['msg']=='1'){

echo "<div class='alert alert-success'>User Details Updated Successfully</div>";}

elseif($_GET['msg']=='2'){

echo "<div class='alert alert-danger'>Error !!! Please Try Again</div>";}

elseif($_GET['msg']=='3'){

echo "<div class='alert alert-danger'>Number is Already Exist. Please Try New</div>";}

elseif($_GET['msg']=='4'){

echo "<div class='alert alert-success'>User Status Updated Successfully</div>";}

elseif($_GET['msg']=='5'){

echo "<div class='alert alert-success'>User Deleted Successfully</div>";}
elseif($_GET['msg']=='555'){

echo "<div class='alert alert-danger'>Error !!! You cant delete this record.</div>";}


elseif($_GET['msg']=='6'){

echo "<div class='alert alert-success'>Added Successfully</div>";}



 ?>                       <?php if($_GET['delmsg']=='1'){echo "<div class='alert alert-success'>Host List Deleted Successfully</div>";}elseif($_GET['delmsg']=='2'){echo "<div class='alert alert-success'>No Host List Found</div>";} ?>

<table class="display table" id="example">
<thead>
<tr>
<td colspan="8" style="padding:0px !important;" > <ul class="breadcrumb t-breadcrumb-page">
<li><a href="dashboard.php">Home</a></li>
<li class=""><a href="members.php"> Member List</a></li>
<li>
  <a href="member_add.php">
 <button type="button" style="float:right" class="btn btn-primary btn-sm">Add New</button>
  </a>
 </li>
 </td>
</tr>

 <tr>
                          <td colspan="8" style="padding:0px !important;" >
                      <form role="form" class="form-inline" method="Post" action="memberss.php">                             
                     <div class="search-box">
                    <input type="text" placeholder="Email,name" name="search" />
                    <input type="submit" value="Search" />
                      </div></form>
				
				  <form role="form" class="form-inline" method="post" action="">      
     				 <input type="number" placeholder="" name="san_page" />
                    <input type="submit" value="Perpage" />
              </form>	
					
					
				<div style="float:right; padding-right:20px;"><strong>Total - <?php echo $numub; ?></strong></div></td>
                                                    
                                                </tr>

                                         <tr><th> <input type="checkbox" id="selectall" onClick="selectAll(this)" /></th>
                                                    <th>S.No</th>
                                                    <th>Name </th>
                                                    <th>Number </th>
                                                    <th>Email </th>
                                                    <th>Date</th>
                                                  <th>Status</th>
                                                    <th class="center">Tools</th>                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                     <form name="" action="action.php" method="post">
<input type="hidden" name="colname" value="salln"> 
<input type="hidden" name="tabl" value="member"> 
<input type="hidden" name="pgname" value="members.php?">                                
<input type="hidden" name="delimju" value="image1,image2">                       
 <?php 

if($numub>0)

	{
    
	
	if($_REQUEST['san_page']!=''){
		$pageentry=$_REQUEST['san_page'];
	}else{
		$pageentry=50;
	}
		$totalpage=ceil($numub/$pageentry);

		if(isset($_GET['pageno']))

		{

			$pageno=$_GET['pageno'];

			$pagestart=($pageno-1)*($pageentry);

			$pageend=$pagestart+$pageentry;

			$cont=$pagestart;

	

	    }

		else

		{

			$pagestart=0;	

			$pageno=1;

			$pageend=$pagestart+$pageentry;	

			$cont=0;



		}

	$sqlgb = $sqlb." ORDER BY id DESC LIMIT ".$pagestart.",".$pageentry;

	$sqlub=mysql_query($sqlgb);




	while($custob=mysql_fetch_array($sqlub))

	{
	
if($custob['status']=='1')
{
		$imgnam='active.png';
}
else
{
		$imgnam='inactive.png';
}
	$cont++;
?>                                                             
                                                                       
                    
                    <tr> <td><input type="checkbox" name="salln[]" id="foo" value="<?php echo $custob['id']; ?>" >   </td>
                      <td><?php echo $cont; ?></td>
                      <td><?php echo $custob['name']; ?></td>
                      <td><?php echo $custob['number']; ?></td>
                       <td><?php echo $custob['email']; ?></td>
                       <td><?php echo date('d-m-Y', strtotime($custob['created'])); ?></td>
                     <td><img src="images/<?php echo $imgnam; ?>" style="vertical-align:baseline;" width="14" alt="Status" /> </td>
    
                     
                      <td data-value="1">
<a href="member_edit.php?editid=<?php echo $custob['id']; ?>" title="edit"><img src="images/edit.png" alt="Edit"/></a> 
<a href="members.php?deleteidh=<?php echo $custob['id']; ?>" title="Delete"><img src="images/cross.png" alt="Del" /></a> </td>
                    </tr>
                    
                    
  <?php }
  }
?>                    <tr class="gradeA">
                                                    <td colspan="8">
<button type="submit" class="btn btn-success" name="activall">Activate</button> 
<button type="submit" class="btn btn-warning" name="deactivall">Deactivate</button>  
<button type="submit" class="btn btn-danger" name="deleteall">Delete</button>  
                                                    </td></tr>         
          </form>                                              
                                            
                                                <tr class="gradeA">
                                                    <td colspan="8">
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
