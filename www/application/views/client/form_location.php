<?php include VIEWPATH . '/common/header.php'; ?>

<style type="text/css">
    .editPersonInfo{
        height: 60px;
        width: 60px;
        float: right;
        background-color: orange;
        border-radius: 25%;

    }

    #editPersonIcon{
        margin-left: 15px;
        margin-top: 12px;
    }
</style>

<body>


    <div class="form-style-10">
        <h1>Reservation!<span>Vérifier et confirmer les informations!</span></h1>
        <form method="post" action="<?= $base_url ?>locations/insererLocation">

            <div class="section test animated zoomIn"><span>1</span>Information location de voiture</div>

            <div class="inner-wrap" id="part1">
                <div class="row">
                    <div class="col-md-6">
                        <label>Marque
                             <input type="text" name="marque" disabled value="<?= $voitures['nom_marque']; ?> "/>
                            <input type="hidden" name="vehicule_id" value="<?= $voitures['vehicule_id'];  ?> ">
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>Type
                            <input type="text" name="type" disabled value="<?= $voitures['nom_type']; ?> "/>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Année
                            <input type="text" name="annee" disabled value="<?= $voitures['annee']; ?> "/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>Nombre de places
                            <input type="text" name="places" disabled value="<?= $voitures['nbre_places'] ?> "/>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Type de carburant
                            <input type="text" name="carburant" disabled value="<?= $voitures['nom_carburant'] ?> "/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>Boite de vitesse <input type="text" disabled name="transmissions" value="<?= $voitures['nom_transmission'] ?> "/></label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Type de carburant
                            <input type="text" name="carburant" disabled value="<?= $voitures['nom_carburant'] ?> "/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>Boite de vitesse <input type="text" disabled name="transmissions" value="<?= $voitures['nom_transmission'] ?> "/></label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Matricule
                            <input type="text" name="matricule" disabled value="<?= $voitures['matricule'] ?> "/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>Boite de vitesse
                            <input type="text" name="transmissions" disabled value="<?= $voitures['nom_transmission'] ?> "/>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Date debut
                            <input type="text" name="date_debut"  value="<?= $voitures['date_debut'] ?>"/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>Date fin
                            <input type="text" name="date_fin" value="<?= $voitures['date_fin'] ?> "/>
                        </label>
                    </div>
                </div>

                <div class="btn-group" role="group" aria-label="Basic example">

                    <button type="button" id="flip5" class="btn btn-danger animated bounceInLeft"><i class="fa  fa-window-close" style="font-size:22px;"></i> Annuler</button>

                    <button type="button" id="flip2" class="btn btn-primary">Prochain <i class="fa fa-hand-o-right"></i></button>
                    </span>
                </div>
            </div>


            <div class="section test2"><span>2</span>Informations personnelles</div>

            <div class="inner-wrap" id="part2">


                <div class="row">
                    <div class="col-md-6">
                        <label>Nom
                            <input type="text" name="nom" disabled value="<?= $users->getNom() ?> "/>
                            <input type="hidden" name="user_id" value="<?= $users->getUserId() ?> ">

                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>Prenom
                            <input type="text" name="prenom" disabled value="<?= $users->getPrenom() ?> " />
                        </label>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <label>Permi de conduire
                            <input type="text" name="nom" disabled value="<?= $users->getPermisConduire() ?> "/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>Courrier
                            <input type="text" name="prenom" disabled value="<?= $users->getCourriel() ?> " />
                        </label>
                    </div>
                </div>


                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" id="flip3" class="btn btn-primary animated bounceInLeft"><i class="fa fa-hand-o-left"></i> Précédent</button>
                    <button type="submit" id="flip4" class="btn btn-success animated bounceInRight">Réservé <i class="fa fa-check-square-o"></i></button>
                </div>


                 <div class="editPersonInfo" >
                        <div class="editPersonInfo">
                            <span id="editPersonIcon" class="fa fa-pencil" style="font-size:25px;color:white;"></span>
                        </div>

                    </div>

            </div>






<?php //print_r($voitures); ?>




        </form>
    </div>

</body>





<?php include VIEWPATH . '/common/footer.php'; ?>
