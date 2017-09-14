<?php

/* 
 * 
 * 
 */

?>

<?php echo validation_errors(); ?>

<?php echo form_open('users/contact'); ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h2 class="text-center"><?= $title; ?></h2>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea rows="5" class="form-control" name="message" placeholder="Taper votre message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
    </div>
</form>
<hr />