<?php include VIEWPATH . 'common/header.php';
$msg_button_title = isset($msg_button_title) ? $msg_button_title : 'OK';
$msg_action = isset($msg_action) ? $msg_action : $base_url;
?>
<div class="form-style-10">
<?php if (isset($msg_title)) { ?>
    <h3><?=$msg_title?>
<?php if (isset($msg_subtitle)) {?>
        <span><?=$msg_subtitle?></span>
<?php } ?>
    </h3>
<?php } ?>
    <div class="btn-liens">
        <!-- Bouton de redirect -->
        <a class="btn btn-success" href="<?=$msg_action?>"><?=$msg_button_title?></a>
    </div>
</div>
<?php include VIEWPATH . 'common/footer.php';

