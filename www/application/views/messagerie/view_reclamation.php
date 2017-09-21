<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require VIEWPATH . 'common/header.php';
?>



<h2><?=$title?></h2>

    <form id="frm-message" class="form-horizontal"  action="">

        <div class="form-group">
            <label class="control-label col-sm-3" for="nom_emetteur">Emetteur :</label>
             <div class="col-sm-9">
                 <input class="form-control" name="nom_emetteur" id="nom_emetteur" type="text" value="<?= $messages['nom_emetteur']?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="sujet">Sujet :</label>
            <div class="col-sm-9">
                <input class="form-control" name="sujet" id="sujet" type="text" value="<?= $messages['sujet']?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="message">Message :</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="message" id="message" cols="30" rows="10" readonly><?= $messages['contenu']?></textarea>
            </div>
        </div>

    </form>

    <div class="row btn-liens" >
        <a class="btn btn-general position" href="<?=$base_url?>admin/reclamations#s">Retourner</a>
    </div>


<?php
require VIEWPATH . 'common/footer.php';
