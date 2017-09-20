
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require VIEWPATH . 'common/header.php';
?>
<?php include VIEWPATH . 'admin/boutons_admin.php'; ?>
 <h2>Liste de Reclamations </h2>

        <form action="" name="formulaire" id="form-reclamationsAdm-id">
            <table class="table table-responsive">
                <tbody><tr>
                        <td class="titre_editable">Nº</td>
                        <td class="titre_editable">Emetteur</td>
                        <td class="titre_editable">Date</td>
                        <td class="titre_editable">Sujet</td>
                        <td class="titre_editable">Sujet</td>
                        <td class="titre_editable">Supprimer</td>
                    </tr>

 
        
    <?php   foreach ($reclamation as $reclama) { 
                        
                       //var_dump($reclamation);
                        ?>
                    <tr>
                        <td class="editable"><?= $reclama['message_id'] ?></td>
                        <td class="editable"><?= $reclama['nom_emetteur'] ?></td>
                        <td class="editable"><?= $reclama['date'] ?></td>
                        <td class="editable"><?= $reclama['sujet'] ?></td>
                   

                        <td class=""><a class="btn btn-inline" href="<?= $base_url ?>admin/getModeleById/<?= $reclama['message_id'] ?>"></a></td>
                        <td class=""><a class="btn btn-inline"href="<?= $base_url ?>admin/deleteMessage/<?= $reclama['message_id'] ?>"></a></td>

                    </tr>
                </tbody>
            </table>
        </form>            
                    <?php } ?>

<?php
require VIEWPATH . 'common/footer.php';


