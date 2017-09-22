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

<!--        <div class="form-group">
            <label class="control-label col-sm-3" for="nom_emetteur">Emetteur :</label>
             <div class="col-sm-9">
                 <input class="form-control" name="nom_emetteur" id="nom_emetteur" type="text" value="<?= $messages['nom_emetteur']?>" readonly>
            </div>
        </div>-->

        <div class="form-group">
            <label class="control-label col-sm-3" for="sujet">Sujet :</label>
            <div class="col-sm-9">
                <input class="form-control" name="sujet" id="sujet" type="text" value="<?= $messages['sujet']?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="sujet">Date :</label>
            <div class="col-sm-9">
                <input class="form-control" name="sujet" id="sujet" type="text" value="<?= $messages['date']?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="message">Contenu :</label>
            <div class="col-sm-9">
                <?=$messages['contenu']?>
            </div>
        </div>

    </form>

    <div class="row btn-liens" >
        <a class="btn btn-general position" href="<?=$base_url?>admin/contacts#s">Retourner</a>
    </div>


<?php
require VIEWPATH . 'common/footer.php';
