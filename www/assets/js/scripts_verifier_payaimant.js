
/**
 * Algorithme de Luhn
 * @param {string} chaine Le numéro à vérifier. Enlève tous les caractères non numériques avant le calcul.
 * @returns {Boolean}
 */
function calcLuhn(chaine) {
    // enlève les caractères non numériques
    var numero = chaine.match(/\d/g).toString().replace(/\,/g, '');
    var somme = 0, pos = 1, chiffre;
    for (var i = numero.length - 1; i >= 0; i--) {
        chiffre = numero[i] * 1;
        somme += (pos % 2 === 0 && chiffre !== 9) ? (chiffre * 2 % 9) : chiffre;
        pos++;
    }
    return somme % 10 === 0;
}


// Datepicker
$(function () {

    var cartenumero = document.getElementById("in1").value;
    //console.log(cartenumero);


    //Validation NumeroCC

    function myFunction() {
        var valide = true;

        if (!calcLuhn(cartenumero)) {
            document.getElementById("in1").className = "incorrect";
            valide = false;
        } else {
            document.getElementById("in1").className = "correct";
        }
        return valide;
    }

    /**
     * Algorithme de Luhn
     * @param {string} chaine Le numéro à vérifier. Enlève tous les caractères non numériques avant le calcul.
     * @returns {Boolean}
     */
    function calcLuhn(chaine) {
        // enlève les caractères non numériques
        var numero = chaine.match(/\d/g).toString().replace(/\,/g, '');
        var somme = 0, pos = 1, chiffre;
        for (var i = numero.length - 1; i >= 0; i--) {
            chiffre = numero[i] * 1;
            somme += (pos % 2 === 0 && chiffre !== 9) ? (chiffre * 2 % 9) : chiffre;
            pos++;
        }
        return somme % 10 === 0;
    }

});

