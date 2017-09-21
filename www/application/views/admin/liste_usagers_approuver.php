<?php
// Header
include VIEWPATH . '/common/header.php';
//========================================================
?>
<section id="listeAdmin">
<?php include VIEWPATH . 'admin/boutons_admin_usagers.php'; ?>
    <h2><?=$title?></h2>
    <form action="" name="formulaire" id="form-Members-id">
        <table class="table table-reponsive">
            <tr>
                <th class="">Nº</th>
                <th class="">Prénom</th>
                <th class="">Nom</th>
                <th class="">Courriel</th>
                <th class="">Téléphone</th>
                <th class="">Code postal</th>
                <th class="">État</th>
                <th class="">Approuver</th>
                <th class="">Refuser</th>
            </tr>
            <?php foreach ($usagers as $user) { ?>
            <tr id="tr<?php echo $user['user_id']?>">
                <td class=""><?php echo $user['user_id']?></td>
                <td class=""><?php echo $user['prenom']?></td>
                <td class=""><?php echo $user['nom']?></td>
                <td class=""><?php echo $user['courriel']?></td>
                <td class=""><?php echo $user['telephone']?></td>
                <td class=""><?php echo $user['code_postal']?></td>
                <td><?php echo EUsager::getDescriptionEtat($user['etat_usager']); ?></td>
				<td class="editable"><span id="btn-approuver-<?=$user['user_id']?>" title="Approuver ce membre" class="glyphicon glyphicon-ok-circle btn-accepter"></span></td>
				<td class="editable"><span id="btn-refuser-<?=$user['user_id']?>" title="Refuser demande d'abonnement de ce membre" class="glyphicon glyphicon-ban-circle btn-refuser"></span></td>
            </tr>
            <?php } ?>
        </table>
    </form>

</section>
<?php
// footer
include VIEWPATH . '/common/footer.php';
//========================================================
?>
