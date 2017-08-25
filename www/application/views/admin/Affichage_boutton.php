<div class="btn-liens" >
		
	<form action="/pw2/PageAffichageMembers.php" method="get" class="alignement_Members" id="form_Members"></form>

	<form action="/pw2/PageAffichageVoiture2.php" method="get" class="alignement_Voiture" id="form_Voiture"></form>	
			
		<?php 
			//if($_SESSION["est_super_admin"]) {
		?>
	<form action="/pw2/PageAffichageAdmins.php" method="get" class="alignement_Admins" id="form_Admins"></form>
			
	    <!-- Boutton pour Affichage Members-->
	    <button class="btn btn-danger" form="form_Members" id="btn_Affichage_Members" type="submit"  value="Submit">Afficher <br> Members</button>
	    <!-- Boutton pour Affichage Voitures- -->
		<button class="btn btn-danger" form="form_Voiture" id="btn_Affichage_Voitures">Afficher <br> Voitures</button> 
		<!-- Boutton pour Affichage Admins- -->		 
		<button class="btn btn-danger" form="form_Admins" id="btn_Affichage_Admins">Afficher <br> Admins</button> 
			
			<?php // }?>
</div>	
