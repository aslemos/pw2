<div class="btn-liens" >
    <!-- Boutton pour afficher la liste des voiture en location d'un membres -->
    <a class="btn btn-danger position" href="<?= $base_url; ?>admin/listeUsagers#s" >Liste des membres</a>
    <!-- Boutton pour afficher la liste des voitures -->
    <a class="btn btn-danger position" href="<?= $base_url; ?>admin/listeVoitures#s" >Liste des voitures</a>
    <?php if (UserAcces::userIsSuperAdmin()) { ?>
    <!-- Boutton pour afficher la des adminitrateurs -->
    <a class="btn btn-danger position" href="<?= $base_url; ?>admin/listeAdmins#s">Liste des admins </a>
    <? } ?>
</div>
