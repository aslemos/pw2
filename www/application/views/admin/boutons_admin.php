<div class="btn-liens" >
    <!-- Bouton pour afficher la liste des voiture en location d'un membres -->
    <a class="btn position" href="<?= $base_url; ?>admin/listeMembres#s" >Liste des membres</a>

    <!-- Approbation de nouveau membre, avant qu'il puisse utiliser le système -->
    <a class="btn position" href="<?= $base_url; ?>admin/approuverMembre#s" >Approuver membre</a>

    <!-- Approbation de nouveau membre, avant qu'il puisse utiliser le système -->
    <a class="btn btn-danger position" href="<?= $base_url; ?>admin/approuverMembre#s" >Approuver membre</a>

    <!-- Bouton pour afficher la liste des voitures -->
    <a class="btn position" href="<?= $base_url; ?>admin/listeVehicules#s" >Liste des véhicules</a>

    <!-- Approbation de nouveau véhicule, avant qu'il soit disponible -->
    <a class="btn position" href="<?= $base_url; ?>admin/approuverVehicule#s" >Approuver véhicule</a>

    <?php if (UserAcces::userIsSuperAdmin()) { ?>
    <!-- Bouton pour afficher la des administrateurs -->
    <a class="btn position" href="<?= $base_url; ?>admin/listeAdmins#s">Liste des admins </a>
    <?php } ?>

    <!-- Afficher les réclamations -->
    <a class="btn position" href="<?= $base_url; ?>admin/reclamations#s" >Réclamations</a>

    <!-- Afficher les messages internes -->
    <a class="btn position" href="<?= $base_url; ?>admin/messages#s" >Messages</a>

    <!-- Afficher les messages de contact -->
    <a class="btn position" href="<?= $base_url; ?>admin/contacts#s" >Contacts</a>
</div>
