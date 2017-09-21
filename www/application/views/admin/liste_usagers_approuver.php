<?php
// Header
include VIEWPATH . '/common/header.php';
//========================================================
?>
<section id="listeAdmin">
<?php include VIEWPATH . 'admin/boutons_admin_usagers.php'; ?>
    <h2><?=$title?></h2>
    <form action="" name="formulaire" id="form-Members-id">
        <table class="table table-responsive">
            <tr>
                <td class="titre_editable">Nº</td>
                <td class="titre_editable">Prénom</td>
                <td class="titre_editable">Nom</td>
                <td class="titre_editable">Courriel</td>
                <td class="titre_editable">Téléphone</td>
                <td class="titre_editable">Code postal</td>
                <td class="titre_editable">État</td>
                <td class="titre_editable">Approuver</td>
                <td class="titre_editable">Refuser</td>
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
                <td class="editable">
                    <img src="<?= $base_url; ?>assets/images/ok.png" >
                </td>
                <td class="editable">
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
