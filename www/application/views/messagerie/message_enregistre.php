
<?php include VIEWPATH . '/common/header.php'; ?>

<body>
    <div class="form-style-10">
        <h3 class="succes">Félicitations!</h3>
        <h4>Votre mesage a été envoyée !</h4>
        <div class="btn-liens" >
            <!-- Bouton pour afficher redirect apres succes -->
            <a class="btn btn-success" href="<?= $base_url ?>messagerie/envoyes#s" >OK</a>
        </div>
    </div>
</body>

<?php include VIEWPATH . '/common/footer.php'; ?>
