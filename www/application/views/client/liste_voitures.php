<?php include VIEWPATH . '/common/header.php'; ?>
<div class="btn-liens" >
    <!-- Bouton pour afficher la liste des voiture en location d'un membres -->
    <a class="btn btn-danger" href="<?= $base_url ?>information.php" >Mes voitures</a>
    <!-- Bouton pour ajouter une voitures -->
    <a class="btn btn-danger" href="<?= $base_url ?>information.php" >Ajouter une voiture</a>
    <!-- Bouton pour afficher les demandes de location pour approbation -->
    <a class="btn btn-danger" href="<?= $base_url ?>location.php" >Approuver une demande</a>
    <!-- Bouton pour afficher l'historique des location pour un membre -->
    <a class="btn btn-danger" href="<?= $base_url ?>historique.php">Historique des locations </a>
</div>
<h1>Voitures</h1>
<form action="" name="formulaire" id="form-voitures-id">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="">Nº</th>
                    <th class="">Marque</th>
                    <th class="">Modèle</th>
                    <th class="">Matricule</th>
                    <th class="">Année</th>
                    <th class="">Prix</th>
                    <th class="">Modifier</th>
                    <th class="">Supprimer</th>
                </tr>
            </thead>
            <tbody>

                  <?php
            $i = 1;
            foreach ($voitures as $voitures) {
                ?>


                <tr>

                     <td class="text-center">
                        <input style=" width: 20px;  background-color:white; border: none;" type="text" name="nom_marque" disabled value="<?= $i ?> ">
                    </td>

                    <td class="text-center" >
                        <input style=" width: 100px;  background-color:white; border: none;" type="text" name="nom_marque" disabled value="<?= $voitures->nom_marque ?> ">
                    </td>

                    <td class="text-center">
                        <input style=" width: 100px; background-color:white; border: none;" type="text" name="nom_type" disabled value="<?= $voitures->nom_type ?> ">
                    </td>

                    <td class="text-center">
                        <input style=" width: 100px; background-color:white; border: none;" type="text" name="matricule" disabled value="<?= $voitures->matricule ?>">
                    </td>

                    <td class="text-center">
                        <input style=" width: 50px; background-color:white; border: none;" type="text" name="annee" disabled value="<?= $voitures->annee ?>">
                    </td>

                    <td class="text-center">
                        <input style=" width: 50px; background-color:white; border: none;" type="text" name="prix" disabled value="<?= $voitures->prix ?>">
                    </td>

                </tr>

                 <?php
                $i++;
            }
            ?>
            </tbody>
        </table>
    </div>
</form>
<!-- Div pour affichage -->
<div id="resultat"></div>
<div id="divAuto_voitures"></div>