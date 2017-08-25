<div class="btn-liens" >
	<!-- Boutton pour afficher la liste des voiture en location d'un membres -->
	<a class="btn btn-danger" href="<?= base_url(); ?>information.php" >Liste de <br />mes voitures</a> 
	<!-- Boutton pour ajouter une voitures -->
	<a class="btn btn-danger" href="<?= base_url(); ?>information.php" >Ajouter <br />une voiture</a>
	<!-- Boutton pour afficher les demandes de location pour aprobation -->
	<a class="btn btn-danger" href="<?= base_url(); ?>location.php" >Approuver <br>une demande </a>
	<!-- Boutton pour afficher l'historique des location pour un membre -->
	<a class="btn btn-danger" href="<?= base_url(); ?>historique.php">Historique <br>des locations </a>  
</div> 
		
<h1>Demandes à approuver</h1>
<form action="" name="formulaire" id="form-demandes-id">
	<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th class="">Nº</th>
				<th class="">Marque</th>
				<th class="">Modele</th>
				<th class="">Matricule</th>
				<th class="">Année</th>
				<th class="">Nom client</th>
				<th class="">Prix</th>
				<th class="date">Location<br />Date Début</th>
				<th class="date">Location<br />Date Fin</th>
				<th class="titre_editable">Approuver</th>
				<th class="titre_editable">Refuser</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="">1</td>
				<td class="">test</td>
				<td class="">test</td>
				<td class="">test</td>
				<td class="">test</td>
				<td class="">Client</td>
				<td class="">$500</td>
				<td class="date">Date début</td>
				<td class="date">Date fin</td>
				<td><a href="#"><img class="img-responsive" src="<?= base_url(); ?>assets/images/ok.png" ></a></td>
				<td><a href="#"><img class="img-responsive" src="<?= base_url(); ?>assets/images/no.png" ></a></td>
			</tr>						
		</tbody>
	</table>
	</div>
</form>
<!-- Div pour affichage -->
<div id="resultat"></div>
<div id="divAuto_voitures"></div>