<?php


include('../admin/include/config.php');
include_once('../admin/include/function.php');
include('../admin/include/mail.php');
include('response.php');

$url="http://tendertm.com/auth/";



$al=mysql_query("select * from sub_plan where status='1'");
while($all=mysql_fetch_array($al))  {
                  $mem=mysql_query("select * from member where email='".$all['member_email']."'");
                  $member=mysql_fetch_array($mem);
		 
		
  $expire_date= package_valid_cron($all['plan_start_date'],$all['duration']) ;

 
     if($expire_date>=$todate)
	 
	 {
	 
		                 $szlb="select * from tender where added_date='".$todate."' AND ";			
					       $sub='';				
	            
             				$cat=explode(",",$all['sub_category']) ; foreach($cat as $key) { 
					 
					         
							 $sub=$sub."sub_category='".$key."' or ";    }
							 
							 $state='';
					     $stat=explode(",",$all['state']) ; foreach($stat as $san) { 
						        
								 $state=$state."state='".$san."' or ";      }
							
                          $subc=rtrim($sub,'or ');
						  $statec=rtrim($state,'or ');
						  
						  
	                $sqlb=$szlb.'('.$subc.') AND ('.$statec.')';
		             
					
					        $fir=mysql_query($sqlb);
							$numb=mysql_num_rows($fir);
							
						
			if($numb>0){
						
/////////////////////mail element//////////////////////////////////

$table='';
$sub='';				
	            
             				 $cat=explode(",",$all['sub_category']) ; foreach($cat as $key) { 
					 
					     
							 $sub=$sub." ".$key.",";    }
							  $subc=rtrim($sub,', ');
							 
							 
							 while($custob=mysql_fetch_array($fir)) { 
							 
						 $city=mysql_query("select * from city where id='".$custob['city']."'"); $cit=mysql_fetch_array($city); $city= $cit['city'];

                         $state=mysql_query("select * from state where id='".$custob['state']."'"); $sta=mysql_fetch_array($state); $state= $sta['statename'];
															
						     $encrypted = encryptStringArray($custob['id']); 	
							 
							 $price= convertCurrency($custob['price']); 
							 
							
							$table=$table.'
								<tbody style="border: 1px solid #000000">	
								  <tr style="background: #edf2f7;border-bottom: 1px solid #969696;">
									<td style="border:none;">
										<table class="table"style="width: 100%;background:transparent;margin-bottom: 0px;">												
												<tbody>
												  <tr>	
                                                     <td style="border:none;">
													    <table class="table"style="width: 100%;background:transparent;margin-bottom: 0px;">												
												        <tbody>
												           <tr>													
													        <td class="tedh" style="border:none;padding:0px; font-size:18px !important; font-weight:bold;color: #000;">'.$custob['c_name'].'</td>
													        <td class="tedh" style="border:none;padding:0px; font-size:18px !important;text-align:right; font-weight:bold;color: #000;">
															'.$city.'- '.$state.'															
															
															</td>  
												          </tr>
												        </tbody>
										              </table>
                                                      </td>													 
													
												  </tr>
                                                  <tr>
										              <td style="border:none;padding: 0px 3px;letter-spacing: 1px;"><strong>TDR </strong>: '.$custob['tender_id'].'</td>
									              </tr>
                                                  <tr>
										            <td style="border:none;padding: 0px 3px;">'. $custob['tittle'] .'</td>
                                                
                                                 </tr>
												 <tr>
										            <td style="border:none;">									  
										              <table class="table sub-sub-table-sub" style="width: 100%;background:transparent;margin-bottom: 0px;">												
												       <tbody>
												           <tr>											
													          <td style="border:none;padding:0px;letter-spacing: 1px;"><strong>Tender Value:  </strong> '.$price.'</td>
													          <td style="border:none;letter-spacing: 1px;"><strong>Due Date: '.date('d-F Y',strtotime($custob['last_date'])).'</strong>  </td>													
													           <td style="border:none;text-align:right;"><a href="'.$url.'ten_details.php?tz='.$encrypted.'" style="color:#000;">View Tender</a></td>
												          </tr>
												        </tbody>
										              </table>									
									                </td>
									             </tr>
									  
												</tbody>
										</table>
									</td>
									
								  </tr>
								 
								</tbody>';
							
							
							
							 }
							 
							 

/////////////////////////////mail element///////////////////////
						
							 
///////////////////////////////mail fire code //////////////////////////////////////////////////////////						     



 $mail->AddAddress($all['member_email']);
	   
         $mail->Subject = $numb.'  New Tenders Date '. date('d F Y',strtotime($todate)).' | Tendertm.com';
         $mail->From  = 'admin@tendertm.com';
         $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                       <html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <!-- title -->
   
    
</head>
<style>

</style>
<body style="background:#86a1b1">

		<section>
				<div class="container">
							<table class="table" style="    width: 100%;">
									
									<tbody>
									  <tr>
										<td><h2 style="padding: 10px;font-size: 18px;line-height: 20px;font-weight: bold;color: #000000;margin: 0px;padding-left: 0px;">Dear '. $member['name'] .'</h2>	</td>										
										<td><h2 style="padding: 10px;font-size: 18px;line-height: 20px;font-weight: bold;color: #000000;margin: 0px;padding-left: 0px;text-align: right;">Tendertm.com </h2>							</td>
									  </tr>
									  
									  <tr>
										<td><p style="padding: 0px; font-size: 13px;line-height: 20px;font-weight: 500; color: #000000;margin: 0px;">'. $member['c_name'] .'</p></td>									
										<td><p style="padding: 0px; font-size: 13px;text-align: right; line-height: 20px;font-weight: 500; color: #000000;margin: 0px;">'. date('d F Y',strtotime($todate)).'</p></td>
									  </tr>
									  <tr>
										<td></td>									
										<td><p style="padding: 0px; font-size: 13px;text-align: right; line-height: 20px;font-weight: 500; color: #000000;margin: 0px;">'. $numb.' New Tenders Related to Your Business</p></td>
									  </tr>
									</tbody>
								  </table>
					
				
					
						
									
				
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							 <table class="table table-bordered text-center" style="    width: 100%;">
								<thead style="background:#0e1123">
								  <tr>
									<th style="text-align:center;color: #fff;padding: 10px 0px;">Query</th>
									<th style="text-align:center;color: #fff;padding: 10px 0px;">No of Tenders Found</th>
									<th style="text-align:center;color: #fff;padding: 10px 0px;">View</th>
								  </tr>
								</thead>
								<tbody>	
								  <tr>
									<td style="text-align:center;color: #000;padding: 10px 0px;">'.$subc.'</td>
									<td style="text-align:center;color: #000;padding: 10px 0px;">'. $numb.'</td>
									<td style="text-align:center;color: #000;padding: 10px 0px;"><a href="#">Click here</a></td>
								  </tr>
								</tbody>
							  </table>
						</div>
									
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							 <table class="table" style="width: 100%;">
								<thead style="background:#0e1123">
								  <tr>
									<th style="text-align:center;color: #fff;padding: 10px 0px;">'.$subc.'('. $numb.')</th>
									
								  </tr>
								</thead>
								
								'.$table.'
								
								
								
							  </table>
						</div>
									
					</div>
					
				
				</div>
		</section>







    <!-------------- slick slider ------------------>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="./js/slick.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/wow.min.js"></script>
    
</body>


</html>';

		
        $mail->Send();
        $mail->ClearAddresses();



	

					
	//////////////////////////////////////////mail fire code end //////////////////////////////////////////////////				             
	            
	
	     }			            
     
			  
	 }

	 
}

// Echo"Thanks <br>";

// echo " Mail Send success to all active Plan Member";





?>