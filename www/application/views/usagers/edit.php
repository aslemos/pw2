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
                    <h2>Editer mon profil membre</h2>
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
                        <form method="post" enctype="multipart/form-data" name="monFormulaire" action="<?= $action; ?>" class="form-horizontal" id="needs-validation" > <!--novalidate-->

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="lastName">Nom de famille: <span class="filedRequired">*</span></label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Entrez le nom de famille" value="<?= $user['nom']; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="firstName">Prenom: <span class="filedRequired">*</span></label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Entrez le nom" value="<?= $user['prenom']; ?>" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="dateNaissance">Date de Naissance: <span class="filedRequired">*</span></label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control datepicker" id="dateNaissance" name="dateNaissance" value="<?= $user['DateNaissance']; ?>" required>
                                </div>
                            </div>

                           
                            <div class="form-group">
                                <label class="control-label col-xs-3">Sexe: <span class="filedRequired">*</span></label>

                                <div class="btn-group" data-toggle="buttons">
                                    <div class="col-xs-6">
                                        <label class="btn active" >
                                            <input type="radio" name='gender2' value="H" class="gender" <?php if ($user['sexe'] == 'H') echo 'checked'; ?> required>
                                            <i class="fa fa-circle-o fa-2x"></i>
                                            <i class="fa fa-check-circle-o fa-2x"></i>
                                            <span class="test"> Homme</span>
                                        </label>
                                    </div>

                                    <div class="col-xs-6">
                                        <label class="btn">
                                            <input type="radio" name='gender2' value="F" class="gender" <?php if ($user['sexe'] == 'F') echo 'checked'; ?> required>
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
                                    <input type="text" class="form-control" name="inputConduire" id="inputConduire" placeholder="Entrez le numéro de permis de conduire" pattern="^[a-zA-z]\d{4}(\-)\d{6}(\-)\d{2}$" title="Numéro de permis de conduire Incorrect" value="<?= $user['permis_conduire']; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="phoneNumber">Numéro de téléphone: <span class="filedRequired">*</span></label>
                                <div class="col-xs-6">
                                    <input type="tel" class="form-control" name="phoneNumber" id="phoneNumber" pattern="\d{10}" title="Veuillez respecter ce format: 5143184728" placeholder="Entrez le numéro de téléphone Format: 5143184728" value="<?= $user['telephone']; ?>" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-xs-3" for="inputEmail">Email: <span class="filedRequired">*</span></label>
                                <div class="col-xs-6">
                                    <input  type="email" name="inputEmail" class="form-control" id="inputEmail" placeholder="Email" value="<?= $user['courriel']; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="username">Username: <span class="filedRequired">*</span></label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Entrez Username" value="<?= $user['username']; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="inputPassword">Mot de passe: <span class="filedRequired">*</span></label>
                                <div class="col-xs-6">              
                                    <input type="password" name="inputPassword" class="form-control" id="inputPassword" placeholder="Entrez le mot de passe plus de 8 caractères, au moins une lettre majuscule, un numéro et un caractère spécial" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*-+?&])[A-Za-z\d$@$!%*-+?&]{8,}" title="Veuillez Respecter Format: Minimum de huit caractères, au moins une lettre majuscule, une lettre minuscule, un numéro et un caractère spécial" required>
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
                                    <input type="text" name="inputAddress" class="form-control" id="inputAddress" placeholder="1234 rue de Gaspe" pattern="\d{1,5}((,|\s)[\wéàèù-]*)+" title="Veuillez Respecter Format: XXXX rue/boulevard Nom de la rue" value="<?= $user['adresse']; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="control-label col-xs-3" for="inputAddress2">Adresse 2: <span class="filedRequired">(facultatif)</span></label>
                                <div class="col-xs-6">
                                    <input type="text" name="inputAddress2" class="form-control" id="inputAddress2" placeholder="Appartement, studio ou étage" value="<?= $user['adresse2']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3"  for="province_id"><span class="filedRequired">*</span></label>
                                <div class="col-xs-3">
                                    <select class="form-control formSelector" name="province_id" id="province_id" required>
                                        <option value="0">-- Choisissez Province --</option>
                                        <?php
                                        if (isset($provinces)) {
                                            foreach ($provinces as $province) {
                                                ?>
                                                <option value="<?= $province['province_id'] ?>" <?= $province['province_id'] == $user['province'] ? ' selected' : '' ?>><?= $province['province'] ?></option>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!--<label class="control-label col-xs-2"  for="ville">Ville</label>-->
                                <div class="col-xs-3">
                                    <select class="form-control formSelector" name="ville_id" id="ville_id" required>
                                        <option value="">-- Choisissez Ville --</option>
                                        <?php
                                        if (isset($villes)) {
                                            foreach ($villes as $ville) {
                                                ?>
                                                <option value="<?= $ville['ville_id'] ?>" <?= $ville['ville_id'] == $user['ville_id'] ? ' selected' : '' ?>><?= $ville['nom_ville'] ?></option>
    <?php
    }
}
?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3"><span class="filedRequired">*</span></label>
                                <div class="col-xs-3">
                                    <select class="form-control formSelector" name="arr_id" id="arr_id" required>
                                        <option value="">-- Choisissez Arrondissement--</option>
                                        <?php
                                        if (isset($arrondissement)) {
                                            foreach ($arrondissement as $ville) {
                                                ?>
                                                <option value="<?= $ville['ville_id'] ?>" <?= $ville['ville_id'] == $user['ville_id'] ? ' selected' : '' ?>><?= $ville['nom_ville'] ?></option>
    <?php
    }
}
?>
                                    </select>
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" name="codePostal" class="form-control" id="inputCode" placeholder="Code Postal" pattern="^[A-Za-z]\d[A-Za-z](\-| |)\d[A-Za-z]\d$" title="Veuillez Respecter Format: L2L 2L1" value="<?= $user['code_postal'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="photo">Photo:</label>
                                <div class="col-xs-6">
                                    <input type="file" class="form-control-file" id="photo" name="photo"  value="<?= $user['user_photo'] ?>">
                                </div>
                            </div>
                            <input type="hidden" id="user_id" name="user_id" value="<?=UserAcces::getLoggedUser()->getId();?>"> 
                            <br />

                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9">
                                    <input type="submit" class="btn btn-primary" value="Enregister Modification">
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
