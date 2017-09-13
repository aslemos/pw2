<?php include VIEWPATH . 'common/header.php'; ?>
<?php echo form_open_multipart($base_url.'vehicule/updateVehicule'); ?>
    <h3 style="text-align:center;"><?php echo $title; ?></h3>
    <?php echo validation_errors(); ?>
    <div class="table-responsive">
        <input type="hidden" name="vehicule_id" value="<?php echo $vehicule['vehicule_id']; ?>">
        <table class="table table-striped">
            <tr class="form-group">
                <td>
                    <label for="marque_id">Marque : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="marque_id" name="marque_id" value="<?php echo $vehicule['nom_marque']; ?>">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="type_id">Type : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="type_id" name="type_id" value="<?php echo $vehicule['nom_type']; ?>">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="matricule">Matricule : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="matricule" name="matricule" value="<?php echo $vehicule['matricule']; ?>">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="annee">Année : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="annee" name="annee" value="<?php echo $vehicule['annee']; ?>">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="nbre_places">Nombre de places : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="nbre_places" name="nbre_places" value="<?php echo $vehicule['nbre_places']; ?>">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="prix">Prix : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="prix" name="prix" value="<?php echo $vehicule['prix']; ?>">
                </td>
            </tr>
<?php /*
            <tr class="form-group">
                <td>
                    <label for="date_debut">Date début : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="date_debut" name="date_debut" value="<?php echo $vehicule['date_debut']; ?>">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="date_fin">Date fin : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="date_fin" name="date_fin" value="<?php echo $vehicule['date_fin']; ?>">
                </td>
            </tr>
 */?>
<?php if (UserAcces::userIsAdmin()) { ?>
            <tr class="form-group">
                <td>
                    <label for="user_id">Propriétaire : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $vehicule['nom'].', '.$vehicule['nom']; ?>">
                </td>
            </tr>
<?php } else { ?>
            <input type="hidden" name="user_id" value="<?=$vehicule['proprietaire_id']?>">
<?php } ?>
            <tr class="form-group">
                <td>
                    <label for="carburant_id">Carburant : </label></td>
                <td>
                    <input type="text" class="form-control" id="carburant_id" name="carburant_id" value="<?php echo $vehicule['nom_carburant']; ?>">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="transmission_id">Transmission : </label></td>
                <td>
                    <input type="text" class="form-control" id="transmission_id" name="transmission_id" value="<?php echo $vehicule['nom_transmission']; ?>">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="arr_id">Emplacement : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="arr_id" name="arr_id" value="<?php echo $vehicule['nom_arr']; ?>">
                </td>
            </tr>
        </table>
        <hr>
        <input type="submit" class="btn" value="Modifier">
    </div>
</form>
<hr />
<?php include VIEWPATH . 'common/footer.php'; ?>
