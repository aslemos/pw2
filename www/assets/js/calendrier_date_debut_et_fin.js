/*
 * Script pour attacher un calendrier aux dates de début et de fin
 * @author Rafael
 */
$(function () {

    // met le calendrier dans l'élément dont l'identifiant est 'date_debut'
    $('#date_debut').datepicker({
        dateFormat: "yy-mm-dd",
        showAnim: "show",
        changeMonth: true,
        changeYear: true
    }).on('change', function(){
        var val = $("#date_fin").val();
        if (val != "" && this.value > val) {
            $("#date_fin").val(this.value);
        }
    });

    // met le calendrier dans l'élément dont l'identifiant est 'date_fin'
    $('#date_fin').datepicker({
        dateFormat: "yy-mm-dd",
        showAnim: "show",
        changeMonth: true,
        changeYear: true
    }).on('change', function(){
        var val = $("#date_debut").val();
        if (val != "" && this.value < val) {
            $("#date_debut").val(this.value);
        }
    });

    // met une séquence de 30 ans dans l'élément dont la classe est 'annee'
    $('.annee').each(function(){

        var debut = (new Date()).getFullYear();
        var valeur = (this.value*1 > 0) ? this.value : debut;

        this.innerHTML = this.options[0].outerHTML;
        for (var i=debut+1, fin=debut-30; i > fin; i--) {
            this.innerHTML += '<option value=""' + (i===valeur?' selected':'') + '>' + i + '</option>';
        }
    });
//    $('#annee').datetimepicker({
//        viewMode: 'years',
//        format: 'YYYY',
//        icons: {
//            time: "fa fa-clock-o",
//            date: "fa fa-calendar",
//            up: "fa fa-arrow-up",
//            down: "fa fa-arrow-down"
//        }
//    });

});
