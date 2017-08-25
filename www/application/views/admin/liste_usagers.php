<div class="btn-liens" >
<!-- Boutton pour afficher la liste des membres -->
<a class="btn btn-danger" href="<?= base_url(); ?>membre.php" >Liste des membres</a> 
<!-- Boutton pour afficher la liste des voitures -->
<a class="btn btn-danger" href="<?= base_url(); ?>information.php" >Liste des voitures</a>
<!-- Boutton pour afficher la des adminitrateurs -->
<a class="btn btn-danger" href="<?= base_url(); ?>admin.php">Liste des admins </a>  
</div>	
<h1>Membres</h1>
<form action="" name="formulaire" id="form-voitures-id">
	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th class="">Nº</th>
				<th class="">Prénom</th>
				<th class="">Nom</th>
				<th class="">Code postal</th>
				<th class="">Téléphone</th>
				<th class="">Courriel</th>
				<th class="">Afficher plus</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="">1</td>
				<td class="">test</td>
				<td class="">test</td>
				<td class="">test</td>
				<td class="">test</td>
				<td class="">test</td>
				<td><a href="#"><img class="img-responsive" src="<?= base_url(); ?>assets/images/view.png" ></a></td>
			</tr>						
		</tbody>
	</table>
	</div>
</form>
<!-- Div pour affichage -->
<div id="resultat"></div>
<div id="divAuto_voitures"></div>		
