<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require VIEWPATH . 'common/header.php';
?>

<h3>Message envoyé au destinaraire</h3>
<form action="<?=$base_url?>message_controller">
    <button type="submit">Ok</button>
</form>

<?php
require VIEWPATH . 'common/footer.php';
