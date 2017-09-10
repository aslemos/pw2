<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">

        <title><?php echo $page_title; ?> - RENTCARS</title>
        <link rel="icon" type="<?=$base_url?>image/png" href="/assets/images/ferrari.ico" />

        <!-- Styles -->
        <link href="<?=$base_url?>assets/css/styles.css" rel="stylesheet" type="text/css">

        <!-- Scripts -->
        <script src="<?=$base_url?>assets/js/jquery.min.js" type="text/javascript"></script>
        <script defer src="<?=$base_url?>assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--<script src='https://www.google.com/recaptcha/api.js' async defer></script>-->
        <script defer src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCa28kbEpTfpVVk2tjWhsZp3VRQh2Z96xI" type="text/javascript"></script>
        <script defer src="<?=$base_url?>assets/js/gmap.js"></script>
        <script defer src="<?=$base_url?>assets/js/scripts.js" type="text/javascript"></script>

        <!--fichiers de Andriy-->
        <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>

        <!--calendrier bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

         <!--fichiers jquery -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?php
        if (isset($styles) && is_array($styles)) { // boucle d'ajout des styles customisés
            foreach ($styles as $pos => $style) {
?>
        <link rel="stylesheet" href="<?=$style?>">
<?php
            }
        }
        if (isset($scripts) && is_array($scripts)) { // boucle d'ajout des scripts customisés
            foreach ($scripts as $pos => $script) {
?>
        <script src="<?=$script?>"></script>
<?php
            }
        }

        // S'assure d'avoir la variable $body_class
        $body_class = isset($body_class)
                ? $body_class
                : '';
?>
    </head>
    <body class="<?php echo $body_class; ?>">
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-6">
                        <div class="logo-container">
                            <a href="./" title="Logo RenCars"><img src="<?=$base_url?>assets/images/header/logo1.png" alt="" class="standard-logo"></a>
                            <a href="/" title="Logo RenCars"><img src="<?=$base_url?>assets/images/header/logo2.png" alt="" class="subpages-logo"></a>
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
            </div>
        </header>
        <section id="subpages-hero">
            <div class="container-fluid">
                <img src="<?=$base_url?>assets/images/apropos/slogan_apropos.png" alt="slogan-apropos" id="slogan-apropos">
                <img src="<?=$base_url?>assets/images/voitures/slogan_voiture4.png" alt="slogan-voiture" id="slogan-voiture">
                <img src="<?=$base_url?>assets/images/devenir-membre/slogan_devenir_membre.png" alt="slogan-devenir-membre" id="slogan-devenir-membre">
                <img src="<?=$base_url?>assets/images/membre/slogan_membre.png" alt="slogan-membre" id="slogan-membre">
            </div>
        </section>

        <div class="container">
            <!-- Flash messages -->
            <?php if ($this->session->flashdata('user_registered')): ?>
                <?php echo '<p class="alert alert-success text-center"><strong>' . $this->session->flashdata('user_registered') . '</strong></p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('vehicule_created')): ?>
                <?php echo '<p class="alert alert-success text-center"><strong>' . $this->session->flashdata('vehicule_created') . '</strong></p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('vehicule_updated')): ?>
                <?php echo '<p class="alert alert-success text-center"><strong>' . $this->session->flashdata('vehicule_updated') . '</strong></p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('marque_created')): ?>
                <?php echo '<p class="alert alert-success text-center"><strong>' . $this->session->flashdata('marque_created') . '</strong></p>'; ?>
            <?php endif; ?>
            <?php if ($this->session->flashdata('modele_created')): ?>
                <?php echo '<p class="alert alert-success text-center"><strong>' . $this->session->flashdata('modele_created') . '</strong></p>'; ?>
            <?php endif; ?>
            <?php if ($this->session->flashdata('vehicule_deleted')): ?>
                <?php echo '<p class="alert alert-success text-center"><strong>' . $this->session->flashdata('vehicule_deleted') . '</strong></p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('login_failed')): ?>
                <?php echo '<p class="alert alert-danger text-center"><strong>' . $this->session->flashdata('login_failed') . '</strong></p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('user_loggedin')): ?>
                <?php echo '<p class="alert alert-success text-center"><strong>' . $this->session->flashdata('user_loggedin') . '</strong></p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('user_loggedout')): ?>
                <?php echo '<p class="alert alert-success text-center"><strong>' . $this->session->flashdata('user_loggedout') . '</strong></p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('marque_deleted')): ?>
                <?php echo '<p class="alert alert-success text-center"><strong>' . $this->session->flashdata('marque_deleted') . '</strong></p>'; ?>
            <?php endif; ?>
            <?php if ($this->session->flashdata('modele_deleted')): ?>
                <?php echo '<p class="alert alert-success text-center"><strong>' . $this->session->flashdata('modele_deleted') . '</strong></p>'; ?>
            <?php endif; ?>
        </div>
        <main>
            <section id="user">
                <div class="container">
