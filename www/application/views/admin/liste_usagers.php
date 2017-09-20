<?php
// Header
include VIEWPATH . '/common/header.php';
//========================================================
?>
<section id="listeAdmin">
<?php include VIEWPATH . 'admin/boutons_admin.php'; ?>
    <h2><?=$title?></h2>
    <!--<form action="" name="formulaire" id="form-voitures-id">-->
    <div class="table-responsive">
<?php if (count($usagers) > 0) { ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="">Nº</th>
                    <th class="">Prénom</th>
                    <th class="">Nom</th>
                    <th class="">Code postal</th>
                    <th class="">Téléphone</th>
                    <th class="">Courriel</th>
                    <th class="">Rôle</th>
                    <th class="">État</th>
                    <th class="">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usagers as $user) : ?>
                <tr>
                    <td class=""><?php echo $user['user_id']?></td>
                    <td class=""><?php echo $user['prenom']?></td>
                    <td class=""><?php echo $user['nom']?></td>
                    <td class=""><?php echo $user['code_postal']?></td>
                    <td class=""><?php echo $user['telephone']?></td>
                    <td class=""><?php echo $user['courriel']?></td>
                    <td class=""><?php echo $user['nom_role']; ?></td>
                    <td class=""><?php echo EUsager::getDescriptionEtat($user['etat_usager']); ?></td>
                    <td>
                        <a class="" href="<?php echo $base_url . 'usager/view/' . $user['user_id']; ?>">
                            <img class="img-responsive" src="<?= $base_url; ?>assets/images/usagers/<?php echo $user['user_photo']?>" >
                        </a>
                        <img src="<?= $base_url; ?>assets/images/ok.png" >
                        <img src="<?= $base_url; ?>assets/images/no.png" >
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
<?php } else { ?>
        <h3 class="alert_title">Il n'y a pas de membre</h3>
<?php } ?>
    </div>
    <!--</form>-->

</section>
<?php
// footer
include VIEWPATH . '/common/footer.php';
//========================================================
?>
