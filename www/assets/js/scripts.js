
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

//Bouton Menu
$(function () {
    $(".btn-menu").click(function () {
        $("body").toggleClass("menu-open");
    });
});


// Datepicker
$(function () {


    /*Date expiration du cart*/
    $("#dateExpiration").datepicker({
        changeMonth: true,
        changeYear: true
    });




    /*button Next1*/
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


    /*button d'autres modes de paiements*/
    $(".btn1").click(function () {
        $("#myForm2").slideDown("slow");
        $("#myForm1").slideUp("slow");
    });

    $(".btn2").click(function () {
        $("#myForm1").slideDown("slow");
        $("#myForm2").slideUp("slow");
    });



        /*champ carte credit*/
    $("#in1").on('blur', function () {
        if (!calcLuhn(this.value)) {
            $("#in1").addClass("incorrect");
            $("#in1").removeClass("correct");
        } else {
            $(this).addClass("correct");
            $(this).removeClass("incorrect");
        }
    });



    $("#frm-paiement").on('submit', function () {
        if (!calcLuhn($("#in1").val())) {
            alert("Numero de carte pas valide");
            return false;
        }
        return true;
    });




    /*form payaimante*/


     $("select")
            .change(function () {
                var str = "";
                $("select option:selected").each(function () {
                    str += $(this).val();
                });

                if (str == "2") {
                    $("#myHide").slideUp();
                    $("#in1").removeAttr('required');
                    $('#dateExpiration').removeAttr('required');
                    $('#dateExpiration2').removeAttr('required');
                } else {
                    $("#myHide").slideDown();
                    $("#in1").attr('required', '');
                    $('#dateExpiration').attr('required', '');
                    $('#dateExpiration2').attr('required', '');
                }
//                $("#rew").text(str);
            })
            .trigger("change");









//    var cartenumero = document.getElementById("in1").value;
//    //console.log(cartenumero);
//
//
//    //Validation NumeroCC
//
//    function myFunction() {
//        var valide = true;
//
//        if (!calcLuhn(cartenumero)) {
//            document.getElementById("in1").className = "incorrect";
//            valide = false;
//        } else {
//            document.getElementById("in1").className = "correct";
//        }
//        return valide;
//    }
//
//    /**
//     * Algorithme de Luhn
//     * @param {string} chaine Le numéro à vérifier. Enlève tous les caractères non numériques avant le calcul.
//     * @returns {Boolean}
//     */
//    function calcLuhn(chaine) {
//        // enlève les caractères non numériques
//        var numero = chaine.match(/\d/g).toString().replace(/\,/g, '');
//        var somme = 0, pos = 1, chiffre;
//        for (var i = numero.length - 1; i >= 0; i--) {
//            chiffre = numero[i] * 1;
//            somme += (pos % 2 === 0 && chiffre !== 9) ? (chiffre * 2 % 9) : chiffre;
//            pos++;
//        }
//        return somme % 10 === 0;
//    }





});

