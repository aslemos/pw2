<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require VIEWPATH . 'common/header.php';
?>
<?php include VIEWPATH . 'admin/boutons_admin_messages.php'; ?>
<section id="listeAdmin">
    <h2>Liste de Réclamations </h2>
    <table class="table table-reponsive">
        <tbody><tr>
                <th class="">Nº</th>
                <th class="">Date</th>
                <th class="">Type</th>
                <th class="">Réclamant</th>
                <th class="">Sujet</th>
                <th class="">Visualiser</th>
                <th class="">Supprimer</th>
            </tr>



<?php   foreach ($reclamations as $reclamation) { ?>
            <tr>
                <td><?= $reclamation->getId() ?></td>
                <td><?= $reclamation->getDate() ?></td>
                <td><?= $reclamation->getDescription() ?></td>
                <td><?= $reclamation->getEmetteur()->toString() ?></td>
                <td><?= $reclamation->getSujet() ?></td>


                <td><a class="btn btn-inline" href="<?= $base_url ?>reclamation/view/<?= $reclamation->getId() ?>#s"></a></td>
                <td><a class="btn btn-inline"href="<?= $base_url ?>reclamation/delete/<?= $reclamation->getId() ?>"></a></td>

            </tr>
<?php } ?>
        </tbody>
    </table>
</section>
<?php
require VIEWPATH . 'common/footer.php';


