<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Input Sizing</h2>
  <p>You can quickly size labels and form controls within a Horizontal form by adding .form-group-lg or .form-group-sm to the div class="form-group" element:</p>
  <form class="form-horizontal">
		
	<div class="form-group form-group-lg">
		<label class="col-sm-2 control-label" for="marque_id">Marque :
		</label>	 
			<span style="color:red; font-size:200%">*</span>
		<div class="col-md-4">
			<select class="form-control input-sm" id="marque_id" name="marque_id">
				<option value="0">Choisir une marque</option>
				<?php foreach($marques AS $marque) : ?>
				<option value="<?php echo $marque['marque_id']; ?>">
					<?php echo $marque['nom_marque']; ?>
				</option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
		
	<div class="form-group form-group-lg">
		<label class="col-sm-2 control-label" for="modele_id">Modèle :</label>	 
			<span style="color:red; font-size:200%">*</span>
		<div class="col-md-4">
			<select class="form-control input-sm" id="modele_id" name="modele_id">
				<option value="0">Choisir une marque</option>
				<?php foreach($modeles AS $modele) : ?>
				<option value="<?php echo $modele['modele_id']; ?>">
					<?php echo $modele['nom_modele']; ?>
				</option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
		
	<div class="form-group form-group-lg">
		<label class="col-sm-2 control-label" for="type_id">Type :</label>	 
			<span style="color:red; font-size:200%">*</span>
		<div class="col-md-4">
			<select class="form-control input-sm" id="type_id" name="type_id">
				<option value="0">Choisir une marque</option>
					<?php foreach($types AS $type) : ?>
					<option value="<?php echo $marque['type_id']; ?>">
						<?php echo $type['nom_type']; ?>
					</option>
					<?php endforeach; ?>
			</select>
		</div>
	</div>
    <div class="form-group form-group-lg">
      <label class="col-sm-2 control-label" for="matricule">Matricule</label>	 
			<span style="color:red; font-size:200%">*</span>
      <div class="col-md-4">
        <input type="text" class="form-control" id="matricule" name="matricule">
      </div>
    </div>
	
	
  </form>
</div>

</body>
</html>
