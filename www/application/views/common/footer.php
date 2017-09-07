<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
        </div>
    </section>
</main>
<section id="footer-member">
    <div class="container">
        <h2>DEVENEZ UN MEMBRE</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur metus nisi, pellentesque a mi sit amet, convallis interdum erat. Ut condimentum magna et consectetur faucibus. Quisque semper viverra tellus, vitae egestas est posuere eu.  Donec ac lorem sed est suscipit venenatis. Phasellus nibh ex, molestie ac pellentesque ut, efficitur vel enim.</p>
        <a class="btn" href="/usager/inscription" title="">PLUS DE DÉTAILS</a>
    </div>
</section>

<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12" id="col-social">
                <div class="icon-container">
                    <a href="#" class="single-icon" id="fb">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="single-icon" id="instagram">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="single-icon" id="twitter">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12" id="col-nav">
                <div class="flex-container">
                    <div class="list-container">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>" title="">ACCUEIL</a></li>
                            <li class="sublist-container">
                                <a href="<?php echo base_url(); ?>home/about" title="">À PROPOS</a>
                            </li>
                            <li class="sublist-container">
                                <a href="<?php echo base_url(); ?>home/vehicule" title=""> VOITURES</a>
                            </li>
                            <?php if (!$this->session->userdata('logged_in')) : ?>
                                <li class="sublist-container">
                                    <a href="<?php echo base_url(); ?>home/contact" title=""> CONTACTER-NOUS</a>
                                </li>
                                <li class="sublist-container">
                                    <a href="<?php echo base_url(); ?>usagers/register" title=""> S'INSCRIRE</a>
                                </li>
                                <li class="sublist-container">
                                    <a href="<?php echo base_url(); ?>usagers/login" title=""> SE CONNECTER</a>
                                </li>
                            <?php endif; ?>
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
