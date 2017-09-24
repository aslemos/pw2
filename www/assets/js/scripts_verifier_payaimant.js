
$(function () {

    /*Date expiration du cart*/
    $("#dateExpiration").datepicker({
        changeMonth: true,
        changeYear: true
    });


    /*champ carte credit*/
    $("#in1").on('blur', function () {
        $(this).removeClass("incorrect");
        if (!calcLuhn(this.value)) {
            $(this).addClass("incorrect");
        }
    });


    /*form paiement*/
    $("#frm-paiement").on('submit', function () {
        var type = $("select option:selected").val();
        if (type != 2 && !calcLuhn($("#in1").val())) {
            alert("Numéro de carte n'est pas valide");
            $("#in1").focus();
            return false;
        }
        return true;
    });


    $("select")
           .change(function () {

               var type = $("select option:selected").val();

               if (type == "2") {
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
           })
           .trigger("change");

});

