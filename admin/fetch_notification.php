
<?php 

require('include/config.php'); 
include("include/logincheck.php");
if($admina["usertype"]=='admin')
	{
	
	}
	else
	{
  header("Location:index.php?msg=Please Login First.");
		
	}

if(isset($_POST["view"]))
{

 if($_POST["view"] != '')
 {
  
 }
 $query = "SELECT * FROM service_form  WHERE status=1 ORDER BY id DESC ";
 $result = mysql_query($query);
 $output = '';
 
 if(mysql_num_rows($result) > 0)
 {
  while($row = mysql_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="viewlead.php?leadid='.$row["id"].'">
     <strong>'.$row["services"].'</strong><br />
     <small><em>'.$row["get_started"].'</em></small>
	 <small><em>'.$row["address"].$row["city"].$row["state"].'</em></small>
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM service_form WHERE status=1";
 $result_1 = mysql_query($query_1);
 $count = mysql_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>