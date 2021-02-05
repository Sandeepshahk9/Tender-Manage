<?php 
include_once('include/config.php');
include_once('include/function.php');
include('include/mail.php');

 if (isset($_POST['sendall'])) {
	
   $max_num=$_POST['max_num'];
	
	
     for($i=0; $i < $max_num; $i++)
     {
       
	  $emailaddress=$_POST['emails'.$i];
	   
	   
	   ////////////////////////////////////////////////////////////////////////////////
	   
	   $table='';
	    $max_number=count($_POST['salln']);
	 
	  for($j=0; $j < $max_number; $j++)
       {
		 
		
		 $tenderid= $_POST['salln'][$j] ;
		
		
		             $fir=mysql_query("select * from tender where sub_category='".$tenderid."' AND last_date>='".$todate."'");
		
		              while($custob=mysql_fetch_array($fir)) { 
							 
						 $city=mysql_query("select * from city where id='".$custob['city']."'"); $cit=mysql_fetch_array($city); $city= $cit['city'];

                         $state=mysql_query("select * from state where id='".$custob['state']."'"); $sta=mysql_fetch_array($state); $state= $sta['statename'];
															
						    
							 $seo = generateSeoURL($custob['tittle']);
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
													           <td style="border:none;text-align:right;"><a  href="https://tendertm.com/Tender/'.$custob['id'].'/'.$seo.'" style="color:#000;">View Tender</a></td>
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
		
	 
	  }
	   ///////////////////////////////////////////////////////////////////////////////////
	   					
							 
///////////////////////////////mail fire code //////////////////////////////////////////////////////////						     



         $mail->AddAddress($emailaddress);
	   
         $mail->Subject ='Tendertm.com';
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
					
					
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							 <table class="table" style="width: 100%;">
								
								
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
	
	
	       echo "<script>alert('Sent successfully !')</script>";
	    	echo '<script>location.href="promotion.php";</script>';
     
	
	
   }




   



?>
