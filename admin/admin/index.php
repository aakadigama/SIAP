<?php
session_start();
  if(empty($_SESSION["kode_user"])){	 
		echo"<script>alert('Harap Login Terlebih Dahulu')</script>";
		echo"<script>document.location='login.php'</script>";
	}
	

include "../connect.php";
include "../function.php";
include "database.php";
?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Admin Home Page</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">       
                	<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>             
                    <a class="brand" href="#">Admin Panel</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i>
								
                                <?php 
								/*
								$kodeuser = $_SESSION["kode_user"];
								$mysqlselect = mysql_query("SELECT `nama` FROM `user` WHERE `user`.`kode_user` = '$kodeuser';")  or die(mysql_error());
								$data=mysql_fetch_array($mysqlselect);		
								echo $data['nama'];
								*/
								?> 
                                <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="?page=edit_user">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        
                        <!-- Navigation -->
                         <!--/.nav-collapse -->
                        
                    </div>
                   
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="row-fluid">
            	 <!--Sidebar -->
                <div class="span3" id="sidebar">
                	<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="active">
                            <a href="#"><i class="icon-chevron-right"></i>Registrasi</a>
                        </li>
                        <li>
                            <a href="?page=panel_admin"><span class="badge badge-info pull-right"></span>&nbsp;&nbsp;&nbsp;&nbsp;Admin</a>
                        </li>
<!--						
                         <li>
                            <a href="?page=panel_dosen"><span class="badge badge-important pull-right"></span>&nbsp;&nbsp;&nbsp;&nbsp;Dosen</a>
                        </li>        
						-->
                        <li>
                            <a href="?page=panel_alumni"><span class="badge badge-important pull-right"></span>&nbsp;&nbsp;&nbsp;&nbsp;Alumni</a>
                        </li>
                        
                       
                        <li class="active">
                            <a href="#"><i class="icon-chevron-right"></i>Beasiswa</a>
                        </li>
                         <li>
                            <a href="?page=add_beasiswa"><span class="badge badge-info pull-right"></span>&nbsp;&nbsp;&nbsp;&nbsp;Create New Beasiswa</a>
                        </li>
                         <li>
                            <a href="?page=panel_beasiswa"><span class="badge badge-info pull-right"></span>&nbsp;&nbsp;&nbsp;&nbsp;View Data</a>
                        </li>
                         <li class="active">
                            <a href="#"><i class="icon-chevron-right"></i>Lowongan Kerja</a>
                        </li>
                          <li>
                            <a href="?page=add_loker"><span class="badge badge-info pull-right"></span>&nbsp;&nbsp;&nbsp;&nbsp;Create New Lowongan</a>
                        </li>
                         <li>
                            <a href="?page=panel_loker"><span class="badge badge-info pull-right"></span>&nbsp;&nbsp;&nbsp;&nbsp;View Data</a>
                        </li>
                         <li class="active">
                            <a href="?page=panel_event"><i class="icon-chevron-right"></i>Event</a>
                        </li>   
                         <li>
                            <a href="?page=add_event"><span class="badge badge-info pull-right"></span>&nbsp;&nbsp;&nbsp;&nbsp;Create New Event</a>
                        </li>
                         <li>
                            <a href="?page=panel_event"><span class="badge badge-info pull-right"></span>&nbsp;&nbsp;&nbsp;&nbsp;View Data</a>
                        </li>
                    </ul>
                </div>
                 <!--/Sidebar -->
                
                <!--content-->
                <div class="span9" id="content">
                    <div class="row-fluid">                        
                           <?php                     
					  			include "msg.php";	
						 	?>                                      	
                    </div>                    
                    <div class="row-fluid">
                         <?php                     
					  		include "form/page.php";	
						 ?>
                    </div>                                                   
                </div>
                 <!-- /content -->
                 
            </div>
            </div>
            
            
            <hr>
            <footer align="center"><br><br>
                <p>&copy; Angga Tika Evrieta</p>
            </footer>
        </div>
        
       <!--/.fluid-container-->
        <link href="vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="vendors/chosen.min.css" rel="stylesheet" media="screen">

        <link href="vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

        <script src="vendors/jquery-1.9.1.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/jquery.uniform.min.js"></script>
        <script src="vendors/chosen.jquery.min.js"></script>
        <script src="vendors/bootstrap-datepicker.js"></script>

        <script src="vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
        <script src="vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

        <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>


        <script src="assets/scripts.js"></script>
        <script>
        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>  
    </body>

</html>