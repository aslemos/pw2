<?php // include VIEWPATH . '/common/header.php';   ?>

<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<style type="text/css">
    .form-style-10{
        width:65%;
        padding:30px;
        margin:40px auto;
        background: #FFF;
        border-radius: 10px;
        -webkit-border-radius:10px;
        -moz-border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
        -moz-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
        -webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
    }
    .form-style-10 .inner-wrap{
        padding: 30px;
        background: #F8F8F8;
        border-radius: 6px;
        margin-bottom: 15px;
    }
    .form-style-10 h1{
        background: #AF0000;
        padding: 20px 30px 15px 30px;
        margin: -30px -30px 30px -30px;
        border-radius: 10px 10px 0 0;
        -webkit-border-radius: 10px 10px 0 0;
        -moz-border-radius: 10px 10px 0 0;
        color: #fff;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
        font: normal 30px 'Bitter', serif;
        -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
        -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
        box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
        border: 1px solid #257C9E;
    }
    .form-style-10 h1 > span{
        display: block;
        margin-top: 2px;
        font: 13px Arial, Helvetica, sans-serif;
    }
    .form-style-10 label{
        display: block;
        font: 13px Arial, Helvetica, sans-serif;
        color: #888;
        margin-bottom: 15px;
    }
    .form-style-10 input[type="text"],
    .form-style-10 input[type="date"],
    .form-style-10 input[type="datetime"],
    .form-style-10 input[type="email"],
    .form-style-10 input[type="number"],
    .form-style-10 input[type="search"],
    .form-style-10 input[type="time"],
    .form-style-10 input[type="url"],
    .form-style-10 input[type="password"],
    .form-style-10 textarea,
    .form-style-10 select {
        display: block;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        width: 100%;
        padding: 8px;
        border-radius: 6px;
        -webkit-border-radius:6px;
        -moz-border-radius:6px;
        border: 2px solid #fff;
        box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
        -moz-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
        -webkit-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
    }

    .form-style-10 .section{
        font: normal 20px 'Bitter', serif;
        color: #AF0000;
        margin-bottom: 5px;
    }
    .form-style-10 .section span {
        background: #AF0000;
        padding: 5px 10px 5px 10px;
        position: absolute;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border: 4px solid #fff;
        font-size: 14px;
        margin-left: -45px;
        color: #fff;
        margin-top: -3px;
    }
    .form-style-10 input[type="button"],
    .form-style-10 input[type="submit"]{
        background: #2A88AD;
        padding: 8px 20px 8px 20px;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        color: #fff;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
        font: normal 30px 'Bitter', serif;
        -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
        -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
        box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
        border: 1px solid #257C9E;
        font-size: 15px;
    }
    .form-style-10 input[type="button"]:hover,
    .form-style-10 input[type="submit"]:hover{
        background: #2A6881;
        -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
        -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
        box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
    }
    .form-style-10 .privacy-policy{
        float: right;
        width: 250px;
        font: 12px Arial, Helvetica, sans-serif;
        color: #4D4D4D;
        margin-top: 10px;
        text-align: right;
    }
</style>
<body>



    <div class="form-style-10">
        <h1>Reservation!<span>Vérifier et confirmer les informations!</span></h1>
        <form>
            <div class="section"><span>1</span>Information location de voiture</div>
            <div class="inner-wrap">
                <div class="row">
                    <div class="col-md-6">
                        <label>Marque
                            <input type="text" name="marque" disabled value="<?= $voitures-> nom_marque ?> "/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>Type
                            <input type="text" name="type" disabled value="<?= $voitures->nom_type ?> "/>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Année
                            <input type="text" name="annee" disabled value="<?= $voitures->annee ?> "/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>Nombre de places
                            <input type="text" name="places" disabled value="<?= $voitures->nbre_places ?> "/>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Type de carburant
                            <input type="text" name="carburant" disabled value="<?= $voitures->nom_carburant ?> "/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>Boite de vitesse <input type="text" disabled name="transmissions" value="<?= $voitures->nom_transmission ?> "/></label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Type de carburant
                            <input type="text" name="carburant" disabled value="<?= $voitures->nom_carburant ?> "/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>Boite de vitesse <input type="text" disabled name="transmissions" value="<?= $voitures->nom_transmission ?> "/></label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Matricule
                            <input type="text" name="matricule" disabled value="<?= $voitures->matricule ?> "/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>Boite de vitesse
                            <input type="text" name="transmissions" disabled value="<?= $voitures->nom_transmission ?> "/>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Date debut
                            <input type="text" name="date_debut" disabled value="<?= $voitures->date_debut ?> "/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>Date fin
                            <input type="text" name="date_fin" disabled value="<?= $voitures->date_fin ?> "/>
                        </label>
                    </div>
                </div>


            </div>

            <div class="section"><span>2</span>Informations personnelles</div>

            <div class="inner-wrap">

                <div class="row">
                    <div class="col-md-6">
                        <label>Nom
                            <input type="text" name="nom" disabled value="<?= $users->nom ?> "/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>Prenom
                            <input type="text" name="prenom" disabled value="<?= $users->prenom ?> " />
                        </label>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <label>Permi de conduire
                            <input type="text" name="nom" disabled value="<?= $users->permis_conduire ?> "/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>Courrier
                            <input type="text" name="prenom" disabled value="<?= $users->courriel ?> " />
                        </label>
                    </div>
                </div>



            </div>



            <div class="section"><span>3</span>Modes de paiements</div>
            <div class="inner-wrap">




                <div class="row">
                    <div class="col-md-12">
                        <label>type de paiement <span class="required">*</span>
                            <select name="field4" class="field-select">


                                <option value="none" selected="selected">---Select payements---</option>

                                <?php foreach ($payements as $pay): ?>
                                    <option value="<?php echo $pay->mode_id ?>"><?php echo $pay->nom_mode ?></option>
                                <?php endforeach; ?>
                            </select>

                        </label>
                    </div>

                </div>





                <div class="row">
                    <div class="col-md-6">
                        <label>Numero
                            <input type="number" name="nom"  value="<?= $voitures->date_debut ?> "/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>Date
                            <input type="date" name="prenom"  value="<?= $voitures->date_fin ?> " />
                        </label>
                    </div>
                </div>

            </div>


            <div class="button-section">
                <a href="/index.php/voiture/insert_payement/>">Payer</a>
                <span class="privacy-policy">
                    <input type="checkbox" name="field7">You agree to our Terms and Policy.
                </span>
            </div>


        </form>
    </div>

</body>

