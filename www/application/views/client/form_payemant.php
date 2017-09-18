<?php include VIEWPATH . '/common/header.php'; ?>

<style type="text/css">
    .editPersonInfo{
        height: 40px;
        width: 300px;
        float: left;
        margin-top: -5px;


    }

    #editPersonIcon{
        margin-left: 5px;

    }

    #myForm2{
        display: none;
    }




</style>




<body>


    <div id="myForm1" class="form-style-10">
        <h3>Une récente modes de paiement</h3>

        <form  method="post" action="<?= $base_url ?>locations/insererPayemant">
            <div class="inner-wrap">
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
                        <label>Type de paiement <span class="required">*</span>
                            <input type="text" name="type_paiement" disabled value="Visa"/>
                        </label>
                    </div>

                    <div class="col-md-6">
                        <label>Numéro de carte
                            <input type="number" name="nom"  value="123456"/>
                        </label>
                    </div>
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" id="flip5" class="btn btn-danger animated bounceInLeft"><a href="<?= $base_url ?>" > <i class="fa  fa-window-close" style="font-size:22px;"></i> Annuler</a></button>
                    <button type="submit" id="flip6" class="btn btn-success animated bounceInRight">Payer <i class="fa fa-dollar" style="font-size:22px;"></i></button>
                </div>
            </div>
        </form>

        <!--
                <div class="editPersonInfo1" >
                    <div id="btn1" class="editPersonInfo1">
                        <a href="" ></a>
                    </div>
                </div>-->
        <button class="btn1"><span class="fa fa-pencil" style="font-size:25px;color:orange;"> </span>d'autres modes de paiements</button>

    </div>



    <div id="myForm2" class="form-style-10">
        <h3>Payement</h3>
        <form  method="post" action="<?= $base_url ?>locations/insererPayemant" >
            <div class="inner-wrap">
                <div class="row">
                    <div class="col-md-6">
                        <label>Nom
                            <input type="text" name="nom" value=""/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>Prenom
                            <input type="text" name="prenom"  value="" />
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Type de paiement <span class="required">*</span>
                            <select name="field4" id="myselect" class="field-select">

                                <option value=""></option>

                                <?php foreach ($payements as $pay): ?>
                                    <option value="<?php echo $pay->mode_id ?>"><?php echo $pay->nom_mode ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Numéro de carte
                            <input type="number" name="nom"  value=""/>
                        </label>
                    </div>
                    <div class="col-md-4" id="date">
                        <label>Date d'expiration de la carte
                            <input id="dateExpiration" type="text" name="prenom"  value="" />
                        </label>
                    </div>

                    <div class="col-md-4">
                        <label>Code de sécurité de la carte - CVV
                            <input id="dateExpiration" type="text" name="prenom"  value="" />
                        </label>
                    </div>
                </div>

                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" id="flip5" class="btn btn-danger animated bounceInLeft"><a href="<?= $base_url ?>" > <i class="fa  fa-window-close" style="font-size:22px;"></i> Annuler</a></button>
                    <button type="submit" id="flip6" class="btn btn-success animated bounceInRight">Payer <i class="fa fa-dollar" style="font-size:22px;"></i></button>
                </div>

            </div>
        </form>


        <button class="btn2"><span class="fa fa-pencil" style="font-size:25px;color:orange;"> </span>Précédent modes de paiements</button>

    </div>

</body>



<script>
    $(document).ready(function () {
        $(".btn1").click(function () {
            $("#myForm2").slideDown("slow");
            $("#myForm1").slideUp("slow");
        });

        $(".btn2").click(function () {
            $("#myForm1").slideDown("slow");
            $("#myForm2").slideUp("slow");
        });
    });
</script>



<?php include VIEWPATH . '/common/footer.php'; ?>
