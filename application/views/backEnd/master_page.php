<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php
            if (isset($title))
                echo $title;
            else
                echo "Admin Panel"
            ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/switch/rzroky_switch.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/rzrokymy.css">
        <style>
            .flexContainer {
            display: flex;
            }
            .inputField {
            flex: 1;
            }
        </style>
        <?php if (!empty($page_styles_css)): ?>
        <?php foreach ($page_styles_css as $href): ?>
        <?php echo link_tag($href); ?>
        <?php endforeach; ?>
        <?php endif; ?>
        <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            var base_url = '<?php echo base_url() ?>';
        </script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
        <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/ckeditor.js"></script>
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/gallery/app/scripts/main.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/gallery/app/scripts/repo/gallery.js"></script>
        <link href="<?php echo base_url(); ?>assets/gallery/dist/styles/__main.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/morris/morris.css">
    </head>
    <body class="hold-transition skin-blue sidebar-mini" <?php if ($this->session->flashdata('message')) echo "onload='setTimeout(snackbar_function, 100)';" ?>  >
        <div id="snackbar"><?php echo $this->session->flashdata('message'); ?></div>
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo base_url(); ?>" class="logo">
                    <span class="logo-mini"><b>MGA</b></span>
                    <span class="logo-lg"><b>MGA</b></span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url() . $_SESSION['userPhoto']; ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"> <?php echo $_SESSION['username_first']; ?> </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src=" <?php echo base_url() . $_SESSION['userPhoto']; ?> " class="img-circle" alt="User Image">
                                        <p>
                                            <?php echo $_SESSION['username_first'] . "   " . $_SESSION['username_last']; ?>
                                            <small> <?php echo $_SESSION['userType']; ?> </small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo base_url() . $_SESSION['userType']; ?>/profile" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo base_url('login/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src=" <?php echo base_url() . $_SESSION['userPhoto']; ?> " class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p> <?php echo $_SESSION['username']; ?> </p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div> 
                    <ul class="sidebar-menu">
                        <li class="header"> <?php echo $this->lang->line("main_navigation"); ?> </li>
                        <li class="treeview <?php if ($activeMenu === "dashboard_view") echo "active"; ?> ">
                            <a href="<?php echo base_url('login'); ?>">
                            <i class="fa fa-dashboard"></i> <span> <?php echo $this->lang->line("dashboard"); ?> </span>
                            <span class="pull-right-container">
                            </span>
                            </a>
                        </li>
                        
                        <!-- Admin Part Start -->
                        <?php if ($_SESSION['userType'] === 'admin') : ?>

                        <!-- user -->
                        <li class="treeview <?php if ($activeMenu === "user_list" || $activeMenu === "add_user" || $activeMenu === "user_edit") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-users"></i> <span> <?php echo $this->lang->line("manage_user"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "add_user") echo "active"; ?> "><a href="<?php echo base_url('admin/add_user'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("add_user"); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "user_list") echo "active"; ?> "><a href="<?php echo base_url('admin/user_list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("user_list"); ?> </a></li>
                            </ul>
                        </li>

                        <!--Clients -->
                        <li class="treeview <?php if ($activeMenu === "client_add" || $activeMenu === "client_list" || $activeMenu === "client_edit") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-users"></i> <span> <?php echo $this->lang->line('client'); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "client_add") echo "active"; ?> "><a href="<?php echo base_url('admin/client/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('client_add'); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "client_list") echo "active"; ?> "><a href="<?php echo base_url('admin/client/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('client_list'); ?> </a></li>
                            </ul>
                        </li>

                        <!-- mga service Station -->
                        <li class="treeview <?php if ($activeMenu === "mga_station_add" || $activeMenu === "mga_station_list" || $activeMenu === "mga_station_edit") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-industry"></i> <span> <?php echo $this->lang->line('mga_station'); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "mga_station_add") echo "active"; ?> "><a href="<?php echo base_url('admin/mga-service-station/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('mga_station_add'); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "mga_station_list") echo "active"; ?> "><a href="<?php echo base_url('admin/mga-service-station/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('mga_station_list'); ?> </a></li>
                            </ul>
                        </li>

                       
                        <!--Mga Service Registration -->
                        <li class="treeview <?php if ($activeMenu === "mga_service_registration_add" || $activeMenu === "mga_service_registration_list" || $activeMenu === "mga_service_registration_edit" || $activeMenu === "mga_registration_invoice") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-pencil-square-o"></i> <span> <?php echo $this->lang->line('service_registration'); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "mga_service_registration_add") echo "active"; ?> "><a href="<?php echo base_url('admin/mga-service-registration/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('service_registration_add'); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "mga_service_registration_list") echo "active"; ?> "><a href="<?php echo base_url('admin/mga-service-registration/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('service_registration_list'); ?> </a></li>
                            </ul>
                        </li>

                        <!-- Lounge Service Station -->
                        <li class="treeview <?php if ($activeMenu === "lounge_station_add" || $activeMenu === "lounge_station_list" || $activeMenu === "lounge_station_edit") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-industry"></i> <span> <?php echo $this->lang->line("lounge_station"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "lounge_station_add") echo "active"; ?> "><a href="<?php echo base_url('admin/lounge-service-station/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("lounge_station_add"); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "lounge_station_list") echo "active"; ?> "><a href="<?php echo base_url('admin/lounge-service-station/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("lounge_station_list"); ?> </a></li>
                            </ul>
                        </li>

                        <!-- Lounge Service Registration -->
                        <li class="treeview <?php if ($activeMenu === "lounge_registration_add" || $activeMenu === "lounge_registration_list" || $activeMenu === "lounge_registration_edit" || $activeMenu === "lounge_registration_invoice") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-pencil-square-o"></i> <span> <?php echo $this->lang->line("lounge_registration"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "lounge_registration_add") echo "active"; ?> "><a href="<?php echo base_url('admin/lounge-service-registration/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("lounge_registration_add"); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "lounge_registration_list") echo "active"; ?> "><a href="<?php echo base_url('admin/lounge-service-registration/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("lounge_registration_list"); ?> </a></li>
                            </ul>
                        </li>

                        <!-- Shuttle Service Station -->
                        <li class="treeview <?php if ($activeMenu === "shuttle_station_add" || $activeMenu === "shuttle_station_list" || $activeMenu === "shuttle_station_edit") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-industry"></i> <span> <?php echo $this->lang->line("shuttle_station"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "shuttle_station_add") echo "active"; ?> "><a href="<?php echo base_url('admin/shuttle-service-station/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("shuttle_station_add"); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "shuttle_station_list") echo "active"; ?> "><a href="<?php echo base_url('admin/shuttle-service-station/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("shuttle_station_list"); ?> </a></li>
                            </ul>
                        </li>

                        <!-- Shuttle Service Registration -->
                        <li class="treeview <?php if ($activeMenu === "shuttle_registration_add" || $activeMenu === "shuttle_registration_list" || $activeMenu === "shuttle_registration_edit" || $activeMenu === "shuttle_registration_invoice") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-pencil-square-o"></i> <span> <?php echo $this->lang->line("shuttle_registration"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "shuttle_registration_add") echo "active"; ?> "><a href="<?php echo base_url('admin/shuttle-service-registration/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("shuttle_registration_add"); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "shuttle_registration_list") echo "active"; ?> "><a href="<?php echo base_url('admin/shuttle-service-registration/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("shuttle_registration_list"); ?> </a></li>
                            </ul>
                        </li>

                        <!-- Airmail Service Station -->
                        <li class="treeview <?php if ($activeMenu === "airmail_station_add" || $activeMenu === "airmail_station_list" || $activeMenu === "airmail_station_edit" ) echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-industry"></i> <span> <?php echo $this->lang->line("airmail_station"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "airmail_station_add") echo "active"; ?> "><a href="<?php echo base_url('admin/airmail-service-station/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("airmail_station_add"); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "airmail_station_list") echo "active"; ?> "><a href="<?php echo base_url('admin/airmail-service-station/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("airmail_station_list"); ?> </a></li>
                            </ul>
                        </li>

                        <!-- Airmail Service Registration -->
                        <li class="treeview <?php if ($activeMenu === "airmail_registration_add" || $activeMenu === "airmail_registration_list" || $activeMenu === "airmail_registration_edit" || $activeMenu === "airmail_registration_invoice") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-pencil-square-o"></i> <span> <?php echo $this->lang->line("airmail_registration"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "airmail_registration_add") echo "active"; ?> "><a href="<?php echo base_url('admin/airmail-service-registration/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("airmail_registration_add"); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "airmail_registration_list") echo "active"; ?> "><a href="<?php echo base_url('admin/airmail-service-registration/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("airmail_registration_list"); ?> </a></li>
                            </ul>
                        </li>
                        
                        <!-- Invoice -->
                        <li class="treeview <?php if ($activeMenu === "invoice_add" || $activeMenu === "invoice_list" || $activeMenu === "invoice_view") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-pencil-square-o"></i> <span> <?php echo $this->lang->line("invoice"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "invoice_add") echo "active"; ?> "><a href="<?php echo base_url('admin/invoice/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("invoice_add"); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "invoice_list") echo "active"; ?> "><a href="<?php echo base_url('admin/invoice/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("invoice_list"); ?> </a></li>
                            </ul>
                        </li>

                        <!-- Report -->
                        <li class="treeview <?php if ($activeMenu === "seles_report" ) echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-pencil-square-o"></i> <span> <?php echo $this->lang->line("report"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "seles_report") echo "active"; ?> "><a href="<?php echo base_url('admin/seles-report/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("seles_report"); ?> </a></li>
                            </ul>
                        </li>
                       
                        <?php endif; ?>  
                        <!-- Admin Part End -->


                        <!-- Agent Part Start -->
                        <?php if ($_SESSION['userType'] === 'agent') : ?>

                         <!-- Airmail Service Registration -->
                         <li class="treeview <?php if ($activeMenu === "airmail_registration_add" || $activeMenu === "airmail_registration_list" || $activeMenu === "airmail_registration_edit" || $activeMenu === "airmail_registration_invoice") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-plane"></i> <span> <?php echo $this->lang->line("airmail_registration"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "airmail_registration_add") echo "active"; ?> "><a href="<?php echo base_url('agent/airmail-service-registration/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("airmail_registration_add"); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "airmail_registration_list") echo "active"; ?> "><a href="<?php echo base_url('agent/airmail-service-registration/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("airmail_registration_list"); ?> </a></li>
                            </ul>
                        </li>

                         <!-- Lounge Service Registration -->
                         <li class="treeview <?php if ($activeMenu === "lounge_registration_add" || $activeMenu === "lounge_registration_list" || $activeMenu === "lounge_registration_edit" || $activeMenu === "lounge_registration_invoice") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-home"></i> <span> <?php echo $this->lang->line("lounge_registration"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "lounge_registration_add") echo "active"; ?> "><a href="<?php echo base_url('agent/lounge-service-registration/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("lounge_registration_add"); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "lounge_registration_list") echo "active"; ?> "><a href="<?php echo base_url('agent/lounge-service-registration/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("lounge_registration_list"); ?> </a></li>
                            </ul>
                        </li>

                        <!--Mga Service Registration -->
                        <li class="treeview <?php if ($activeMenu === "mga_service_registration_add" || $activeMenu === "mga_service_registration_list" || $activeMenu === "mga_service_registration_edit" || $activeMenu === "mga_registration_invoice") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-hand-stop-o"></i> <span> <?php echo $this->lang->line('service_registration'); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "mga_service_registration_add") echo "active"; ?> "><a href="<?php echo base_url('agent/mga-service-registration/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('service_registration_add'); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "mga_service_registration_list") echo "active"; ?> "><a href="<?php echo base_url('agent/mga-service-registration/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('service_registration_list'); ?> </a></li>
                            </ul>
                        </li>

                         <!-- Shuttle Service Registration -->
                         <li class="treeview <?php if ($activeMenu === "shuttle_registration_add" || $activeMenu === "shuttle_registration_list" || $activeMenu === "shuttle_registration_edit" || $activeMenu === "shuttle_registration_invoice") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-car"></i> <span> <?php echo $this->lang->line("shuttle_registration"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "shuttle_registration_add") echo "active"; ?> "><a href="<?php echo base_url('agent/shuttle-service-registration/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("shuttle_registration_add"); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "shuttle_registration_list") echo "active"; ?> "><a href="<?php echo base_url('agent/shuttle-service-registration/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("shuttle_registration_list"); ?> </a></li>
                            </ul>
                        </li>

                         <!--Clients -->
                         <li class="treeview <?php if ($activeMenu === "client_add" || $activeMenu === "client_list" || $activeMenu === "client_edit") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-users"></i> <span> <?php echo $this->lang->line('client'); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "client_add") echo "active"; ?> "><a href="<?php echo base_url('agent/client/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('client_add'); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "client_list") echo "active"; ?> "><a href="<?php echo base_url('agent/client/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('client_list'); ?> </a></li>
                            </ul>
                        </li>

                        <!-- Invoice -->
                        <li class="treeview <?php if ($activeMenu === "invoice_add" || $activeMenu === "invoice_list" || $activeMenu === "invoice_view") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-pencil-square-o"></i> <span> <?php echo $this->lang->line("invoice"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "invoice_add") echo "active"; ?> "><a href="<?php echo base_url('agent/invoice/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("invoice_add"); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "invoice_list") echo "active"; ?> "><a href="<?php echo base_url('agent/invoice/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("invoice_list"); ?> </a></li>
                            </ul>
                        </li>

                        <!-- Report -->
                        <li class="treeview <?php if ($activeMenu === "seles_report" ) echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-pencil-square-o"></i> <span> <?php echo $this->lang->line("report"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "seles_report") echo "active"; ?> "><a href="<?php echo base_url('agent/seles-report/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("seles_report"); ?> </a></li>
                            </ul>
                        </li>

                        <?php endif; ?>
                        <!-- Agent Part End -->

                        <!-- User Part Start -->
                        <?php if ($_SESSION['userType'] === 'user') : ?>

                         <!-- Airmail Service Registration -->
                         <li class="treeview <?php if ($activeMenu === "airmail_registration_add" || $activeMenu === "airmail_registration_list" || $activeMenu === "airmail_registration_edit" || $activeMenu === "airmail_registration_invoice") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-plane"></i> <span> <?php echo $this->lang->line("airmail_registration"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "airmail_registration_add") echo "active"; ?> "><a href="<?php echo base_url('user/airmail-service-registration/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("airmail_registration_add"); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "airmail_registration_list") echo "active"; ?> "><a href="<?php echo base_url('user/airmail-service-registration/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("airmail_registration_list"); ?> </a></li>
                            </ul>
                        </li>

                         <!-- Lounge Service Registration -->
                         <li class="treeview <?php if ($activeMenu === "lounge_registration_add" || $activeMenu === "lounge_registration_list" || $activeMenu === "lounge_registration_edit" || $activeMenu === "lounge_registration_invoice") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-home"></i> <span> <?php echo $this->lang->line("lounge_registration"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "lounge_registration_add") echo "active"; ?> "><a href="<?php echo base_url('user/lounge-service-registration/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("lounge_registration_add"); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "lounge_registration_list") echo "active"; ?> "><a href="<?php echo base_url('user/lounge-service-registration/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("lounge_registration_list"); ?> </a></li>
                            </ul>
                        </li>

                        <!--Mga Service Registration -->
                        <li class="treeview <?php if ($activeMenu === "mga_service_registration_add" || $activeMenu === "mga_service_registration_list" || $activeMenu === "mga_service_registration_edit" || $activeMenu === "mga_registration_invoice") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-hand-stop-o"></i> <span> <?php echo $this->lang->line('service_registration'); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "mga_service_registration_add") echo "active"; ?> "><a href="<?php echo base_url('user/mga-service-registration/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('service_registration_add'); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "mga_service_registration_list") echo "active"; ?> "><a href="<?php echo base_url('user/mga-service-registration/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('service_registration_list'); ?> </a></li>
                            </ul>
                        </li>

                         <!-- Shuttle Service Registration -->
                         <li class="treeview <?php if ($activeMenu === "shuttle_registration_add" || $activeMenu === "shuttle_registration_list" || $activeMenu === "shuttle_registration_edit" || $activeMenu === "shuttle_registration_invoice") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-car"></i> <span> <?php echo $this->lang->line("shuttle_registration"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "shuttle_registration_add") echo "active"; ?> "><a href="<?php echo base_url('user/shuttle-service-registration/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("shuttle_registration_add"); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "shuttle_registration_list") echo "active"; ?> "><a href="<?php echo base_url('user/shuttle-service-registration/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("shuttle_registration_list"); ?> </a></li>
                            </ul>
                        </li>

                         <!--Clients -->
                         <li class="treeview <?php if ($activeMenu === "client_add" || $activeMenu === "client_list" || $activeMenu === "client_edit") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-users"></i> <span> <?php echo $this->lang->line('client'); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "client_add") echo "active"; ?> "><a href="<?php echo base_url('user/client/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('client_add'); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "client_list") echo "active"; ?> "><a href="<?php echo base_url('user/client/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('client_list'); ?> </a></li>
                            </ul>
                        </li>

                        <!-- Invoice -->
                        <li class="treeview <?php if ($activeMenu === "invoice_add" || $activeMenu === "invoice_list" || $activeMenu === "invoice_view") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-pencil-square-o"></i> <span> <?php echo $this->lang->line("invoice"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "invoice_add") echo "active"; ?> "><a href="<?php echo base_url('user/invoice/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("invoice_add"); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "invoice_list") echo "active"; ?> "><a href="<?php echo base_url('user/invoice/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("invoice_list"); ?> </a></li>
                            </ul>
                        </li>

                        <!-- Report -->
                        <li class="treeview <?php if ($activeMenu === "seles_report" ) echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-pencil-square-o"></i> <span> <?php echo $this->lang->line("report"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "seles_report") echo "active"; ?> "><a href="<?php echo base_url('user/seles-report/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("seles_report"); ?> </a></li>
                            </ul>
                        </li>

                        <?php endif; ?>
                        <!-- User Part End -->

                    </ul>
                </section>
            </aside>
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Version 1.0</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="">Dashboard</li>
                    </ol>
                </section>
                <?php
                    if (isset($page)) {
                        $this->load->view($page);
                    }
                    ?>
            </div>
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0.
                </div>
                
            </footer>
            <aside class="control-sidebar control-sidebar-dark">
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                    
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Change Language</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="<?php echo base_url("login/lang_set/bangla"); ?>">
                                    <i class="menu-icon fa fa-user bg-yellow"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Bangla</h4>
                                        <p>বাংলাতে দেখতে এখানে ক্লিক করুন</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("login/lang_set/english"); ?>">
                                    <i class="menu-icon fa fa-file-code-o bg-green"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">English</h4>
                                        <p>Click to view in English</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
           
            <div class="control-sidebar-bg"></div>
        </div>
        
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard2.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <script>
            $(".select2").select2();
            function snackbar_function() {
                var x = document.getElementById("snackbar")
                x.className = "show";
                setTimeout(function () {
                    x.className = x.className.replace("show", "");
                }, 3000);
            }
            
        </script>       
    </body>
</html>

