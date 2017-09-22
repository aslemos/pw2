<?php include VIEWPATH . '/common/header.php'; ?>


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




<?php include VIEWPATH . '/common/footer.php'; ?>
