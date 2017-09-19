/**
 * Remplit le listbox des arrondissements selon la ville choisie
 * @author Alessandro Lemos
 */
$(function(){
    $('#ville_id').on('change', function(){
        var lstArrond = document.getElementById('arr_id');
        lstArrond.innerHTML = lstArrond.options[0].outerHTML;
        $.ajax({
            url: base_url + 'ajax/arrondByVille/' + this.value,
            success: function(data) {
                var json = JSON.parse(data);
                for (var i=0; i < json.length; i++) {
                    lstArrond.innerHTML += '<option value="' + json[i].arr_id + '">' + json[i].nom_arr + '</option>';
                }
            }
        });
    });
});
