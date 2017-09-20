/*
 * Fonctions pour l'approbation ou refus d'une demande de réservation
 * @author Alessandro Souza Lemos
 */
$(function(){

    // trouve les boutons d'approbation de membre
    $('[id^="btn-approuver-"]').on('click', function(){
        var id = this.id.split('-')[2];
        if (id && confirm("Approuver cette demande d'abonnement ?")) {
            $.ajax({
                url: base_url + 'ajax/approuverMembre/' + id,
                success: function(data) {
                    var json = JSON.parse(data);
                    if (json.success) {
                        $("#tr"+id).remove();
                        alert('Membre accepté !');
                    }
                }
            });
        }
    });

    // trouve les boutons d' refus de membre
    $('[id^="btn-refuser-"]').on('click', function(){
        var id = this.id.split('-')[2];
        if (id && confirm("Êtes-vous sûr de refuser cette demande d'abonnement ?")) {
            $.ajax({
                url: base_url + 'ajax/refuserMembre/' + id,
                success: function(data) {
                    var json = JSON.parse(data);
                    if (json.success) {
                        $("#tr"+id).remove();
                        alert('Vous avez refusé ce membre.');
                    }
                }
            });
         }
    });

});
