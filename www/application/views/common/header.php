<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE HTML>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="">
        <meta name="keywords" content="">

        <title><?php echo $page_title; ?> - RENTCARS</title>
        <link rel="icon" type="image/png" href="/assets/images/ferrari.ico" />

        <!-- Styles -->
        <link href="/assets/css/styles.css" rel="stylesheet" type="text/css">

        <!-- Scripts -->
        <script src="/assets/js/jquery.min.js" type="text/javascript"></script>
        <script defer src="/assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--<script src='https://www.google.com/recaptcha/api.js' async defer></script>-->
        <script defer src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCa28kbEpTfpVVk2tjWhsZp3VRQh2Z96xI" type="text/javascript"></script>
        <script defer src="/assets/js/gmap.js"></script>
        <script defer src="/assets/js/scripts.js" type="text/javascript"></script>

<!--fichiers de Andriy-->
  <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

    </head>
    <body class="<?php echo $body_class; ?>">
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-6">
                        <div class="logo-container">
                            <a href="./" title="Logo RenCars"><img src="/assets/images/header/logo2.png" alt="" class="standard-logo"></a>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-6 col-xs-6">
                        <div class="menu-container">
                            <button class="btn-menu hidden-md hidden-lg" id="open-side-menu">MENU <i class="fa fa-bars" aria-hidden="true"></i></button>
                            <?php
                            include ("menu.php");
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
