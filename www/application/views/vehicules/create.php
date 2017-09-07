
<?php echo form_open_multipart('vehicules/createVehicule'); ?>
    <h3 style="text-align:center;"><?php echo $title; ?></h3>	
    <div class="table-responsive">	
        <h4 style="color:red"><?php echo $err_message; ?></h4>
        <table class="table table-striped">	
            <tr class="form-group row">
                <td class="col-sm-3">
                    <label for="marque_id">Marque : </label>
                    <span style="color:red">*</span>
                </td>
                <td class="col-sm-3">
                    <select class="form-control" id="marque_id" name="marque_id">
                        <option value="0">Choisir une marque</option>
                        <?php foreach($marques AS $marque) : ?>
                        <option value="<?php echo $marque['marque_id']; ?>">
                            <?php echo $marque['nom_marque']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr class="form-group row">
                <td class="col-sm-3">
                    <label for="type_id">Type : </label>
                    <span style="color:red">*</span>
                </td>
                <td class="col-sm-3">
                    <select class="form-control" id="type_id" name="type_id">
                        <option value="0">Choisir une type</option>
                        <?php foreach($type_vehicules AS $type_vehicule) : ?>
                        <option value="<?php echo $type_vehicule['type_id']; ?>">
                            <?php echo $type_vehicule['nom_type']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr class="form-group row">
                <td class="col-sm-3">
                    <label for="matricule">Matricule : </label>
                    <span style="color:red">*</span>
                </td>
                <td class="col-sm-3">
                    <input type="text" class="form-control" id="matricule" name="matricule">
                </td>
            </tr>
            <tr class="form-group row">
                <td class="col-sm-3">
                    <label for="annee">Année : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="annee" name="annee">
                </td>
            </tr>
            <tr class="form-group row">
                <td class="col-sm-3">
                    <label for="nbre_places">Nombre de sièges : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="nbre_places" name="nbre_places">
                </td>
            </tr>
            <tr class="form-group row">
                <td class="col-sm-3">
                    <label for="prix">Prix : </label>
                    <span style="color:red">*</span>
                </td>
                <td class="col-sm-3">
                    <input type="text" class="form-control" id="prix" name="prix">
                </td>
            </tr>
            <tr class="form-group row">
                <td class="col-sm-3">
                    <label for="date_debut">Date début : </label>
                    <span style="color:red">*</span>
                </td>
                <td class="col-sm-3">
                    <input type="text" class="form-control" id="date_debut" name="date_debut">
                </td>
            </tr>
            <tr class="form-group row">
                <td class="col-sm-3">
                    <label for="date_fin">Date fin : </label>
                    <span style="color:red">*</span>
                </td>
                <td class="col-sm-3">
                    <input type="text" class="form-control" id="date_fin" name="date_fin">
                </td>
            </tr>
            <tr class="form-group row">
                <td class="col-sm-3">
                    <label for="user_id">Propriétaire : </label>
                    <span style="color:red">*</span>
                </td>
                <td class="col-sm-3">
                    <select class="form-control" id="user_id" name="user_id">
                        <option value="0">Choisir le propriétaire</option>
                        <?php foreach($usagers AS $user) : ?>
                        <option value="<?php echo $user['user_id']; ?>">
                            <?php echo $user['prenom'].', '.$user['nom']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr class="form-group row">
                <td class="col-sm-3">
                    <label for="carburant_id">Carburant : </label></td>
                <td class="col-sm-3">
                    <select class="form-control" id="carburant_id" name="carburant_id">
                        <option value="0">Choisir le type carburant</option>
                        <?php foreach($carburants AS $carburant) : ?>
                        <option value="<?php echo $carburant['carburant_id']; ?>">
                            <?php echo $carburant['nom_carburant']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr class="form-group row">
                <td class="col-sm-3">
                    <label for="transmission_id">Transmission : </label></td>
                <td class="col-sm-3">
                    <select class="form-control" id="transmission_id" name="transmission_id">
                        <option value="0">Choisir le type transmission</option>
                        <?php foreach($transmissions AS $transmission) : ?>
                        <option value="<?php echo $transmission['transmission_id']; ?>">
                            <?php echo $transmission['nom_transmission']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr class="form-group row">
                <td class="col-sm-3">
                    <label for="arr_id">Emplacement : </label>
                    <span style="color:red">*</span>
                </td>
                <td class="col-sm-3">
                    <select class="form-control" id="arr_id" name="arr_id">
                        <option value="0">Choisir l'emplacement</option>
                        <?php foreach($arrondissements AS $arrondissement) : ?>
                        <option value="<?php echo $arrondissement['arr_id']; ?>">
                            <?php echo $arrondissement['nom_arr']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
        </table>	
        <hr>
        <div class="form-group">
            <label>Photo du véhicule : </label>
            <input type="file" name="userfile">
        </div>
        <div class="form-group">
            <input type="submit" class="btn" value="ENVOYER">
        </div> 
    </div>
</form>		
   