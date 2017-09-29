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
                <th colspan="2">Action</th>
            </tr>

<?php   foreach ($contacts as $contact) { ?>
            <tr>
                <td class=""><?= $contact->getId() ?></td>
                <td class=""><?= $contact->getDate() ?></td>
                <td class=""><?= $contact->getSujet() ?></td>

                <td class=""><a href="<?= $base_url ?>contact/view/<?= $contact->getId() ?>#s"><i class="fa fa-eye"></i></a></td>
                <td class=""><a href="<?= $base_url ?>contact/delete/<?= $contact->getId() ?>"><i class="fa fa-trash-o"></i></a></td>

            </tr>
<?php } ?>
        </tbody>
    </table>
</section>
<?php
require VIEWPATH . 'common/footer.php';
