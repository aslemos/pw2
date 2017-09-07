
<h2><?php echo $vehicule['nom_marque'] . ' ' . $vehicule['nom_modele'] . ' ' .$vehicule['annee'] ; ?></h2>
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
        <img class="img-responsive" src="<?= base_url(); ?>assets/images/vehicules/<?php echo $vehicule['vehicule_photo']?>" >
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6">
        <form>
            <table class="table">
                <tr class="form-group">
                    <td>Marque :</td>
                    <td value="<?php echo $vehicule['marque_id']; ?>"><?php echo $vehicule['nom_marque']; ?></td>
                </tr>
                <tr class="form-group">
                    <td>Type :</td>
                    <td value="<?php echo $vehicule['type_id']; ?>"><?php echo $vehicule['nom_type']; ?></td>
                </tr>
                <tr class="form-group">
                    <td>Matricule :</td><td><?php echo $vehicule['matricule']; ?></td>
                </tr>
                <tr class="form-group">
                    <td>Annee :</td><td><?php echo $vehicule['annee']; ?></td>
                </tr>
                <tr class="form-group">
                    <td>Nombre de places :</td>
                    <td><?php echo $vehicule['nbre_places']; ?></td>
                </tr>
                <tr class="form-group">
                    <td>Prix :</td>
                    <td><?php echo $vehicule['prix']; ?></td>
                </tr>
                <tr class="form-group">
                    <td>Date début :</td>
                    <td><?php echo $vehicule['date_debut']; ?></td>
                </tr>
                <tr class="form-group">
                    <td>Date fin :</td>
                    <td><?php echo $vehicule['date_fin']; ?></td>
                </tr>
                <tr class="form-group">
                    <td>Propriétaire :</td>
                    <td value="<?php echo $vehicule['user_id']; ?>"><?php echo $vehicule['nom'] . ', ' . $vehicule['prenom']; ?></td>
                </tr>
                <tr class="form-group">
                    <td>Carburant :</td>
                    <td value="<?php echo $vehicule['carburant_id']; ?>"><?php echo $vehicule['nom_carburant']; ?></td>
                </tr>
                <tr class="form-group">
                  <td>Transmission :</td>
                  <td value="<?php echo $vehicule['transmission_id']; ?>"><?php echo $vehicule['nom_transmission']; ?></td>
                </tr>
                <tr class="form-group">
                    <td>Emplassement :</td>
                    <td value="<?php echo $vehicule['arr_id']; ?>"><?php echo $vehicule['nom_arr']; ?></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<hr>
<?php if($this->session->userdata('logged_in')) : ?>
    <?php echo form_open('/vehicules/deleteVehicule/'.$vehicule['vehicule_id']); ?>
        <input type="submit" class="btn btn-danger" value="Supprimer">
    </form>
    <?php echo form_open('/vehicules/editVehicule/'.$vehicule['vehicule_id']); ?>
        <input type="submit" class="btn" value="Modifier">
    </form>
<?php endif; ?>
<hr>
