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
                                <div class="clos col-md-6 col-sm-12 bordered">
                                    <div class="blocks3">
                                        <div class="text-container">
                                            <h2>Notre mission</h2>
                                            <p> Le site ‘‘RentCars’’ est un site dédié à tous les résidents, de l'Île de Montréal (seulement), possédant une auto et désirant la partagé avec d’autres utilisateurs moyennant un tarif fixé par le propriétaire et approuvé par l’administration.</p>

                                            <p> Tous les membres, propriétaires et clients, doivent être inscrits (inscription en ligne) au préalable, et acceptés par l’administration. Ils peuvent par la suite, inscrire leurs (un ou plusieurs) véhicules en vue de les louer, comme ils peuvent louer les véhicules déjà disponibles.</p>
                                            
                                            <p> Les propriétaires peuvent en tout moment mettre leurs véhicules en location selon la période désirée, dans laquelle les dates de début et de fin ainsi que les tarifs seront indiqués.</p>
                                        </div>

                                    </div>

                                </div>
                                <div class="clos col-md-6 col-sm-12 ">
                                    <div class="blocks4">
                                        <div class="text-container">
                                            <h2>nos valeurs</h2>
                                            <p>Notre site se veut innovateur dans le domaine du partage d’auto, il se différencie des autres (CommunAuto, Uber, ainsi que l’industrie du taxi de Montréal), par le fait qu’il n y a pas procédures administrative qui compliquent et retardent les démarches de locations, en plus les tarifs, ainsi que les modes de paiement, sont fixés par le propriétaire lui-même, pourvu qu’elles soient acceptés par les clients. Autre distinction, les utilisateurs peuvent adhérer et se retirer à tout moment, et les propriétaires ont droit d’accepter ou de refuser les demandes de location pour leurs véhicules respectifs.</p>         
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
                                <?php if(UserAcces::userIsLogged()){ ?>
                                <a href="<?= $base_url ?>usager/editUser/<?= UserAcces::getUserId() ?>#s" class="single-pub" id="pub-1">

                                    <h2 class="pub-title"> Devenir membre </h2>
                                </a>
                                <?php } else { ?>
                                <a href="<?= $base_url ?>usager/inscription#s" class="single-pub" id="pub-1">

                                    <h2 class="pub-title"> Devenir membre </h2>
                                </a>
                                <?php } ?>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <a href="<?= $base_url ?>vehicule/recherche#s" class="single-pub" id="pub-2">
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
                                            <p class="text-center"> <span class="prix"> Tarif / jour: $<?php echo $vehicule['prix']; ?></span></p>
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
