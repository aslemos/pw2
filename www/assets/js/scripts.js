// Google Maps
$(function () {

    var mapstyle = [
        {
            "featureType": "administrative",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#444444"
                }
            ]
        },
        {
            "featureType": "landscape",
            "elementType": "all",
            "stylers": [
                {
                    "color": "#f2f2f2"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "all",
            "stylers": [
                {
                    "saturation": -100
                },
                {
                    "lightness": 45
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "labels.icon",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "transit",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "all",
            "stylers": [
                {
                    "color": "#46bcec"
                },
                {
                    "visibility": "on"
                }
            ]
        }
    ];

    var icon_path = "assets/images/gmap_marker_petit.png";

    if ($('.map.otherlang').height() > 0) {
        icon_path = "assets/images/gmap_marker.png";
    }

    $('.map')
            .gmap3({
                center: [45.497940063477, -73.555870056152],
                zoom: 10,
                scrollwheel: false,
                styles: mapstyle

            })
            .marker([
                {address: " 1050 Rue Goulet, St-laurant, H4R 2E1",
                    icon: icon_path
                }
            ]);
});


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
