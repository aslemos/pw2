
<nav>
    <ul class="menu">
        <li class=""><a href="<?=$base_url?>" title="">ACCUEIL</a></li>
        <li class=""><a href="<?=$base_url?>home/apropos" title="">À PROPOS</a></li>
        <li class=""><a href="<?=$base_url?>vehicule/recherche" title="">LOUER UNE VOITURE</a></li>
        <?php if (UserAcces::userIsLogged()) { ?>
        <li class=""><a href="<?=$base_url?>membre/view/liste_usagers" title="">GESTION DES VOITURES</a></li>
        <?php if (UserAcces::userIsAdmin()) { ?>
        <li class=""><a href="<?=$base_url?>admin/view/liste_admins" title="">ADMINISTRATION</a></li>
        <?php } ?>
        <?php } ?>

        <?php if (UserAcces::userIsLogged()) { ?>
        <li class=""><a href="<?=$base_url?>messagerie#s" title="Service de messagerie">MESSAGERIE</a></li>
        <li class=""><a href="<?=$base_url?>usager/logout" title="">LOGOUT</a></li>
        <?php } else { ?>
        <li class=""><a href="<?=$base_url?>contact" title="">CONTACTEZ-NOUS</a></li>
        <li class=""><a href="<?=$base_url?>usager/login" title="">SE CONNECTER</a></li>
        <?php } ?>

        <li class="hidden-md hidden-lg"><button class="btn-menu" id="close-side-menu">FERMER</button></li>
    </ul>
</nav>

