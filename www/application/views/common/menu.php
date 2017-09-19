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
        <li class=""><a href="<?=$base_url?>messagerie#s" title="Service de messagerie">MESSAGERIE</a></li>
        <li class=""><a href="<?=$base_url?>usager/logout" title="Se déconnecter du système">LOGOUT</a></li>
<?php } else { ?>
        <li class=""><a href="<?=$base_url?>contact#s" title="">CONTACTEZ-NOUS</a></li>
        <li class=""><a href="<?=$base_url?>usager/login#s" title="">SE CONNECTER</a></li>
<?php } ?>

        <li class="hidden-md hidden-lg"><button class="btn-menu" id="close-side-menu">FERMER</button></li>
<?php
/*
        <li>
        <div class="dropdown">
            <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                Profil
                <!--<span class="caret"></span>-->
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="#">Client</a></li>
                <li><a href="#">Prestataire</a></li>
<?php if (UserAcces::userIsAdmin()) { ?>
                <li><a href="#">Administrateur</a></li>
<?php } ?>
                <!--<li class="divider"></li>-->
                <!--<li><a href="<?=$base_url?>usager/logout" title="">LOGOUT</a></li>-->
            </ul>
        </div>
        </li>
*/
?>
    </ul>

</nav>
