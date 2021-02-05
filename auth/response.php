<?php 

include_once('../admin/include/config.php');
include_once('../admin/include/function.php');



 $plan=mysql_query("select * from sub_plan where member_email='".$custob['email']."' ");
 $plan=mysql_fetch_array($plan);	
 

 ////////////////package duration check ///////////////
 function package_check($duration,$plan_start_date){
 
  $da= date("Y-m-d", strtotime("+ ".$duration." months", strtotime($plan_start_date))) ;
 
  $package_date= date("Y-m-d", strtotime(" -1 days",strtotime($da))) ;
	
	return $package_date ;
}	
	
///////////////////////////////////////////

/////////////////////////////////////////////////////////////////
function check_status(){

$pla=mysql_query("select status from sub_plan where member_email='".$_SESSION['user_email']."' ");
$pla=mysql_fetch_array($pla);	
   if($pla['status']==1){
     
	     $str="yes";
     	 return $str ;
  }
  else {
         $str="no";
     	 return $str ;
  }
 }
 /////////////////////////////////////////////
 
function total_tender($sub_category,$state,$added_date) {

$str=mysql_query("select id from from tender where sub_category='".$sub_category."' 
                   AND state='".$state."' AND added_date='".$added_date."'");


}
 
/////////////////////////////////////////////tender fetch




 
 
 
 
?>