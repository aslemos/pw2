<div class="row btn-liens" >
    <!-- Bouton pour afficher la liste des voitures d'un membres -->
    <a class="btn btn-danger position" href="<?=$base_url?>membre/view/liste_voitures">Mes voitures</a>

    <!-- Bouton pour ajouter une voiture -->
    <a class="btn btn-danger position" href="<?=$base_url?>membre/view/form_ajouter_voiture">Ajouter une voiture</a>

    <!-- Bouton pour afficher les demandes de location pour approbation -->
    <a class="btn btn-danger position" href="<?=$base_url?>membre/view/demandes_reservation" >Approuver une demande </a>

    <!-- Bouton pour afficher l'historique des locations faites par un locataire -->
    <a class="btn btn-danger position" href="<?=$base_url?>locations/locationsByUser">Mes locations</a>

    <!-- Bouton pour afficher l'historique des locations faites par les locataires des voitures d'un usager -->
    <a class="btn btn-danger position" href="<?=$base_url?>locations/locataires">Mes locataires</a>
</div>
