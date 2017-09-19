<?php
// Header
include VIEWPATH . 'common/header.php';
//========================================================
include VIEWPATH . 'client/boutons_client.php';
?>
<h2><?=$title?></h2>
	<form action="" name="formulaire" id="form-voitures-id">
		<div class="table-responsive">
		<table class="table table-striped">
			<thead>
			<tr>
				<th class="">Nº</th>
				<th class="">Marque</th>
				<th class="">Modèle</th>
				<th class="">Année</th>
				<th class="">Matricule</th>
				<th class="">Prix</th>
				<th class="">État</th>
				<th class="">Modifier</th>
				<th class="">Supprimer</th>
			</tr>
			</thead>
			<tbody>
<?php foreach($vehicules as $vehicule) { ?>
			<tr>
				<td class=""><?=$vehicule['vehicule_id']?></td>
				<td class=""><?=$vehicule['nom_marque']?></td>
				<td class=""><?=$vehicule['nom_modele']?></td>
				<td class=""><?=$vehicule['annee']?></td>
				<td class=""><?=$vehicule['matricule']?></td>
				<td class=""><?=$vehicule['prix']?></td>
				<td class=""><?=EVehicule::getDescriptionEtat($vehicule['etat_vehicule'])?></td>
				<td><a href="<?=$base_url?>vehicule/editVehicule/<?=$vehicule['vehicule_id']?>#s"><img class="img-responsive" src="/assets/images/ok.png" ></a></td>
				<td><a href="#"><img class="img-responsive" src="/assets/images/no.png" ></a></td>
			</tr>
<?php } ?>
			</tbody>
		</table>
		</div>
	</form>
<!-- Div pour affichage -->
<div id="resultat"></div>
<div id="divAuto_voitures"></div>

<?php
//========================================================
//Footer
include VIEWPATH . '/common/footer.php';
