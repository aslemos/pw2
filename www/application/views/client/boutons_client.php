<div class="row btn-liens" >
    <!-- Bouton pour afficher la liste des voitures d'un membres -->
    <a class="btn btn-danger position" href="<?=$base_url?>membre/vehicules#s">Mes véhicules</a>

    <!-- Bouton pour ajouter une voiture -->
    <a class="btn btn-danger position" href="<?=$base_url?>vehicule/createVehicule#s">Ajouter un véhicule</a>

    <!-- Bouton pour afficher les demandes de location pour approbation -->
    <a class="btn btn-danger position" href="<?=$base_url?>membre/demandesReservation#s" >Approuver réservation </a>

    <!-- Bouton pour afficher l'historique des locations faites par les locataires des voitures d'un usager -->
    <a class="btn btn-danger position" href="<?=$base_url?>locations/locataires#s">Mes locataires</a>

    <!-- Bouton pour afficher l'historique des locations faites par un locataire -->
    <a class="btn btn-danger position" href="<?=$base_url?>locations/locationsByUser#s">Mes locations</a>
</div>
