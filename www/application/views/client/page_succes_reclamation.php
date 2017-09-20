<?php include VIEWPATH . '/common/header.php'; ?>

<body>
    <div class="form-style-10">
        <h3 class="succes">Félicitations!<span>Votre reclamation a été envoyée !</span></h3>
        <h4>Veuillez attendre réponse du admin</h4>
        <div class="btn-liens" >
            <!-- Bouton pour afficher redirect apres succes -->
            <a class="btn btn-success" href="<?= $base_url ?>vehicule/recherche" >OK</a>
        </div>
    </div>
</body>

<?php include VIEWPATH . '/common/footer.php'; ?>
