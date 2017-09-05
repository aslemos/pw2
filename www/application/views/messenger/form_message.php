<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require VIEWPATH . 'common/header.php';
?>
<form method="post" action="<?=$base_url?>message_controller/enregistrer" class="inline-form">
    <div class="form-group">
        <label for="destinataire_id">Destinataire : </label>
        <select name="destinataire_id" id="destinataire_id">
            <?php foreach($users as $user) { ?>
            <option value="<?=$user->user_id?>"><?=$user->prenom?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="sujet">Sujet</label>
        <input type="text" name="sujet" id="sujet">
    </div>

    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" id="message" cols="30" rows="10"></textarea>
    </div>
    
    <div class="form-group">
        <button type="submit">Envoyer</button>
    </div>
</form>
<?php
require VIEWPATH . 'common/footer.php';