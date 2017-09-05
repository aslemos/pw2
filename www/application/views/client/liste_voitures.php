<?php include VIEWPATH . '/common/header.php'; ?>

<h1>Voitures</h1>
<form name ="userinput" action="form_location" method="post" id="form-voitures-id" style=" width: 100%;">
    <div class="table-responsive">
        <table class="table" >
            <thead>
                <tr>
                    <th class="text-center">Nº</th>
                    <th class="text-center">Marque</th>
                    <th class="text-center">Type</th>
                    <th class="text-center">Matricule</th>
                    <th class="text-center">Année</th>
                    <th class="text-center">Prix</th>
                    <th class="text-center">Date Debut</th>
                    <th class="text-center">Date Fin</th>
                    <th class="text-center">Louer</th>
                </tr>
            </thead>

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

                    <td class="text-center">
                        <input style=" width: 100px; background-color:white; border: none;" type="text" name="date_debut" disabled value="<?= $voitures->date_debut ?>">
                    </td>

                    <td class="text-center">
                        <input style=" width: 100px; background-color:white; border: none;" type="text" name="date_fin" disabled value="<?= $voitures->date_fin ?>">
                    </td>

                    <td class="text-center">
                      <a href="/index.php/voiture/form_location/<?= $voitures->vehicule_id ?>">Louer</a>
                    </td>

                    <td class="text-center">
                      <a href="/index.php/reclamation/form_reclamation/<?= $voitures->vehicule_id ?>">Reclamation</a>
                    </td>

                </tr>
            <?php
                $i++;
            }
            ?>
        </table>   <!-- Élément spécifique -->
    </div>
</form>

<?php include VIEWPATH . '/common/footer.php'; ?>