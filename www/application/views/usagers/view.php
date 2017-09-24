<?php include VIEWPATH . 'common/header.php' ?>
<h2><?php echo $prenom . ' ' . $nom; ?></h2>
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
        <img  class="img-responsive" src="<?= $base_url; ?>assets/images/usagers/<?php echo $user['user_photo'] ?>" >
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6">
        <form>
            <table class="table">
                <tr class="form-group">
                    <td>Prénom :</td>
                    <td><?php echo $user['prenom']; ?></td>
                </tr>
                <tr class="form-group">
                    <td>Nom :</td>
                    <td><?php echo $user['nom']; ?></td>
                </tr>
                <tr class="form-group">
                    <td>No Permis de conduire :</td>
                    <td><?php echo $user['permis_conduire']; ?></td>
                </tr>
                <tr class="form-group">
                    <td>Adresse :</td>
                    <td><?php echo $user['adresse']; ?></td>
                </tr>
                <tr class="form-group">
                    <td>Ville :</td>
                    <td><?php echo $user['nom_ville']; ?></td>
                </tr>
                <tr class="form-group">
                    <td>Code Postal :</td>
                    <td><?php echo $user['code_postal']; ?></td>
                </tr>
                <tr class="form-group">
                    <td>Téléphone :</td>
                    <td><?php echo $user['telephone']; ?></td>
                </tr>
                <tr class="form-group">
                    <td>Courriel :</td>
                    <td><?php echo $user['courriel']; ?></td>
                </tr>
                <tr class="form-group">
                    <td>Mot de passe :</td>
                    <td><?php echo $user['motdepasse']; ?></td>
                </tr>
                <tr class="form-group">
                    <td>Rôle :</td>
                    <td value="<?php echo $user['role_id']; ?>"><?php echo $user['nom_role']; ?></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<hr>
<?php if (isset($action)) { ?>
<form action="<?=$action?>" id="frm-view">
    <input type="submit" class="btn btn-danger position" value="OK">
</form>
<?php } ?>
<?php /*
<form action="<?=$base_url?>usager/deleteUser/<?=$user['user_id']?>/<?=$origin?>#s" id="frm-delete"></form>
<form action="<?=$base_url?>usager/editUser/<?=$user['user_id']?>/<?=$origin?>#s" id="frm-edit"></form>
<div class="btn-liens">
<?php if (UserAcces::userIsSuperAdmin() && UserAcces::getUserId() != $user['user_id'] ||
        UserAcces::userIsAdmin() && $user['role_id'] == ERole::ROLE_CLIENT) { ?>

    <input type="submit" form="frm-delete" class="btn btn-danger position" value="Supprimer">
<?php } ?>

<?php if (UserAcces::userIsSuperAdmin() ||
        UserAcces::userIsAdmin() && $user['role_id'] == ERole::ROLE_CLIENT ||
        UserAcces::getUserId() == $user['user_id']) {?>

    <input type="submit" form="frm-edit" class="btn btn-warning position" value="Modifier">
<?php } ?>
</div>

 */?>

<?php include VIEWPATH . 'common/footer.php';
