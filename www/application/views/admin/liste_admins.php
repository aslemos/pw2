<?php
$meta_keywords = "";
$meta_description = "";
$page_title = "Liste des Admins";
$body_class = "subpages listeAdmin";

// Header
include VIEWPATH . '/common/header.php';
//========================================================
?>
<section id="listeAdmin">
<?php include VIEWPATH . 'admin/boutons_admin.php'; ?>
    <h2>Les admins</h2>
    <form action="" name="formulaire" id="form-voitures-id">
        <!--<div class="table-responsive">-->
            <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th class="">Nº</th>
                        <th class="">Prénom</th>
                        <th class="">Nom</th>
                        <th class="">Téléphone</th>
                        <th class="">Courriel</th>
                        <th class="">Afficher plus</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="">1</td>
                        <td class="">test</td>
                        <td class="">test</td>
                        <td class="">test</td>
                        <td class="">test</td>
                        <td><a href="#"><img class="img-responsive" src="<?= base_url(); ?>assets/images/view.png" ></a></td>
                    </tr>
                </tbody>
            </table>
        <!--</div>-->

    </form>


        <form action="" name="formulaire" id="form-voitures-id">
        <div class="table-responsive">
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
        </form>

    <!-- Div pour affichage -->
    <div id="resultat"></div>
    <div id="divAuto_voitures"></div>
</section>
<?php
// footer
include VIEWPATH . '/common/footer.php';
//========================================================
?>
