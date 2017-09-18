<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
</main>
<?php if (!UserAcces::userIsLogged()) { ?>
<section id="footer-member">
    <div class="container">
        <h2>DEVENEZ UN MEMBRE</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur metus nisi, pellentesque a mi sit amet, convallis interdum erat. Ut condimentum magna et consectetur faucibus. Quisque semper viverra tellus, vitae egestas est posuere eu.  Donec ac lorem sed est suscipit venenatis. Phasellus nibh ex, molestie ac pellentesque ut, efficitur vel enim.</p>
        <a class="btn" href="<?=$base_url?>usager/inscription" title="">PLUS DE DÉTAILS</a>
    </div>
</section>
<?php } ?>
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12" id="col-social">
                <div class="icon-container">
                    <a href="https://fr-ca.facebook.com/login/" target="blanc" class="single-icon" id="fb">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="https://www.instagram.com/accounts/login/?hl=fr" target="blanc" class="single-icon" id="instagram">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                    <a href="https://twitter.com/login" target="blanc" class="single-icon" id="twitter">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="col-nav">
                <div class="flex-container">
                    <div class="list-container">
                        <ul>
                            <li><a href="<?=$base_url?>" title="">ACCUEIL</a></li>
                            <li class="sublist-container">
                                <a href="<?=$base_url?>accueil/apropos#s" title="">À PROPOS</a>
                            </li>
                            <li class="sublist-container">
                                <a href="<?=$base_url?>vehicule/recherche#s" title="">VOITURES</a>
                            </li>
                            <?php if (!UserAcces::userIsLogged()) { ?>
                                <li class="sublist-container">
                                    <a href="<?=$base_url?>contact#s" title="">CONTACTEZ-NOUS</a>
                                </li>
                                <li class="sublist-container">
                                    <a href="<?=$base_url?>usager/inscription#s" title="">S'INSCRIRE</a>
                                </li>
                                <li class="sublist-container">
                                    <a href="<?=$base_url?>usager/login#s" title="">SE CONNECTER</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12" id="col-coord">
                <div class="text-container">
                    <h4><a href="mailto:kharratiadh82@gmail.com">rentcars@gmail.com</a> | <a href="tel:15143184728">(514) 318-4728</a></h4>
                    <p><strong> RENTCARS © 2017</strong><br>
                        Tous droits réservés. Conçu et propulsé par <a href="http://www.cmaisonneuve.qc.ca/" title="Lien Collège Maisonneuve" target="_blank">
                        <strong> Equipe Collège Maisonneuve - Projet Web 2</strong>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
