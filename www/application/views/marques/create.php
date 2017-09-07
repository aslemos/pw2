<h2><?= $title ;?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('marques/createMarque'); ?>
	<div class="form-group">
		<label>Nom de la marque</label>
		<input type="text" class="form-control" name="name" placeholder="Entrer le nom de la marque">
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>