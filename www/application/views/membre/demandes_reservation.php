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
				<th class="">Prix/jour</th>
				<th class="">Date Début</th>
				<th class="">Date Fin</th>
				<th class="">Jours</th>
				<th class="">Prix Total</th>
				<th class="titre_editable">Approuver</th>
				<th class="titre_editable">Refuser</th>
			</tr>
		</thead>
		<tbody>
<?php foreach($reservations as $reservation) { ?>
			<tr id="tr<?=$reservation->getId()?>">
				<td class=""><?=$reservation->getId()?></td>
				<td class=""><?=$reservation->getVehicule()->getMarque()->getNom()?></td>
				<td class=""><?=$reservation->getVehicule()->getModele()->getNom()?></td>
				<td class=""><?=$reservation->getVehicule()->getAnnee()?></td>
				<td class=""><?=$reservation->getVehicule()->getMatricule()?></td>
				<td class=""><?=$reservation->getLocataire()->toString()?></td>
				<td class=""><?=$reservation->getVehicule()->getPrix()?></td>
				<td class=""><?=$reservation->getDateDebut()?></td>
				<td class=""><?=$reservation->getDateFin()?></td>
				<td class=""><?=$reservation->getNbJours()?></td>
				<td class=""><?=$reservation->getPrixTotal()?></td>
				<td><span onclick="approuverReservation(<?=$reservation->getId()?>)" class="glyphicon glyphicon-ok-circle btn-accepter"></span></td>
				<td><span onclick="refuserReservation(<?=$reservation->getId()?>)" class="glyphicon glyphicon-ban-circle btn-refuser"></span></td>
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
