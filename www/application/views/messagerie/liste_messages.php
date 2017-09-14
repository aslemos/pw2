<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require VIEWPATH . 'common/header.php';
?>
<div class="row btn-liens" >
    <a class="btn position" href="<?=$base_url?>messagerie#s">Reçus</a>
    <a class="btn position" href="<?=$base_url?>messagerie/envoyes#s">Envoyés</a>
    <a class="btn position" href="<?=$base_url?>messagerie/composer#s">Nouveau message</a>
</div>
<style>
    .msg-nonlu td {
        font-weight: bold;
    }
</style>
<h2><?=$title?></h2>
<table class="table">
    <tr>
        <th>Date</th>
        <th><?=($list_type == 'E') ? 'Emetteur' : 'Destinataire'?></th>
        <th>Sujet</th>
    </tr>
<?php foreach($messages as $message) {
    $class = $list_type == 'E' && $message->etat == EMessage::MSG_ETAT_NON_LU
            ? 'msg-nonlu'
            : '';
?>
    <tr class="<?=$class?>">
        <td><?=$message->date?></td>
        <td><?=($list_type == 'E') ? $message->nom_emetteur : $message->nom_destinataire?></td>
        <td><?=$message->sujet ?></td>
    </tr>
<?php } ?>
</table>
<?php
require VIEWPATH . 'common/footer.php';
