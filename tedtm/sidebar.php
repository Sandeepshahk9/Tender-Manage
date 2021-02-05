<?php

$head=mysql_query("select * from admin_setting where id='1' AND status='1'");
$headr=mysql_fetch_array($head);

?>


<aside class="sidebar">
  <div class="sidebar-in"> 
    <!-- Sidebar Header Start -->
    <header> 
      <!-- Logo Start -->
      <div class="logo"> <a href="dashboard.php"><img src="../admin/photo/<?php echo $headr['logo']; ?>" alt="" /></a> </div>
      <!-- Logo End --> 
      <!-- Toggle Button Start --> 
      <a href="#" class="togglemenu">&nbsp;</a> 
      <!-- Toggle Button End -->
      <div class="clearfix"></div>
    </header>
    <!-- Sidebar Header End --> 
    <!-- Sidebar Navigation Start -->
    <nav class="navigation">
       <ul class="navi-acc" id="nav2">
        <li> <a href="dashboard.php"><i class="fa fa-tachometer sidebarx"></i><span>Dashboard</span></a> </li>
		<?php    if($admina['adm_set']=='1') { ?>
        <li> <a href="asetting.php"><i class="fa fa-user sidebarx"></i><span>Manage Admin Settings</span></a> </li> 
		
		<?php  }  if($admina['cat']=='1') { ?>
	 <!--  <li> <a href="banner.php"><i class="fa fa-user sidebarx"></i><span>Manage Banners</span></a> </li>  -->
       <li> <a href="categories_list.php"><i class="fa fa-user sidebarx"></i><span>Managed Category </span></a> </li>
	   
     <?php  }  if($admina['com']=='1') {  ?>
        <li> <a href="company.php"><i class="fa fa-user sidebarx"></i><span>Managed Company </span></a> </li>
		
	 <?php  }  if($admina['sub_cat']=='1') { ?>
       <li> <a href="sub_category.php"><i class="fa fa-user sidebarx"></i><span>Manage Subcategory</span></a> </li>

	   <?php  }  if($admina['enq']=='1') { ?>
       <li> <a href="enq.php"><i class="fa fa-user sidebarx"></i><span>Manage Enquiries</span></a> </li>

	   <?php  }  if($admina['faq']=='1') { ?>
      <li> <a href="faq.php"><i class="fa fa-user sidebarx"></i><span>Manage Faq's</span></a> </li>
	   <?php }   if($admina['loc_cou']=='1' || $admina['loc_sta']=='1' || $admina['loc_cit']=='1' ) {  ?>
	  
	  <li class="dropdown custom-dropmenu">
               <a href="#" class=" dropdown-toggle" data-toggle="dropdown" >
               <i class="fa fa-user sidebarx" ></i><span>Manage location's</span><span class="caret"></span>
               </a> 
               <ul class="dropdown-menu">
                 
				 <?php   if($admina['loc_cou']=='1') { ?>
				   <li> <a href="country.php"><i class="fa fa-user sidebarx"></i><span>Manage Country</span></a> </li>
                  
				  <?php  }  if($admina['loc_sta']=='1') { ?>
				  <li> <a href="state.php"><i class="fa fa-user sidebarx"></i><span>Manage State</span></a> </li>
                  
				  <?php  }  if($admina['loc_cit']=='1') { ?>
				  <li> <a href="city.php"><i class="fa fa-user sidebarx"></i><span>Manage City</span></a> </li>
                  <?php  } ?>
                
               </ul>
            </li>
			  
	
	   <?php  }  if($admina['mem']=='1') { ?>
		<li> <a href="members.php"><i class="fa fa-user sidebarx"></i><span>Managed Members</span></a> </li>
		
	 <!--	<li> <a href="#"><i class="fa fa-user sidebarx"></i><span>Manage Newsletters </span></a> </li>
	 
    news.php  <li> <a href="seo.php"><i class="fa fa-user sidebarx"></i><span>Manage SEO</span></a> </li>  -->
	  <?php  }  if($admina['sub_ema']=='1') { ?>
	  <li> <a href="sub_email.php"><i class="fa fa-user sidebarx"></i><span>Manage Subscribed Emails</span></a> </li>
       
	   <?php  }  if($admina['sub_pla']=='1') { ?>
	   <li> <a href="subscription.php"><i class="fa fa-user sidebarx"></i><span>Manage Subscription Plans</span></a> </li>
	   
	   <?php  }  if($admina['sub_pay']=='1') { ?>
	   <li> <a href="payment.php"><i class="fa fa-user sidebarx"></i><span>Manage Subscription Payments</span></a> </li>
		
		  <?php  }  if($admina['pro_ema']=='1') { ?>
		  <li> <a href="promotion.php"><i class="fa fa-user sidebarx"></i><span>Manage  Promotional Emails</span></a> </li>
		
		
		
		<?php  }  if($admina['tes']=='1') { ?>
       <li> <a href="testimonial.php"><i class="fa fa-user sidebarx"></i><span>Manage Testimonials</span></a> </li>

	   <?php  }  if($admina['ten']=='1') { ?>
       <li> <a href="tender.php"><i class="fa fa-user sidebarx"></i><span>Manage Tender</span></a> </li>
		
		<?php  }  if($admina['cms']=='1') { ?>
	   <li> <a href="cms.php"><i class="fa fa-user sidebarx"></i><span>Manage CMS Pages</span></a> </li>
		
		<?php  }  if($admina['sub_adm']=='1') { ?>
	   <li> <a href="sub_admin.php"><i class="fa fa-user sidebarx"></i><span>Manage Sub Admin </span></a> </li>
	   <?php  }    ?>
	     
      </ul>
      <div class="clearfix"></div>
    </nav>
    <!-- Sidebar Navigation End --> 
    <!-- Shadow Start --> 
    <span class="shadows"></span> 
    <!-- Shadow End --> 
  </div>
</aside>
