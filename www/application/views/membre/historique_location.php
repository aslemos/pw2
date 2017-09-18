<?php
// Header
include VIEWPATH . 'common/header.php';
//========================================================
include VIEWPATH . 'client/boutons_client.php';
?>
<h2>Historique des locations</h2>
<form action="<?= $base_url ?>locations/locationsByUser#s" method="post" name="formulaire" id="form-demandes-id">
    <div class="table-responsive">


        <div class="row form-group">
            <label class="control-label col-md-2 col-xs-12">Véhicule :</label>
            <div class="col-md-6 col-xs-12">
                <select class="form-control" name="vehicule_id">
                    <option>-- Tous --</option>
<?php foreach ($vehicules as $vehicule) { ?>
                    <option value="<?= $vehicule['vehicule_id']; ?>"<?=$vehicule['vehicule_id']==$vehicule_id?' selected':''?>><?= $vehicule['nom_modele']; ?></option>
<?php } ?>
                </select>
            </div>
        </div>

        <div class="row form-group">
            <label class="control-label col-md-2 col-xs-12">Période :</label>
            <div class="col-md-3 col-xs-6">
                <div class="input-group date">
                    <input type="text" class="form-control" id="date_debut" name="date_debut" value="<?=$date_debut?>"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>

                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="input-group date">
                    <input type="text" class="form-control" id="date_fin" name="date_fin" value="<?=$date_fin?>"/>
                    <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-md-3 hidden-xs">
                <button type="submit" class="btn btn-danger position" id="RecherchePeriod">Rechercher</button>
            </div>
        </div>

        <div class="row hidden-lg hidden-md hidden-sm">
            <button type="submit" class="btn btn-danger position" id="RecherchePeriod">Rechercher</button>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th class="">Nº</th>
                    <th class="">Marque</th>
                    <th class="">Modèle</th>
                    <th class="">Année</th>
                    <th class="">Matricule</th>
                    <th class="">Date début</th>
                    <th class="">Date fin</th>
                    <th class="">Nombre de <br />jours loué</th>
                    <th class="">Montant<br />total</th>
                    <th class="">Propriétaire</th>
                    <th class="">État<br>réservation</th>
                    <th class="">Réclamer voiture</th>
                    <th class="">Réclamer Propriétaire</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($locations as $location) {
                    $diff = abs(strtotime($location['date_fin']) - strtotime($location['date_debut']));
                    $nb_jours = (int) floor($diff / (60 * 60 * 24)) + 1;
                    $valeur_total = $location['prix'] * $nb_jours;
                    ?>
                    <tr>
                        <td class=""><?= $location['location_id']; ?></td>
                        <td class=""><?= $location['nom_marque']; ?></td>
                        <td class=""><?= $location['nom_modele']; ?></td>
                        <td class=""><?= $location['annee']; ?></td>
                        <td class=""><?= $location['matricule']; ?></td>
                        <td class=""><?= $location['date_debut']; ?></td>
                        <td class=""><?= $location['date_fin']; ?></td>
                        <td class=""><?= $nb_jours; ?></td>
                        <td class=""><?= $valeur_total; ?></td>
                        <td class=""><?= $location['prenom'] . ' ' . $location['nom']?></td>
                        <td class=""><?= ELocation::getDescriptionEtat($location['etat_reservation']) ?></td>
                        <td class=""><a class="btn btn-inline" href="<?= $base_url ?>reclamation/form_vehicule/<?= $location['vehicule_id'] ?>#s"></a></td>
                        <td class=""><a class="btn btn-inline"href="<?= $base_url ?>reclamation/form_proprietaire/<?= $location['proprietaire_id'] ?>#s"></a></td>
                    </tr>
<?php } ?>

            </tbody>

        </table>
    </div>
</form>
<!-- Div pour affichage -->
<div id="resultat"></div>
<div id="divAuto_Members"></div>
<?php
//========================================================
//Footer
include VIEWPATH . 'common/footer.php';
