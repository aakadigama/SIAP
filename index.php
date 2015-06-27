<?php
session_start();
include "connect.php";
include "function.php";
?>
<!DOCTYPE php>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.1.1
Version: 2.0.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->

<!--[if IE 8]> <php lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <php lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <php lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
<meta charset="utf-8" />
<title>SIAP</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
<!-- END PAGE LEVEL PLUGIN STYLES -->

<!-- BEGIN THEME STYLES -->
<link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->

<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body>
<!-- BEGIN STYLE CUSTOMIZER -->
<div class="color-panel hidden-sm">
  <div class="color-mode-icons icon-color"></div>
  <div class="color-mode-icons icon-color-close"></div>
  <div class="color-mode">
    <p>THEME COLOR</p>
    <ul class="inline">
      <li class="color-blue current color-default" data-style="blue"></li>
      <li class="color-red" data-style="red"></li>
      <li class="color-green" data-style="green"></li>
      <li class="color-orange" data-style="orange"></li>
    </ul>
    <label> <span>Header</span>
      <select class="header-option form-control input-small">
        <option value="default" selected>Default</option>
        <option value="fixed">Fixed</option>
      </select>
    </label>
  </div>
</div>
<!-- END BEGIN STYLE CUSTOMIZER --> 

<!-- BEGIN HEADER -->
<div class="header navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header"> 
      <!-- BEGIN RESPONSIVE MENU TOGGLER -->
      <button class="navbar-toggle btn navbar-btn" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <!-- END RESPONSIVE MENU TOGGLER --> 
      <!-- BEGIN LOGO (you can use logo image instead of text)--> 
      <a class="navbar-brand logo-v1" href="?page="> <img src="assets/img/logo.png" id="logoimg" alt=""> </a> 
      <!-- END LOGO --> 
    </div>
    
    <!-- BEGIN TOP NAVIGATION MENU -->
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown active"> <a href="?page="> Beranda </a> </li>
        <li class="dropdown"> <a href="?page=data_alumni"> Data Alumni </a> </li>
		
        <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#"> Informasi <i class="fa fa-angle-down"></i> </a>
          <ul class="dropdown-menu">
            <li><a href='?page=show_loker'>Lowongan Pekerjaan</a></li>            
            <li><a href='?page=show_beasiswa'>Beasiswa</a></li>
            <li><a href='?page=show_event'>Event</a></li>
          </ul>
        </li> 
		
		<?php		
		/*
		if(!empty($_SESSION["kode_alumni"])){
		echo " 
		<li class='dropdown'> <a class='dropdown-toggle' data-toggle='dropdown' data-hover='dropdown' data-delay='0' data-close-others='false' href='#'>Tambah<i class='fa fa-angle-down'></i> </a>
          <ul class='dropdown-menu'>
            <li><a href='?page=show_loker'>Lowongan Pekerjaan</a></li>            
            <li><a href='?page=show_beasiswa'>Beasiswa</a></li>
            <li><a href='?page=show_event'>Event</a></li>
          </ul>
        </li>";
		}
		*/
		?>
        <!-- <li class="dropdown"> <a href="forum.html"> Forum </a> </li> -->
        <li class="dropdown"> <a href="?page=tentang_kami"> Tentang Kami </a> </li>
		
		<?php
		
			if(empty($_SESSION["kode_alumni"])){
				echo " 
				<li class='dropdown'> <a class='dropdown-toggle' data-toggle='dropdown' data-hover='dropdown' data-delay='0' data-close-others='false' href='?page=login_alumni'> Login <i class='fa fa-angle-down'></i> </a>
					<ul class='dropdown-menu'>
						<li><a href='?page=login_alumni'>Sign in</a></li>
						<li><a href='?page=add_alumni'>Register Alumni</a></li>
				  </ul>
				</li>";
			}else{
					$kodealumni = $_SESSION["kode_alumni"];
					$mysqlselect = mysql_query("SELECT `nama` FROM `alumni` WHERE `alumni`.`kode_alumni` = '$kodealumni';")  or die(mysql_error());
					$data=mysql_fetch_array($mysqlselect);
					echo "<li class='dropdown'> <a class='dropdown-toggle' data-toggle='dropdown' data-hover='dropdown' data-delay='0' data-close-others='false' href=''>".$data['nama']."<i class='fa fa-angle-down'></i> </a>
							<ul class='dropdown-menu'>
								<li class='dropdown'><a href='?page=edit_alumni&kode_alumni=$kodealumni'>Edit Profil</a></li>
								<li class='dropdown'><a href='?page=panel_alumni'>Data Informasi</a></li>
								<li class='dropdown'><a href='?page=logout'>Sign Out</a></li>
							</ul>
						 </li>";
						
					}
		
		?>
      </ul>
    </div>
    <!-- BEGIN TOP NAVIGATION MENU --> 
  </div>
</div>
<!-- END HEADER --> 

<!-- BEGIN PAGE CONTAINER -->
<div class="page-container"> 
  
  <!-- BEGIN CONTAINER -->
	<div class="container min-hight"> 
	<?php
		include "connect.php";
		include "page.php";	
	?>

  </div>
  <!-- END CONTAINER --> 
  
</div>
<!-- END BEGIN PAGE CONTAINER --> 

<!-- BEGIN COPYRIGHT -->
<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <p> <span class="margin-right-10">2015 © Program Studi Teknik Informatika, Universitas Paramadina</span> </p>
      </div>
      <div class="col-md-4">
        <ul class="social-footer">
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- END COPYRIGHT --> 

<!-- Load javascripts at bottom, this will reduce page load time --> 
<!-- BEGIN CORE PLUGINS(REQUIRED FOR ALL PAGES) --> 
<!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
    <![endif]--> 
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script> 
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script type="text/javascript" src="assets/plugins/hover-dropdown.js"></script> 
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script> 
<!-- END CORE PLUGINS --> 

<!-- BEGIN PAGE LEVEL JAVASCRIPTS(REQUIRED ONLY FOR CURRENT PAGE) --> 
<script type="text/javascript" src="assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script> 
<script src="assets/scripts/app.js"></script> 
<script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();                      
        });
    </script> 
<!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
