<?php include VIEWPATH . 'common/header.php'; ?>

<style type="text/css">

</style>

<div class="form-style-10">
    <h3>Réservation<span>Vérifier et confirmer les informations</span></h3>
    <form method="post" action="<?= $base_url ?>locations/insererLocation#s">

        <div class="section test animated zoomIn"><span>1</span>Information location de voiture</div>

        <div class="inner-wrap" id="part1">
            <div class="row">
                <div class="col-md-4">
                    <label><h5>Marque</h5>
                        <input class="myInput" type="text" name="marque" disabled value="<?= $voitures['nom_marque']; ?> "/>
                        <input type="hidden" id="vehicule_id" name="vehicule_id" value="<?= $voitures['vehicule_id']; ?> ">
                    </label>
                </div>
                <div class="col-md-4">
                    <label><h5>Modele</h5>
                        <input class="myInput" type="text" name="type" disabled value="<?= $voitures['nom_modele']; ?> "/>
                    </label>
                </div>

                <div class="col-md-4">
                    <label><h5>Type</h5>
                        <input class="myInput" type="text" name="type" disabled value="<?= $voitures['nom_type']; ?> "/>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label><h5>Année</h5>
                        <input class="myInput" type="text" name="annee" disabled value="<?= $voitures['annee']; ?> "/>
                    </label>
                </div>
                <div class="col-md-4">
                    <label><h5>Nombre de places</h5>
                        <input class="myInput" type="text" name="places" disabled value="<?= $voitures['nbre_places'] ?> "/>
                    </label>
                </div>

                <div class="col-md-4">
                    <label><h5>Type de carburant</h5>
                        <input class="myInput" type="text" name="carburant" disabled value="<?= $voitures['nom_carburant'] ?> "/>
                    </label>
                </div>

            </div>

            <div class="row">

                <div class="col-md-4">
                    <label><h5>Emplacement</h5>
                        <input class="myInput" type="text" disabled name="arr" value="<?= $voitures['nom_arr'] ?> "/>
                    </label>
                </div>

                <div class="col-md-4">
                    <label><h5>Prix par jour</h5>
                        <input class="myInput" type="text" disabled name="prix" value="<?= $voitures['prix'] ?> "/>
                    </label>
                </div>

                <div class="col-md-4">
                    <label><h5>Prix total</h5>
                        <input class="myInput" type="text" name="prixTotal" disabled value="<?= $prix_total?> "/>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label><h5>Date début<i class="fa fa-pencil-square-o" aria-hidden="true"></i></h5>
                        <input type="text" id="date_debut" name="date_debut"  value="<?= $date_debut ?>"/>
                    </label>
                </div>
                <div class="col-md-6">
                    <label><h5>Date fin<i class="fa fa-pencil-square-o" aria-hidden="true"></i></h5>
                        <input type="text" id="date_fin" name="date_fin" value="<?= $date_fin ?> "/>
                    </label>
                </div>
            </div>

            <div class="btn-group" role="group" aria-label="Basic example">

                <a href="<?= $base_url ?>" type="button" id="flip5" class="btn btn-danger animated bounceInLeft">
                    <i class="fa  fa-window-close" style="font-size:22px;"></i> Annuler
                </a>
                <button type="button" id="flip2" class="btn btn-primary">Prochain <i class="fa fa-hand-o-right"></i></button>
                </span>
            </div>
        </div>


        <div class="section test2"><span>2</span>Informations personnelles</div>
        <div class="inner-wrap" id="part2">
            <div class="row">
                <div class="col-md-6">
                    <label><h5>Nom</h5>
                        <input class="myInput" type="text" name="nom" disabled value="<?= $users->getNom() ?> "/>
                        <input type="hidden" name="user_id" value="<?= $users->getId() ?> ">

                    </label>
                </div>
                <div class="col-md-6">
                    <label><h5>Prénom</h5>
                        <input class="myInput" type="text" name="prenom" disabled value="<?= $users->getPrenom() ?> " />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label><h5>Permis de conduire</h5>
                        <input class="myInput" type="text" name="nom" disabled value="<?= $users->getPermisConduire() ?> "/>
                    </label>
                </div>
                <div class="col-md-6">
                    <label><h5>Courriel</h5>
                        <input class="myInput" type="text" name="prenom" disabled value="<?= $users->getCourriel() ?> " />
                    </label>
                </div>
            </div>

            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" id="flip3" class="btn btn-primary animated bounceInLeft"><i class="fa fa-hand-o-left"></i> Précédent</button>
                <button type="submit" id="flip4" class="btn btn-success animated bounceInRight">Réserver <i class="fa fa-check-square-o"></i></button>
            </div>

            <div class="editPersonInfo" >
                <div class="editPersonInfo">
                    <a href="<?= $base_url ?>usager/editUser/<?= $users->getId() ?>#s" ><span id="editPersonIcon" class="fa fa-pencil" style="font-size:25px;color:white;"> </span></a>
                </div>

            </div>
        </div>
    </form>
</div>

<script>
    $(function () {

        /*alert(vehicule_id);

         alert(date_fin);*/

        $("#flip2").click(function () {
            var vehicule_id = $("#vehicule_id").val();
            var date_debut = $("#date_debut").val();
            var date_fin = $("#date_fin").val();

            $.ajax({
                url: base_url + "ajax/disponibiliteParDate/" + vehicule_id + "/" + date_debut + "/" + date_fin,
                success: function (data) {
                    var json = JSON.parse(data);
                    if (json.disponible) {

                        $("#part2").slideDown("slow");
                        $("#part1").slideUp("slow");
                        $("html, body").animate({scrollTop: 650}, 1000);
                        $(".test").removeClass("zoomIn");
                        $(".test2").addClass("animated zoomIn");

                        //$(".prixTotal").val(json.prix_total);
                        //document.getElementsByClass(".prixTotal").innerHTML = json.prix_total + obj.birth;

                    } else {
                        alert("Periode non disponible");

                    }
                }
            });
        });


    });


</script>


<?php
include VIEWPATH . 'common/footer.php';
