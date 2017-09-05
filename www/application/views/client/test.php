<?php include VIEWPATH . '/common/header.php'; ?>

  <?php

  var_dump($payements);

            foreach ($payements as $pay) {
                ?>
    <p><?= $pay->mode_id ?></p>
    <p><?= $pay->nom_mode ?></p>


  <?php
        }
            ?>


<?php include VIEWPATH . '/common/footer.php'; ?>