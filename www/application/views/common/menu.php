
<nav>
    <ul class="menu">
        <li class="<?php //echo $tpl->checkCurrentURL("index"); ?>"><a href="/" title="">ACCUEIL</a></li>
        <li class="<?php //echo $tpl->checkCurrentURL("historique"); ?>"><a href="/page/view/a-propos" title="">À PROPOS</a></li>
        <li class="<?php //echo $tpl->checkCurrentURL("camions"); ?>"><a href="/page/view/voitures" title="">VOITURES</a></li>
        <li class="<?php //echo $tpl->checkCurrentURL("camions"); ?>"><a href="/membre/view/liste_usagers" title="">MEMBRE</a></li>
        <li class="<?php //echo $tpl->checkCurrentURL("camions"); ?>"><a href="/admin/view/liste_admins" title="">ADMIN</a></li>
        <!--<li class="<?php //echo $tpl->checkCurrentURL("camions"); ?>"><a href="/page/view/super-admin" title="">SUPER ADMIN</a></li>-->
        <!--<li class="<?php // echo $tpl->checkCurrentURL("devenir-membre"); ?>"><a href="contact" title="">CONTACT</a></li>-->
        <li class="dropdown">
            <a href="" title="CONTACT">
                        CONTACTER
                        <b class="caret"></b>
            </a>

            <ul class="submenu" >
                <!-- links -->
                <li role="presentation"> <a role="menuitem" tabindex="-1" href =''> <span class="text"> LES MEMBRES </span></a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"> <a role="menuitem" tabindex="-1" href =''> <span class="text"> LES ADMINS </span></a></li>
            </ul>

        </li>
        <li class="<?php //echo $tpl->checkCurrentURL("evenements"); ?>"><a href="/usager" title="">SE CONNECTER</a></li>
        
        <button class="btn-menu hidden-md hidden-lg" id="close-side-menu">FERMER</button>
    </ul>
</nav>

