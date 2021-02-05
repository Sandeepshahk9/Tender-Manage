<?php 

include_once('../admin/include/config.php');
include_once('../admin/include/function.php');

include_once('login_check.php');
include_once('response.php');


$head=select_table('admin_setting','id');
$head=mysql_fetch_array($head);
$url='http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>


 <?php include_once('hlink.php'); ?>
	<title>tender/favourite</title>
   
    
</head>
<style>

</style>
<body style="background:#86a1b1">
   <section class="user-dashboard-sec">
		<div class="container-fluid">
			<div class="row">
			
			
					<?php  include_once('menu_sidebar_index.php') ;?>
				
				<?php include_once('header.php'); ?>
				
					
    <div class="details-list-proj-rec">
	<table class="grid table" style="width: 100%">
	<thead>
			<th style="width: 30px;"></th>
			<th style="width: 30px;"></th>		
			<th style="width: 89px;">Tender Id</th>
			<th>Description</th>
			<th style="width: 10px;">Due Date</th>
			<th style="width: 10px;">Tender Value</th>
		
	</thead>		
			<tbody>
			
			
			  <?php 
			
///////////////////////////////////////////////////////////status check code

			$status_check=check_status() ;if($status_check=='no'){ ?>
			 <li>Your Subscription Plan is currently Inactive . Please contact with Admin</li>
			 
			<?php }
			            else {

			 
 ///////////////////////////////////////////////////////package check code
			
			     $packag_check=package_check($plan['duration'],$plan['plan_start_date']) ;
				 
		         if($packag_check < $todate){ echo "<li>Your Subscription Plan Ended. Please Renew!</li>" ;
				 
                      $start=$packag_check;
					  
				      } 
				  
				   
									
                        $str="select id from fav_table where user_id='".$_SESSION['user_id']."'  ";

                        $strr=mysql_query($str);
                       $numub=mysql_num_rows($strr);						

									
				
	
 $pagename="fav.php?"; 
if($numub>0)

	{ 
    
	

		$pageentry=15;
	
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

		
	 $sqlb="select * from fav_table where user_id='".$_SESSION['user_id']."'  ";	
	$sqlgb = $sqlb."   LIMIT ".$pagestart.",".$pageentry;

	$sqlub=mysql_query($sqlgb);
   while ($zaw=mysql_fetch_array($sqlub)){
   
   
   
      $xsa=mysql_query("select * from tender where id='".$zaw['tender_id']."' order by last_date DESC ");


	  $custob=mysql_fetch_array($xsa) ;

	
	
					
									?>				
			
 <tr>
			
			 <?php  $encrypted = encryptStringArray($custob['id']); 		
			

			    
			     ?>
			 
			      <td><a href="fav_f.php?<?php echo 'dct&d='.$zaw['id'].'&p='.$url ; ?>"><i  style="color:#f00" class="fa fa-star fa-2x" aria-hidden="true"></i></a></td>
				 

			       <?php    
				   $noti=mysql_query("select id from noti_table where user_id='".$_SESSION['user_id']."' AND tender_id='".$custob['id']."'");
	               $notii=mysql_fetch_array($noti);		
     			 if(!empty($notii)){
			        ?>
			 
			 
				   <td><a href="noti_f.php?<?php echo 'dct&d='.$notii['id'].'&p='.$url  ; ?>"><i style="color:#f00" class="fa fa-bell fa-2x" aria-hidden="true"></i></a></td>
				  <?php  }

                 else {  	?>
			      <td><a href="noti_f.php?<?php echo 'act&u='.$_SESSION['user_id'].'&t='.$custob['id'].'&p='.$url  ; ?>"><i class="fa fa-bell fa-2x" aria-hidden="true"></i></a></td>
			      <?php  }    ?>
			
			
			
			
				<td><?php echo $custob['tender_id']; ?> </td>
				<td><a style="color:#000" href="tender_details.php?tz=<?php echo $encrypted ; ?>"><h4 style="margin: 0px;"><?php echo $custob['c_name']; ?></h4>
					<p><?php echo $custob['tittle']; ?></a></p>
				</td>
				<td><?php echo date('d-m-Y',strtotime($custob['last_date'])); ?></td>
				<td><?php $cur= convertCurrency($custob['price']);if(!empty($cur)) {  echo $cur ; } else { echo "Ref.Document" ; } ?>
				
				
				</td>				
			 </tr>
			 
			 
			 						  
						 <?php     }
                               }  }
                          ?>  			
			 
			 
			</tbody>		
	</table>	
	
	
	
	
	
	
	
	
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
	
	
    </div>	
						
		           
	
		
				</div>			
			</div>		
		</div>   
     </section>
   
	 <?php include_once('footer.php'); ?>
  
  
    <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/main.js"></script>
		<script src="js/slick.min.js" type="text/javascript" ></script>
		 <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
		<script src="./js/slick.js" type="text/javascript" charset="utf-8"></script>  
    
</body>
<!--===================
			body 
		=====================-->

</html>