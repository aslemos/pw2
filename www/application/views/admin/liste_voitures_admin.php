<?php
// Header
include VIEWPATH . 'common/header.php';
//========================================================
include VIEWPATH . 'admin/boutons_admin_vehicules.php';
?>
<script>
    $(function(){
        $('[id^="btn-supp-"]').on('click', function(){
            var id = this.id.split('-')[2];
            if (id && confirm("Êtes-vous sûr de vouloir supprimer ce véhicule ?")) {
                document.location.href = base_url + 'vehicule/deleteVehicule/' + id + '/a';
            }
        });

    });
</script>
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
                    <th class="">Évaluation</th>
                    <th class="">Prix</th>
                    <th class="">Propriétaire</th>
                    <th class="">Matricule</th>
                    <th class="">État</th>
                    <th class="">Locations</th>
                    <th colspan="2">Actions</th>
                </tr>

<?php foreach ($vehicules as $vehicule) { ?>
                <tr id="tr<?= $vehicule['vehicule_id']?>">
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
    				<td class=""><?=$vehicule['nb_locations']?></td>

                    <!--Actions-->
                    <td class=""><a title="Visualiser" href="<?= $base_url ?>vehicule/view/<?= $vehicule['vehicule_id'] ?>#s"><i class="fa fa-eye"></i></a></td>
<?php if ($vehicule['etat_vehicule'] != EUsager::ETAT_EN_ATTENTE) { ?>
<?php if ($vehicule['etat_vehicule'] == EUsager::ETAT_INACTIF) { ?>
                    <td><a title="Activer véhicule" href="<?= $base_url ?>vehicule/debloquer/<?= $vehicule['vehicule_id'] ?>#s"><i class="fa fa-lock"></i></a></td>
<?php } else { ?>
                    <td><a title="Bloquer véhicule" href="<?= $base_url ?>vehicule/bloquer/<?= $vehicule['vehicule_id'] ?>#s"><i class="fa fa-unlock"></i></a></td>
<?php } ?>
<?php } else { ?>
                    <td><a title="Supprimer" id="btn-supp-<?=$vehicule['vehicule_id']?>" href="javascript:void(0)"><i class="fa fa-trash-o"></i></a></td>
<?php } ?>

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

