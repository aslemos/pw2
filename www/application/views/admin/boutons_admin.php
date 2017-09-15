<div class="btn-liens" >
    <!-- Bouton pour afficher la liste des voiture en location d'un membres -->
    <a class="btn btn-danger position" href="<?= $base_url; ?>admin/listeUsagers#s" >Liste des membres</a>

    <!-- Bouton pour afficher la liste des voitures -->
    <a class="btn btn-danger position" href="<?= $base_url; ?>admin/listeVoitures#s" >Liste des voitures</a>

    <?php if (UserAcces::userIsSuperAdmin()) { ?>
    <!-- Bouton pour afficher la des administrateurs -->
    <a class="btn btn-danger position" href="<?= $base_url; ?>admin/listeAdmins#s">Liste des admins </a>
    <?php } ?>

    <!-- Afficher les réclamations -->
    <a class="btn btn-danger position" href="<?= $base_url; ?>admin/reclamations#s" >Réclamations</a>

    <!-- Afficher les messages internes -->
    <a class="btn btn-danger position" href="<?= $base_url; ?>admin/messages#s" >Messages</a>

    <!-- Afficher les messages de contact -->
    <a class="btn btn-danger position" href="<?= $base_url; ?>admin/contacts#s" >Contacts</a>
</div>
