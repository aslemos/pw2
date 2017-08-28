<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Formulaire d'inscription voiture</title>



  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>


    <link rel="stylesheet" type="text/css" href="formVoiture.css">

<style type="text/css">

</style>
</head>



<body>
    <h2>Formulaire d'inscription voiture</h2>

<form name="monFormulaire" class="form-horizontal" id="needs-validation">

  <div class="form-group">
    <label class="control-label col-xs-3" for="marque">Marque:</label>
    <div class="col-xs-6">
      <input type="text" class="form-control" id="marque" name="marque" placeholder="Entrez le marque">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-3" for="model">Model:</label>
    <div class="col-xs-6">
      <input type="text" class="form-control" id="model" name="model" placeholder="Entrez le Model">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-3" for="carrosserie">Type de carrosserie:</label>
    <div class="col-xs-6">
      <input type="text" class="form-control" id="carrosserie" name="carrosserie" placeholder="Entrez le type de
carrosserie">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-3">Année:</label>
    <div class='input-group date col-xs-6' id='datetimepickerAnnee' name="annee">
        <input type='text' class="form-control"/>
          <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
          </span>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-3">Boite de vitesse:</label>

    <div class="btn-group" data-toggle="buttons">
      <div class="col-xs-6">
          <label class="btn active" >
            <input type="radio" name='manuelle' checked style="visibility:hidden;display:none">
            <i class="fa fa-circle-o fa-2x"></i>
            <i class="fa fa-check-circle-o fa-2x"></i>
            <span class="test"> manuelle</span>
          </label>
      </div>

      <div class="col-xs-6">
          <label class="btn">
            <input type="radio" name='manuelle' style="visibility:hidden;display:none">
            <i class="fa fa-circle-o fa-2x"></i>
            <i class="fa fa-check-circle-o fa-2x"></i>
            <span class="test"> automatique </span>
          </label>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-3" for="nombrePlaces">Nombre de places:</label>
    <div class="col-xs-6">
      <input type="text" class="form-control" id="nombrePlaces" name="nombrePlaces" placeholder="Entrez le Nombre
de places">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-3" for="typeCarburant">Type de carburant:</label>
    <div class="col-xs-6">
      <input type="tel" class="form-control" id="typeCarburant" name="typeCarburant" placeholder="Entrez le Type de
carburant">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-3" for="prix">Prix, $ par jour</label>
    <div class="col-xs-6">
      <input type="text" class="form-control" id="prix" name="prix" placeholder="Prix, $ par jour">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-3" for="matricule" >Matricule</label>
    <div class="col-xs-6">
      <input type="text" class="form-control" id="matricule" name="matricule" placeholder="Matricule">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-3"  for="ville">Ville</label>
    <div class="col-xs-6">
      <input type="text" class="form-control" id="ville" placeholder="Montreal" disabled>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-3">Arrondissement</label>
      <div class="col-xs-6">
        <select name="choixArrondissement" class="form-control">
          <option SELECTED>Arrondissement</option>
        </select>
      </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-3">Disponible:</label>

      <div class='input-group date col-xs-6' id='datetimepickerDe'>
          <input type='text' class="form-control" name="dateDebut" placeholder="de">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
      </div>

    <label class="control-label col-xs-3"></label>

      <div class='input-group date col-xs-6' id='datetimepickerA'>
          <input type='text' class="form-control" name="dateFini" placeholder="a">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
      </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-3"  for="photo">Photo:</label>
    <div class="col-xs-6">
      <input type="file" class="form-control-file" id="photo" name="photo">
    </div>
  </div>



  <br />
  <div class="form-group">
    <div class="col-xs-offset-3 col-xs-9">
      <input type="submit" class="btn btn-primary" value="Ajouter">
      <input type="reset" class="btn btn-default" value="Effacez le formulaire!">
    </div>
  </div>
</form>


<script>

/*Annee de voiture*/
      $(function () {
            $('#datetimepickerAnnee').datetimepicker({
                viewMode: 'years',
                format: 'MM/YYYY'
            });
        });

      $(function () {
            $('#datetimepickerDe').datetimepicker({
               icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            });
        });

      $(function () {
            $('#datetimepickerA').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            });
        });


/*ramlir Arrondissement*/
 var generArrondissement= new Array("Ahuntsic-Cartierville","Anjou","Côte-des-Neiges–Notre-Dame-de-Grâce","Lachine","LaSalle","Le Plateau-Mont-Royal");
   var dA=document.monFormulaire.choixArrondissement;
    for(var i=0; i < generArrondissement.length ; i++)
   {  dA.length++;
      dA.options[dA.length-1].text = generArrondissement[i];
   }


</script>



</body>
</html>