/*
 * Script pour charger les détails dans la page devenir-membre
 */

$(document).ready(function () {

    // Ramplir Date de naissance
    var liste_jour = "<select class='formSelector form-control' name='jour' class='form-control' required>    <option value=''>Jour</option>";
    for (var i = 1; i <= 31; i++) {
        liste_jour += "<option value='" + i + "'>" + i + "</option>";
    }
    ;
    liste_jour += "</select>";


    var liste_mois = "<select class='formSelector form-control' name='mois' class='form-control' required><option value=''>Mois</option>";
    for (var i = 1; i <= 12; i++) {
        liste_mois += "<option value='" + i + "'>" + i + "</option>";
    }
    ;
    liste_mois += "</select>";

    var liste_annee = "<select class='formSelector form-control' name='annee' class='form-control' required><option value=''>Année</option>";
    for (var i = 1916; i <= 2016; i++) {
        liste_annee += "<option value='" + i + "'>" + i + "</option>";
    }
    ;
    liste_annee += "</select>";

    // Insérer nos listes dans le DOM
    document.getElementById("input_jour").innerHTML = liste_jour;
    document.getElementById("input_mois").innerHTML = liste_mois;
    document.getElementById("input_annee").innerHTML = liste_annee;



});


