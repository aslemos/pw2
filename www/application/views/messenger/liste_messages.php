<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require VIEWPATH . 'common/header.php';
?>
<form action="<?=$base_url?>message_controller/composer">
    <button type="submit">Nouveau message</button>
</form>
<style>
    .msg-nonlu td {
        font-weight: bold;
    }
</style>
<h2><?=$list_title?></h2>
<table>
    <tr>
        <th>Date</th>
        <th><?=($list_type == 'E') ? 'Emetteur' : 'Destinataire'?></th>
        <th>Sujet</th>
    </tr>
<?php foreach($messages as $message) {
    $class = $list_type == 'E' && $message->etat == Message::MSG_ETAT_NON_LU
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
