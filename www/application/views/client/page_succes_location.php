<?php include VIEWPATH . '/common/header.php'; ?>

<body>
    <div class="form-style-10">
        <h3>Félicitations!<span>Vous avez réservé une voiture!</span></h3>
        <h4>Veuillez attendre approbation du propriétaire</h4>
        <div class="btn-liens" >
            <!-- Bouton pour afficher redirect apres succes -->
            <a class="btn btn-success" href="<?= $base_url ?>vehicule/recherche" >OK</a>
        </div>
    </div>
</body>

<?php include VIEWPATH . '/common/footer.php'; ?>
