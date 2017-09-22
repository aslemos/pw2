<?php include VIEWPATH . '/common/header.php'; ?>

<style>
    .incorrect {
        background-color: red;
    }
    .correct{
        background-color: green;
    }
    span{
        font-size: 13px;
        color: blue;
    }
</style>



<body>
    <div id="myForm1" class="form-style-10">
        <h3>Paiement de réservation</h3>
        <form id="frm-paiement" method="post" action="<?= $base_url ?>locations/insererPayemant/">
            <div class="inner-wrap">
                <div class="row">

                    <div class="row">

                        <div class="col-md-12">
                            <h4>Montant total: <?= $location->getPrixTotal() ?>$</h4>
                            <h6>(Véhicule : <?= $location->getVehicule()->toString() ?> / Période : <?= $location->toString() ?>)</h6>
                            <hr>
                        </div>

                        <div class="col-md-6">
                            <label><h5>Nom</h5>
                                <input class="myInput" type="text" name="nom" disabled value="<?= $location->getLocataire()->getNom() ?> "/>

                                <input type="hidden" name="user_id" value="<?= $location->getLocataireId() ?> ">
                                <input type="hidden" name="montant" value="<?= $location->getPrixTotal() ?> ">
                                <input type="hidden" name="location_id" value="<?= $location->getId() ?> ">
                            </label>
                        </div>
                        <div class="col-md-6">
                            <label><h5>Prénom</h5>
                                <input class="myInput" type="text" name="prenom" disabled value="<?= $location->getLocataire()->getPrenom() ?> " />
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12" id="myTest">
                            <label><h5>Type de paiement <span class="required">*</span></h5>
                                <select name="field4" id="myselect" class="field-select" required>
                                    <option value=""></option>
                                    <?php foreach ($payements as $pay): ?>
                                        <option value="<?php echo $pay->mode_id ?>">
                                            <?php echo $pay->nom_mode ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </label>
                        </div>
                    </div>

                    <div id="myHide">
                        <div class="row">
                            <div class="col-md-4">
                                <label><h5>Numéro de carte<span class="required">*</span></h5>
                                    <input id="in1" type="number" name="nom"  value=""/>
                                </label>
                                <p class='incorrect'></p>
                            </div>
                            <div class="col-md-4" id="date">
                                <label><h5>Date d'expiration de la carte<span class="required">*</span></h5>
                                    <input id="dateExpiration" type="text" name="prenom"  value="" required="required"/>
                                </label>
                            </div>

                            <div class="col-md-4">
                                <label><h5>Code de sécurité - CVV<span class="required" required>*</span></h5>
                                    <input id="dateExpiration2" type="text" name="prenom"  value="" required="required" maxlength="3"/>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" id="flip5" class="btn btn-danger animated bounceInLeft"><a href="<?= $base_url ?>locations/locationsByUser#s" > <i class="fa  fa-window-close" style="font-size:22px;"></i> Annuler</a></button>
                        <button type="submit" id="flip6" class="btn btn-success animated bounceInRight">Payer <i class="fa fa-dollar" style="font-size:22px;"></i></button>
                    </div>
                </div>
        </form>
        <div id="rew"></div>
    </div>


</body>


<script>
    $("select")
            .change(function () {
                var str = "";
                $("select option:selected").each(function () {
                    str += $(this).val();
                });

                if (str == "2") {
                    $("#myHide").slideUp();
                    $("#in1").removeAttr('required');
                    $('#dateExpiration').removeAttr('required');
                    $('#dateExpiration2').removeAttr('required');
                } else {
                    $("#myHide").slideDown();
                    $("#in1").attr('required', '');
                    $('#dateExpiration').attr('required', '');
                    $('#dateExpiration2').attr('required', '');
                }
//                $("#rew").text(str);
            })
            .trigger("change");









    var cartenumero = document.getElementById("in1").value;
    //console.log(cartenumero);


    //Validation NumeroCC

    function myFunction() {
        var valide = true;

        if (!calcLuhn(cartenumero)) {
            document.getElementById("in1").className = "incorrect";
            valide = false;
        } else {
            document.getElementById("in1").className = "correct";
        }
        return valide;
    }

    /**
     * Algorithme de Luhn
     * @param {string} chaine Le numéro à vérifier. Enlève tous les caractères non numériques avant le calcul.
     * @returns {Boolean}
     */
    function calcLuhn(chaine) {
        // enlève les caractères non numériques
        var numero = chaine.match(/\d/g).toString().replace(/\,/g, '');
        var somme = 0, pos = 1, chiffre;
        for (var i = numero.length - 1; i >= 0; i--) {
            chiffre = numero[i] * 1;
            somme += (pos % 2 === 0 && chiffre !== 9) ? (chiffre * 2 % 9) : chiffre;
            pos++;
        }
        return somme % 10 === 0;
    }


</script>



<?php include VIEWPATH . '/common/footer.php'; ?>
