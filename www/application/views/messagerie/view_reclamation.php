<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require VIEWPATH . 'common/header.php';
?>



<h2><?=$title?></h2>
  
<form class="form-horizontal">

    <label><?= var_dump($messages)?></label><br>
    <label><?= $messages['nom_emetteur']?></label><br>
    
</form>

    
<?php
require VIEWPATH . 'common/footer.php';
