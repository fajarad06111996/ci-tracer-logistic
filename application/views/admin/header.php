<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo $judul; ?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/jte.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
	<!-- Autosize Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/autosize/autosize.js"></script>
	
	<!-- Wait Me Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/waitme/waitMe.css" rel="stylesheet" />
	
	<!-- Multi Select Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/multi-select/css/multi-select.css" rel="stylesheet">
	
	<!-- Bootstrap Select Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
      <!--  <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div> -->
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url('admin/index'); ?>/index.html"><b>JTE TRACER LOGISTIC</b></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                     <!-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li> -->
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                   <!-- <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flight_takeoff</i>
                            <span class="label-count">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFIKASI</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Tasks</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url(); ?>assets/images/jte.png" width="90" height="60" alt="User" />
                </div>
                <div class="info-container">
				<?php 
				if($sebagai == '1'){
					$tampil_sebagai = 'ADMIN'; 
				} 
				if($sebagai == '2'){
					$tampil_sebagai = 'VENDOR'; 
				}
				if($sebagai == '3'){
					$tampil_sebagai = 'COSTUMER'; 
				}
				?>
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b><?php echo $tampil_sebagai; ?></b></div>
                    <div class="email"><?php echo $nama_user; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <!-- <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li role="seperator" class="divider"></li> -->
                            <li><a href="<?php echo base_url("app/logout"); ?>"><i class="material-icons">input</i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <!-- <li class="header">MENU NAVIGATION</li> -->
					<?php if($sebagai == '1' or $sebagai == '2'){ ?>
                    <li class="active">
                        <a href="<?php echo base_url(); ?>admin/index">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
					<?php } ?>
					<?php if($sebagai == '1'){ ?>
					<li>
                        <a href="<?php echo base_url(); ?>admin/data_pengiriman">
                            <i class="material-icons">insert_drive_file</i>
                            <span>Data Pengiriman</span>
                        </a>
                    </li>
					<?php } ?>
					<?php if($sebagai == '1' or $sebagai == '2'){ ?>
					<li>
                        <a href="<?php echo base_url(); ?>admin/log_pengiriman">
                            <i class="material-icons">local_shipping</i>
                            <span>Update Pengiriman</span>
                        </a>
                    </li>
					<?php } ?>
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">payment</i>
                            <span>Invoice</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url('admin/data_invoice'); ?>">Data Invoice</a>
                            </li>
							<li>
                                <a href="<?php echo base_url('admin/laporan_data_invoice'); ?>">Laporan Invoice</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Manifest</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url('admin/data_manifest'); ?>">Data Manifest</a>
                            </li>
							<li>
                                <a href="<?php echo base_url('admin/form_laporan_manifest'); ?>">Laporan Manifest</a>
                            </li>
                        </ul>
                    </li><li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">payment</i>
                            <span>Delivery</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url('admin/data_delevery'); ?>">Data Delivery</a>
                            </li>
                        </ul>
                    </li>
					<?php if($sebagai == '1'){ ?>
					<li>
                        <a href="<?php echo base_url(); ?>admin/form_tracer">
                            <i class="material-icons">format_line_spacing</i>
                            <span>Tracer Pengiriman</span>
                        </a>
                    </li>
					<?php } ?>
					<?php if($sebagai == '1'){ ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Master</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url('admin/master_user'); ?>">Master User</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/master_vendor'); ?>">Master Vendor</a>
                            </li>
							<li>
                                <a href="<?php echo base_url('admin/master_shipper'); ?>">Master Shipper</a>
                            </li>
							<li>
                                <a href="<?php echo base_url('admin/master_consignee'); ?>">Master Consignee</a>
                            </li>
							<li>
                                <a href="<?php echo base_url('admin/master_costumer'); ?>">Master Costumer</a>
                            </li>
							<li>
                                <a href="<?php echo base_url('admin/master_tujuan'); ?>">Master Tujuan</a>
                            </li>
							<li>
                                <a href="<?php echo base_url('admin/master_asal'); ?>">Master Asal</a>
                            </li>
							<li>
                                <a href="<?php echo base_url('admin/master_agen'); ?>">Master Agen</a>
                            </li>
							<li>
                                <a href="<?php echo base_url('admin/master_hpp'); ?>">Master HPP</a>
                            </li>
							<li>
                                <a href="<?php echo base_url('admin/master_tarif'); ?>">Master Tarif</a>
                            </li>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
					<?php if($sebagai == '1'){ ?>
                    <li>
                        <a href="<?php echo base_url('admin/laporan_data_pengiriman'); ?>">
                            <i class="material-icons">local_printshop</i>
                            <span>Laporan Data Pengiriman</span>
                        </a>
                    </li>
					<?php } ?>
                </ul>
			
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date('20y'); ?> <a href="javascript:void(0);">JASA TITIPAN EXPRESS</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 0.1.1
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">Ganti Warna</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>