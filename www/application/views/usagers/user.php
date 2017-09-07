<main>
    <section id="user">
        <div class="container">
            <h2><?php echo $prenom . ' ' . $nom; ?></h2>
            <div class="row">	
		<div class="col-sm-12 col-md-6 col-lg-6">
                    <img  class="img-responsive" src="<?= site_url(); ?>assets/images/usagers/<?php echo $user['user_photo']?>" >
		</div>
		<div class="col-sm-12 col-md-6 col-lg-6">
		<form>
                    <table class="table">
                        <tr class="form-group">
                            <td>Prenom :</td>
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
                            <td><?php echo $user['ville']; ?></td>
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
            <?php echo form_open('/usagers/delete/'.$user['user_id']); ?>
                <input type="submit" class="btn" value="Supprimer">
            </form>
            <?php echo form_open('/usagers/edit/'.$user['user_id']); ?> 
                <input type="submit" class="btn" value="Modifier">
            </form>	
            <hr>		
        </div>
    </section>
</main>