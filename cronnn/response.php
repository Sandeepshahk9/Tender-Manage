<?php



function package_valid_cron($plan_start_date,$duration){
 
  $da= date("Y-m-d", strtotime("+ ".$duration." months", strtotime($plan_start_date))) ;
 
  $package_date= date("Y-m-d", strtotime(" -1 days",strtotime($da))) ;
	
	return $package_date ;
}	





?>