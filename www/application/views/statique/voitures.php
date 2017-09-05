<?php
$meta_keywords = "";
$meta_description = "";
$page_title = "Voitures";
$body_class = "subpages voitures";

// Header
include VIEWPATH . '/common/header.php';
//========================================================
?>
<main>
    <section id="voitures">
        <div class="container">
            <div class="rows4 title-container">
                <div class="cols6">
                    <div class="blocks6">
                        <h2> LES VOITURES </h2>
                    </div>
                </div>
            </div>

            <div class="cols7 col-md-4 col-sm-12 col-xs-12">
                <div class="blocks">
                    <div class="desc-container">
                        <h3>Formulaire de recherche</h3>
                            <div class="table-responsive">
                                <table class="table table-striped">	
                                    <tr class="form-group row">
                                        <td class="col-sm-6">
                                            <label for="marque_id">Marque : </label>
                                        </td>
                                        <td class="col-sm-6">
                                            <select class="form-control" id="marque_id" name="marque_id">
                                                <option value="0">Choisir une marque</option>
                                                <?php //foreach ($marques AS $marque) : ?>
                                                    <option value="<?php //echo $marque['marque_id']; ?>">
                                                        <?php //echo $marque['nom_marque']; ?>
                                                    </option>
                                                <?php //endforeach; ?>
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
                                                <?php //foreach ($modeles AS $modele) : ?>
                                                    <option value="<?php //echo $modele['modele_id']; ?>">
                                                        <?php //echo $modele['nom_modele']; ?>
                                                    </option>
                                                <?php //endforeach; ?>
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
                                                <?php foreach ($type_vehicules AS $type_vehicule) : ?>
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
                                                <?php //foreach ($vehicules AS $vehicule) : ?>
                                                    <option value="<?php //echo $vehicule['vehicule_id']; ?>">
                                                        <?php //echo $vehicule['nbre_places']; ?>
                                                    </option>
                                                <?php //endforeach; ?>
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
                                                <?php //foreach ($vehicules AS $vehicule) : ?>
                                                    <option value="<?php //echo $vehicule['vehicule_id']; ?>">
                                                        <?php //echo $vehicule['annee']; ?>
                                                    </option>
                                                <?php //endforeach; ?>
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
                                                <?php //foreach ($carburants AS $carburant) : ?>
                                                    <option value="<?php //echo $carburant['carburant_id']; ?>">
                                                        <?php //echo $carburant['nom_carburant']; ?>
                                                    </option>
                                                <?php //endforeach; ?>
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
                                                <?php //foreach ($transmissions AS $transmission) : ?>
                                                    <option value="<?php echo $transmission['transmission_id']; ?>">
                                                        <?php //echo $transmission['nom_transmission']; ?>
                                                    </option>
                                                <?php //endforeach; ?>
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
                                                <?php //foreach ($arrondissements AS $arrondissement) : ?>
                                                    <option value="<?php //echo $arrondissement['arr_id']; ?>">
                                                        <?php //echo $arrondissement['nom_arr']; ?>
                                                    </option>
                                                <?php //endforeach; ?>
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
                                                <?php //foreach ($vehicules AS $vehicule) : ?>
                                                    <option value="<?php //echo $vehicule['vehicule_id']; ?>">
                                                        $<?php //echo $vehicule['prix']; ?>
                                                    </option>
                                                <?php //endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                </table> 
                            </div>
                    </div>
                </div>
            </div>


            <div class="cols7 col-md-8 col-sm-12 col-xs-12">
                <div class="cols8 col-md-12 col-sm-12 col-xs-12">
                    <div class="blocks">
                        <div class="img-container">
                            <img src="/assets/images/header/bg_header.jpg" alt="">
                        </div>
                        <div class="desc-container">
                            <p>Mauris pellentesque vestibulum suscipit. Suspendisse potenti. Nunc eget maximus ipsum. Quisque sed sagittis nisi. Donec rutrum commodo tortor, sit amet condimentum quam rutrum quis. Proin et posuere enim. Nullam sodales diam at tincidunt placerat. Phasellus ornare velit nunc, non tristique magna auctor sit amet. Duis ut justo eget eros hendrerit semper. Nunc fringilla nunc eget est interdum, non tempus massa sodales. Suspendisse eget libero leo. Vivamus nec pretium nibh, ac facilisis metus. Aliquam dui metus, vehicula id malesuada non, sollicitudin sit amet orci. Vestibulum efficitur ullamcorper pulvinar.</p>
                            <p>Pellentesque rhoncus fringilla libero, a blandit mauris rhoncus non. Pellentesque arcu dolor, rutrum sit amet nunc a, rutrum aliquet nulla. Ut pharetra dui ipsum, non dapibus velit sagittis nec. Mauris mollis posuere sapien, eu accumsan urna rhoncus vel. Vestibulum at suscipit libero. In efficitur risus nec nisi dignissim, nec feugiat massa dignissim. Integer nec urna id est varius eleifend ac et augue. Curabitur efficitur purus nec luctus posuere. Morbi ultricies tellus quis dolor pulvinar pharetra. Cras ultricies leo lectus, eget faucibus lectus vehicula maximus. Maecenas porta leo sem, quis facilisis lectus varius ac.</p>
                            <p>Aliquam mollis sit amet velit eleifend cursus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque maximus sem ut ipsum placerat, a elementum tortor iaculis. Etiam pretium sodales libero eget varius. Nulla ut lorem metus. Sed sodales ullamcorper egestas. Ut euismod fermentum aliquam. Donec volutpat pharetra vehicula. Mauris dignissim, ex a accumsan euismod, nisl quam placerat diam, eget luctus leo nisl eget orci. Maecenas et vulputate ex, egestas lacinia nisl. Suspendisse potenti. Donec risus turpis, tincidunt sit amet fringilla in, sollicitudin id enim.</p>
                        </div>
                    </div>
                </div>

                <div class="cols9 col-md-12 col-sm-12 col-xs-12">
                    <div class="blocks">
                        <div class="img-container">
                            <img src="/assets/images/header/bg_header.jpg" alt="">
                        </div>
                        <div class="desc-container">
                            <p>Mauris pellentesque vestibulum suscipit. Suspendisse potenti. Nunc eget maximus ipsum. Quisque sed sagittis nisi. Donec rutrum commodo tortor, sit amet condimentum quam rutrum quis. Proin et posuere enim. Nullam sodales diam at tincidunt placerat. Phasellus ornare velit nunc, non tristique magna auctor sit amet. Duis ut justo eget eros hendrerit semper. Nunc fringilla nunc eget est interdum, non tempus massa sodales. Suspendisse eget libero leo. Vivamus nec pretium nibh, ac facilisis metus. Aliquam dui metus, vehicula id malesuada non, sollicitudin sit amet orci. Vestibulum efficitur ullamcorper pulvinar.</p>
                            <p>Pellentesque rhoncus fringilla libero, a blandit mauris rhoncus non. Pellentesque arcu dolor, rutrum sit amet nunc a, rutrum aliquet nulla. Ut pharetra dui ipsum, non dapibus velit sagittis nec. Mauris mollis posuere sapien, eu accumsan urna rhoncus vel. Vestibulum at suscipit libero. In efficitur risus nec nisi dignissim, nec feugiat massa dignissim. Integer nec urna id est varius eleifend ac et augue. Curabitur efficitur purus nec luctus posuere. Morbi ultricies tellus quis dolor pulvinar pharetra. Cras ultricies leo lectus, eget faucibus lectus vehicula maximus. Maecenas porta leo sem, quis facilisis lectus varius ac.</p>
                            <p>Aliquam mollis sit amet velit eleifend cursus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque maximus sem ut ipsum placerat, a elementum tortor iaculis. Etiam pretium sodales libero eget varius. Nulla ut lorem metus. Sed sodales ullamcorper egestas. Ut euismod fermentum aliquam. Donec volutpat pharetra vehicula. Mauris dignissim, ex a accumsan euismod, nisl quam placerat diam, eget luctus leo nisl eget orci. Maecenas et vulputate ex, egestas lacinia nisl. Suspendisse potenti. Donec risus turpis, tincidunt sit amet fringilla in, sollicitudin id enim.</p>
                        </div>
                    </div>
                </div>
                <div class="cols10 col-md-12 col-sm-12 col-xs-12">
                    <div class="blocks">
                        <div class="img-container">
                            <img src="/assets/images/header/bg_header.jpg" alt="">
                        </div>
                        <div class="desc-container">
                            <p>Mauris pellentesque vestibulum suscipit. Suspendisse potenti. Nunc eget maximus ipsum. Quisque sed sagittis nisi. Donec rutrum commodo tortor, sit amet condimentum quam rutrum quis. Proin et posuere enim. Nullam sodales diam at tincidunt placerat. Phasellus ornare velit nunc, non tristique magna auctor sit amet. Duis ut justo eget eros hendrerit semper. Nunc fringilla nunc eget est interdum, non tempus massa sodales. Suspendisse eget libero leo. Vivamus nec pretium nibh, ac facilisis metus. Aliquam dui metus, vehicula id malesuada non, sollicitudin sit amet orci. Vestibulum efficitur ullamcorper pulvinar.</p>
                            <p>Pellentesque rhoncus fringilla libero, a blandit mauris rhoncus non. Pellentesque arcu dolor, rutrum sit amet nunc a, rutrum aliquet nulla. Ut pharetra dui ipsum, non dapibus velit sagittis nec. Mauris mollis posuere sapien, eu accumsan urna rhoncus vel. Vestibulum at suscipit libero. In efficitur risus nec nisi dignissim, nec feugiat massa dignissim. Integer nec urna id est varius eleifend ac et augue. Curabitur efficitur purus nec luctus posuere. Morbi ultricies tellus quis dolor pulvinar pharetra. Cras ultricies leo lectus, eget faucibus lectus vehicula maximus. Maecenas porta leo sem, quis facilisis lectus varius ac.</p>
                            <p>Aliquam mollis sit amet velit eleifend cursus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque maximus sem ut ipsum placerat, a elementum tortor iaculis. Etiam pretium sodales libero eget varius. Nulla ut lorem metus. Sed sodales ullamcorper egestas. Ut euismod fermentum aliquam. Donec volutpat pharetra vehicula. Mauris dignissim, ex a accumsan euismod, nisl quam placerat diam, eget luctus leo nisl eget orci. Maecenas et vulputate ex, egestas lacinia nisl. Suspendisse potenti. Donec risus turpis, tincidunt sit amet fringilla in, sollicitudin id enim.</p>
                        </div>
                    </div>
                </div>
            </div>

    </section>

</main>
<?php
//========================================================
//Footer
include VIEWPATH . '/common/footer.php';
