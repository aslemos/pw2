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
                <th class="">Sujet</th>
                <th class="">Visualiser</th>
                <th class="">Supprimer</th>
            </tr>



<?php   foreach ($contacts as $contacts) { ?>
            <tr>
                <td class=""><?= $contacts['message_id'] ?></td>
                <td class=""><?= $contacts['date'] ?></td>
                <td class=""><?= $contacts['sujet'] ?></td>

                <td class=""><a class="btn btn-inline" href="<?= $base_url ?>contact/view/<?= $contacts['message_id'] ?>#s"></a></td>
                <td class=""><a class="btn btn-inline"href="<?= $base_url ?>contact/delete/<?= $contacts['message_id'] ?>"></a></td>

            </tr>
<?php } ?>
        </tbody>
    </table>
</section>
<?php
require VIEWPATH . 'common/footer.php';