<?php
// Header
include VIEWPATH . 'common/header.php';
//========================================================
include VIEWPATH . 'admin/boutons_admin_usagers.php';
?>
<section id="listeAdmin">
    <h2><?=$title?></h2>
<?php if (count($usagers) > 0) { ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th class="">Nº</th>
                <th class="">Username</th>
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
                <td class=""><?php echo $user['username']?></td>
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
    </div>
<?php } else { ?>
    <h3 class="alert_title">Aucune demande d'abonnement n'a été trouvée</h3>
<?php } ?>
</section>
<?php
// footer
include VIEWPATH . 'common/footer.php';
//========================================================

