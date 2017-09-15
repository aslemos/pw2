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
            <h2>Formulaire d'inscription voiture</h2>

            <form name="monFormulaire" action="<?= $base_url ?>vehicule/createVehicule" class="form-horizontal" id="needs-validation">

                <div class="form-group">
                    <label class="control-label col-xs-3" for="marque">Marque:</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="marque" placeholder="Entrez le marque">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3" for="model">Model:</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="model" placeholder="Entrez le Model">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3" for="carrosserie">Type de carrosserie:</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="carrosserie" placeholder="Entrez le type de
                               carrosserie">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3">Année:</label>
                    <div class='input-group date col-xs-6' id='datetimepickerAnnee'>
                        <input type='text' class="form-control"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3">Boite de vitesse:</label>

                    <div class="btn-group" data-toggle="buttons">
                        <div class="col-xs-6">
                            <label class="btn active" >
                                <input type="radio" name='gender2' checked style="visibility:hidden;display:none">
                                <i class="fa fa-circle-o fa-2x"></i>
                                <i class="fa fa-check-circle-o fa-2x"></i>
                                <span class="test"> manuelle</span>
                            </label>
                        </div>

                        <div class="col-xs-6">
                            <label class="btn">
                                <input type="radio" name='gender2' style="visibility:hidden;display:none">
                                <i class="fa fa-circle-o fa-2x"></i>
                                <i class="fa fa-check-circle-o fa-2x"></i>
                                <span class="test"> automatique </span>
                            </label>
                        </div>
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
                        <input type="tel" class="form-control" id="typeCarburant" placeholder="Entrez le Type de
                               carburant">
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
                    <label class="control-label col-xs-3"  for="ville">Ville</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="ville" placeholder="Montreal" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3">Arrondissement</label>
                    <div class="col-xs-6">
                        <select name="choixArrondissement" class="form-control">
                            <option SELECTED>Arrondissement</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3">Disponible:</label>

                    <div class='input-group date col-xs-6' id='datetimepickerDe'>
                        <input type='text' class="form-control"  placeholder="de">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>

                    <label class="control-label col-xs-3"></label>

                    <div class='input-group date col-xs-6' id='datetimepickerA'>
                        <input type='text' class="form-control" placeholder="a">
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
            </script>

        </div>
    </section>
</main>
<?php
//========================================================
//Footer
include VIEWPATH . '/common/footer.php';
?>
