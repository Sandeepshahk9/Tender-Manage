<?php  

include_once('include/config.php');
include_once('include/function.php');

////////////////////////////
if(isset($_POST['login']))
{  
	
	$email=$_POST['email'];
	$password=$_POST['password'];
	
        $str=mysql_query("select id ,email from member where email='".$email."' AND password='".$password."' AND status='1'");
		$qry=mysql_fetch_array($str);
		$tre=mysql_num_rows($str);
		if($tre==1) {
		           session_start();
		             $_SESSION['user_id']=$qry['id'];
					  $_SESSION['user_email']=$qry['email'];
	                 echo '<script>location.href="auth/";</script>';
                     } 
	else {
   			echo '<script>location.href="login.php?msg=4";</script>';
    }
	
}

/////////////////


///////////////////////////login

if(isset($_POST['register']))
{  
     if($_POST['password']!=$_POST['cpassword']){
   
     echo "<script>alert('Please enter same password')</script>";
	 echo '<script>location.href="login.php";</script>';	 
	
	}
	
	$str=mysql_query("select email from member where email='".$_POST['email']."'");
    $row=mysql_num_rows($str);
	  if(!empty($row)){
		echo "<script>alert('Email Already Registered')</script>";
	    echo '<script>location.href="login.php";</script>';  
	     }
	
	$data['name']=$_POST['name'];
	$data['number']=$_POST['number'];
	$data['email']=$_POST['email'];
	$data['password']=$_POST['password'];
	$data['deals_in']=$_POST['deals_in'];
	$data['created']=$todate;
	
	$table='member';
	$resState = insert_data($table,$data);
    if($resState['flag'] == 'success') {
		
			echo '<script>location.href="login.php?msg=6";</script>';
    } 
	else {
   			echo '<script>location.href="login.php?msg=7";</script>';
    }
	
}

/////////////////

if(isset($_POST['contactus']))
{  
    
	$data['name']=$_POST['name'];
	$data['number']=$_POST['number'];
	$data['email']=$_POST['email'];
	$data['msg']=$_POST['msg'];
	
	
	$table='enquiry';
	$resState = insert_data($table,$data);
    if($resState['flag'] == 'success') {
		
		    echo "<script>alert('Thank you . We will reply soon')</script>";
			echo '<script>location.href="index.php";</script>';
    } 
	else {
		    echo "<script>alert('Error!')</script>";
   			echo '<script>location.href="contactus.php";</script>';
    }
	
}
//////////////////////////////////////code for tender description pop up///////////

if(isset($_POST['despsubmit'])){



$data['tender_id']=trim($_POST['id']);
$data['name']=trim($_POST['name']);
$data['email']=trim($_POST['email']);
$data['number']=trim($_POST['number']);

$str=mysql_query("select * from tender where id='".$data['tender_id']."'");
 $row=mysql_fetch_array($str);
                                           $state=san_select('state','id',$row['state']);
                                                   $stat=mysql_fetch_array($state);        
                                                  $stat['statename'];
											$strr=san_select('country','id',$row['country']);
                                                   $rowr=mysql_fetch_array($strr);        
                                                  $rowr['country'] ;
												  
$price=  empty($row['price']) ? "Ref. to Document" : convertCurrency($row['price']);
$es_price= empty($row['es_price']) ? "Ref. to Document" :  convertCurrency($row['es_price']);
$emd= empty($row['emd']) ? "Ref. to Document" :  convertCurrency($row['emd']);
$last_date=date('M d, Y', strtotime($row['last_date']));

include_once('admin/include/mail.php');
        $mail->AddAddress( $data['email']);
        $mail->Subject = 'Tender description | Tendertm.com';
        $mail->From  = 'admin@tendertm.com';
        $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <!-- title -->
   
</head>
<style>

</style>
<body>

		<section>
				<div class="container">
							<h1 style="font-size: 23px;color: #0e1123;font-weight: bold;">Name of Work &nbsp; :  &nbsp;'.$row['tittle'].'</h1>
							<h2 style="font-size: 18px;color: #0e1123;"><strong>Location</strong>: '.$stat['statename'].' - '.$rowr['country'].'</h2>						
							<h1 style="    padding: 10px;background: url(../images/striped-bg.png);font-size: 23px;line-height: 20px;font-weight: bold;color: #111;border-bottom: 2px solid #f39137;margin-bottom: 20px;">Tender Information</h1>
						
							<table class="table table-bordered " style="    width: 100%;">								
								<tbody>	
								<tr>
									<td style="color: #000;padding: 10px 0px;font-weight: bold;">Company Name</td>									
									<td style="color: #000;padding: 10px 0px;font-weight: bold;">'.$row['c_name'].'</td>
								  </tr>
								   <tr>
									<td style="color: #000;padding: 10px 0px;font-weight: bold;">Tender No</td>									
									<td style="color: #000;padding: 10px 0px;font-weight: bold;">'.$row['tender_no'].'</td>
								  </tr>
								   <tr>
									<td style="color: #000;padding: 10px 0px;font-weight: bold;">Tender Type</td>									
									<td style="color: #000;padding: 10px 0px;font-weight: bold;">'.$row['category'].' / '.$row['sub_category'].'</td>
								  </tr>
								  <tr>
									<td style="color: #000;padding: 10px 0px;font-weight: bold;">Competition Type</td>									
									<td style="color: #000;padding: 10px 0px;font-weight: bold;">Indian</td>
								  </tr>
								  <tr>
									<td style="color: #000;padding: 10px 0px;font-weight: bold;">Document Fees</td>									
									<td style="color: #000;padding: 10px 0px;font-weight: bold;">'.$es_price.'</td>
								  </tr>
								  <tr>
									<td style="color: #000;padding: 10px 0px;font-weight: bold;">EMD</td>									
									<td style="color: #000;padding: 10px 0px;font-weight: bold;">'.$emd.'</td>
								  </tr>
								  <tr>
									<td style="color: #000;padding: 10px 0px;font-weight: bold;">Tender Value</td>									
									<td style="color: #000;padding: 10px 0px;font-weight: bold;">'.$price.'</td>
								  </tr>
								  
								  
								</tbody>
							  </table>
					
					<h1 style="padding: 10px;background: url(../images/striped-bg.png);font-size: 23px;line-height: 20px;font-weight: bold;color: #111;border-bottom: 2px solid #f39137;margin-bottom: 20px;">Important Dates</h1>
						
					
					<table class="table table-bordered " style="    width: 100%;">								
								<tbody>	
								  <tr>
									<td style="color: #000;padding: 10px 0px;font-weight: bold;">Last Date of Bid Submission</td>									
									<td style="color: #000;padding: 10px 0px;font-weight: bold;">'.$last_date.'</td>
								  </tr>
								 
								  
								</tbody>
							  </table>
					
					
				</div>
		</section>







    <!-------------- slick slider ------------------>
   
    
</body>
<!--===================
			body 
		=====================-->

</html>'; 

if(!empty($row['attachment'])){
$file_to_attach = 'file/'.$row['attachment'];

$mail->AddAttachment($file_to_attach); }

        $mail->Send();
        $mail->ClearAddresses();


$table='desp_form';
	$resState = insert_data($table,$data);
    if($resState['flag'] == 'success') {
		
		    echo "<script>alert('Thanks, Please check Your mail !')</script>";
			echo '<script>location.href="index.php";</script>';
    } 
	

}

/////////////////////////////////////////////////code for tender description pop up///////////






?>