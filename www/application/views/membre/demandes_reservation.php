<?php
// Header
include VIEWPATH . 'common/header.php';
//========================================================
include VIEWPATH . 'client/boutons_client.php';
?>
<h2><?=$title?></h2>
<form action="" name="formulaire" id="form-demandes-id">
	<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th class="">N°</th>
				<th class="">Marque</th>
				<th class="">Modèle</th>
				<th class="">Année</th>
				<th class="">Matricule</th>
				<th class="">Client</th>
				<th class="">Prix</th>
				<th class="date">Date Début</th>
				<th class="date">Date Fin</th>
				<th class="date">Jours</th>
				<th class="titre_editable">Approuver</th>
				<th class="titre_editable">Refuser</th>
			</tr>
		</thead>
		<tbody>
<?php foreach($reservations as $reservation) {
            $nb_jours = 0;
            $montant = ELocation::calculerPrixTotal($reservation['prix'], $reservation['date_debut'], $reservation['date_fin'], $nb_jours);
?>
			<tr>
				<td class=""><?=$reservation['location_id']?></td>
				<td class=""><?=$reservation['nom_marque']?></td>
				<td class=""><?=$reservation['nom_modele']?></td>
				<td class=""><?=$reservation['annee']?></td>
				<td class=""><?=$reservation['matricule']?></td>
				<td class=""><?=$reservation['prenom'] . ' ' . $reservation['nom']?></td>
				<td class=""><?=$reservation['prix']?></td>
				<td class=""><?=$reservation['date_debut']?></td>
				<td class=""><?=$reservation['date_fin']?></td>
				<td class=""><?=$nb_jours?></td>
				<td><a href="#"><img class="img-responsive" src="/assets/images/ok.png" ></a></td>
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
include VIEWPATH . 'common/footer.php';