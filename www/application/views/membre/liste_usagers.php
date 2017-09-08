<?php
$meta_keywords = "";
$meta_description = "";
$page_title = "Liste des usagers";
$body_class = "subpages membre";

// Header
include VIEWPATH . 'common/header.php';
//========================================================
?>

<main>
    <section id="membre">
        <?php include VIEWPATH . 'client/boutons_client.php'; ?>
        <h1>Voitures</h1>
        <form action="" name="formulaire" id="form-voitures-id">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="">Nº</th>
                            <th class="">Marque</th>
                            <th class="">Modele</th>
                            <th class="">Matricule</th>
                            <th class="">Année</th>
                            <th class="">Prix</th>
                            <th class="">Modifier</th>
                            <th class="">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="">1</td>
                            <td class="">test</td>
                            <td class="">test</td>
                            <td class="">test</td>
                            <td class="">test</td>
                            <td class="">test</td>
                            <td><a href="#"><img class="img-responsive" src="/assets/images/ok.png" ></a></td>
                            <td><a href="#"><img class="img-responsive" src="/assets/images/no.png" ></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
        <!-- Div pour affichage -->
        <div id="resultat"></div>
        <div id="divAuto_voitures"></div>


    </section>
</main>
<?php
// Header
include VIEWPATH . '/common/footer.php';
//========================================================
?>
