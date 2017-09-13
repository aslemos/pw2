<?php include VIEWPATH . 'common/header.php'; ?>
<h2><?php echo $vehicule->getMarque()->getNom() . ' ' . $vehicule->getModele()->getNom() . ' ' .$vehicule->getAnnee() ; ?></h2>
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
        <img class="img-responsive" src="<?=$base_url?>assets/images/vehicules/<?php echo $vehicule->getPhoto();?>" title="<?=$vehicule->toString()?>" alt="<?=$vehicule->toString()?>">
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6">
        <table class="table">
            <tr class="form-group">
                <td>Modèle :</td>
                <td><?php echo $vehicule->toString(); ?></td>
            </tr>
            <tr class="form-group">
                <td>Type :</td>
                <td><?php echo $vehicule->getType()->getNom(); ?></td>
            </tr>
<?php if(UserAcces::userIsAdmin() || UserAcces::userIsLogged() && UserAcces::getLoggedUser()->getId() == $vehicule->getProprietaireId()) { ?>
            <tr class="form-group">
                <td>Matricule :</td><td><?php echo $vehicule->getMatricule(); ?></td>
            </tr>
<?php } ?>
            <tr class="form-group">
                <td>Année :</td><td><?php echo $vehicule->getAnnee(); ?></td>
            </tr>
            <tr class="form-group">
                <td>Nombre de places :</td>
                <td><?php echo $vehicule->getNbPlaces(); ?></td>
            </tr>
            <tr class="form-group">
                <td>Prix :</td>
                <td><?php echo $vehicule->getPrix(); ?></td>
            </tr>
            <tr class="form-group">
                <td>Disponibilité :</td>
<?php if ($vehicule->getDisponibilite()) { ?>
                <td><?php echo $vehicule->getDisponibilite()->getDateDebut(); ?> à <?php echo $vehicule->getDisponibilite()->getDateFin(); ?></td>
<?php } else { ?>
                <td>Non disponible en ce moment</td>
<?php } ?>
            </tr>
<?php if(UserAcces::userIsAdmin() || UserAcces::userIsLogged() && UserAcces::getLoggedUser()->getId() == $vehicule->getProprietaireId()) { ?>
            <tr class="form-group">
                <td>Propriétaire :</td>
                <td><?php echo $vehicule->getProprietaire()->getNom() . ', ' . $vehicule->getProprietaire()->getPrenom(); ?></td>
            </tr>
<?php } ?>
            <tr class="form-group">
                <td>Carburant :</td>
                <td><?php echo $vehicule->getCarburant()->getNom(); ?></td>
            </tr>
            <tr class="form-group">
              <td>Transmission :</td>
              <td><?php echo $vehicule->getTransmission()->getNom(); ?></td>
            </tr>
<?php if(UserAcces::userIsLogged()) { ?>
            <tr class="form-group">
                <td>Emplacement :</td>
                <td><?php echo $vehicule->getArrond()->toString(); ?></td>
            </tr>
<?php } ?>
        </table>
    </div>
</div>
<hr>
<?php if(UserAcces::userIsLogged()) { ?>
    <?php echo form_open($base_url.'vehicule/deleteVehicule/' . $vehicule->getId())?>
        <input type="submit" class="btn btn-danger" value="Supprimer">
    </form>
    <?php echo form_open($base_url.'vehicule/editVehicule/' . $vehicule->getId()); ?>
        <input type="submit" class="btn" value="Modifier">
    </form>
<?php } ?>
<hr>
<?php include VIEWPATH . 'common/footer.php';
