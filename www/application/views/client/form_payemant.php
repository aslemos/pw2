<?php include VIEWPATH . '/common/header.php'; ?>

<body>


    <div class="form-style-10">
        <h1>Payement</h1>
        <form>




            <div class="section test3">Modes de paiements</div>
            <div class="inner-wrap">

                  <div class="row">
                    <div class="col-md-12">
                        <label>Votre  <span class="required">*</span>
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
                    <button type="button" id="flip5" class="btn btn-danger animated bounceInLeft"><i class="fa  fa-window-close" style="font-size:22px;"></i> Annuler</button>
                    <button type="button" id="flip6" class="btn btn-success animated bounceInRight">Payer <i class="fa fa-dollar" style="font-size:22px;"></i></button>
                    </span>
                </div>
            </div>



        </form>
    </div>

</body>





<?php include VIEWPATH . '/common/footer.php'; ?>
