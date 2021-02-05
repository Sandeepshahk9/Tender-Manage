<?php
include('../admin/include/config.php');
 include('../admin/include/mail.php');
include('response.php');




$al=mysql_query("select * from sub_plan where status='1'");
     while($all=mysql_fetch_array($al))  {
                  $mem=mysql_query("select * from member where email='".$all['member_email']."'");
                  $member=mysql_fetch_array($mem);
		 
		
   $expire_date= package_valid_cron($all['plan_start_date'],$all['duration']) ;

   $warning_date= date("Y-m-d", strtotime(" -15 days",strtotime($expire_date))) ;

 
     if($warning_date==$todate){
	
	  

       $mail->AddAddress($all['member_email']);
	   
        $mail->Subject = 'Expired package | Tendertm.com';
        $mail->From  = 'admin@tendertm.com';
        $mail->Body = 'Your Package is going to end , after 15 days. Please reneawal your package .';

		
        $mail->Send();
        $mail->ClearAddresses();

	
	
	
	
	
	}





}



?>