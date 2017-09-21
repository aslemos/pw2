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
            <thead>
                <tr>
                    <th class="">Nº</th>
                    <th class="">Prénom</th>
                    <th class="">Nom</th>
                    <th class="">Code postal</th>
                    <th class="">Téléphone</th>
                    <th class="">Courriel</th>
                    <th class="">Rôle</th>
                    <th class="">Éditer</th>
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
                    <td>
                        <a class="" href="<?php echo $base_url . 'usager/view/' . $user['user_id']; ?>">
                            <img class="img-responsive" src="<?= $base_url; ?>assets/images/usagers/<?php echo $user['user_photo']?>" >
                        </a>
                    </td>
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
