<?php

/* 
 * 
 * Page 'vehicule'
 * Appelée par le controleur 'Home'
 * 
 */
?>


<?php if($this->session->userdata('logged_in')) : ?> 
    <?php include (APPPATH . "/views/templates/menu_user.php"); ?>
<?php endif; ?>
<div class="rows4 title-container">
    <div class="cols6">
        <div class="blocks6"></div>
    </div>
</div>
<div class="cols7 col-sm-12 col-md-6 col-lg-6">
    <div class="blocks">
        <div class="desc-container">                        
            <?php echo form_open_multipart('vehicules/search'); ?>
                <h3 style="text-align:center;"><?php echo $title; ?></h3>
                <?php echo validation_errors(); ?>	
                <div class="table-responsive">
                    <table class="table table-striped">	
                        <tr class="form-group row">
                            <td class="col-sm-6">
                                <label for="marque_id">Marque : </label>
                            </td>
                            <td class="col-sm-6">
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
                            <td class="col-sm-6">
                                <label for="modele_id">Modele : </label>
                            </td>
                            <td class="col-sm-6">
                                <select class="form-control" id="modele_id" name="modele_id">
                                    <option value="0">Choisir un modele</option>
                                    <?php foreach($modeles AS $modele) : ?>
                                    <option value="<?php echo $modele['modele_id']; ?>">
                                        <?php echo $modele['nom_modele']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr class="form-group row">
                            <td class="col-sm-6">
                                <label for="type_id">Type : </label>
                            </td>
                            <td class="col-sm-6">
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
                            <td class="col-sm-6">
                                <label for="nbre_places">Nombre de sièges : </label>
                            </td>
                            <td class="col-sm-6">
                                <select class="form-control" id="nbre_places" name="nbre_places">
                                    <option value="0">Choisir une type</option>
                                    <?php foreach($vehicules AS $vehicule) : ?>
                                    <option value="<?php echo $vehicule['vehicule_id']; ?>">
                                        <?php echo $vehicule['nbre_places']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr class="form-group row">
                            <td class="col-sm-6">
                                <label for="annee">Année : </label>
                            </td>
                            <td class="col-sm-6">
                                <select class="form-control" id="annee" name="annee">
                                    <option value="0">Choisir l'année</option>
                                    <?php foreach($vehicules AS $vehicule) : ?>
                                    <option value="<?php echo $vehicule['vehicule_id']; ?>">
                                        <?php echo $vehicule['annee']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>            
                        <tr class="form-group row">
                            <td class="col-sm-6">
                                    <label for="carburant_id">Carburant : </label>
                            </td>
                            <td class="col-sm-6">
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
                            <td class="col-sm-6">
                                <label for="transmission_id">Transmission : </label>
                            </td>
                            <td class="col-sm-6">
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
                            <td class="col-sm-6">
                                <label for="arr_id">Emplacement : </label>
                            </td>
                            <td class="col-sm-6">
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
                        <tr class="form-group row">
                            <td class="col-sm-6">
                                <label for="date_debut">De : </label>
                            </td>
                            <td class="col-sm-6">
                                <input type="text" class="form-control" id="date_debut" name="date_debut">
                            </td>
                        </tr>
                        <tr class="form-group row">
                            <td class="col-sm-6">
                                <label for="date_fin">À : </label>
                            </td>
                            <td class="col-sm-6">
                                <input type="text" class="form-control" id="date_fin" name="date_fin">
                            </td>
                        </tr>
                        <tr class="form-group row">
                            <td class="col-sm-6">
                                <label for="prix">Prix : </label>
                            </td>
                            <td class="col-sm-6">
                                <select class="form-control" id="prix" name="prix">
                                    <option value="0">Choisir un tarif</option>
                                    <?php foreach($vehicules AS $vehicule) : ?>
                                    <option value="<?php echo $vehicule['vehicule_id']; ?>">
                                        $<?php echo $vehicule['prix']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </table> 
                </div>
            <?php form_close(); ?>	
        </div>
    </div>
</div>
<div class="cols7 col-sm-12 col-md-6 col-lg-6">
    <?php foreach($vehicules AS $vehicule) : ?>
    <div class="cols8 col-md-12 col-sm-12 col-xs-12">
        <div class="blocks">
            <div class="img-container">
                <a href="<?php echo site_url('/vehicules/'.$vehicule['vehicule_id']); ?>">
                    <img class="img-responsive" src="<?= site_url(); ?>assets/images/vehicules/<?php echo $vehicule['vehicule_photo']?>" >
                </a>
            </div>
            <div class="desc-container">
                <p class="text-justify">Mauris pellentesque vestibulum suscipit. Suspendisse potenti. Nunc eget maximus ipsum. Quisque sed sagittis nisi. Donec rutrum commodo tortor, sit amet condimentum quam rutrum quis. Proin et posuere enim. Nullam sodales diam at tincidunt placerat. Phasellus ornare velit nunc, non tristique magna auctor sit amet. Duis ut justo eget eros hendrerit semper. Nunc fringilla nunc eget est interdum, non tempus massa sodales. Suspendisse eget libero leo. Vivamus nec pretium nibh, ac facilisis metus. Aliquam dui metus, vehicula id malesuada non, sollicitudin sit amet orci. Vestibulum efficitur ullamcorper pulvinar.</p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
