
<h2 style="text-align: center">Formulaire d'inscription voiture</h2>

<form name="monFormulaire" class="form-horizontal" id="needs-validation">

    <div class="form-group">
      <label class="control-label col-xs-3" for="marque">Marque:</label>
      <div class="col-xs-6">
        <input type="text" class="form-control" id="marque" placeholder="Entrez le marque">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-3" for="model">Model:</label>
      <div class="col-xs-6">
        <input type="text" class="form-control" id="model" placeholder="Entrez le Model">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-3" for="carrosserie">Type de carrosserie:</label>
      <div class="col-xs-6">
        <input type="text" class="form-control" id="carrosserie" placeholder="Type de carrosserie">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-3">Année:</label>
      <div class='input-group date col-xs-6' id='datetimepickerAnnee'>
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
              <input type="radio" name='gender2' checked style="visibility:hidden;display:none">
              <i class="fa fa-circle-o fa-2x"></i>
              <i class="fa fa-check-circle-o fa-2x"></i>
              <span class="test"> manuelle</span>
            </label>
        </div>

        <div class="col-xs-6">
            <label class="btn">
              <input type="radio" name='gender2' style="visibility:hidden;display:none">
              <i class="fa fa-circle-o fa-2x"></i>
              <i class="fa fa-check-circle-o fa-2x"></i>
              <span class="test"> automatique </span>
            </label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-3" for="nombreplaces">Nombre de places:</label>
      <div class="col-xs-6">
        <input type="text" class="form-control" id="nombrePlaces" placeholder="Nombre de places">
      </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-3" for="carburant">Type de carburant:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control" id="carburant" placeholder="Type de carburant">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3" for="tarif">Prix / jour</label>
        <div class="col-xs-6">
            <input type="text" class="form-control" id="prix" placeholder="$$ / jour">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3" for="matricule" >Matricule</label>
        <div class="col-xs-6">
            <input type="text" class="form-control" id="matricule" placeholder="Matricule">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3"  for="ville">Ville</label>
        <div class="col-xs-6">
            <input type="text" class="form-control" id="ville" placeholder="Montreal" disabled >
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Arrondissement</label>
        <div class="col-xs-6">
            <select name="choixArrondissement" class="form-control input-sm">
                <option SELECTED>Arrondissement</option>
            </select>
        </div> 
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Disponible:</label>
        <div class='input-group date col-xs-6' id='datetimepickerDe'>
            <input type='date' class="form-control">
            <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
            </span>
            <input type='date' class="form-control">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-3"  for="photo">Photo:</label>
        <div class="col-xs-6">
            <input type="file" class="form-control-file" id="photo">
        </div>
    </div>
    <br />
    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            <input type="submit" class="btn btn-primary" value="S'inscrire">
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
    for(var i=0; i < generArrondissement.length ; i++) {  
        dA.length++; 
        dA.options[dA.length-1].text = generArrondissement[i]; 
    } 
    
</script>
