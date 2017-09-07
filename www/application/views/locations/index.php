<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php include (APPPATH . "/views/common/navbar_user.php"); ?>

<h2 class="text-center"><?php echo $title; ?></h2>

<h3>La liste est vide</h3>
<form action="" name="formulaire" id="form-demandes-id">
	<div class="table-responsive">
		<label>Choisir une voiture</label>
		<select name="voiture">
			<option>Séléctionner</option>
			<option>Auto No1</option>
			<option>Auto No2</option>
		</select>
		<label>Periode</label>
		<input type="text" id="datedebut" placeholder="De">
		<input type="text" id="datefin" placeholder="À">
		<table class="table">
			<thead>
				<tr>
					<th class="">Nº</th>
					<th class="">Marque</th>
					<th class="">Modele</th>
					<th class="">Matricule</th>
					<th class="">Année</th>
					<th class="">Nombre de <br />jours loué</th>
					<th class="">Montant<br />total</th>
				</tr>
			</thead>
			<tbody>
                            <tr>
                                    <td class="">1</td>
                                    <td class="">test</td>
                                    <td class="">test</td>
                                    <td class="">test</td>
                                    <td class="">test</td>
                                    <td class="">test</td>
                                    <td class="">test</td>
                            </tr>						
			</tbody>	
		</table>
	</div>
</form>
        