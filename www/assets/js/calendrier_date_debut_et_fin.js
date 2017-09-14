/*
 * Script pour attacher un calendrier aux dates de début et de fin
 * @author Rafael
 */
$(function () {
    $('#date_debut').datepicker({
        dateFormat: "yy-mm-dd"
    });
    $('#date_fin').datepicker({
        dateFormat: "yy-mm-dd"
    });
});
