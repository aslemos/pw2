<?php
// Header
include VIEWPATH . 'common/header.php';
//========================================================
?>
<section id="devenir-membre">
    <div class="container">
        <div class="rows4 title-container">
            <div class="cols6">
                <div class="blocks6">
                    <h2>Formulaire d'inscription membre</h2>
                    <?php echo validation_errors(); ?>
                </div>
            </div>
        </div>
        <div class="rows5 row alternate">
            <p><span class="filedRequired">*</span> Ces champs sont obligatoires</p>
            <br>
            <div class="cols7 col-md-12 col-sm-12 col-xs-12">
                <div class="blocks7">
                    <div>
                        <form method="post" name="monFormulaire" action="<?= $action; ?>" class="form-horizontal" id="needs-validation" > <!--novalidate-->

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="lastName">Nom de famille: <span class="filedRequired">*</span></label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Entrez le nom de famille" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="firstName">Prenom: <span class="filedRequired">*</span></label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Entrez le nom" required> 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Date de naissance:<span class="filedRequired">*</span></label>
                                <div class="col-xs-2" id="input_jour">

                                </div>
                                <div class="col-xs-2" id="input_mois">

                                </div>
                                <div class="col-xs-2" id="input_annee">

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-xs-3">Sexe: <span class="filedRequired">*</span></label>

                                <div class="btn-group" data-toggle="buttons">
                                    <div class="col-xs-6">
                                        <label class="btn active" >
                                            <input type="radio" name='gender2' class="gender" checked required>
                                            <i class="fa fa-circle-o fa-2x"></i>
                                            <i class="fa fa-check-circle-o fa-2x"></i>
                                            <span class="test"> Homme</span>
                                        </label>
                                    </div>

                                    <div class="col-xs-6">
                                        <label class="btn">
                                            <input type="radio" name='gender2' class="gender" required>
                                            <i class="fa fa-circle-o fa-2x"></i>
                                            <i class="fa fa-check-circle-o fa-2x"></i>
                                            <span class="test"> Femme</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="inputConduire">Numéro de permis de conduire: <span class="filedRequired">*</span></label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="inputConduire" id="inputConduire" placeholder="Entrez le numéro de permis de conduire" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="phoneNumber">Numéro de téléphone: <span class="filedRequired">*</span></label>
                                <div class="col-xs-6">
                                    <input type="tel" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Entrez le numéro de téléphone" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-xs-3" for="inputEmail">Email: <span class="filedRequired">*</span></label>
                                <div class="col-xs-6">
                                    <input  type="email" name="inputEmail" class="form-control" id="inputEmail" placeholder="Email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="username">Username: <span class="filedRequired">*</span></label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Entrez Username" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="inputPassword">Mot de passe: <span class="filedRequired">*</span></label>
                                <div class="col-xs-6">
                                    <input type="password" name="inputPassword" class="form-control" id="inputPassword" placeholder="Entrez le mot de passe plus de 8 caractères" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="confirmPassword">Confirmer mot de passe: <span class="filedRequired">*</span></label>
                                <div class="col-xs-6">
                                    <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Retapez le mot de passe" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="control-label col-xs-3" for="inputAddress">Adresse: <span class="filedRequired">*</span></label>
                                <div class="col-xs-6">
                                    <input type="text" name="inputAddress" class="form-control" id="inputAddress" placeholder="1234 rue de Gaspe" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="control-label col-xs-3" for="inputAddress2">Adresse 2: <span class="filedRequired">  </span></label>
                                <div class="col-xs-6">
                                    <input type="text" name="inputAddress2" class="form-control" id="inputAddress2" placeholder="Appartement, studio ou étage">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3"  for="province_id"><span class="filedRequired">*</span></label>
                                <div class="col-xs-3">
                                    <select class="form-control formSelector" name="province_id" id="province_id">
                                        <option value="0">-- Choisissez Province --</option>
                                        <?php 
                                        if(isset($provinces)){
                                        foreach ($provinces as $province) { ?>
                                            <option value="<?= $province['province_id'] ?>"><?= $province['province'] ?></option>
                                        <?php }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!--<label class="control-label col-xs-2"  for="ville">Ville</label>-->
                                <div class="col-xs-3">
                                    <select class="form-control formSelector" name="ville_id" id="ville_id">
                                        <option value="0">-- Choisissez Ville --</option>
                                        <?php 
                                        if(isset($villes)){
                                        foreach ($villes as $ville) { ?>
                                            <option value="<?= $ville['ville_id'] ?>"><?= $ville['nom_ville'] ?></option>
                                        <?php } 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3"><span class="filedRequired">*</span></label>
                                <div class="col-xs-3">
                                    <select class="form-control formSelector" name="arr_id" id="arr_id">
                                        <option value="0">-- Choisissez Arrondissement--</option>
                                        <?php
                                        if(isset($arrondissement)){
                                        foreach ($arrondissement as $ville) { ?>
                                            <option value="<?= $ville['ville_id'] ?>"><?= $ville['nom_ville'] ?></option>
                                        <?php }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" name="codePostal" class="form-control" id="inputCode" placeholder="Code Postal" required>
                                </div>
                            </div>

                            <!--                            <div class="form-group">
                                                            
                                                            <div class="col-xs-2">
                                                                <select name="choixProvince" id="province_id" class="form-control formSelector">
                                                                    <option SELECTED>Province</option>
                                                                </select>
                                                            </div>
                                                            
                                                            <label class="control-label col-xs-3" for="inputVille"></label>
                                                            <div class="col-xs-2">
                                                                <input type="text" name="inputVille" class="form-control" id="inputVille" placeholder="Ville" required>
                                                            </div>
                            
                                                            <div class="col-xs-2">
                                                                <input type="text" name="CodePostal" class="form-control" id="inputCode" placeholder="Code Postal" required>
                                                            </div>
                                                        </div>-->

                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="agree" required>  Je suis d'accord avec <a href="#"  data-toggle="modal" data-target="#myModal">conditions</a>.<span class="filedRequired">*</span>
                                    </label>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Conditions</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tincidunt, urna et dapibus hendrerit, leo purus tincidunt nunc, sed sollicitudin risus nisi in ex. Suspendisse sollicitudin urna ut eleifend posuere. Quisque justo mauris, egestas non ante vitae, hendrerit molestie nibh. Donec quis lacus in augue cursus aliquet.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br />
                            
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9">
                                    <input type="submit" class="btn btn-primary" value="S'inscrire">
                                    <input type="reset" class="btn btn-default" value="Effacez le formulaire!">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
</section>

<?php
//========================================================
//Footer
include VIEWPATH . 'common/footer.php';
