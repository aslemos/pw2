<h2><?= $title ;?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('modeles/createModele'); ?>
	<div class="form-group">
		<label>Nom modele</label>
		<input type="text" class="form-control" name="name" placeholder="Enter le nom du modele">
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>