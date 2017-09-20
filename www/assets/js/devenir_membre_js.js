/*
 * Script pour charger les détails dans la page devenir-membre
 */

$(document).ready(function () {

    // Ramplir Date de naissance
    var liste_jour = "<select class='formSelector form-control' name='jour' class='form-control'>    <option value='0'>Jour</option>";
    for (var i = 1; i <= 31; i++) {
        liste_jour += "<option value='" + i + "'>" + i + "</option>";
    }
    ;
    liste_jour += "</select>";


    var liste_mois = "<select class='formSelector form-control' name='mois' class='form-control'><option value='0'>Mois</option>";
    for (var i = 1; i <= 12; i++) {
        liste_mois += "<option value='" + i + "'>" + i + "</option>";
    }
    ;
    liste_mois += "</select>";

    var liste_annee = "<select class='formSelector form-control' name='annee' class='form-control'><option value='0'>Année</option>";
    for (var i = 1916; i <= 2016; i++) {
        liste_annee += "<option value='" + i + "'>" + i + "</option>";
    }
    ;
    liste_annee += "</select>";

    // Insérer nos listes dans le DOM
    document.getElementById("input_jour").innerHTML = liste_jour;
    document.getElementById("input_mois").innerHTML = liste_mois;
    document.getElementById("input_annee").innerHTML = liste_annee;



    /*remplir Province*/
    var generMarque = new Array("AB", "BC", "MB", "NB", "ON", "QC");
    var d = document.monFormulaire.choixProvince;
    for (var i = 0; i < generMarque.length; i++)
    {
        d.length++;
        d.options[d.length - 1].text = generMarque[i];
    }

});


