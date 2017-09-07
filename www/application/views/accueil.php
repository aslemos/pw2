<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Header
include VIEWPATH . 'common/header.php';
//========================================================
?>
<main>
    <div class="container">
        <section id="pub-home">
            <div class="container-fluid">
                <div class="row rows1">
                    <div class="cols1 col-md-12 col-sm-12 ">

                        <div class="row">
                            <div class="map"></div>
                        </div>
                        <div class="row secon-row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <!--<a href="/membre/view/devenir-membre" class="single-pub" id="pub-1">-->
                                <a href="<?= $base_url ?>usager/inscription" class="single-pub" id="pub-1">

                                    <h2 class="pub-title"> Devenir membre </h2>
                                </a>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <a href="<?= $base_url ?>page/view/voitures" class="single-pub" id="pub-2">
                                    <h2 class="pub-title"> Voitures </h2>
                                </a>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>
        <section id="about-home">
            <div class="container-fluid">
                <div class="row rows2 bg-gray">

                    <?php foreach ($vehicules as $vehicule) : ?>
                        <div class="cols3 col-md-4 col-sm-12 bordered">
                            <div class="blocks3">
                                <div class="text-container">
                                    <a href="<?= $base_url ?>vehicules/view/<?= $vehicule['vehicule_id']; ?>">
                                        <img src="<?= $base_url ?>assets/images/vehicules/<?php echo $vehicule['vehicule_photo']; ?>" alt="images voitures">
                                        <h2 class="text-center">
                                            <?php echo $vehicule['nom_marque']; ?>
                                            <?php echo $vehicule['nom_modele']; ?>
                                            <?php echo $vehicule['annee']; ?>
                                        </h2>
                                        <div class="information">
                                            <p class="text-center"> Vitesse: <?php echo $vehicule['nom_transmission']; ?></p>
                                            <p class="text-center"> Nbre de sièges: <?php echo $vehicule['nbre_places']; ?></p>
                                            <p class="text-center"> Tarif / jour: $<?php echo $vehicule['prix']; ?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </section>
    </div>
</main>
<?php
//========================================================
//Footer
include VIEWPATH . 'common/footer.php';
