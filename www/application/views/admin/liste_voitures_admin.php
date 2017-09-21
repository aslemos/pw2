<?php
// Header
include VIEWPATH . '/common/header.php';
//========================================================
?>
<section id="listeAdmin">
    <?php include VIEWPATH . 'admin/boutons_admin.php'; ?>
    <h2><?=$title?></h2>

        <form action="" name="formulaire" id="form-voitures-id">
            <table class="table table-reponsive">
                <tbody><tr>
                        <th class="">Nº</th>
                        <th class="">Marque</th>
                        <th class="">Modèle</th>
                        <th class="">Année</th>
                        <th class="">Type</th>
                        <th class="">Évaluation</th>
                        <th class="">Prix</th>
                        <th class="">Propriétaire</th>
                        <th class="">Matricule</th>
                        <th class="">État</th>
                        <th class="">Éditer</th>
                        <th class="">Approuver</th>
                        <th class="">Refuser</th>
                    </tr>

                    <?php   foreach ($vehicules as $vehicule) {

                       //var_dump($vehicules);
                        ?>
                    <tr>
                        <td class=""><?= $vehicule['vehicule_id'] ?></td>
                        <td class=""><?= $vehicule['nom_marque'] ?></td>
                        <td class=""><?= $vehicule['nom_modele'] ?></td>
                        <td class=""><?= $vehicule['annee'] ?></td>
                        <td class=""><?= $vehicule['nom_type'] ?></td>
                        <td class=""></td>
                        <td class=""><?= $vehicule['prix'] ?></td>
                        <td class=""><?=$vehicule['prenom'].' '.$vehicule['nom'] ?></td>
                        <td class=""><?= $vehicule['matricule'] ?></td>
                        <td class=""><?= EVehicule::getDescriptionEtat($vehicule['etat_vehicule']) ?></td>

                        <!--Actions-->
                        <td class=""><a class="btn btn-inline" href="<?= $base_url ?>vehicule/editVehicule/<?= $vehicule['vehicule_id'] ?>#s"></a></td>
                        <td class=""><a class="btn btn-inline"href="<?= $base_url ?>vehicule/debloquer/<?= $vehicule['vehicule_id'] ?>#s"></a></td>
                        <td class=""><a class="btn btn-inline"href="<?= $base_url ?>vehicule/bloquer/<?= $vehicule['vehicule_id'] ?>#s"></a></td>

                    </tr>
                    <?php } ?>


                </tbody></table>
        </form>

        <!-- Div pour affichage -->
        <div id="resultat"></div>
        <div id="divAuto_voitures"></div>
    </section>
</main>

<?php
// footer
include VIEWPATH . '/common/footer.php';
//========================================================

