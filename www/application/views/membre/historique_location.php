<?php
// Header
include VIEWPATH . 'common/header.php';
//========================================================
include VIEWPATH . 'client/boutons_client.php';
?>
<h2><?=$title?></h2>
<form action="<?=$action?>" method="post" name="formulaire" id="form-demandes-id">
    <div class="table-responsive">

        <div class="row form-group">
            <label class="control-label col-md-2 col-xs-12">Véhicule :</label>
            <div class="col-md-6 col-xs-12">
                <select class="form-control" name="vehicule_id">
                    <option>-- Tous --</option>
<?php foreach ($vehicules as $vehicule) { ?>
                    <option value="<?= $vehicule->getId(); ?>"<?=$vehicule->getId()==$vehicule_id?' selected':''?>><?= $vehicule->toString(); ?></option>
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

<?php if (count($locations) > 0) { ?>
        <table class="table">
            <thead>
                <tr>
                    <th class="">Nº</th>
                    <th class="">Véhicule</th>
                    <th class="">Matricule</th>
                    <th class="">Date début</th>
                    <th class="">Date fin</th>
                    <th class="">Jours<br />location</th>
                    <th class="">Montant<br />total</th>
                    <th class="">Propriétaire</th>
                    <th class="">État<br>réservation</th>
                    <th title="Choisissez l'action" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($locations as $location) { ?>
                    <tr>
                        <td class=""><?=$location->getId()?></td>
                        <td class=""><?=$location->getVehicule()->toString()?></td>
                        <td class=""><?=$location->getVehicule()->getMatricule()?></td>
                        <td class=""><?=$location->getDateDebut()?></td>
                        <td class=""><?=$location->getDateFin()?></td>
                        <td class=""><?=$location->getNbJours()?></td>
                        <td class=""><?=$location->getPrixTotal()?></td>
                        <td class=""><?=$location->getLocataire()->toString()?></td>
                        <td class=""><?=ELocation::getDescriptionEtat($location->getEtat())?></td>
<?php if ($location->estPayee()) { ?>
                        <td><a title="Faire une réclamation du véhicule" href="<?= $base_url ?>reclamation/form_vehicule/<?=$location->getVehiculeId()?>#s"><i class="fa fa-car fa-badge"><i class="fa fa-exclamation"></i></i></a></td>
                        <td><a title="Faire une réclamation du propriétaire" href="<?= $base_url ?>reclamation/form_proprietaire/<?=$location->getLocataireId()?>#s"><i class="fa fa-user fa-badge"><i class="fa fa-exclamation"></i></i></a></td>
<?php } else if ($location->estApprouvee()) { ?>
                        <td colspan="2"><a title="Payer la réservation" href="<?=$base_url?>locations/form_payement/<?=$location->getId()?>#s"><i class="fa fa-dollar"></i></a></td>
<?php } else { ?>
                        <td colspan="2">-</td>
<?php } ?>
                    </tr>
<?php } ?>

            </tbody>

        </table>
<?php } else { ?>
        <h3 class="alert_title">Aucun résultat</h3>
<?php } ?>
    </div>
</form>
<!-- Div pour affichage -->
<div id="resultat"></div>
<div id="divAuto_Members"></div>
<?php
//========================================================
//Footer
include VIEWPATH . 'common/footer.php';
