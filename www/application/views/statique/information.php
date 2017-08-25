<?php
$meta_keywords = "";
$meta_description = "";
$page_title = "Liste des voitures";
$body_class = "subpages listeVoiture";

// Header
include 'header.php';
//========================================================
?>
<main>
    <section id="liste-voitures">
        <div class="container">
            <div class="btn-liens" >
                <!-- Boutton pour afficher la liste des voiture en location d'un membres -->
                <a class="btn btn-danger" href="information.php" >Liste de <br />mes voitures</a> 
                <!-- Boutton pour ajouter une voitures -->
                <a class="btn btn-danger" href="ajouter-voiture.php.php" >Ajouter <br />une voiture</a>
                <!-- Boutton pour afficher les demandes de location pour aprobation -->
                <a class="btn btn-danger" href="location.php" >Approuver <br>une demande </a>
                <!-- Boutton pour afficher l'historique des location pour un membre -->
                <a class="btn btn-danger" href="historique.php">Historique <br>des locations </a>  
            </div>	
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
                                <td><a href="#"><img class="img-responsive" src="ui/img/ok.png" ></a></td>
                                <td><a href="#"><img class="img-responsive" src="<ui/img/no.png" ></a></td>
                            </tr>						
                        </tbody>
                    </table>
                </div>
            </form>
            <!-- Div pour affichage -->
            <div id="resultat"></div>
            <div id="divAuto_voitures"></div>
        </div>
    </section>
</main>
<?php
//========================================================
//Footer
include 'footer.php';
?>
