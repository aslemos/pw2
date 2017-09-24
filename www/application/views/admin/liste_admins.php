<?php
// Header
include VIEWPATH . 'common/header.php';
//========================================================
include VIEWPATH . 'admin/boutons_admin_usagers.php';
?>
<section id="listeAdmin">
    <h2><?=$title?></h2>
<?php if (count($usagers) > 0) { ?>
<!--<a class="" href="<?php echo $base_url . 'usager/view/' . $user['user_id']; ?>/a#s">
    <img title="User ID <?php echo $user['user_id']?>" class="img-responsive" src="<?= $base_url; ?>assets/images/usagers/<?php echo $user['user_photo']?>" >
</a>-->

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="">Nº</th>
                    <th class="">Username</th>
                    <th class="">Prénom</th>
                    <th class="">Nom</th>
                    <th class="">Code postal</th>
                    <th class="">Téléphone</th>
                    <th class="">Courriel</th>
                    <th class="">Rôle</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usagers as $user) : ?>
                <tr>
                    <td class=""><?php echo $user['user_id']?></td>
                    <td class=""><?php echo $user['username']?></td>
                    <td class=""><?php echo $user['prenom']?></td>
                    <td class=""><?php echo $user['nom']?></td>
                    <td class=""><?php echo $user['code_postal']?></td>
                    <td class=""><?php echo $user['telephone']?></td>
                    <td class=""><?php echo $user['courriel']?></td>
                    <td class=""><?php echo $user['nom_role']; ?></td>
                    <td><a title="Visualiser" href="<?= $base_url ?>usager/view/<?= $user['user_id'] ?>/la#s"><i class="fa fa-eye"></i></a></td>

<?php if (UserAcces::userIsSuperAdmin() ||
        UserAcces::userIsAdmin() && $user['role_id'] == ERole::ROLE_CLIENT ||
        UserAcces::getUserId() == $user['user_id']) {?>
                    <td><a title="Modifier" href="<?= $base_url ?>usager/editUser/<?= $user['user_id'] ?>/la#s"><i class="fa fa-pencil-square-o"></i></a></td>
<?php } else { ?>
                    <td></td>
<?php } ?>

<?php if (UserAcces::userIsSuperAdmin() && UserAcces::getUserId() != $user['user_id'] ||
        UserAcces::userIsAdmin() && $user['role_id'] == ERole::ROLE_CLIENT) { ?>
                    <td><a title="Supprimer" href="<?= $base_url ?>usager/deleteUser/<?= $user['user_id'] ?>/la#s"><i class="fa fa-trash-o"></i></a></td>
<?php } else { ?>
                    <td></td>
<?php } ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <h3 class="alert_title">Aucun administrateur n'a été trouvé</h3>
<?php } ?>
</section>
<?php
// footer
include VIEWPATH . 'common/footer.php';
//========================================================
