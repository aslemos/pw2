<?php
// Header
include VIEWPATH . 'common/header.php';
//========================================================
?>

<style type="text/css">
    /*formulaire location*/
    .myH{
        text-align:center;
    }
</style>
<main>
    <section id="voitures">
        <div class="container">

            <div class="rows4 title-container">
                <div class="cols6">
                    <div class="blocks6">
                        <h2>Trouver un véhicule</h2>
                    </div>
                </div>
            </div>

            <div class="cols7 col-md-4 col-sm-12 col-xs-12">

                <div class="form-style-11">

                    <form action="<?= $base_url; ?>vehicule/recherche#s" method="post" class="frm-inline">

                        <div class="inner-wrap" id="part1">

                            <div class="row">
                                <div class="col-md-4">
                                    <h6>Marque</h6>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id="marque_id" name="marque_id">
                                        <option value="0">-- Toutes --</option>
                                        <?php foreach ($marques as $marque) { ?>
                                            <option value="<?php echo $marque['marque_id']; ?>"<?= $marque['marque_id'] == $recherche->getMarqueId() ? ' selected' : '' ?>>
                                                <?php echo $marque['nom_marque']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h6>Modèle</h6>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id="modele_id" name="modele_id">
                                        <option value="0">-- Tous --</option>
                                        <?php foreach ($modeles as $modele) { ?>
                                            <option value="<?php echo $modele['modele_id']; ?>"<?= $modele['modele_id'] == $recherche->getModeleId() ? ' selected' : '' ?>>
                                                <?php echo $modele['nom_modele']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <h6>Type</h6>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id="type_id" name="type_id">
                                        <option value="0">-- Tous --</option>
                                        <?php foreach ($types as $type) : ?>
                                            <option value="<?php echo $type['type_id']; ?>"<?= $type['type_id'] == $recherche->getTypeId() ? ' selected' : '' ?>>
                                                <?php echo $type['nom_type']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <h6>Places</h6>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id="nbre_places" name="nbre_places">
                                        <option value="0">-- Tous --</option>
                                        <option value="1"<?= $recherche->getNbPlaces() == 1 ? ' selected' : '' ?>>1</option>
                                        <option value="2"<?= $recherche->getNbPlaces() == 2 ? ' selected' : '' ?>>2</option>
                                        <option value="5"<?= $recherche->getNbPlaces() == 5 ? ' selected' : '' ?>>5</option>
                                        <option value="7"<?= $recherche->getNbPlaces() == 7 ? ' selected' : '' ?>>7</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <h6>Année</h6>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" class="annee" id="annee" name="annee">
                                        <option value="0">-- Toutes --</option>
                                        <?php for ($i = Date('Y'), $fin = $i - 20; $i >= $fin; $i--) { ?>
                                            <option value="<?php echo $i ?>"<?= $i == $recherche->getAnnee() ? ' selected' : '' ?>><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <h6>Carburant</h6>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id="carburant_id" name="carburant_id">
                                        <option value="0">-- Tous --</option>
                                        <?php foreach ($carburants as $carburant) { ?>
                                            <option value="<?php echo $carburant['carburant_id']; ?>"<?= $carburant['carburant_id'] == $recherche->getCarburantId() ? ' selected' : '' ?>>
                                                <?php echo $carburant['nom_carburant']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <h6>Transmission</h6>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id="transmission_id" name="transmission_id">
                                        <option value="0">-- Toutes --</option>
                                        <?php foreach ($transmissions as $transmission) { ?>
                                            <option value="<?php echo $transmission['transmission_id']; ?>"<?= $transmission['transmission_id'] == $recherche->getTransmissionId() ? ' selected' : '' ?>>
                                                <?php echo $transmission['nom_transmission']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <h6>Arrondissement</h6>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id="arr_id" name="arr_id">
                                        <option value="0">-- Tous --</option>
                                        <?php foreach ($arrondissements as $arrondissement) { ?>
                                            <option value="<?php echo $arrondissement['arr_id']; ?>"<?= $arrondissement['arr_id'] == $recherche->getArrondId() ? ' selected' : '' ?>>
                                                <?php echo $arrondissement['nom_arr']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <h6>Prix</h6>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id="tranche" name="tranche">
                                        <option value="">-- Tous --</option>
                                        <?php foreach ($tranches as $tranche) { ?>
                                            <option value="<?= $tranche['tranche'] ?>"<?= $tranche['tranche'] == $recherche->getTranche() ? ' selected' : '' ?>><?= $tranche['nom_tranche'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <h6 class="myH">De</h6><input type="text" class="form-control" id="date_debut"  name="date_debut" value="<?= $recherche->getDateDebut() ?>" required>
                                </div>

                                <div class="col-md-6">
                                    <h6 class="myH">A</h6><input type="text" class="form-control" id="date_fin" name="date_fin" value="<?= $recherche->getDateFin() ?>" required>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Rechercher</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="blocks">
                <div class="cols7 col-md-8 col-sm-12 col-xs-12">

                    <?php if (count($resultat) > 0) { ?>
                        <?php foreach ($resultat as $vehicule) { ?>
                            <form method="post" action="<?= $base_url ?>locations/form_location/<?= $vehicule->getId() ?>#s">
                                <input type="hidden" name="date_debut" value="<?= $recherche->getDateDebut() ?>">
                                <input type="hidden" name="date_fin" value="<?= $recherche->getDateFin() ?>">
                                <div class="form-style-11">
                                    <div class="blocksDisplayVeh container-fuild">
                                        <div id="testImg" class="img-container">
                                            <img src="<?= $base_url ?>assets/images/vehicules/<?= $vehicule->getPhoto() ?>" alt="<?= $vehicule->toString() ?>">
                                        </div>
                                        <div>
                                            <h3>
                                                <?= $vehicule->toString() ?>

                                                <span class="prix">
                                                    <img class="myStar2" src="<?= $base_url ?>assets/images/accueil/3etoiles.png" alt="images etoile">
                                                    <?= $vehicule->getPrix() ?>$/JOUR
                                                </span>
                                            </h3>
                                        </div>

                                        <div class="desc-container">
                                            <p><b>NOMBRE SIÈGES: </b> <?= $vehicule->getNbPlaces() ?></p>
                                            <p><b>CARBURANT: </b> <?= $vehicule->getCarburant()->getNom() ?></p>
                                            <p><b>TRANSMISSION: </b> <?= $vehicule->getTransmission()->getNom() ?></p>
                                            <p><b>TYPE VÉHICULE: </b>  <?= $vehicule->getType()->getNom() ?></p>
                                            <p><b>DISPONIBLE:</b> à <?= $vehicule->getArrond()->toString() ?>
                                                <br>
                                                <b> <?= $vehicule->getDisponibilite()->toString() ?></b></p>
                                            <p><?php echo $vehicule->getDescription() ?> </p>
                                        </div>

                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-reserver">RÉSERVER</button>
                                    </div>

                                </div>
                            </form>
                            <?php
                        }
                    } else {
                        ?>
                        <h4>Aucun résultat pour cette recherche</h4>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
//========================================================
//Footer
include VIEWPATH . 'common/footer.php';
