/**
 * Remplit le listbox des villes selon la province choisie
 * @author Alessandro Lemos
 */
$(function(){
    $('#province_id').on('change', function(){
        var lstVilles = document.getElementById('ville_id');
        lstVilles.innerHTML = lstVilles.options[0].outerHTML;
        $.ajax({
            url: base_url + 'ajax/villesByProvince/' + this.value,
            success: function(data) {
                var json = JSON.parse(data);
                for (var i=0; i < json.length; i++) {
                    lstVilles.innerHTML += '<option value="' + json[i].ville_id + '">' + json[i].nom_ville + '</option>';
                }
            }
        });
    });
});
