<?php
$meta_keywords = "";
$meta_description = "";
$page_title = "Ajouter une voiture";
$body_class = "subpages membre";

// Header
include VIEWPATH . '/common/header.php';
//========================================================
?>
<main>
    <section id="ajouter-voitures">
        <?php include VIEWPATH .'client/boutons_client.php'; ?>
        <div class="container">
<?php if (true) { ?>
            <h2>Inscription de véhicule</h2>
<?php } else { ?>
            <h2>Modification de véhicule</h2>
<?php } ?>

            <form method="post" name="monFormulaire" action="<?= $base_url ?>vehicule/createVehicule" class="form-horizontal" id="needs-validation">

                <div class="form-group">
                    <label class="control-label col-xs-3" for="marque">Marque:</label>
                    <div class="col-xs-6">
                        <select name="marque_id" id="marque_id">
                            <option value="-1">-- Choisissez --</option>
<?php foreach($marques as $marque) { ?>
                            <option value="<?=$marque['marque_id']?>"><?=$marque['nom_marque']?></option>
<?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3" for="model">Modèle:</label>
                    <div class="col-xs-6">
                        <select name="modele_id" id="modele_id">
                            <option value="0">-- Choisissez --</option>
<?php foreach($modeles as $modele) { ?>
                            <option value="<?=$modele['modele_id']?>"><?=$modele['nom_modele']?></option>
<?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3" for="carrosserie">Type de véhicule:</label>
                    <div class="col-xs-6">
                        <select name="type_id" id="type_id" required>
                            <option value="">-- Choisissez --</option>
<?php foreach($types_vehicules as $type) { ?>
                            <option value="<?=$type['type_id']?>"><?=$type['nom_type']?></option>
<?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3">Année:</label>
                    <div class="input-group date col-xs-6" id="xdatetimepickerAnnee">
                        <!--<input type="text" class="form-control" name="annee" id="annee"/>-->
                        <select class="form-control" name="annee" id="annee" required></select>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
<style>
    input[name="transmission_id"] {
        display: none;
        outline: 5px solid blue;
    }
    input[name="transmission_id"]:checked {

    }
</style>
            <div class="form-group">
                    <label class="control-label col-xs-3">Transmission:</label>
                    <div class="btn-group" data-toggle="buttons">
                        <xdiv class="col-xs-6">
                            <label class="btn radio-inline" >
                                <input type="radio" name="transmission_id" xchecked xstyle="visibility:hidden;display:none">
                                <i class="fa fa-circle-o fa-2x"></i>
                                <i class="fa fa-check-circle-o fa-2x"></i>
                                <span class="test"> manuelle</span>
                            </label>
                            <label class="btn radio-inline">
                                <input type="radio" name="transmission_id" xstyle="visibility:hidden;display:none">
                                <i class="fa fa-circle-o fa-2x"></i>
                                <i class="fa fa-check-circle-o fa-2x"></i>
                                <span class="test"> automatique </span>
                            </label>
                        </xdiv>

<!--                        <div class="col-xs-6">
                            <label class="btn">
                                <input type="radio" name='gender2' xstyle="visibility:hidden;display:none">
                                <i class="fa fa-circle-o fa-2x"></i>
                                <i class="fa fa-check-circle-o fa-2x"></i>
                                <span class="test"> automatique </span>
                            </label>
                        </div>-->
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3" for="nombrePlaces">Nombre de places:</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="nombrePlaces" placeholder="Entrez le Nombre
                               de places">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3" for="typeCarburant">Type de carburant:</label>
                    <div class="col-xs-6">
                        <select name="carburant_id" id="carburant_id">
                            <option value="">-- Choisissez --</option>
<?php foreach($carburants as $carburant) { ?>
                            <option value="<?=$carburant['carburant_id']?>"><?=$carburant['nom_carburant']?></option>
<?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3" for="prix">Prix, $ par jour</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="prix" placeholder="Prix, $ par jour">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3" for="matricule" >Matricule</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="matricule" placeholder="Matricule">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3"  for="province_id">Province</label>
                    <div class="col-xs-6">
                        <select name="province_id" id="province_id">
                            <option value="0">-- Choisissez --</option>
<?php foreach($provinces as $province) { ?>
                            <option value="<?=$province['province_id']?>"><?=$province['province']?></option>
<?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3"  for="ville">Ville</label>
                    <div class="col-xs-6">
                        <select name="ville_id" id="ville_id">
                            <option value="0">-- Choisissez --</option>
<?php foreach($villes as $ville) { ?>
                            <option value="<?=$ville['ville_id']?>"><?=$ville['nom_ville']?></option>
<?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3">Arrondissement</label>
                    <div class="col-xs-6">
                        <select name="arr_id" id="arr_id">
                            <option value="0">-- Choisissez --</option>
<?php foreach($arrondissement as $ville) { ?>
                            <option value="<?=$ville['ville_id']?>"><?=$ville['nom_ville']?></option>
<?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3">Disponibilité:</label>

                    <div class="input-group date col-xs-6" id="xdatetimepickerDe">
                        <input type="text" class="form-control" name="date_debut" id="date_debut" placeholder="date début">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>

                    <label class="control-label col-xs-3"></label>

                    <div class="input-group date col-xs-6" id="xdatetimepickerA">
                        <input type="text" class="form-control" name="date_fin" id="date_fin" placeholder="date fin">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3"  for="photo">Photo:</label>
                    <div class="col-xs-6">
                        <input type="file" class="form-control-file" id="photo">
                    </div>
                </div>



                <br />
                <div class="form-group">
                    <div class="col-xs-offset-3 col-xs-9">
                        <input type="submit" class="btn btn-primary" value="S'inscrire">
                        <input type="reset" class="btn btn-default" value="Effacez le formulaire!">
                    </div>
                </div>
            </form>


            <script>

                /*Annee de voiture*/
/*
                $(function () {
                    $('#datetimepickerAnnee').datetimepicker({
                        viewMode: 'years',
                        format: 'MM/YYYY'
                    });
                });

                $(function () {
                    $('#datetimepickerDe').datetimepicker({
                        icons: {
                            time: "fa fa-clock-o",
                            date: "fa fa-calendar",
                            up: "fa fa-arrow-up",
                            down: "fa fa-arrow-down"
                        }
                    });
                });

                $(function () {
                    $('#datetimepickerA').datetimepicker({
                        icons: {
                            time: "fa fa-clock-o",
                            date: "fa fa-calendar",
                            up: "fa fa-arrow-up",
                            down: "fa fa-arrow-down"
                        }
                    });
                });
*/
            </script>

        </div>
    </section>
</main>
<?php
//========================================================
//Footer
include VIEWPATH . '/common/footer.php';
?>
