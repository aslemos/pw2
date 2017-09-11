
<nav>
    <ul class="menu">
        <!-- Menu accueil -->
        <li class=""><a href="<?php echo base_url(); ?>" title="">ACCUEIL</a></li>
        <li class=""><a href="<?php echo base_url(); ?>home/about" title="">À PROPOS</a></li>
        <li class=""><a href="<?php echo base_url(); ?>home/vehicule" title="">VÉHICULES</a></li>
        
        <?php if(!$this->session->userdata('logged_in')) : ?>   
        <li class=""><a href="<?php echo base_url(); ?>home/contact" title="">CONTACTEZ-NOUS</a></li>
        <li class=""><a href="<?php echo base_url(); ?>usagers/register" title="">S'INSCRIRE</a></li>
        <li class=""><a href="<?php echo base_url(); ?>usagers/login" title="">SE CONNECTER</a></li>
        <?php endif; ?>
        
        <!-- Menu membres -->
        <?php if($this->session->userdata('logged_in')) : ?>
        <li class="dropdown">
            <a href="<?php echo base_url(); ?>usagers" title="CONTACT">CONTACTER UN MEMBRE<b class="caret"></b></a>
            <ul class="submenu" style='max-width:200px; overflow:hidden;'>
                <!-- links -->
                <li role="presentation"> 
                    <a role="menuitem" tabindex="-1" href ='<?php echo base_url(); ?>contact_admin'> 
                        <span class="text"> UN ADMIN </span>
                    </a>
                </li>
                <li role="presentation" class="divider">
                    
                </li>
                <li role="presentation"> 
                    <a role="menuitem" tabindex="-1" href ='<?php echo base_url(); ?>contact_usagers'> 
                        <span class="text"> UN MEMBRE </span>
                    </a>
                </li>
            </ul>           
        </li>
        <li class=""><a href="<?php echo base_url(); ?>usagers/logout" title="">QUITTER</a></li>
        <?php endif; ?>             
    </ul>
    <button class="btn-menu hidden-md hidden-lg" id="close-side-menu">FERMER</button>
</nav>

