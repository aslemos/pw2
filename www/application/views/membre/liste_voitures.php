<?php
// Header
include VIEWPATH . 'common/header.php';
//========================================================
include VIEWPATH . 'client/boutons_prestataire.php';
?>
<script>
    $(function(){
        $('[id^="btn-supp-"]').on('click', function(){
            var id = this.id.split('-')[2];
            if (id && confirm("Êtes-vous sûr de vouloir supprimer ce véhicule ?")) {
                document.location.href = base_url + 'vehicule/deleteVehicule/' + id;
            }
        });

    });
</script>
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
                <th class="">Locations</th>
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
				<td class=""><?=$vehicule['nb_locations']?></td>
<?php if ($vehicule['etat_vehicule'] == EVehicule::ETAT_ACTIF) { ?>
                <td><a title="Disponibiliser" href="<?= $base_url ?>disponibilite/create/<?= $vehicule['vehicule_id'] ?>#s"><i class="fa fa-calendar"></i></a></td>
<?php } else { ?>
                <td></td>
<?php } ?>
                <td><a title="Modifier" href="<?= $base_url ?>vehicule/editVehicule/<?= $vehicule['vehicule_id'] ?>#s"><i class="fa fa-pencil-square-o"></i></a></td>
<?php if ($vehicule['nb_locations'] == 0) { ?>
				<td><a title="Supprimer" id="btn-supp-<?=$vehicule['vehicule_id']?>" href="javascript:void(0)"><i class="fa fa-trash-o"></i></a></td>
<?php } else { ?>
                <td></td>
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
