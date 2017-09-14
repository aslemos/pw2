/*
 * Script pour attacher un calendrier aux dates de début et de fin
 * @author Rafael
 */
$(function () {
    $('#date_debut').datepicker({
        dateFormat: "yy-mm-dd"
    }).on('change', function(){
        var val = $("#date_fin").val();
        if (val != "" && this.value > val) {
            $("#date_fin").val(this.value);
        }
    });

    $('#date_fin').datepicker({
        dateFormat: "yy-mm-dd"
    }).on('change', function(){
        var val = $("#date_debut").val();
        if (val != "" && this.value < val) {
            $("#date_debut").val(this.value);
        }
    });
});
