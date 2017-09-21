<?php
// Header
include VIEWPATH . 'common/header.php';
//========================================================
include VIEWPATH .'client/boutons_prestataire.php';
?>
<section id="ajouter-voitures">
    <div class="container">
        <h2><?=$title?></h2>
        <form method="post" enctype="multipart/form-data" name="monFormulaire" action="<?=$action?>" class="form-horizontal" id="needs-validation">
            <input type="hidden" name="vehicule_id" value="<?=$form['vehicule_id']?>">
<?php echo validation_errors() ?>
            <div class="form-group">
                <label class="control-label col-xs-3" for="marque_id">Marque:</label>
                <div class="col-xs-6">
                    <select class="form-control formSelector" name="marque_id" id="marque_id">
                        <option value="-1">-- Choisissez --</option>
<?php foreach($marques as $marque) { ?>
                        <option value="<?=$marque['marque_id']?>"<?=$marque['marque_id']==$form['marque_id']?' selected':''?>><?=$marque['nom_marque']?></option>
<?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" for="modele_id">Modèle:</label>
                <div class="col-xs-6">
                    <select class="form-control formSelector" name="modele_id" id="modele_id" required>
                        <option value="">-- Choisissez --</option>
<?php foreach($modeles as $modele) { ?>
                        <option value="<?=$modele['modele_id']?>"<?=$modele['modele_id']==$form['modele_id']?' selected':''?>><?=$modele['nom_modele']?></option>
<?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" for="type_id">Type de véhicule:</label>
                <div class="col-xs-6">
                    <select class="form-control formSelector" name="type_id" id="type_id" required>
                        <option value="">-- Choisissez --</option>
<?php foreach($types_vehicules as $type) { ?>
                        <option value="<?=$type['type_id']?>"<?=$type['type_id']==$form['type_id']?' selected':''?>><?=$type['nom_type']?></option>
<?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" for="annee">Année:</label>
                <div class="col-xs-6">
                    <select class="form-control formSelector" name="annee" id="annee" required>
                        <option value="">-- Choisissez --</option>
<?php for ($i=Date('Y')+1, $fin=$i-30; $i > $fin; $i--) { ?>
                        <option value="<?=$i?>"<?=$i==$form['annee']?' selected':''?>><?=$i?></option>
<?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" for="transmission_id">Transmission:</label>
                <div class="col-xs-6">
                    <div class="xbtn-group" data-toggle="buttons">
<?php foreach ($transmissions as $transmission) { ?>
                        <label class="btn">
                            <input type="radio" name="transmission_id" value="<?=$transmission['transmission_id']?>"<?=$transmission['transmission_id']==$form['transmission_id']?' checked':''?> required>
                            <i class="fa fa-circle-o fa-2x"></i>
                            <i class="fa fa-check-circle-o fa-2x"></i>
                            <span class="test"><?=$transmission['nom_transmission']?></span>
                        </label>
<?php } ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" for="description">Description:</label>
                <div class="col-xs-6">
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Tapez une description" required><?=$form['description']?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" for="nbre_places">Nombre de places:</label>
                <div class="col-xs-6">
                    <input type="text" class="form-control" name="nbre_places" id="nbre_places" value="<?=$form['nbre_places']?>" placeholder="nombre de places">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" for="carburant_id">Type de carburant:</label>
                <div class="col-xs-6">
                    <select class="form-control formSelector" name="carburant_id" id="carburant_id" required>
                        <option value="">-- Choisissez --</option>
<?php foreach($carburants as $carburant) { ?>
                        <option value="<?=$carburant['carburant_id']?>"<?=$carburant['carburant_id']==$form['carburant_id']?' selected':''?>><?=$carburant['nom_carburant']?></option>
<?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" for="prix">Prix/jour ($)</label>
                <div class="col-xs-6">
                    <input type="number" step="0.01" min="1.00" class="form-control" name="prix" id="prix" value="<?=$form['prix']?>" placeholder="Prix par jour ($)" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" for="matricule" >Matricule</label>
                <div class="col-xs-6">
                    <input type="text" class="form-control" name="matricule" id="matricule" value="<?=$form['matricule']?>" placeholder="Matricule" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" for="province_id">Province</label>
                <div class="col-xs-6">
                    <select class="form-control formSelector" name="province_id" id="province_id">
                        <option value="">-- Choisissez --</option>
<?php foreach($provinces as $province) { ?>
                        <option value="<?=$province['province_id']?>"<?=$province['province_id']==$form['province_id']?' selected':''?>><?=$province['province']?></option>
<?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" for="ville_id">Ville</label>
                <div class="col-xs-6">
                    <select class="form-control formSelector" name="ville_id" id="ville_id">
                        <option value="">-- Choisissez --</option>
<?php foreach($villes as $ville) { ?>
                        <option value="<?=$ville['ville_id']?>"<?=$ville['ville_id']==$form['ville_id']?' selected':''?>><?=$ville['nom_ville']?></option>
<?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" for="arr_id">Arrondissement</label>
                <div class="col-xs-6">
                    <select class="form-control formSelector" name="arr_id" id="arr_id" required>
                        <option value="">-- Choisissez --</option>
<?php foreach($arrondissements as $arrond) { ?>
                        <option value="<?=$arrond['arr_id']?>"<?=$arrond['arr_id']==$form['arr_id']?' selected':''?>><?=$arrond['nom_arr']?></option>
<?php } ?>
                    </select>
                </div>
            </div>
<?php

// On n'affiche la date de disponibilité que lors de la création du véhicule.
// Après cela, on doit utiliser la gestion de disponibilités.

if ($form['vehicule_id'] == '0') { ?>
            <div class="form-group">

                <label class="control-label col-xs-3" for="date_debut">Disponibilité:</label>
                <div class="col-md-3 col-xs-6">
                    <div class="input-group date" id="xdatetimepickerDe">
                        <input type="text" class="form-control" name="date_debut" id="date_debut" value="<?=$form['date_debut']?>" title="Insérez la date initiale où ce véhicule sera disponible" placeholder="date début" required>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-0 col-xs-6 col-xs-offset-3">
                    <div class="input-group date" id="xdatetimepickerA">
                        <input type="text" class="form-control" name="date_fin" id="date_fin" value="<?=$form['date_fin']?>" title="Insérez la date jusqu'où ce véhicule sera disponible" placeholder="date fin" required>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>

<?php } ?>
            <div class="form-group">
                <label class="control-label col-xs-3" for="photo">Photo:</label>
                <div class="col-xs-6">
                    <input type="file" class="form-control-file" id="photo" name="photo">
                </div>
            </div>



            <br />
            <div class="form-group">
                <div class="col-xs-offset-3 col-xs-9">
<?php if ($form['vehicule_id'] == '0') { ?>
                    <input type="submit" class="btn btn-primary" value="S'inscrire">
<?php } else { ?>
                    <input type="submit" class="btn btn-primary" value="Sauvegarder">
<?php } ?>
                    <input type="reset" class="btn btn-default" value="Effacez le formulaire!">
                </div>
            </div>
        </form>
    </div>
</section>
<?php
//========================================================
//Footer
include VIEWPATH . 'common/footer.php';
