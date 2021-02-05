<?php require('include/config.php'); 
include("include/logincheck.php");
include_once("include/function.php");
if($admina["usertype"]=='admin')
	{
		
///////////////////////////////////////////////////////////////
  if(isset($_REQUEST['upsubmit'])) {
	$table='tender';
	
	if(!empty($_FILES['attachment']['name'])){
		
    $uploadfile ="../file/" . $_FILES['attachment']['name'];
    //PropertyImages/egle_logo.png
    move_uploaded_file($_FILES['attachment']['tmp_name'], $uploadfile);
	$_POST['attachment'] = $_FILES['attachment']['name'];
    
	}	  
		
		
    $resState = update_data($table,$_POST);
    
    if($resState['flag'] == 'success') {
		
	echo '<script>location.href="tender_edit.php?editid='.$_GET['editid'].'&msg=1";</script>';
    } 
	else {
      echo '<div class="alert alert-danger">
              <strong>Error!</strong> '.$resState['msg'].'
            </div>';
    }
  }
////////////////////////////////////////////////////////////////


		
$sqlb="select * FROM tender where id='".$_GET['editid']."'";
$pagename="tender.php?"; 
$tabletb=mysql_query($sqlb);
$getus=mysql_fetch_array($tabletb);

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

<title>Admin Panel : Tender</title>

<?php require('hscript.php'); ?>


<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script>    
         $( function() {
           
            $("#countryid").change(function() {
               var countryid = $(this).val();
               //alert(state_id);
               $.ajax({
                  type:'POST',
                  url:"get_state.php",
                  data:"countryid="+countryid,
                  success:function(result){
                     $("#stateid").html(result);
               }

               });
            });
			
       
		 $("#stateid").change(function() {
               var stateid = $(this).val();
               //alert(state_id);
               $.ajax({
                  type:'POST',
                  url:"get_city.php",
                  data:"stateid="+stateid,
                  success:function(result){
                     $("#cityid").html(result);
               }

               });
            })
         
	});

         $( function() {
           
            $("#categoryid").change(function() {
               var categoryid = $(this).val();
               //alert(state_id);
               $.ajax({
                  type:'POST',
                  url:"get_subc.php",
                  data:"categoryid="+categoryid,
                  success:function(result){
                     $("#sub_categoryid").html(result);
               }

               });
            });
			
       
	});
</script>

</head>

 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="typeahead.js"></script>
	<style>
	.typeahead { border: 2px solid #FFF;border-radius: 4px;padding: 8px 12px;max-width: auto;min-width: auto;background: rgba(66, 52, 52, 0.5);color: #FFF;}
	.tt-menu { width:300px; }
	ul.typeahead{margin:0px;padding:10px 0px;}
	ul.typeahead.dropdown-menu li a {padding: 10px !important;	border-bottom:#CCC 1px solid;color:#FFF;}
	ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
	.bgcolor {max-width: 550px;min-width: 290px;max-height:340px;background:url("world-contries.jpg") no-repeat center center;padding: 100px 10px 130px;border-radius:4px;text-align:center;margin:10px;}
	.demo-label {font-size:1.5em;color: #686868;font-weight: 500;color:#FFF;}
	.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
		text-decoration: none;
		background-color: #1f3f41;
		outline: 0;
	 }
	 </style>	
<body onload="doOnLoad();">

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

<h2 class="heading"> Tender Edit</h2>

</header>

<div class="contents">

<a  href="javascript:history.back();"> <img src="assets/images/goBack.png" class="img-responsive" alt="#" style="float: right; margin-top:-55px;"> </a>

<div class="table-box">

                               <?php 



if($_GET['msg']=='1'){



echo "<div class='alert alert-success'>Updated Successfully</div>";}



elseif($_GET['msg']=='2'){



echo "<div class='alert alert-danger'>Error !!! Please Try Again</div>";}



elseif($_GET['msg']=='3'){



echo "<div class='alert alert-danger'>Number is Already Exist. Please Try New</div>";}







 ?> 

    <form role="form" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $_REQUEST['editid'] ;?>">
	
	
<table class="table">
<thead>
<tr>
<th colspan="2" class="col-md-12"> <ul class="breadcrumb t-breadcrumb-page">

            <li><a href="dashboard.php">Home</a></li>
			 <li><a href="tender.php">Tender list</a></li>
          </ul></th>
		  
</tr>

</thead>

<tbody>

                                                <tr>
                                                   <td class="col-md-4">Category</td>
												   <td class="col-md-8">
												    <select name="category" id="categoryid" class="form-control" required>
                                                      <option value="">Select..</option>
										<?php $arr_cat=select_table_status('category','1','id');
												   while($row=mysql_fetch_array($arr_cat)){ ?>
												   <option value="<?php echo $row['name'];?>" <?php if($getus['category']==$row['name']){?>selected <?php } ?>>
									
												   <?php echo $row['name'];?> </option><?php }?>
												   </select>
                                                     </td>
                                                </tr>

												  <tr>
                                                   <td class="col-md-4">Sub Category</td>
												   <td class="col-md-8">
												    <select name="sub_category" id="sub_categoryid" class="form-control" required>
                                                      <option value="">Select..</option>
									<?php $arr_cat=select_table_status('sub_category','1','id');
												   while($row=mysql_fetch_array($arr_cat)){ ?>
												   <option value="<?php echo $row['name'];?>"<?php if($getus['sub_category']==$row['name']){?>selected <?php } ?>>
												   
												   <?php echo $row['name'];?> </option><?php }?>
												   </select>
                                                     </td>
                                                </tr>
												  
												   <tr>
                                                   <td class="col-md-4">Requirement  Category</td>
												   <td class="col-md-8">
												    <select name="requirement_cat" id="" class="form-control" required>
                                                      <option value="">Select.</option>
												   <option value="Buy"<?php if($getus['requirement_cat']=='Buy'){?>selected <?php } ?>>BUY</option>
												    <option value="Sell"<?php if($getus['requirement_cat']=='Sell'){?>selected <?php } ?>>SELL</option>
												   </select>
                                                     </td>
                                                </tr>
												  
												
												
                                                 <tr>
                                                   <td class="col-md-4">Tender Id</td>
												   <td class="col-md-8">
                                                     <input type="text"  class="form-control" name="tender_id" value="<?php echo $getus['tender_id'] ;?>" readonly>
                                                     </td>
                                                </tr> 
												
												 <tr>
                                                   <td class="col-md-4">Tender Number</td>
												   <td class="col-md-8">
                                                     <input type="text"  class="form-control" name="tender_no" value="<?php echo $getus['tender_no'] ;?>">
                                                     </td>
                                                </tr> 
												
												
                                              <tr>
                                                   <td class="col-md-4">Company Name</td>
												   <td class="col-md-8"><div class="ui-widget">
                                                     <input type="text"  class="form-control" name="c_name" id="c_name" value="<?php echo $getus['c_name']; ?>" required> </div>
                                                     </td>
                                                </tr>
                                                                                       
                                             <tr>
                                                   <td class="col-md-4">Tittle</td>
												   <td class="col-md-8">
                                                     <input type="text" class="form-control" name="tittle" value="<?php echo $getus['tittle']; ?>"required>
                                                     </td>
                                                </tr>
                                            
                                             <tr>
                                                   <td class="col-md-4">Tender Value/Price</td>
												   <td class="col-md-8">
                                                     <input type="number"  class="form-control" name="price" min="0"  value="<?php echo $getus['price']; ?>">
                                                     </td>
                                                </tr>
                                             <tr>
                                                   <td class="col-md-4">Tender Opening Date</td>
												   <td class="col-md-8">
                                                     <input type="date"  class="form-control" name="open_date" value="<?php echo $getus['open_date']; ?>">
                                                     </td>
                                                </tr>
												
                                             <tr>
                                                   <td class="col-md-4">Last Date</td>
												   <td class="col-md-8">
                                                     <input type="date"  class="form-control" name="last_date" value="<?php echo $getus['last_date']; ?>"required>
                                                     </td>
                                                </tr>

                                               <tr>
                                                   <td class="col-md-4">Publish Date</td>
												   <td class="col-md-8">
                                                     <input type="date"  class="form-control" name="pub_date" value="<?php echo $getus['pub_date']; ?>"required>
                                                     </td>
                                                </tr>
												
                                             <tr>
                                                   <td class="col-md-4">Approximate EMD</td>
												   <td class="col-md-8">
                                                     <input type="number" min="0" class="form-control" name="emd" value="<?php echo $getus['emd']; ?>">
                                                     </td>
                                                </tr>
                                            
                                             <tr>
                                                   <td class="col-md-4">Document Fees</td>
												   <td class="col-md-8">
                                                     <input type="text"  class="form-control" name="es_price" value="<?php echo $getus['es_price']; ?>" >
                                                     </td>
                                                </tr>
                                             <tr>
                                                   <td class="col-md-4">Country</td>
												   <td class="col-md-8">
                                                     
													 <select name="country" id="countryid"  class="form-control" required>
												   <option value="">Select..</option>
												   <?php $row=select_table('country','country') ; 
												   while($roww=mysql_fetch_array($row)){?>
												   
												  <option value="<?php echo $roww['id']; ?>" <?php if($roww['id']==$getus['country']){ ?>selected<?php }?>><?php echo $roww['country']; ?></option>
                                                    
												   <?php } ?>
												   </select>
													 
                                                     </td>
                                                </tr>
                                             <tr>
                                                   <td class="col-md-4">State</td>
												   <td class="col-md-8">
                                                    
													<select name="state" id="stateid" class="form-control" required>
												   <option value="">Select..</option>
												   <?php $row=select_table('state','statename') ; 
												   while($roww=mysql_fetch_array($row)){?>
												   
												  <option value="<?php echo $roww['id']; ?>" <?php if($roww['id']==$getus['state']){ ?>selected<?php }?>><?php echo $roww['statename']; ?></option>
                                                    
												   <?php } ?>
												   </select>
												   
                                                     </td>
                                                </tr>
                                             <tr>
                                                   <td class="col-md-4">City</td>
												   <td class="col-md-8">
                                                  
												  <select name="city" id="cityid" class="form-control" required>
												   <option value="">Select..</option>
												   <?php $row=select_table('city','city') ; 
												   while($roww=mysql_fetch_array($row)){?>
												   
												   <option value="<?php echo $roww['id']; ?>" <?php if($roww['id']==$getus['city']){ ?>selected<?php }?>><?php echo $roww['city']; ?></option>
                                                    
												   <?php } ?>
												   </select>
                                                     </td>
                                                </tr>
												<tr>
												  <td class="col-md-4">Attachment file</td>
												  <td class="col-md-8">
                                                <iframe src="http://docs.google.com/gview?url=<?php echo $base_url ; ?>/file/<?php echo $getus['attachment'] ; ?>&embedded=true" 
                                                style="width:700px; height:500px;" frameborder="0"></iframe>
												</td>
												</tr>
												
												 <tr>
											  <td class="col-md-4">Attachment file</td>
                                                   <td class="col-md-8">
												  
                                                      <input type="file" class="form-control" name="attachment">
                                                     </td>
                                                </tr>
												
												
												
                                            <tr>
										   <td class="col-md-4">Attachment file link</td>
                                                   <td class="col-md-8">
                                                      <input type="text" class="form-control" name="attachment_link"value="<?php echo $getus['attachment_link']; ?>">
                                                     </td>
                                                </tr>
												
                                                
                                            
												
                                                <tr>
												<td class="col-md-4"></td>
												<td class="col-md-8"> <br>
												<button type="submit" class="btn btn-primary" name="upsubmit">update</button> </td>
                                                </tr>
												
                                           

                              </tbody>

</table>

</form>

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



<script>
    $(document).ready(function () {
        $('#c_name').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "getCompany.php",
					data: 'q=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>

</body>

</html>

