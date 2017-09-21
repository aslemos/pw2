<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require VIEWPATH . 'common/header.php';
?>
<?php include VIEWPATH . 'admin/boutons_admin_messages.php'; ?>
 <h2>Liste de Réclamations </h2>

        <form action="" name="formulaire" id="form-reclamationsAdm-id">
            <table class="table table-reponsive">
                <tbody><tr>
                        <th class="">Nº</th>
                        <th class="">Émetteur</th>
                        <th class="">Date</th>
                        <th class="">Sujet</th>
                        <th class="">Message</th>
                        <th class="">Supprimer</th>
                    </tr>



    <?php   foreach ($reclamation as $reclama) {

                       //var_dump($reclamation);
                        ?>
                    <tr>
                        <td class=""><?= $reclama['message_id'] ?></td>
                        <td class=""><?= $reclama['nom_emetteur'] ?></td>
                        <td class=""><?= $reclama['date'] ?></td>
                        <td class=""><?= $reclama['sujet'] ?></td>


                        <td class=""><a class="btn btn-inline" href="<?= $base_url ?>reclamation/view/<?= $reclama['message_id'] ?>#s"></a></td>
                        <td class=""><a class="btn btn-inline"href="<?= $base_url ?>reclamation/delete/<?= $reclama['message_id'] ?>"></a></td>

                    </tr>
     <?php } ?>
                </tbody>
            </table>
        </form>


<?php
require VIEWPATH . 'common/footer.php';


