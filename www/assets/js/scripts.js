
//

$(function () {


            /*Date expiration du cart*/
    $("#dateExpiration").datepicker({
        changeMonth: true,
        changeYear: true
    });




/*booton Next1*/
$("#flip2").click(function () {
    $("#part2").slideDown("slow");
    $("#part1").slideUp("slow");
    $("html, body").animate({scrollTop: 650}, 1000);
    $(".test").removeClass("zoomIn");
    $(".test2").addClass("animated zoomIn");

});

/*booton Avant2*/
$("#flip3").click(function () {
    $("#part1").slideDown("slow");
    $("#part2").slideUp("slow");
    $("html, body").animate({scrollTop: 650}, 1000);
    $(".test").addClass("zoomIn");

});

/*booton Next2*/
$("#flip4").click(function () {
    $("#part3").slideDown("slow");
    $("#part2").slideUp("slow");
    $("html, body").animate({scrollTop: 650}, 1000);
    $(".test3").addClass("animated zoomIn");
    $(".test2").removeClass("animated zoomIn");

});

/*booton Avant3*/
$("#flip5").click(function () {
    $("#part2").slideDown("slow");
    $("#part3").slideUp("slow");
    $("html, body").animate({scrollTop: 650}, 1000);
    $(".test2").addClass("animated zoomIn");
    $(".test3").removeClass("animated zoomIn");
});


 });
