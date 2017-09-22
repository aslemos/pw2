<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require VIEWPATH . 'common/header.php';
?>
<?php include VIEWPATH . 'admin/boutons_admin_messages.php'; ?>

 <h2>Liste des Messages Internes </h2>

        <form action="" name="formulaire" id="form-reclamationsAdm-id">
            <table class="table table-reponsive">
                <tbody><tr>
                        <th class="">Nº</th>
                        <th class="">Date</th>
                        <th class="">Émetteur</th>
                        <th class="">Sujet</th>
                        <th class="">Message</th>
                        <th class="">Supprimer</th>
                    </tr>



    <?php   foreach ($messages as $message) {

                        ?>
                    <tr>
                        <td class=""><?= $message['message_id'] ?></td>
                        <td class=""><?= $message['date'] ?></td>
                        <td class=""><?= $message['nom_emetteur'] ?></td>
                        <td class=""><?= $message['sujet'] ?></td>

                        <td class=""><a class="btn btn-inline" href="<?= $base_url ?>reclamation/view/<?= $message['message_id'] ?>#s"></a></td>
                        <td class=""><a class="btn btn-inline"href="<?= $base_url ?>reclamation/delete_message_interne/<?= $message['message_id'] ?>"></a></td>

                    </tr>
     <?php } ?>
                </tbody>
            </table>
        </form>


<?php
require VIEWPATH . 'common/footer.php';
