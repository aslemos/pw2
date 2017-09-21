<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<nav>
    <ul class="menu">
        <li class=""><a href="<?= $base_url ?>" title="Page d'accueil">ACCUEIL</a></li>
        <li class=""><a href="<?= $base_url ?>vehicule/recherche#s" title="Trouvez une voiture">LOUER UN VÉHICULE</a></li>
        <?php if (UserAcces::userIsLogged()) { ?>
            <li>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Fonctionnalités de membre">
                        ESPACE MEMBRE
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li role="presentation"><a role="menuitem" href="<?=$base_url?>locations/locationsByUser#s"><span class="text">Client</span></a></li>
                        <li role="presentation"><a role="menuitem" href="<?=$base_url?>membre/vehicules#s"><span class="text">Prestataire</span></a></li>
                        <li role="presentation"><a role="menuitem" href="<?=$base_url?>usager/editUser/<?=UserAcces::getUserId()?>#s"><span class="text">Mon profil</span></a></li>
                        <li role="presentation"><a role="menuitem" href="<?=$base_url?>messagerie#s"><span class="text">Messagerie</span></a></li>
                    </ul>
                </div>
            </li>

            <?php if (UserAcces::userIsAdmin()) { ?>
                <li class="dropdown"><a href="#" title="Fonctions d'administration du site">
                        ADMINISTRATION
                        <b class="caret"></b>
                    </a>
                    <ul class="submenu">
                        <!-- links -->
                        <li role="presentation"> <a role="menuitem" tabindex="-1" href="<?= $base_url ?>admin/listeMembres#s"> <span class="text"> Gestion Des Usagers </span></a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"> <a role="menuitem" tabindex="-1" href="<?= $base_url ?>admin/listeVehicules#s"> <span class="text">Gestion Des Véhicules </span></a></li>
                        <li role="presentation"> <a role="menuitem" tabindex="-1" href="<?= $base_url ?>admin/messagerie#s"> <span class="text">Gestion Des Messages </span></a></li>

<!-- C'est redondant, parce que l'option de liste d'administrateur se trouve déjà dans l'affichage d'usagers
                        <?php if (UserAcces::userIsSuperAdmin()) { ?>
                            <li role="presentation"> <a role="menuitem" tabindex="-1" href="<?= $base_url ?>admin/listeAdmins#s"> <span class="text">Gestion Des Admins </span></a></li>
                        <?php } ?>
-->
                    </ul>
                </li>

            <?php } ?>
            <li class="dropdown"><a href="<?= $base_url ?>messagerie#s" title="Service de messagerie">
                    MESSAGERIE
                    <b class="caret"></b>
                </a>
                <ul class="submenu">
                    <!-- links -->
                    <li role="presentation"> <a role="menuitem" tabindex="-1" href="premiers-vendredis"> <span class="text"> Gestion De Mes Messages </span></a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"> <a role="menuitem" tabindex="-1" href="aperos"> <span class="text"> Contacter Membre </span></a></li>
                    <li role="presentation"> <a role="menuitem" tabindex="-1" href="aperos"> <span class="text"> Contacter Admin </span></a></li>
                </ul>
            </li>
            <li class=""><a href="<?= $base_url ?>usager/logout" title="Se déconnecter du système">SE DÉCONNECTER <span id="nomUser"><?php echo UserAcces::getLoggedUser()->getPrenom(); ?></span></a></li>
        <?php } else { ?>
            <li class=""><a href="<?= $base_url ?>accueil/apropos#s" title="Qui sommes nous">À PROPOS</a></li>
            <li class=""><a href="<?= $base_url ?>contact#s" title="Entrez en contact avec nous">CONTACTEZ-NOUS</a></li>
            <li class=""><a href="<?= $base_url ?>usager/inscription#s" title="Devenez membre du service">S'INSCRIRE</a></li>
            <li class=""><a href="<?= $base_url ?>usager/login#s" title="Accéder au système">SE CONNECTER</a></li>
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
