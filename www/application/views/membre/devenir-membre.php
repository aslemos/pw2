<?php
// Header
include VIEWPATH . 'common/header.php';
//========================================================
?>
<section id="devenir-membre">
    <div class="container">
        <div class="rows4 title-container">
            <div class="cols6">
                <div class="blocks6">
                    <h2>Formulaire d'inscription membre</h2>
                </div>
            </div>
        </div>
        <div class="rows5 row alternate">
            <div class="cols7 col-md-12 col-sm-12 col-xs-12">
                <div class="blocks7">
                    <div>
                        <form method="post" name="monFormulaire" action="<?=$base_url?>usager/inscription#s" class="form-horizontal" id="needs-validation" novalidate >

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="lastName">Nom de famille:</label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="lastName" placeholder="Entrez le nom de famille">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="firstName">Prenom:</label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="firstName" placeholder="Entrez le nom">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Date de naissance:</label>
                                <div class="col-xs-2" id="input_jour">

                                </div>
                                <div class="col-xs-2" id="input_mois">

                                </div>
                                <div class="col-xs-2" id="input_annee">

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-xs-3">Sex:</label>

                                <div class="btn-group" data-toggle="buttons">
                                    <div class="col-xs-6">
                                        <label class="btn active" >
                                            <input type="radio" name='gender2' class="gender" checked>
                                            <i class="fa fa-circle-o fa-2x"></i>
                                            <i class="fa fa-check-circle-o fa-2x"></i>
                                            <span class="test"> Homme</span>
                                        </label>
                                    </div>

                                    <div class="col-xs-6">
                                        <label class="btn">
                                            <input type="radio" name='gender2' class="gender">
                                            <i class="fa fa-circle-o fa-2x"></i>
                                            <i class="fa fa-check-circle-o fa-2x"></i>
                                            <span class="test"> Femme</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="inputConduire">Numéro de permis de conduire:</label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="inputConduire" placeholder="Entrez le numéro de permis de conduire">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="phoneNumber">Numéro de téléphone:</label>
                                <div class="col-xs-6">
                                    <input type="tel" class="form-control" id="phoneNumber" placeholder="Entrez le numéro de téléphone">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-xs-3" for="inputEmail">Email:</label>
                                <div class="col-xs-6">
                                    <input  type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-xs-3" for="inputPassword">Mot de passe:</label>
                                <div class="col-xs-6">
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Entrez le mot de passe plus de 8 caractères">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="confirmPassword">Confirmer mot de passe:</label>
                                <div class="col-xs-6">
                                    <input type="password" class="form-control" id="confirmPassword" placeholder="Retapez le mot de passe">
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="control-label col-xs-3" for="inputAddress">Adresse</label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 rue de Gaspe">
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="control-label col-xs-3" for="inputAddress2">Adresse 2</label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="inputAddress2" placeholder="Appartement, studio ou étage">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3"></label>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="inputVille" placeholder="Ville" required>
                                </div>

                                <div class="col-xs-3">
                                    <select name="choixProvince" class="form-control">
                                        <option SELECTED>Province</option>
                                    </select>
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="control-label col-xs-3"></label>

                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="inputVille" placeholder="Ville" required>
                                </div>

                                <div class="col-xs-3">
                                    <select name="choixProvince" class="form-control">
                                        <option SELECTED>Province</option>
                                    </select>
                                </div>


                            </div>


<!--                                <div class="form-group">
                                <label class="control-label col-xs-3">Payment:</label>
                                <div class="col-xs-2">
                                    <label for="visa" class="btn btn-primary form-control">Visa
                                        <input type="checkbox" id="visa" class="badgebox" value="">
                                        <span class="badge">&check;</span>
                                    </label>
                                </div>

                                <div class="col-xs-2">
                                    <label class="btn btn-primary form-control" for="masterCard">MasterCard
                                        <input type="checkbox" id="masterCard" class="badgebox" value="">
                                        <span class="badge">&check;</span>
                                    </label>
                                </div>

                                <div class="col-xs-2">
                                    <label class="btn btn-primary form-control" for="americanExpress ">American Express
                                        <input type="checkbox" id="default3" class="badgebox" value="">
                                        <span class="badge">&check;</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3"></label>
                                <div class="col-xs-2">
                                    <label for="default4" class="btn btn-primary form-control">
                                        <input type="checkbox" id="default4" class="badgebox" value="">PayPal
                                        <span class="badge">&check;</span>
                                    </label>
                                </div>

                                <div class="col-xs-2">
                                    <label for="default5" class="btn btn-primary form-control">Discover
                                        <input type="checkbox" id="default5" class="badgebox" value="">
                                        <span class="badge">&check;</span>
                                    </label>
                                </div>

                                <div class="col-xs-2">
                                    <label for="default6" class="btn btn-primary form-control">Interac
                                        <input type="checkbox" id="default6" class="badgebox" value="">
                                        <span class="badge">&check;</span>
                                    </label>
                                </div>
                            </div>-->

                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="agree">  Je suis d'accord avec <a href="#"  data-toggle="modal" data-target="#myModal">conditions</a>.
                                    </label>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Conditions</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tincidunt, urna et dapibus hendrerit, leo purus tincidunt nunc, sed sollicitudin risus nisi in ex. Suspendisse sollicitudin urna ut eleifend posuere. Quisque justo mauris, egestas non ante vitae, hendrerit molestie nibh. Donec quis lacus in augue cursus aliquet.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                            $(document).ready(function() {

                            // Ramplir Date de naissance
                            var liste_jour = "<select name='jour' class='form-control'>    <option value='0'>Jour</option>";
                            for (var i = 1; i <= 31; i++) {
                                liste_jour += "<option value='" + i + "'>" + i + "</option>";
                            }
                            ;
                            liste_jour += "</select>";


                            var liste_mois = "<select name='mois' class='form-control'><option value='0'>Mois</option>";
                            for (var i = 1; i <= 12; i++) {
                                liste_mois += "<option value='" + i + "'>" + i + "</option>";
                            }
                            ;
                            liste_mois += "</select>";

                            var liste_annee = "<select name='annee' class='form-control'><option value='0'>Année</option>";
                            for (var i = 1916; i <= 2016; i++) {
                                liste_annee += "<option value='" + i + "'>" + i + "</option>";
                            }
                            ;
                            liste_annee += "</select>";

                            // Insérer nos listes dans le DOM
                            document.getElementById("input_jour").innerHTML = liste_jour;
                            document.getElementById("input_mois").innerHTML = liste_mois;
                            document.getElementById("input_annee").innerHTML = liste_annee;



                            /*ramlir Province*/
                            var generMarque = new Array("AB", "BC", "MB", "NB", "ON", "QC");
                            var d = document.monFormulaire.choixProvince;
                            for (var i = 0; i < generMarque.length; i++)
                            {
                                d.length++;
                                d.options[d.length - 1].text = generMarque[i];
                            }

                            });
                        </script>

                    </div>
                </div>
            </div>

        </div>
</section>

<?php
//========================================================
//Footer
include VIEWPATH . 'common/footer.php';
