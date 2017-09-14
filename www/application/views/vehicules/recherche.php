<?php
// Header
include VIEWPATH . 'common/header.php';
//========================================================
?>
<script>
    /**
     * Remplit le listbox des modèles selon la marque choisie
     * @author Alessandro Lemos
     */
    $(function () {
        $('#marque_id').on('change', function () {
            var lstModele = document.getElementById('modele_id');
            lstModele.innerHTML = lstModele.options[0].outerHTML;
            $.ajax({
                url: '<?= $base_url ?>modele/ajaxModelesByMarque/' + this.value,
                success: function (data) {
                    var json = JSON.parse(data);
                    console.log(json);
                    for (var i = 0; i < json.length; i++) {
                        lstModele.innerHTML += '<option value="' + json[i].modele_id + '">' + json[i].nom_modele + '</option>';
                    }
                }
            });
        });
    });
</script>
<main>
    <section id="voitures">
        <div class="container">
            <div class="rows4 title-container">
                <div class="cols6">
                    <div class="blocks6">
                        <h2>Trouver une voiture</h2>
                    </div>
                </div>
            </div>

            <div class="cols7 col-md-4 col-sm-12 col-xs-12">
                <div class="blocks">
                    <div class="desc-container">
                        <h3>Formulaire de recherche</h3>
                        <div class="table-responsive">
                            <form action="<?= $base_url; ?>vehicule/recherche" method="post" class="frm-inline">
                                <table class="table table-striped">
                                    <tr class="form-group row">
                                        <td class="col-sm-6">
                                            <label for="marque_id">Marque : </label>
                                        </td>
                                        <td class="col-sm-6">
                                            <select class="form-control" id="marque_id" name="marque_id">
                                                <option value="0">-- Choisir une marque --</option>
                                                <?php foreach ($marques as $marque) { ?>
                                                    <option value="<?php echo $marque['marque_id']; ?>"<?= $marque['marque_id'] == $marque_id ? ' selected' : '' ?><?= $marque['marque_id'] == $marque_id ? ' selected' : '' ?>>
                                                        <?php echo $marque['nom_marque']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="form-group row">
                                        <td class="col-sm-6">
                                            <label for="modele_id">Modele : </label>
                                        </td>
                                        <td class="col-sm-6">
                                            <select class="form-control" id="modele_id" name="modele_id">
                                                <option value="0">-- Choisir un modèle --</option>
                                                <?php foreach ($modeles as $modele) { ?>
                                                    <option value="<?php echo $modele['modele_id']; ?>"<?= $modele['modele_id'] == $modele_id ? ' selected' : '' ?>>
                                                        <?php echo $modele['nom_modele']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="form-group row">
                                        <td class="col-sm-6">
                                            <label for="type_id">Type : </label>
                                        </td>
                                        <td class="col-sm-6">
                                            <select class="form-control" id="type_id" name="type_id">
                                                <option value="0">-- Choisir une type --</option>
                                                <?php foreach ($types as $type) : ?>
                                                    <option value="<?php echo $type['type_id']; ?>"<?= $type['type_id'] == $type_id ? ' selected' : '' ?>>
                                                        <?php echo $type['nom_type']; ?>
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
                                                <option value="0">-- Choisir --</option>
                                                <option value="1"<?= $nbre_places == 1 ? ' selected' : '' ?>>1</option>
                                                <option value="2"<?= $nbre_places == 2 ? ' selected' : '' ?>>2</option>
                                                <option value="5"<?= $nbre_places == 5 ? ' selected' : '' ?>>5</option>
                                                <option value="7"<?= $nbre_places == 7 ? ' selected' : '' ?>>7</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="form-group row">
                                        <td class="col-sm-6">
                                            <label for="annee">Année : </label>
                                        </td>
                                        <td class="col-sm-6">
                                            <select class="form-control" id="annee" name="annee">
                                                <option value="0">-- Choisir l'année --</option>
                                                <?php for ($i = Date('Y'), $fin = $i - 20; $i >= $fin; $i--) { ?>
                                                    <option value="<?php echo $i ?>"<?= $i == $annee ? ' selected' : '' ?>><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="form-group row">
                                        <td class="col-sm-6">
                                            <label for="carburant_id">Carburant : </label>
                                        </td>
                                        <td class="col-sm-6">
                                            <select class="form-control" id="carburant_id" name="carburant_id">
                                                <option value="0">-- Choisir le type carburant --</option>
                                                <?php foreach ($carburants as $carburant) { ?>
                                                    <option value="<?php echo $carburant['carburant_id']; ?>"<?= $carburant['carburant_id'] == $carburant_id ? ' selected' : '' ?>>
                                                        <?php echo $carburant['nom_carburant']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="form-group row">
                                        <td class="col-sm-6">
                                            <label for="transmission_id">Transmission : </label>
                                        </td>
                                        <td class="col-sm-6">
                                            <select class="form-control" id="transmission_id" name="transmission_id">
                                                <option value="0">-- Choisir le type transmission --</option>
                                                <?php foreach ($transmissions as $transmission) { ?>
                                                    <option value="<?php echo $transmission['transmission_id']; ?>"<?= $transmission['transmission_id'] == $transmission_id ? ' selected' : '' ?>>
                                                        <?php echo $transmission['nom_transmission']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="form-group row">
                                        <td class="col-sm-6">
                                            <label for="arr_id">Emplacement : </label>
                                        </td>
                                        <td class="col-sm-6">
                                            <select class="form-control" id="arr_id" name="arr_id">
                                                <option value="0">-- Choisir l'emplacement --</option>
                                                <?php foreach ($arrondissements as $arrondissement) { ?>
                                                    <option value="<?php echo $arrondissement['arr_id']; ?>"<?= $arrondissement['arr_id'] == $arr_id ? ' selected' : '' ?>>
                                                        <?php echo $arrondissement['nom_arr']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="form-group row">
                                        <td class="col-sm-6">
                                            <label for="date_debut">De : </label>
                                        </td>
                                        <td class="col-sm-6">
                                            <input type="text" class="form-control" id="date_debut" name="date_debut" value="<?= $date_debut ?>">
                                        </td>
                                    </tr>
                                    <tr class="form-group row">
                                        <td class="col-sm-6">
                                            <label for="date_fin">à : </label>
                                        </td>
                                        <td class="col-sm-6">
                                            <input type="text" class="form-control" id="date_fin" name="date_fin" value="<?= $date_fin ?>">
                                        </td>
                                    </tr>
                                    <tr class="form-group row">
                                        <td class="col-sm-6">
                                            <label for="prix">Prix : </label>
                                        </td>
                                        <td class="col-sm-6">
                                            <select class="form-control" id="tranche_id" name="tranche_id">
                                                <option value="">-- Choisir un tarif --</option>
                                                <?php foreach ($tranches as $tranche) { ?>
                                                    <option value="<?= $tranche['tranche_id'] ?>"<?= $tranche['tranche_id'] == $tranche_id ? ' selected' : '' ?>><?= $tranche['nom_tranche'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                                <div class="form-group col-sm-12">
                                    <button type="submit" class="btn">Rechercher</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="cols7 col-md-8 col-sm-12 col-xs-12">
                <?php
                echo '<pre>';
                //var_dump($resultat);
                echo '</pre>';
                ?>
                <?php if (count($resultat) > 0) { ?>
                    <?php foreach ($resultat as $vehicule) { ?>

                        <div class="cols8 col-md-12 col-sm-12 col-xs-12">
                            <div class="blocks">
                                <div class="img-container">
                                    <img src="<?= $base_url ?>assets/images/vehicules/<?= $vehicule['vehicule_photo'] ?>" alt="">
                                </div>
                                <div>
                                    <h3> <?= $vehicule['annee'] ?> <?= $vehicule['nom_marque'] ?> <?= $vehicule['nom_modele'] ?> <span class="prix"><?= $vehicule['prix'] ?>/jour </span></h3>
                                </div>
                                <div class="desc-container">
                                    <p><b>NOMBRE SIEGE:</b> <?= $vehicule['nbre_places'] ?></p>
                                    <p><b>CARBURANT:</b> <?= $vehicule['nom_carburant'] ?></p>
                                    <p><b>TRANSMISSION:</b> <?= $vehicule['nom_transmission'] ?></p>
                                    <p><b>TYPE VEHICULE:</b> <?= $vehicule['nom_type'] ?></p>
                                    <?= $vehicule['description'] ?>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">RESERVER</button>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <h4>Aucun résultat pour cette recherche</h4>
                <?php } ?>
            </div>
    </section>

</main>
<?php
//========================================================
//Footer
include VIEWPATH . 'common/footer.php';
