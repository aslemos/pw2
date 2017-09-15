
<?php include (APPPATH . "/views/templates/navbar_user.php"); ?>

<h3><?php echo $title; ?></h3>
<form action="" name="frm-vehicule" id="form-vehicules">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="">Nº</th>
                    <th class="">Marque</th>
                    <th class="">Modele</th>
                    <th class="">Année</th>
                    <th class="">Nombre de place</th>
                    <th class="">Type carburant</th>
                    <th class="">Transmission</th>
                    <th class="">Lieu</th>
                    <th class="">Disponible de</th>
                    <th class="">Disponible à</th>
                    <th class="">Prix</th>
                    <th class="">Matricule</th>
                    <th class="">Ajouter</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicules AS $vehicule) : ?>
                <tr>				
                    <td class=""><?php echo $vehicule['vehicule_id']?></td>
                    <td class=""><?php echo $vehicule['nom_marque']?></td>
                    <td class=""><?php echo $vehicule['nom_modele']?></td>
                    <td class=""><?php echo $vehicule['annee']?></td>
                    <td class=""><?php echo $vehicule['nbre_places']?></td>
                    <td class=""><?php echo $vehicule['nom_carburant']?></td>
                    <td class=""><?php echo $vehicule['nom_transmission']?></td>
                    <td class=""><?php echo $vehicule['nom_arr']?></td>
                    <td class=""><?php echo $vehicule['date_debut']; ?></td>
                    <td class=""><?php echo $vehicule['date_fin']; ?></td>
                    <td class=""><?php echo $vehicule['prix']; ?></td>
                    <td class=""><?php echo $vehicule['matricule']; ?></td>
                    <td>
                        <a class="" href="<?php echo site_url('/vehicules/'.$vehicule['vehicule_id']); ?>">
                            <img class="img-responsive" src="<?= site_url(); ?>assets/images/review.png" >
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>					
            </tbody>
        </table>
    </div>
</form>
        