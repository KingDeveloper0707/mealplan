<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SKS Mealplan - Dashboard</title>

        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url(); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template-->
        <link href="<?php echo base_url(); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/sbadmin-2/sb-admin-2.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/mealplan_update/mealplan_update.css" rel="stylesheet">
        <?php if ($this->router->fetch_class() == "start") { ?>
            <?php if ($this->router->fetch_method() == "index") { ?>
                <link id="theme-sheet" href="<?php echo base_url(); ?>vendor/easydropdown/themes/flax.css" rel="stylesheet"/>
            <?php } ?>
        <?php } ?>


    </head>

    <body id="page-top" class="">

        <svg width="0" height="0" class="d-none">

    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36.88 36.88" id="logo">
        <path d="M0 0h17.06v36.88H0zm36.88 36.88H19.81V19.81a17.07 17.07 0 0 1 17.07 17.07M19.81 8.53A8.54 8.54 0 1 0 28.34 0a8.53 8.53 0 0 0-8.53 8.53"></path>
        <path d="M19.81 8.53h8.53v8.53h-8.53z"></path>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="download">
        <path d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 -256 1792 1792" id="angle-up">
        <path d="M1378.729 880.271q0 13-10 23l-50 50q-10 10-23 10t-23-10l-393-393-393 393q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l466 466q10 10 10 23z" fill="currentColor"></path>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 -256 1792 1792" id="angle-down">
        <path d="M1363.542 455.05q0 13-10 23l-466 466q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l393 393 393-393q10-10 23-10t23 10l50 50q10 10 10 23z" fill="currentColor"></path>
    </symbol>

    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35.805 35.805" id="feedback-great">
        <path d="M35.8 17.9A17.9 17.9 0 1 1 17.9 0a17.9 17.9 0 0 1 17.9 17.9" fill="#3dcc79"></path>
        <path d="M14.68 13.606a2.865 2.865 0 1 1-2.864-2.864 2.865 2.865 0 0 1 2.864 2.864m12.174 0a2.865 2.865 0 1 1-2.864-2.864 2.865 2.865 0 0 1 2.864 2.864m1.807 7.27a.626.626 0 0 0-.762.453 10.3 10.3 0 0 1-10 7.763 10.3 10.3 0 0 1-10-7.763.624.624 0 0 0-.28-.385.617.617 0 0 0-.474-.068.627.627 0 0 0-.453.762 11.555 11.555 0 0 0 11.211 8.707 11.555 11.555 0 0 0 11.21-8.707.628.628 0 0 0-.452-.762"></path>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35.805 35.805" id="feedback-good">
        <path d="M35.8 17.9A17.9 17.9 0 1 1 17.9 0a17.9 17.9 0 0 1 17.9 17.9" fill="#bade2a"></path>
        <path d="M14.68 13.606a2.865 2.865 0 1 1-2.864-2.864 2.864 2.864 0 0 1 2.864 2.864m12.174 0a2.864 2.864 0 1 1-2.864-2.864 2.864 2.864 0 0 1 2.864 2.864m1.519 10.089c-5.759 4.365-14.7 4.371-20.8.013a.716.716 0 1 0-.834 1.165 19.612 19.612 0 0 0 11.348 3.52 18.5 18.5 0 0 0 11.152-3.556.717.717 0 1 0-.866-1.142"></path>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35.805 35.805" id="feedback-ok">
        <path d="M35.8 17.9A17.9 17.9 0 1 1 17.9 0a17.9 17.9 0 0 1 17.9 17.9" fill="#ffbe4f"></path>
        <path d="M14.68 13.606a2.865 2.865 0 1 1-2.864-2.864 2.865 2.865 0 0 1 2.864 2.864m12.174 0a2.864 2.864 0 1 1-2.864-2.864 2.864 2.864 0 0 1 2.864 2.864m1.611 9.846H7.34a.716.716 0 1 0 0 1.432h21.125a.716.716 0 0 0 0-1.432"></path>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35.805 35.805" id="feedback-poor">
        <path d="M35.8 17.9A17.9 17.9 0 1 1 17.9 0a17.9 17.9 0 0 1 17.9 17.9" fill="#f9464b"></path>
        <path d="M14.68 13.606a2.864 2.864 0 1 1-2.864-2.864 2.864 2.864 0 0 1 2.864 2.864m12.174 0a2.865 2.865 0 1 1-2.864-2.864 2.865 2.865 0 0 1 2.864 2.864m2.258 14.883a11.57 11.57 0 0 0-22.421 0 .626.626 0 0 0 .453.761.625.625 0 0 0 .762-.453 10.317 10.317 0 0 1 19.992 0 .626.626 0 0 0 .6.473.611.611 0 0 0 .157-.02.627.627 0 0 0 .453-.761"></path>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56 54.118" id="feedback-thankyou">
        <path d="M0 27.059A27.058 27.058 0 0 1 45.224 7a266.36 266.36 0 0 0-4.44 4.608 20.617 20.617 0 1 0 5.735 8.492 750.914 750.914 0 0 0 4.144-6.274A27.06 27.06 0 1 1 0 27.059zm25.036 15.993C23.071 41.745 11.326 29.124 9.7 26.583s4.035-4.331 4.035-4.331c1.819-.8 2.952-.366 3.543.066a2.4 2.4 0 0 1 .342.3l4.631 4.089 3.768 3.658a.629.629 0 0 0 .9-.046c3.245-3.7 23.195-26.112 27.428-28.784 1.5-1.053 1.707-.508 1.633.1a1.386 1.386 0 0 1-.159.671.81.81 0 0 1-.035.091l-.037.1-.014.021c-1.802 4.008-24.75 37.312-24.75 37.312-.22.321-.341.5-.346.5-2.209 2.676-3.328 3.43-4.126 3.43a2.79 2.79 0 0 1-1.477-.708z" fill="#3dcc79"></path>
    </symbol>

    </svg>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
