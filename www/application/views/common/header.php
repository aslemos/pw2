<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// S'assure d'avoir la variable $body_class
$body_class = isset($body_class)
        ? $body_class
        : '';

// S'assure d'avoir la variable $base_url
$base_url = isset($base_url)
        ? $base_url
        : base_url();
?>
<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">

        <title><?php echo $page_title; ?> - RENTCARS</title>
        <link rel="icon" type="image/png" href="<?=$base_url?>assets/images/ferrari.ico" />

        <!-- Styles -->
        <link href="<?=$base_url?>assets/css/styles.css" rel="stylesheet" type="text/css">

        <!-- Scripts -->
        <script src="<?=$base_url?>assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?=$base_url?>assets/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- jQuery UI -->
        <link rel="stylesheet" href="<?=$base_url?>assets/js/jquery/ui/jquery-ui-1.12.1.css">
        <script src="<?=$base_url?>assets/js/jquery/ui/jquery-ui-1.12.1.min.js"></script>

        <!-- Datetimepicker Bootstrap -->
        <script src="<?=$base_url?>assets/js/moment.min.js"></script>
        <!--<link rel="stylesheet" href="<?=$base_url?>assets/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">-->
        <script src="<?=$base_url?>assets/js/bootstrap-datetimepicker.min.js"></script>

        <script>var base_url='<?=$base_url?>';</script>
<?php
        if (isset($styles) && is_array($styles)) { // boucle d'ajout des styles customisés
            foreach ($styles as $pos => $style) {
?>
        <link rel="stylesheet" href="<?=$style?>">
<?php
            }
        }
        if (isset($scripts) && is_array($scripts)) { // boucle d'ajout des scripts customisés
            //var_dump($scripts);
            foreach ($scripts as $pos => $script) {
?>
        <script src="<?=$script?>" type="text/javascript"></script>
<?php
            }
        }

?>
        <script defer src="<?=$base_url?>assets/js/scripts.js" type="text/javascript"></script>
    </head>
    <body class="bg-body <?php echo $body_class; ?>">
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-6">
                        <div class="logo-container">
                            <a href="<?=$base_url?>" title="Logo RentCars"><img src="<?=$base_url?>assets/images/header/logo1.png" alt="" class="standard-logo"></a>
                            <a href="<?=$base_url?>" title="Logo RentCars"><img src="<?=$base_url?>assets/images/header/logo2.png" alt="" class="subpages-logo"></a>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-6 col-xs-6">
                        <div class="menu-container">
                            <button class="btn-menu hidden-md hidden-lg" id="open-side-menu">MENU <i class="fa fa-bars" aria-hidden="true"></i></button>
                            <?php include (VIEWPATH . "common/menu.php");?>
                        </div>
                    </div>
                </div>
                <div class="slogan-container">
                    <img src="<?=$base_url?>assets/images/accueil/slogan_accueil.png" alt="slogan-acceuil" id="logo-accueil">
                </div>
                <div>
                    <p id="defile-link" class="pulse infinite animated"><a href="#pub-home" title="">DÉFILEZ POUR COMMENCER OU CLIQUER ICI</a></p>
                </div>
            </div>
        </header>
        <section id="subpages-hero">
            <div class="container-fluid">
                <img src="<?=$base_url?>assets/images/apropos/slogan_apropos.png" alt="slogan-apropos" id="slogan-apropos">
                <img src="<?=$base_url?>assets/images/voitures/slogan_voiture4.png" alt="slogan-voiture" id="slogan-voiture">
                <img src="<?=$base_url?>assets/images/devenir-membre/slogan_devenir_membre.png" alt="slogan-devenir-membre" id="slogan-devenir-membre">
                <img src="<?=$base_url?>assets/images/membre/slogan_membre.png" alt="slogan-membre" id="slogan-membre">
                <img src="<?=$base_url?>assets/images/contacter-nous/slogan_contacter_nous.png" alt="slogan-contacter-nous" id="slogan-contacter-nous">
            </div>
        </section>

        <div class="container">
            <!-- Flash messages -->
            <?php if ($this->session->flashdata('msg_success')): ?>
                <p class="alert alert-success text-center"><strong><?=$this->session->flashdata('msg_success') ?></strong></p>
            <?php endif; ?>
            <?php if ($this->session->flashdata('msg_error')): ?>
                <p class="alert alert-danger text-center"><strong><?=$this->session->flashdata('msg_error') ?></strong></p>
            <?php endif; ?>

        </div>
        <main id="s" class="container">
