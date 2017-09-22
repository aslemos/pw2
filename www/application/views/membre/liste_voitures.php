<?php
// Header
include VIEWPATH . 'common/header.php';
//========================================================
include VIEWPATH . 'client/boutons_prestataire.php';
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
				<th colspan="3">Action</th>
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
<?php if ($vehicule['etat_vehicule'] == EVehicule::ETAT_ACTIF) { ?>
                <td><a title="Modifier" href="<?= $base_url ?>vehicule/editVehicule/<?= $vehicule['vehicule_id'] ?>#s"><i class="fa fa-pencil-square-o"></i></a></td>
                <td><a title="Disponibiliser" href="<?= $base_url ?>disponibilite/create/<?= $vehicule['vehicule_id'] ?>#s"><i class="fa fa-calendar"></i></a></td>
				<td><a title="Supprimer" href="#s"><i class="fa fa-trash-o"></i></a></td>
<?php } else { ?>
                <td></td>
                <td></td>
				<td><a title="Supprimer" href="#s"><i class="fa fa-trash-o"></i></a></td>
<?php } ?>
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
