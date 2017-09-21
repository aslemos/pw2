/*
 * Fonctions pour l'approbation ou refus d'un véhicule
 * @author Alessandro Souza Lemos
 */
$(function(){

    // trouve les boutons d'approbation de véhicule
    $('[id^="btn-approuver-"]').on('click', function(){
        var id = this.id.split('-')[2];
        if (id && confirm("Approuver ce véhicule ?")) {
            $.ajax({
                url: base_url + 'ajax/approuverVehicule/' + id,
                success: function(data) {
                    var json = JSON.parse(data);
                    if (json.success) {
                        $("#tr"+id).remove();
                        alert('Véhicule approuvé !');
                    }
                }
            });
        }
    });

    // trouve les boutons d' refus de véhicule
    $('[id^="btn-refuser-"]').on('click', function(){
        var id = this.id.split('-')[2];
        if (id && confirm("Êtes-vous sûr de refuser ce véhicule ?")) {
            $.ajax({
                url: base_url + 'ajax/refuserVehicule/' + id,
                success: function(data) {
                    var json = JSON.parse(data);
                    if (json.success) {
                        $("#tr"+id).remove();
                        alert('Vous avez refusé ce véhicule.');
                    }
                }
            });
         }
    });

});
