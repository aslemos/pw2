<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require VIEWPATH . 'common/header.php';
?>
<div class="row btn-liens" >
    <a class="btn btn-general position" href="<?=$base_url?>messagerie#s">Reçus</a>
    <a class="btn btn-general position" href="<?=$base_url?>messagerie/envoyes#s">Envoyés</a>
    <a class="btn btn-general position" href="<?=$base_url?>messagerie/composer#s">Nouveau message</a>
    <a class="btn btn-general position" href="<?=$base_url?>messagerie/composerAdmin#s">Contacter admin</a>
</div>
<style>
    .msg-nonlu td {
        font-weight: bold;
    }
</style>
<h2><?=$title?></h2>
<table class="table">
    <tr>
        <th>Nº</th>
        <th>Date</th>
<?php if ($list_type == 'E') { ?>
        <th>Émetteur</th>
<?php } else { ?>
        <th>Type</th>
        <th>Destinataire</th>
<?php } ?>
        <th>Sujet</th>
        <th colspan="2">Action</th>
    </tr>
<?php foreach($messages as $message) {
    $class = $list_type == 'E' && $message->getEtat() == EMessage::MSG_ETAT_NON_LU
            ? 'msg-nonlu'
            : '';
?>
    <tr class="<?=$class?>">
        <td><?=$message->getId()?></td>
        <td><?=$message->getDate()?></td>
<?php if ($list_type == 'E') { ?>
        <td><?=$message->getEmetteur()->getNom()?></td>
        <td><?=$message->getSujet() ?></td>
        <td class=""><a class="fa fa-eye" href="<?= $base_url ?>messagerie/view_message_recu/<?= $message->getId() ?>#s"></a></td>
<?php } else { ?>
        <td><?=EMessage::getDescriptionType($message->getType())?></td>
        <td><?= $message->getNomDestinataire() ?></td>
        <td><?=$message->getSujet() ?></td>
        <td class=""><a class="fa fa-eye" href="<?= $base_url ?>messagerie/view_message_envoye/<?= $message->getId() ?>#s"></a></td>
<?php } ?>
        <td class=""><a class="fa fa-trash-o" href="<?= $base_url ?>messagerie/delete_message_envoyes/<?= $message->getId() ?>"></a></td>

    </tr>
<?php } ?>
</table>

<?php
require VIEWPATH . 'common/footer.php';
