<?php
// Header
include VIEWPATH . 'common/header.php';
//========================================================
include VIEWPATH . 'admin/boutons_admin_vehicules.php';
?>
<section id="listeAdmin">
    <h2><?=$title?></h2>
<?php if (count($vehicules) > 0) { ?>
    <div class="table-responsive">
        <table class="table">
            <tbody><tr>
                    <th class="">Nº</th>
                    <th class="">Marque</th>
                    <th class="">Modèle</th>
                    <th class="">Année</th>
                    <th class="">Type</th>
                    <th class="">Prix</th>
                    <th class="">Propriétaire</th>
                    <th class="">Matricule</th>
                    <th class="">État</th>
                    <th colspan="3">Action</th>
                </tr>

<?php foreach ($vehicules as $vehicule) { ?>
                <tr id="tr<?= $vehicule['vehicule_id']?>">
                    <td class=""><?= $vehicule['vehicule_id'] ?></td>
                    <td class=""><?= $vehicule['nom_marque'] ?></td>
                    <td class=""><?= $vehicule['nom_modele'] ?></td>
                    <td class=""><?= $vehicule['annee'] ?></td>
                    <td class=""><?= $vehicule['nom_type'] ?></td>
                    <td class=""><?= $vehicule['prix'] ?></td>
                    <td class=""><?=$vehicule['prenom'].' '.$vehicule['nom'] ?></td>
                    <td class=""><?= $vehicule['matricule'] ?></td>
                    <td class=""><?= EVehicule::getDescriptionEtat($vehicule['etat_vehicule']) ?></td>

                    <!--Actions-->
                    <td class=""><a title="Visualiser véhicule" href="<?= $base_url ?>vehicule/view/<?= $vehicule['vehicule_id'] ?>#s"><span class="fa fa-eye"></span></a></td>
                    <td class=""><span id="btn-approuver-<?=$vehicule['vehicule_id']?>" title="Approuver ce véhicule" class="glyphicon glyphicon-ok-circle btn-accepter"></span></td>
                    <td class=""><span id="btn-refuser-<?=$vehicule['vehicule_id']?>" title="REFUSER!" class="glyphicon glyphicon-ban-circle btn-refuser"></span></td>
                </tr>
<?php } ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <h3 class="alert_title">Aucun véhicule n'a été trouvé</h3>
<?php } ?>
</section>
<?php
// footer
include VIEWPATH . 'common/footer.php';
//========================================================
