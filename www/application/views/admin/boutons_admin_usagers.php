<div class="btn-liens" >
    <!-- Bouton pour afficher la liste des voiture en location d'un membres -->
    <a class="btn btn-general position" href="<?= $base_url; ?>admin/listeMembres#s" >Liste des membres</a>

    <!-- Approbation de nouveau membre, avant qu'il puisse utiliser le système -->
    <a class="btn btn-general position" href="<?= $base_url; ?>admin/approuverMembre#s" >Approuver membre</a>

    <?php if (UserAcces::userIsSuperAdmin()) { ?>
    <!-- Bouton pour afficher la des administrateurs -->
    <a class="btn btn-general position" href="<?= $base_url; ?>admin/listeAdmins#s">Liste des admins </a>
    <?php } ?>

</div>
