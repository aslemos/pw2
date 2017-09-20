<?php include VIEWPATH . '/common/header.php'; ?>

<body>

    <div class="form-style-10">
        <h3>Reclamation de vehicule!<span></span></h3>
        <form method="post" action="<?= $base_url ?>reclamation/insert_reclamation">

            <input type="hidden" name="type_message" value="<?= $type_message; ?>">
             <input type="hidden" name="objet_id" value="<?= $objet_id; ?>">

            <div class="inner-wrap">

                <div class="section"><span>1</span>Informations de vehicule</div>
                <div class="row">
                    <div class="col-md-6">
                        <label><h4>Marque</h4>
                            <input class="myInput" type="text" name="marque" disabled value="<?= $voitures['nom_marque']; ?> "/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label><h4>Type</h4>
                            <input class="myInput" type="text" name="type" disabled value="<?= $voitures['nom_type']; ?> "/>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label><h4>Année</h4>
                            <input class="myInput" type="text" name="annee" disabled value="<?= $voitures['annee']; ?> "/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label><h4>Matricule</h4>
                            <input class="myInput" type="text" name="matricule" disabled value="<?= $voitures['matricule']; ?> "/>
                        </label>
                    </div>
                </div>
            </div>

            <div class="inner-wrap">
                <div class="section"><span>2</span>Informations du locataire</div>
                <div class="row">
                    <div class="col-md-6">
                        <label><h4>Nom</h4>
                            <input class="myInput" type="text" name="nom" disabled value="<?= $users->getNom() ?> "/>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label><h4>Prenom</h4>
                            <input class="myInput" type="text" name="prenom" disabled value="<?= $users->getPrenom() ?> " />
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label><h4>Sujet <span class="required">*</span></h4>
                            <select name="sujet" class="field-select" required>
                                <option value=""></option>
                                <option value="Advertise">Problèmes techniques</option>
                                <option value="Partnership">Problèmes d'apparence</option>
                                <option value="General Question">D'autres types de problèmes </option>
                            </select>
                        </label>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label><h4>VOTRE MESSAGE <span class="required">*</span></label></h4>
                        <textarea name="contenu" id="field5" class="field-long field-textarea" required></textarea>

                    </div>
                </div>
            </div>

            <div class="button-section">
                <button type="submit" class="btn btn-success">Envoyer <i class="fa fa-check-square-o"></i></button>
            </div>

        </form>
    </div>
</body>

<?php include VIEWPATH . '/common/footer.php'; ?>