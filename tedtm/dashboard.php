<?php
 require('include/config.php'); 
include("include/logincheck.php");

?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel : Tender </title>
<?php require('hscript.php'); ?>
</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">
	<div class="structure-row">
        <!-- Sidebar Start -->
        <?php  require('sidebar.php'); ?>
        <!-- Sidebar End -->
        <!-- Right Section Start -->
        <div class="right-sec">
            <!-- Right Section Header Start -->
        <?php require('header.php'); ?>    
            <!-- Right Section Header End -->
            <!-- Content Section Start -->
            <div class="content-section">
                <div class="container-liquid"><br>

                   

                         <div class="row">
                         
                         
                         <div class="col-xs-4">
                         <a href="#">   <div class="stat-box colorblue">
                                <i class="fa fa-users"></i>
                                <h4>TEST</h4>
                                
                            </div></a>
                        </div>
                      
                         <div class="col-xs-4">
                         <a href="#">   <div class="stat-box colorblue">
                                <i class="fa fa-cog"></i>
                                <h4>TEST</h4>
                                
                            </div></a>
                        </div>
                       
                        
                       <a href="javascript:void(0);" onClick="location.href='action.php?action=logout';"> <div class="col-xs-3">
                            <div class="stat-box colorblue">
                                 <i class="fa fa-power-off"></i>
                                <h4>Log Out</h4>
                               
                            </div>
                        </div></a>
                        
                        
                        
                        
                        </div>
						
                        <br>

                        <br>

                        <div class="col-xs-6">
                            <div class="sec-box">
                               <!-- <a class="closethis">Close</a>-->
                                <header>
                                    <h2 class="heading">TEST Statistics​​</h2>
                                </header>
                                <div class="contents boxpadding">
                                   <!-- <a class="togglethis">Toggle</a>-->
                                    <div class="charts-box">
                                    	<script type="text/javascript" src="assets/js/raphael-2.1.0.min.js"></script>
										<script type="text/javascript" src="assets/js/morris-0.4.1.min.js"></script>
                                        <div id="displaydigonalbar"></div>
                                        <script>
                                           
                                        
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-xs-6">
                            <div class="sec-box">
                                <!--<a class="closethis">Close</a>-->
                                <header>
                                    <h2 class="heading">TEST</h2>
                                </header>
                                <div class="contents boxpadding" style="min-height: 387px;
margin-bottom: 15px;">
                                    <!--<a class="togglethis">Toggle</a>-->
                                    <div class="linkslist">
                                        <ul>
 
                                           
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                    </div>
                    
                    
                    
                    
                    
                    
                    <!-- Row End -->
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
