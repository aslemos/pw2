<?php
// Header
include VIEWPATH . 'common/header.php';
//========================================================
include VIEWPATH . 'client/boutons_prestataire.php';
?>
<h2><?=$title?></h2>
<form action="<?= $base_url ?>locations/locataires#s" method="post" name="formulaire" id="form-demandes-id">
    <div class="table-responsive">

        <div class="row form-group">
            <label class="control-label col-md-2 col-xs-12">Locataire :</label>
            <div class="col-md-6 col-xs-12">
                <select class="form-control" name="locataire_id">
                    <option>-- Tous --</option>
                    <?php foreach ($usagers as $usager) { ?>
                        <option value="<?= $usager['user_id']; ?>"<?=$usager['user_id']==$locataire_id?' selected':''?>><?= $usager['prenom']; ?></option>
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
                    <th class="">Véhicule</th>
<!--                    <th class="">Marque</th>
                    <th class="">Modèle</th>
                    <th class="">Année</th>-->
                    <th class="">Matricule</th>
                    <th class="">Date début</th>
                    <th class="">Date fin</th>
                    <th class="">Jours<br />location</th>
                    <th class="">Montant<br />total</th>
                    <th class="">Locataire</th>
                    <th class="">État<br>réservation</th>
                    <th class="">Action</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($locations as $location) { ?>
                    <tr>
                        <td class=""><?=$location->getId()?></td>
                        <td class=""><?=$location->getVehicule()->toString()?></td>
<!--                        <td class=""><?=$location->getVehicule()->getMarque()->getNom()?></td>
                        <td class=""><?=$location->getVehicule()->getModele()->getNom()?></td>
                        <td class=""><?=$location->getVehicule()->getAnnee()?></td>-->
                        <td class=""><?=$location->getVehicule()->getMatricule()?></td>
                        <td class=""><?=$location->getDateDebut()?></td>
                        <td class=""><?=$location->getDateFin()?></td>
                        <td class=""><?=$location->getNbJours()?></td>
                        <td class=""><?=$location->getPrixTotal()?></td>
                        <td class=""><?=$location->getLocataire()->toString()?></td>
                        <td class=""><?=ELocation::getDescriptionEtat($location->getEtat())?></td>
                        <td class="">
<?php if ($location->estPayee()) { ?>
                            <a title="Faire réclamation du locataire" href="<?= $base_url ?>reclamation/form_locataire/<?= $location->getId() ?>#s"><i class="fa fa-user fa-badge"><i class="fa fa-exclamation"></i></i></span></a>
<?php } ?>
                        </td>
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
