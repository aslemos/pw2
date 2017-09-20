<?php
// Header
include VIEWPATH . '/common/header.php';
//========================================================
?>
<section id="listeAdmin">
<?php include VIEWPATH . 'admin/boutons_admin.php'; ?>
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
            <tr>
                <td class=""><?php echo $user['user_id']?></td>
                <td class=""><?php echo $user['prenom']?></td>
                <td class=""><?php echo $user['nom']?></td>
                <td class=""><?php echo $user['courriel']?></td>
                <td class=""><?php echo $user['telephone']?></td>
                <td class=""><?php echo $user['code_postal']?></td>
                <td><?php echo EUsager::getDescriptionEtat($user['etat_usager']); ?></td>
                <td class="">
                    <img src="<?= $base_url; ?>assets/images/ok.png" >
                </td>
                <td class="">
                    <img src="<?= $base_url; ?>assets/images/no.png" >
                </td>

<!--                <td>
                    <a class="" href="<?php echo $base_url . 'usager/view/' . $user['user_id']; ?>">
                        <img class="img-responsive" src="<?= $base_url; ?>assets/images/usagers/<?php echo $user['user_photo']?>" >
                    </a>
                </td>-->
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
