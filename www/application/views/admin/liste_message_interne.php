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
    <h2><?=$title?></h2>
    <table class="table table-reponsive">
        <tbody><tr>
                <th class="">Nº</th>
                <th class="">Date</th>
                <th class="">Émetteur</th>
                <th class="">Sujet</th>
                <th class="">Dirigé à</th>
                <th class="">Visualiser</th>
                <th class="">Supprimer</th>
            </tr>



<?php foreach ($messages as $message) { ?>
            <tr>
                <td class=""><?= $message->getId() ?></td>
                <td class=""><?= $message->getDate() ?></td>
                <td class=""><?= $message->getEmetteur()->toString() ?></td>
                <td class=""><?= $message->getSujet() ?></td>
                <td><?= $message->getNomDestinataire() ?></td>

                <td class=""><a class="btn btn-inline" href="<?= $base_url ?>messagerie/view_message_interne/<?= $message->getId() ?>#s"></a></td>
                <td class=""><a class="btn btn-inline"href="<?= $base_url ?>messagerie/delete_message_interne/<?= $message->getId() ?>"></a></td>

            </tr>
<?php } ?>
        </tbody>
    </table>
</section>
<?php
require VIEWPATH . 'common/footer.php';
