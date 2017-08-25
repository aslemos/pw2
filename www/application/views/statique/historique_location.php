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
                <a class="btn btn-danger" href="ajouter-voiture.php" >Ajouter <br />une voiture</a>
                <!-- Boutton pour afficher les demandes de location pour aprobation -->
                <a class="btn btn-danger" href="location.php" >Approuver <br>une demande </a>
                <!-- Boutton pour afficher l'historique des location pour un membre -->
                <a class="btn btn-danger" href="historique.php">Historique <br>des locations </a>  
            </div>	
            <h1>Historique des locations</h1>
            <form action="" name="formulaire" id="form-demandes-id">
                <div class="table-responsive">
                    <label>Choisir une voiture</label>
                    <select name="voiture">
                        <option>Séléctionner</option>
                        <option>Auto n01</option>
                        <option>Auto n02</option>
                    </select>
                    <label>Periode</label>
                    <input type="text" id="datedebut" placeholder="De">
                    <input type="text" id="datefin" placeholder="À">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="">Nº</th>
                                <th class="">Marque</th>
                                <th class="">Modele</th>
                                <th class="">Matricule</th>
                                <th class="">Année</th>
                                <th class="">Nombre de <br />jours loué</th>
                                <th class="">Montant<br />total</th>
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
                                <td class="">test</td>
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
