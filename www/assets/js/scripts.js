
//Bouton Menu

$(function () {
    $(".btn-menu").click(function () {
        $("body").toggleClass("menu-open");
    });
});


// Scroll low

//var ascroll = false;
//
//$(document).scroll(function () {
//    if (($(document).scrollTop() > 0) && ($(document).scrollTop() < 956) && !ascroll) {
//        $('html,body').animate({scrollTop: $('#pub-home').offset().top}, 'slow');
//        ascroll = true;
//    }
//});

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

});

