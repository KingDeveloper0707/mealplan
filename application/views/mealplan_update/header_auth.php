<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="X-UA-Compatible" content="IE=11" />

        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?php echo base_url(); ?>assets/favicon/site.webmanifest">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <meta name="format-detection" content="telephone=no">

        <title>SimpleKetoSystem - Mealplan</title>

        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url(); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template-->
        <link href="<?php echo base_url(); ?>assets/css/sbadmin-2/sb-admin-2.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/mealplan_update/mealplan_update.css" rel="stylesheet">

    </head>

    <body class="bg-white">

        <svg width="0" height="0" class="d-none">
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36.88 36.88" id="logo">
        <path d="M0 0h17.06v36.88H0zm36.88 36.88H19.81V19.81a17.07 17.07 0 0 1 17.07 17.07M19.81 8.53A8.54 8.54 0 1 0 28.34 0a8.53 8.53 0 0 0-8.53 8.53"></path>
        <path d="M19.81 8.53h8.53v8.53h-8.53z"></path>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.968 511.968" stroke="#FFA200" fill="#F64850" id="close">
        <path d="M511.968 24.072l-10.992-11.584-244.992 232.48L10.992 12.488 0 24.072l244.368 231.904L0 487.88l10.992 11.6L255.984 267l244.992 232.48 10.992-11.6L267.6 255.976z"></path>
    </symbol>
    </svg>

    <nav class="navbar navbar-expand-lg navbar-light position-absolute py-3 w-100" id="mainNav">
        <div class="container-fluid">
            <div class="row w-100">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between">
                        <a class="navbar-brand js-scroll-trigger logo logo-gray" href="#page-top">
                            <svg class="icon" width="20" height="20" fill="#8D8D94">
                            <use xlink:href="#logo"></use>
                            </svg>
                            <span>KONSCIOUS</span>
                        </a>
                        <?php if ($this->router->fetch_class() == "signup") { ?>            
                            <p class="mb-0">Already have an account? <a href="login<?php echo $this->input->get('uid') ? "?uid=".$this->input->get('uid') : ""; ?>">Sign in</a></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <header class="masthead d-flex">

    <div class="container my-auto">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-7 col-md-8">

                <div class="card o-hidden border-0 mb-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-md-5">