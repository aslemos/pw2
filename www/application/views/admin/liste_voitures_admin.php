<?php
// Header
include VIEWPATH . '/common/header.php';
//========================================================
?>
<section id="listeAdmin">
    <?php include VIEWPATH . 'admin/boutons_admin.php'; ?>
    <h2><?=$title?></h2>

        <form action="" name="formulaire" id="form-voitures-id">
            <table class="table table-responsive">
                <tbody><tr>
                        <td class="titre_editable">Nº</td>
                        <td class="titre_editable">Marque</td>
                        <td class="titre_editable">Modèle</td>
                        <td class="titre_editable">Année</td>
                        <td class="titre_editable">Type</td>
                        <td class="titre_editable">Évaluation</td>
                        <td class="titre_editable">Prix</td>
                        <td class="titre_editable">Propriétaire</td>
                        <td class="titre_editable">Matricule</td>
                        <td class="titre_editable">État</td>
                        <td class="titre_editable">Éditer</td>
                        <td class="titre_editable">Approuver</td>
                        <td class="titre_editable">Refuser</td>
                    </tr>

                    <?php   foreach ($vehicules as $vehicule) {

                       //var_dump($vehicules);
                        ?>
                    <tr>
                        <td class="editable"><?= $vehicule['vehicule_id'] ?></td>
                        <td class="editable"><?= $vehicule['nom_marque'] ?></td>
                        <td class="editable"><?= $vehicule['nom_modele'] ?></td>
                        <td class="editable"><?= $vehicule['annee'] ?></td>
                        <td class="editable"><?= $vehicule['nom_type'] ?></td>
                        <td class="editable"></td>
                        <td class="editable"><?= $vehicule['prix'] ?></td>
                        <td class="editable"><?= $vehicule['prenom'].' '.$vehicule['nom'] ?></td>
                        <td class="editable"><?= $vehicule['matricule'] ?></td>
                        <td class="editable"><?= EVehicule::getDescriptionEtat($vehicule['etat_vehicule']) ?></td>

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

