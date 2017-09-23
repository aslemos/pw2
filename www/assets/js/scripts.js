
/**
 * Algorithme de Luhn
 * @param {string} chaine Le numéro à vérifier. Enlève tous les caractères non numériques avant le calcul.
 * @returns {Boolean}
 */
function calcLuhn(chaine) {
    if (chaine != null && chaine.length > 0) {

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
    return false;
}

//Bouton Menu
$(function () {
    $(".btn-menu").click(function () {
        $("body").toggleClass("menu-open");
    });
});


$(function () {

//    $("#flip2").click(function () {
//        $("#part2").slideDown("slow");
//        $("#part1").slideUp("slow");
//        $("html, body").animate({scrollTop: 650}, 1000);
//        $(".test").removeClass("zoomIn");
//        $(".test2").addClass("animated zoomIn");
//
//    });

    /*button Avant2*/
    $("#flip3").click(function () {
        $("#part1").slideDown("slow");
        $("#part2").slideUp("slow");
        $("html, body").animate({scrollTop: 650}, 1000);
        $(".test").addClass("zoomIn");

    });

    /*button Next2*/
    $("#flip4").click(function () {
        $("#part3").slideDown("slow");
        $("#part2").slideUp("slow");
        $("html, body").animate({scrollTop: 650}, 1000);
        $(".test3").addClass("animated zoomIn");
        $(".test2").removeClass("animated zoomIn");

    });

    /*button Avant3*/
    $("#flip5").click(function () {
        $("#part2").slideDown("slow");
        $("#part3").slideUp("slow");
        $("html, body").animate({scrollTop: 650}, 1000);
        $(".test2").addClass("animated zoomIn");
        $(".test3").removeClass("animated zoomIn");
    });

});

