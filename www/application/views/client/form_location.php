<?php include VIEWPATH . '/common/header.php'; ?>

<body>


    <div class="form-style-10">
        <h1>Reservation!<span>Vérifier et confirmer les informations!</span></h1>
        <form>

            <div class="section test animated zoomIn"><span>1</span>Information location de voiture</div>

            <div class="inner-wrap" id="part1">
                <div class="row">
                    <div class="col-md-6">
                        <label>Marque
                            <input type="text" name="marque" disabled value="<?= $voitures['nom_marque']; ?> "/>
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
                            <input type="text" name="date_debut" disabled value="<?= $voitures['date_debut'] ?> "/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>Date fin
                            <input type="text" name="date_fin" disabled value="<?= $voitures['date_fin'] ?> "/>
                        </label>
                    </div>
                </div>

                <div class="btn-group" role="group" aria-label="Basic example">

                    <button type="button" id="flip2" class="btn btn-primary">Next <i class="fa fa-hand-o-right"></i></button>
                    </span>
                </div>
            </div>


            <div class="section test2"><span>2</span>Informations personnelles</div>

            <div class="inner-wrap" id="part2">

                <div class="row">
                    <div class="col-md-6">
                        <label>Nom
                            <input type="text" name="nom" disabled value="<?= $users->getNom() ?> "/>
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
                    <button type="button" id="flip3" class="btn btn-primary animated bounceInLeft"><i class="fa fa-hand-o-left"></i> Avant</button>
                    <button type="button" id="flip4" class="btn btn-primary animated bounceInRight">Next <i class="fa fa-hand-o-right"></i></button>
                    </span>
                </div>

            </div>



            <div class="section test3"><span>3</span>Modes de paiements</div>
            <div class="inner-wrap" id="part3">




                <div class="row">
                    <div class="col-md-12">
                        <label>type de paiement <span class="required">*</span>
                            <select name="field4" id="myselect" class="field-select">


                                <option value=""></option>

                                <?php foreach ($payements as $pay): ?>
                                    <option value="<?php echo $pay->mode_id ?>"><?php echo $pay->nom_mode ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                    </div>

                </div>


                <div class="row" id="test5">
                    <div class="col-md-6">
                        <label>Numero du cart
                            <input type="number" name="nom"  value=""/>
                        </label>
                    </div>
                    <div class="col-md-6" id="date">
                        <label>Date expiration du cart
                            <input id="dateExpiration" type="text" name="prenom"  value="" />
                        </label>
                    </div>
                </div>

                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" id="flip5" class="btn btn-primary animated bounceInLeft"><i class="fa fa-hand-o-left" style="font-size:22px;"></i> Avant</button>
                    <button type="button" id="flip6" class="btn btn-success animated bounceInRight">Pay <i class="fa fa-dollar" style="font-size:22px;"></i></button>
                    </span>
                </div>
            </div>


            <!--            <div class="button-section">
                            <a href="/index.php/voiture/insert_payement/>">Payer</a>
                            <span class="privacy-policy">
                                <input type="checkbox" name="field7">You agree to our Terms and Policy.
                            </span>
                        </div>-->


        </form>
    </div>

</body>


<script>
    $(document).ready(function () {


        /*Annee de voiture*/
    $(function () {
        $("#dateExpiration").datepicker({
            changeMonth: true,
            changeYear: true
        });
    });



        /*booton Next1*/
        $("#flip2").click(function () {
            $("#part2").slideDown("slow");
            $("#part1").slideUp("slow");
            $("html, body").animate({scrollTop: 650}, 1000);
            $(".test").removeClass("zoomIn");
            $(".test2").addClass("animated zoomIn");

        });

        /*booton Avant2*/
        $("#flip3").click(function () {
            $("#part1").slideDown("slow");
            $("#part2").slideUp("slow");
            $("html, body").animate({scrollTop: 650}, 1000);
            $(".test").addClass("zoomIn");

        });

        /*booton Next2*/
        $("#flip4").click(function () {
            $("#part3").slideDown("slow");
            $("#part2").slideUp("slow");
            $("html, body").animate({scrollTop: 650}, 1000);
            $(".test3").addClass("animated zoomIn");
            $(".test2").removeClass("animated zoomIn");

        });

        /*booton Avant3*/
        $("#flip5").click(function () {
            $("#part2").slideDown("slow");
            $("#part3").slideUp("slow");
            $("html, body").animate({scrollTop: 650}, 1000);
            $(".test2").addClass("animated zoomIn");
            $(".test3").removeClass("animated zoomIn");
        });



 var conceptName = $('#field4').find(":selected").text();
    if (conceptName === "PayPal") {
     $("#test5").removeClass("");
}




    });
</script>



<?php include VIEWPATH . '/common/footer.php'; ?>
