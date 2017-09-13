<?php
// Header
include VIEWPATH . 'common/header.php';
//========================================================
include VIEWPATH . 'client/boutons_client.php';
?>
<h2>Historique des locations</h2>
<form action="<?= $base_url ?>locations/locationsByUser" method="post" name="formulaire" id="form-demandes-id">
    <div class="table-responsive">
        <label>Choisir une voiture</label>
        <select name="voiture">
            <option>Sélectionner</option>
            <!--mettre les données dynamiquement dans la liste de voitures-->
            <?php foreach ($vehicules as $vehicule) { ?>
                <option value="<?= $vehicule['vehicule_id']; ?>"><?= $vehicule['nom_modele']; ?></option>
            <?php } ?>
        </select>
        <label>Période</label>
        <div class="form-group">
            <label class="control-label col-xs-3">De :</label>
            <div class='input-group date col-xs-6' >
                <input type='text' class="form-control" id="date_debut" name="date_debut"/>
                <span class="input-group-addon" >
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3">à :</label>
            <div class='input-group date col-xs-6' >
                <input type='text' class="form-control" id="date_fin" name="date_fin"/>
                <span class="input-group-addon" >
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>

        <div class="row btn-liens" >
            <!-- Boutton pour afficher l'historique des location pour un membre -->
            <button type="submit" class="btn btn-danger position" id="RecherchePeriod">Recherche Periode </button>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th class="">Nº</th>
                    <th class="">Marque</th>
                    <th class="">Modèle</th>
                    <th class="">Matricule</th>
                    <th class="">Date début</th>
                    <th class="">Date fin</th>
                    <th class="">Année</th>
                    <th class="">Nombre de <br />jours loué</th>
                    <th class="">Montant<br />total</th>
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
                        <td class="">1</td>
                        <td class=""><?= $location['nom_marque']; ?></td>
                        <td class=""><?= $location['nom_modele']; ?></td>
                        <td class=""><?= $location['matricule']; ?></td>
                        <td class=""><?= $location['date_debut']; ?></td>
                        <td class=""><?= $location['date_fin']; ?></td>
                        <td class=""><?= $location['annee']; ?></td>
                        <td class=""><?= $nb_jours; ?></td>
                        <td class=""><?= $valeur_total; ?></td>
                        <td class=""><a class="btn btn-inline" href="<?= $base_url ?>reclamation/form_vehicule/<?= $location['vehicule_id'] ?>"></a></td>
                        <td class=""><a class="btn btn-inline"href="<?= $base_url ?>reclamation/form_proprietaire/<?= $location['proprietaire_id'] ?>"></a></td>
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
