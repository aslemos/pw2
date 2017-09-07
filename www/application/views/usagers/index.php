	
<h2><?php echo $title; ?></h2>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-10">            
        <form action="" name="formulaire" id="form-voitures-id">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="">Nº</th>
                        <th class="">Prénom</th>
                        <th class="">Nom</th>
                        <th class="">Code postal</th>
                        <th class="">Téléphone</th>
                        <th class="">Courriel</th>
                        <th class="">Rôle</th>
                        <th class="">Éditer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usagers AS $user) : ?>
                    <tr>				
                        <td class=""><?php echo $user['user_id']?></td>
                        <td class=""><?php echo $user['prenom']?></td>
                        <td class=""><?php echo $user['nom']?></td>
                        <td class=""><?php echo $user['code_postal']?></td>
                        <td class=""><?php echo $user['telephone']?></td>
                        <td class=""><?php echo $user['courriel']?></td>
                        <td class=""><?php echo $user['nom_role']; ?></td>
                        <td>
                            <a class="" href="<?php echo site_url('/usagers/'.$user['user_id']); ?>">
                                <img class="img-responsive" src="<?= site_url(); ?>assets/images/usagers/<?php echo $user['user_photo']?>" >
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>					
                </tbody>
            </table>
        </div>
        </form>
    </div>    
</div>