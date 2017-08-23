<!DOCTYPE HTML>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="">
        <meta name="keywords" content="">

        <title><?php echo $page_title; ?> - RENTCARS</title>
        <link rel="icon" type="image/png" href="img/ferrari.ico" />

        <!-- Styles -->
        <link href="ui/css/styles.css" rel="stylesheet" type="text/css">
        <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    </head>
    <body class="<?php echo $body_class; ?>">
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-6">
                        <div class="logo-container">
                            <a href="./" title="Logo RenCars"><img src="ui/img/header/logo2.png" alt="" class="standard-logo"></a>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-6 col-xs-6">
                        <div class="menu-container">
                            <button class="btn-menu hidden-md hidden-lg" id="open-side-menu">MENU <i class="fa fa-bars" aria-hidden="true"></i></button>
                            <?php
                            include ("ui/menu/menu.php");
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        

