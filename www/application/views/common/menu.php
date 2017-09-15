<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<nav>
    <ul class="menu">
        <li class=""><a href="<?=$base_url?>" title="">ACCUEIL</a></li>
        <li class=""><a href="<?=$base_url?>accueil/apropos#s" title="">À PROPOS</a></li>
        <li class=""><a href="<?=$base_url?>vehicule/recherche#s" title="">LOUER UNE VOITURE</a></li>
        <?php if (UserAcces::userIsLogged()) { ?>
        <li class=""><a href="<?=$base_url?>membre#s" title="">GESTION DES VOITURES</a></li>
        <?php if (UserAcces::userIsAdmin()) { ?>
        <li class=""><a href="<?=$base_url?>admin/listeMembres#s" title="">ADMINISTRATION</a></li>
        <?php } ?>
        <?php } ?>

        <?php if (UserAcces::userIsLogged()) { ?>
        <li class=""><a href="<?=$base_url?>messagerie#s" title="Service de messagerie">MESSAGERIE</a></li>
        <li class=""><a href="<?=$base_url?>usager/logout" title="">LOGOUT</a></li>
        <?php } else { ?>
        <li class=""><a href="<?=$base_url?>contact#s" title="">CONTACTEZ-NOUS</a></li>
        <li class=""><a href="<?=$base_url?>usager/login#s" title="">SE CONNECTER</a></li>
        <?php } ?>

        <li class="hidden-md hidden-lg"><button class="btn-menu" id="close-side-menu">FERMER</button></li>
    </ul>
</nav>