<!--            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>admin">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SKS Admin</div>
            </a>-->
            <a class="sidebar-brand logo d-flex align-items-center justify-content-center" href="<?= base_url() ?>mealplan_update">
                <svg class="icon" width="20" height="20" fill="#f9464b">
                <use xlink:href="#logo"></use>
                </svg>
                <span>KONSCIOUS</span>
            </a>

            <!-- Divider -->
            <!--<hr class="sidebar-divider my-0">-->

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if ($this->router->fetch_method() == "index") echo "active"; ?>">
                <a class="nav-link" href="<?= base_url() ?>mealplan_update">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Meal Plan</span></a>
            </li>
            <li class="nav-item <?php if ($this->router->fetch_method() == "inbox") echo "active"; ?>">
                <a class="nav-link" href="<?= base_url() ?>mealplan_update/inbox">
                    <span class="position-relative">
                        <i class="fas fa-fw fa-envelope"></i>
                        <?php
                        if ($unread_messages_num && $unread_messages_num > 0) {
                            ?>
                            <span class="badge badge-danger badge-counter ml-2"><?= $unread_messages_num; ?></span>
                            <?php
                        }
                        ?>
                    </span>

                    <span>Inbox</span>

                </a>

            </li>

            <li class="nav-item <?php if ($this->router->fetch_method() == "chart") echo "active"; ?>">
                <a class="nav-link" href="<?= base_url() ?>mealplan_update/chart">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Progress Charts</span></a>
            </li>            
            <?php
            if ($upgradable) {
                ?>
                <li class="nav-item <?php if ($this->router->fetch_method() == "upgrade") echo "active"; ?>">
                    <a class="nav-link" href="<?= base_url() ?>mealplan_update/upgrade">
                        <i class="fas fa-fw fa-crown"></i>
                        <span>Upgrade</span></a>
                </li>
                <?php
            }
            ?>
            <li class="nav-item <?php if ($this->router->fetch_method() == "shop") echo "active"; ?>">
                <a class="nav-link" href="<?= base_url() ?>mealplan_update/shop">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Shop</span></a>
            </li>

            <li class="nav-item <?php if ($this->router->fetch_method() == "account") echo "active"; ?>">
                <a class="nav-link" href="<?= base_url() ?>mealplan_update/account">
                    <i class="fas fa-fw fa-user"></i>
                    <span>My Account</span></a>
            </li>

            <!-- Divider -->
            <!--<hr class="sidebar-divider d-none d-md-block">-->

            <!-- Sidebar Toggler (Sidebar) -->
            <!--            <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="sidebarToggle"></button>
                        </div>-->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

