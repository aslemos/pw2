<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require VIEWPATH . 'common/header.php';
?>

<h2><?= $title ?></h2>
<div>
    <form id="frm-message" class="form-horizontal" method="post" action="<?= $base_url ?>messagerie/enregistrer#s" class="inline-form">

        <div class="form-group">
            <label class="control-label col-sm-3" for="destinataire_id">Destinataire :</label>
            <div class="col-sm-9">
                <select title="Indiquez le destinataire de ce message" class="form-control" name="destinataire_id" id="destinataire_id" required>
                    <option value="">-- Choisissez un destinataire --</option>
                    <?php foreach ($users as $user) { ?>
                        <option value="<?= $user['user_id']; ?>"><?= $user['prenom'].' '.$user['nom'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="sujet">Sujet :</label>
            <div class="col-sm-9">
                <input title="Indiquez le sujet de ce message" class="form-control" type="text" name="sujet" id="sujet" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="message">Message :</label>
            <div class="col-sm-9">
                <textarea title="Tapez le texte de votre message" class="form-control" name="message" id="message" cols="30" rows="10" required></textarea>
            </div>
        </div>

    </form>
</div>
<div class="row btn-liens" >
    <a class="btn btn-danger position pull-right" href="<?= $base_url ?>messagerie#s">Annuler</a>
    <button class="btn btn-success position pull-right" type="submit" form="frm-message">Envoyer</button>
</div>
<?php
require VIEWPATH . 'common/footer.php';
