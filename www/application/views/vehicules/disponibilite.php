<?php
// Header
include_once VIEWPATH . 'common/header.php';
//Menu

//include_once VIEWPATH . "client/boutons_prestataire.php";
$title_disponibilite = 'disponibilite';
?>
<script>
    $(function(){
        $('[id^="btn-supp-"]').on('click', function(){
            var id = this.id.split('-')[2];
            if (id && confirm("Êtes-vous sûr de vouloir supprimer cette période ?")) {
                document.location.href = base_url + 'disponibilite/delete/' + id;
            }
        });

    });
</script>
<div class="row btn-liens" >
    <!-- Bouton pour afficher l'historique des locations faites par les locataires des voitures d'un usager -->
    <a class="btn btn-danger position" href="<?=$base_url?>membre/vehicules#s">Retourner</a>
</div>

<h3><?php echo $vehicule->toString();  ?></h3>
<div class="row">

    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class='row'>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <img class="img-responsive" src="<?= $base_url; ?>assets/images/vehicules/<?php echo $vehicule->getPhoto() ?>" >
            </div>
            <hr />

<?php if (UserAcces::userIsAdmin() || UserAcces::getUserId() == $vehicule->getProprietaireId()): ?>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h4>Période</h4>
                    <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('disponibilite/create/' . $vehicule->getId() . '#s'); ?>
                    <div class='form-group'>
                        <label for='date_debut'>Date début :</label>
                        <input type="text" id="date_debut" name="date_debut" class='form-control' required>
                    </div>
                    <div class='form-group'>
                        <label for='date_fin'>Date fin :</label>
                        <input type="text" id="date_fin" name="date_fin" class='form-control' required>
                    </div>
                    <button type='submit' class='btn btn-primary'>Ajouter</button>
                    </form>
                </div>
<?php endif; ?>
        </div>
    </div>



    <div class="col-sm-12 col-md-8 col-lg-6">

        <div class='row'>


            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class='row'>
                    <div class="col-sm-12 col-md-8 col-lg-4">
                        <ul class="table">
                            <li>ID véhicule: <?php echo $vehicule->getId(); ?></li>
                            <li>Marque: <?php echo $vehicule->getMarque()->getNom(); ?></li>
                            <li>Type: <?php echo $vehicule->getType()->getNom(); ?></li>
                            <li>Matricule: <?php echo $vehicule->getMatricule(); ?></li>
                            <li>Année : <?php echo $vehicule->getAnnee(); ?></li>
                            <li>Nombre de places: <?php echo $vehicule->getNbPlaces(); ?></li>
                            <li>Tarif: $<?php echo $vehicule->getPrix(); ?></li>
                            <li>Carburant: <?php echo $vehicule->getCarburant()->getNom(); ?></li>
                            <li>Transmission: <?php echo $vehicule->getTransmission()->getNom(); ?></li>
                            <li>Site: <?php echo $vehicule->getArrond()->getNom(); ?></li>
                            <li>Propriétaire: <?php echo $vehicule->getProprietaire()->toString(); ?></li>
                        </ul>
                    </div>


                    <div class="col-sm-12 col-md-8 col-lg-8">
                        <h3 class="text-center">Disponibilité du véhicule</h3>
                        <table class="table">
                          <?php if (count($disponibilites) > 0) { ?>
                                <tr>
                                    <th>#</th>
                                    <th>Date début</th>
                                    <th>Date fin</th>
<?php if (UserAcces::userIsAdmin() || UserAcces::getUserId() == $vehicule->getProprietaireId()) { ?>
                                    <th>Action</th>
<?php } ?>
                                </tr>
                                <?php foreach ($disponibilites as $pos => $disponibilite) { ?>
                                    <tr>
                                        <td><?=($pos+1)?></td>
                                        <td><?php echo $disponibilite->getDateDebut(); ?></td>
                                        <td><?php echo $disponibilite->getDateFin(); ?></td>
<?php if (UserAcces::userIsAdmin() || UserAcces::getUserId() == $vehicule->getProprietaireId()) { ?>
                                        <td><a id="btn-supp-<?=$disponibilite->getId()?>" href="javascript::void(0)"><i class="fa fa-trash-o"></i></a></td>
<?php } ?>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <p>Ce véhicule n'est pas disponible en location.</p>
                            <?php } ?>
                        </table>
                    </div>


                </div>
            </div>


        </div>
    </div>
</div>
<?php
//===============================================
// Footer
include_once VIEWPATH . 'common/footer.php';
