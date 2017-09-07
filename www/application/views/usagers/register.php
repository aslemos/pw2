
<h3 style="text-align:center;"><?php echo $title; ?></h3>	
<?php echo form_open_multipart('usagers/register'); ?>
    <div class="table-responsive">
        <h4 style="color:red"><?php echo $err_message; ?></h4>
        <table class="table table-striped">
            <tr class="form-group">
                <td>
                    <label for="prenom">Prenom : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="prenom" name="prenom">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="nom">Nom : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="nom" name="nom">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="permis_conduire">No Permis de conduire : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="permis_conduire" name="permis_conduire">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="adresse">Adresse : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input class="form-control" id="adresse" name="adresse">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="ville">Ville : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="ville" name="ville">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="code_postal">Code Postal : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="code_postal" name="code_postal">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="phone">Téléphone : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="tel" class="form-control" id="phone" name="phone">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="email">Courriel : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="email" class="form-control" id="email" name="email">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="username">Nom utilisateur : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="username" name="username">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="password">Mot de passe : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="password" class="form-control" id="motdepasse" name="password">
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="password2">Confirmez le Mot de passe : </label>
                    <span style="color:red">*</span>
                </td>
                <td>
                    <input type="password" class="form-control" id="password2" name="password2">
                </td>
            </tr>
        </table>	
        <hr>
        <div class="form-group">
            <label>Ajouter une image : </label>
            <input type="file" name="userfile">
        </div>
        <div class="form-group">
            <input type="submit" class="btn" value="ENVOYER">
        </div>                   
    </div>
</form>	
<hr>