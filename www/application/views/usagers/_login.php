<?php echo form_open('usagers/login'); ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h3 class="text-center"><?php echo $title; ?></h3>
            <div class="form-group">
                <label for="username"> Nom utilisateur</label>
                <input type="text" name="username" class="form-control" placeholder="Entez votre courriel" required autofocus>
            </div>
            <div class="form-group">
                <label for="password"> Mot de passe : </label>
                    <input type="password" name="password" class="form-control" placeholder="Entrer votre mot de passe" required autofocus>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
    </div>
    <hr />
<?php echo form_close(); ?>