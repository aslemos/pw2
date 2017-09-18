/*
 * Fonctions pour l'approbation ou refus d'une demande de réservation
 * @author Alessandro Souza Lemos
 */
function approuverReservation(id) {
    if (confirm('Approuver cette demande de réservation ?')) {
        $.ajax({
            url: base_url + 'ajax/approuverReservation/' + id,
            success: function(data) {
                var json = JSON.parse(data);
                if (json.success) {
                    $("#tr"+id).remove();
                }
            }
        });
    }
}

function refuserReservation(id) {
    if (confirm('Êtes-vous sûr de refuser cette demande de réservation ?')) {
        $.ajax({
            url: base_url + 'ajax/refuserReservation/' + id,
            success: function(data) {
                var json = JSON.parse(data);
                if (json.success) {
                    $("#tr"+id).remove();
                }
            }
        });
    }
}
