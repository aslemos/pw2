<?php

$meta_keywords = "";
$meta_description = "";
$page_title = "historique des locations";
$body_class = "subpages membre";

// Header
include VIEWPATH . '/common/header.php';
//========================================================
include VIEWPATH .'client/boutons_client.php';
?>
<h1>Historique des locations</h1>
<form action="" name="formulaire" id="form-demandes-id">
	<div class="table-responsive">
	<label>Choisir une voiture</label>
	<select name="voiture">
		<option>Sélectionner</option>
        <!--mettre les données dynamiquement dans la liste de voitures-->
        <?php foreach ($vehicules as $vehicule) { ?>
		<option value="<?=$vehicule['vehicule_id'];?>"><?=$vehicule['nom_modele']; ?></option>
        <?php } ?>
	</select>
	<label>Periode</label>
                <div class="form-group">
                    <label class="control-label col-xs-3">De :</label>
                    <div class='input-group date col-xs-6' >
                        <input type='text' class="form-control" id='datetimepickerDe'/>
                        <span class="input-group-addon" >
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">à :</label>
                    <div class='input-group date col-xs-6' >
                        <input type='text' class="form-control" id='datetimepickerA'/>
                        <span class="input-group-addon" >
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

        <div class="row btn-liens" >
            <!-- Boutton pour afficher l'historique des location pour un membre -->
            <a class="btn btn-danger position" id="RecherchePeriod">Recherche Periode </a>
        </div>


	<table class="table">
		<thead>
			<tr>
				<th class="">Nº</th>
				<th class="">Marque</th>
				<th class="">Modèle</th>
				<th class="">Matricule</th>
				<th class="">Année</th>
				<th class="">Nombre de <br />jours loué</th>
				<th class="">Montant<br />total</th>
			</tr>
		</thead>
		<tbody>
            <!--mettre les données dynamiquement dans la liste de locations-->
            <?php foreach ($locations as $location) {
                var_dump($locations);
                var_dump($location);
                // À FAIRE :
                // - calculer le nombre de jours (date finale - date initiale)

                $nb_jours = 1; // ????????????
                $valeur_total = $location['prix'] * $nb_jours;
                ?>
			<tr>
				<td class="">1</td>
				<td class=""><?=$location['nom_marque'];?></td>
				<td class=""><?=$location['nom_modele'];?></td>
				<td class=""><?=$location['matricule'];?></td>
				<td class=""><?=$location['annee'];?></td>
				<td class=""><?=$nb_jours;?></td>
				<td class=""><?=$valeur_total;?></td>
			</tr>
            <?php } ?>
		</tbody>
	</table>
	</div>
</form>
<!-- Div pour affichage -->
<div id="resultat"></div>
<div id="divAuto_Members"></div>

<script>

                /*Annee de voiture*/
                $(function () {
                    $('#datetimepickerDe').datepicker({                  
                  });
                });

                $(function () {
                    $('#datetimepickerA').datepicker();
                });
                          
                
</script>

<?php
//========================================================
//Footer
include VIEWPATH . '/common/footer.php';
