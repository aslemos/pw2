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
                        <div class="container-fluid">
                            <div class="row rows2 bg-gray">
                                <div class="clos3 col-md-6 col-sm-12 bordered">
                                    <div class="blocks3">
                                        <div class="text-container">
                                            <h2>Notre mission</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare, neque quis pellentesque rutrum, turpis libero egestas ligula, quis efficitur urna justo luctus velit. Etiam a imperdiet nisi, in mattis nisi. Aenean mattis, ante at lacinia dictum, turpis arcu scelerisque est, et aliquet mauris lectus cursus nisl. Vivamus malesuada tincidunt velit, in hendrerit arcu bibendum ornare. Donec sed mi tempor, lacinia velit sed, tristique eros. Pellentesque commodo quis mi ac consectetur. Nam pretium pharetra hendrerit.</p>

                                            <p>Vestibulum vitae pharetra ex. Nulla ac ultricies ante. Nullam et lectus consequat, pulvinar odio eu, pellentesque arcu. Nullam suscipit luctus elit, ac hendrerit nunc mollis et. Phasellus at tempus justo, nec fermentum velit. In at nulla in purus vehicula pharetra. Nulla dapibus eros et felis finibus, a pellentesque tortor aliquet. Nullam eget fermentum erat, sit amet accumsan risus. In dapibus dolor lorem, sit amet accumsan libero fermentum varius. Integer posuere commodo sollicitudin. Pellentesque convallis vulputate enim at faucibus.</p>
                                        </div>

                                    </div>

                                </div>
                                <div class="clos4 col-md-6 col-sm-12 ">
                                    <div class="blocks4">
                                        <div class="text-container">
                                            <h2>nos valeurs</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare, neque quis pellentesque rutrum, turpis libero egestas ligula, quis efficitur urna justo luctus velit. Etiam a imperdiet nisi, in mattis nisi. Aenean mattis, ante at lacinia dictum, turpis arcu scelerisque est, et aliquet mauris lectus cursus nisl. Vivamus malesuada tincidunt velit, in hendrerit arcu bibendum ornare. Donec sed mi tempor, lacinia velit sed, tristique eros. Pellentesque commodo quis mi ac consectetur. Nam pretium pharetra hendrerit.</p>

                                            <p>Vestibulum vitae pharetra ex. Nulla ac ultricies ante. Nullam et lectus consequat, pulvinar odio eu, pellentesque arcu. Nullam suscipit luctus elit, ac hendrerit nunc mollis et. Phasellus at tempus justo, nec fermentum velit. In at nulla in purus vehicula pharetra. Nulla dapibus eros et felis finibus, a pellentesque tortor aliquet. Nullam eget fermentum erat, sit amet accumsan risus. In dapibus dolor lorem, sit amet accumsan libero fermentum varius. Integer posuere commodo sollicitudin. Pellentesque convallis vulputate enim at faucibus.</p>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="map"></div>
                        </div>
                        <div class="row secon-row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <a href="<?= $base_url ?>usager/inscription" class="single-pub" id="pub-1">

                                    <h2 class="pub-title"> Devenir membre </h2>
                                </a>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <a href="<?= $base_url ?>voiture/recherche" class="single-pub" id="pub-2">
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
                <div>
                    <h2> LES VOITURES LES PLUS DEMANDÉES </h2>
                </div>
                <div class="row rows2 bg-white">
                    <?php foreach ($vehicules as $vehicule) : ?>
                        <div class="cols3 col-md-4 col-sm-12  bordered">
                            <div class="blocks3">
                                <div class="text-container">
                                    <a href="<?= $base_url ?>vehicule/view/<?= $vehicule['vehicule_id']; ?>#s">
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
