<?php include VIEWPATH . 'common/header.php' ?>
<h3><?php echo $title; ?></h3>
<?php echo form_open_multipart($base_url . 'usager/updateUser'); ?>
    <div class="table-responsive">
        <h4 style="color:red"><?php echo $err_message; ?></h4>
        <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
        <table class="table table-striped">
            <tr class="form-group">
                <td>
                    <label for="prenom">Prenom : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $user['prenom']; ?>">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="nom">Nom : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $user['nom']; ?>">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="permis_conduire">No Permis de conduire : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="permis_conduire" name="permis_conduire" value="<?php echo $user['permis_conduire']; ?>">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="adresse">Adresse : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                <input class="form-control" id="adresse" name="adresse" value="<?php echo $user['adresse']; ?>">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="ville">Ville : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <select class="form-control" id="ville_id" name="ville_id" value="<?php echo $user['ville_id']; ?>">
                    <?php foreach ($villes as $ville) { ?>
                    <option value="<?=$ville['ville_id']?>"><?=$ville['nom_ville']?></option>
                    <?php } ?>
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="code_postal">Code Postal : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="code_postal" name="code_postal" value="<?php echo $user['code_postal']; ?>">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="phone">Téléphone : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo $user['telephone']; ?>">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="email">Courriel : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="courriel" name="courriel" value="<?php echo $user['courriel']; ?>">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="password">Mot de passe : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="password" class="form-control" id="motdepasse" name="password" value="<?php echo $user['motdepasse']; ?>">
                </td>
            </tr>
<?php if (UserAcces::userIsSuperAdmin()) { ?>
            <tr class="form-group">
                <td>
                    <label for="role_id">Rôle : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <select class="form-control" id="role_id" name="role_id">
                        <?php foreach($roles as $role) { ?>
                        <option value="<?php echo $role['role_id']; ?>"<?=$role['role_id']==$user['role_id']?' selected':''?>><?php echo $role['nom_role']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
<?php } ?>
        </table>
        <hr>
        <input type="submit" class="btn" value="Modifier">
    </div>
</form>
<?php include VIEWPATH . 'common/footer.php';
