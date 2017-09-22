<?php include VIEWPATH . '/common/header.php'; ?>
<style type="text/css">


</style>
<body>
    <div class="form-style-10">
        <h3 class="succes">Félicitations!
            <span>Paiement effectué avec succès!</span>
            <h4>Numéro du paiement :
                <?php echo $location_id; ?>
            </h4>
        </h3>
        <h4>Merci d'utiliser notre site</h4>
        <div class="btn-liens" >
            <!-- Bouton pour afficher redirect apres succes -->
            <a class="btn btn-success" href="<?= $base_url ?>locations/locationsByUser#s">OK</a>
        </div>
    </div>
</body>

<?php include VIEWPATH . '/common/footer.php'; ?>
