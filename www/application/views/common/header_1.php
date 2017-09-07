<!DOCTYPE HTML>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="">
        <meta name="keywords" content="">

        <title><?php //echo $page_title;  ?> - RENTCARS</title>
        <link rel="icon" type="image/png" href="" />

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css" />
        <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    </head>
    <body class="<?php //echo $body_class;  ?>">
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-6">
                        <div class="logo-container">
                            <a href="./" title="Logo RenCars"><img src="<?php echo base_url(); ?>assets/images/header/logo2.png" alt="" class="standard-logo"></a>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-6 col-xs-6">
                        <div class="menu-container">
                            <button class="btn-menu hidden-md hidden-lg" id="open-side-menu"><i class="fa fa-bars" aria-hidden="true"></i></button>
                            <?php include (APPPATH . "/views/common/navbar_top.php"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
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