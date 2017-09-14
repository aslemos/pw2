/**
 * Remplit le listbox des modèles selon la marque choisie
 * @author Alessandro Lemos
 */
$(function(){
    $('#marque_id').on('change', function(){
        var lstModele = document.getElementById('modele_id');
        lstModele.innerHTML = lstModele.options[0].outerHTML;
        $.ajax({
            url: base_url + 'modele/ajaxModelesByMarque/' + this.value,
            success: function(data) {
                var json = JSON.parse(data);
                for (var i=0; i < json.length; i++) {
                    lstModele.innerHTML += '<option value="' + json[i].modele_id + '">' + json[i].nom_modele + '</option>';
                }
            }
        });
    });
});
