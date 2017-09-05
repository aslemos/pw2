<?php

/* 
 * Page 'index' page par défaut du site
 * Appelée par le controleur 'Home'
 */
?>
<section id="pub-home">
    <div class="container-fluid">
        <div class="cols1 col-sm-12  col-md-12 col-lg-12">                 
            <div class="col-sm-12  col-md-12 col-lg-12">
                <div class="map"></div>
            </div>
            <div class="col-sm-12  col-md-12 col-lg-12">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="<?php echo base_url(); ?>usagers/register" title="" class="single-pub" id="pub-1">
                        <h2 class="pub-title"> Devenir membre </h2>
                    </a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="<?php echo base_url(); ?>home/vehicule" class="single-pub" id="pub-2">
                        <h2 class="pub-title"> Véhicules </h2>
                    </a>
                </div>
            </div>
        </div>               
    </div>
</section>
<section id="about-home">
    <div class="container-fluid">
        <div class="row rows2 bg-gray">
            <?php foreach($vehicules AS $vehicule) : ?>
            <div class="cols3 col-md-4 col-sm-12 bordered">
                <div class="blocks3">
                    <div class="text-container">
                        <a href="<?php echo site_url('/vehicules/'.$vehicule['vehicule_id']); ?>">
                            <img src="<?php echo base_url(); ?>assets/images/vehicules/<?php echo $vehicule['vehicule_photo']; ?>" alt="images voitures">                            
                            <h3 class="text-center">
                                <?php echo $vehicule['nom_marque']; ?> 
                                <?php echo $vehicule['nom_modele']; ?> 
                                <?php echo $vehicule['annee']; ?>
                            </h3>
                            <div class="information">                                
                                <p class="text-center"> Vitesse: <?php echo $vehicule['nom_transmission']; ?></p>
                                <p class="text-center"> Nbre de sièges: <?php echo $vehicule['nbre_places']; ?></p>
                                <p class="text-center"> Tarif / jour: $<?php echo $vehicule['prix']; ?></p>
                            </div>
                        </a>
                    </div>
                </div> <!-- Fin Blocks  -->
            </div> 
            <?php endforeach; ?>
        </div>
    </div>
</section>


