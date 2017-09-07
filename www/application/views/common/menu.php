
<nav>
    <ul class="menu">
        <li class=""><a href="<?=$base_url?>" title="">ACCUEIL</a></li>
        <li class=""><a href="<?=$base_url?>page/view/a-propos" title="">À PROPOS</a></li>
        <li class=""><a href="<?=$base_url?>vehicule/recherche" title="">VOITURES</a></li>
        <?php if (UserAcces::userIsLogged()) { ?>
        <?php if (UserAcces::userIsAdmin()) { ?>
        <li class=""><a href="<?=$base_url?>admin/view/liste_admins" title="">ADMINISTRATION</a></li>
        <?php } else { ?>
        <li class=""><a href="<?=$base_url?>membre/view/liste_usagers" title="">MEMBRE</a></li>
        <?php } ?>
        <?php } ?>
        <!--<li class=""><a href="<?=$base_url?>page/view/super-admin" title="">SUPER ADMIN</a></li>-->
        <!--<li class=""><a href="contact" title="">CONTACT</a></li>-->

        <li class="dropdown">
            <a href="" title="CONTACT">CONTACTER<b class="caret"></b></a>
            <ul class="submenu" >
                <!-- links -->
                <li role="presentation"> <a role="menuitem" tabindex="-1" href =''> <span class="text"> LES MEMBRES </span></a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"> <a role="menuitem" tabindex="-1" href =''> <span class="text"> LES ADMINS </span></a></li>
            </ul>
        </li>

        <li class=""><a href="<?=$base_url?>usager/login" title="">SE CONNECTER</a></li>

        <button class="btn-menu hidden-md hidden-lg" id="close-side-menu">FERMER</button>
    </ul>
</nav>

