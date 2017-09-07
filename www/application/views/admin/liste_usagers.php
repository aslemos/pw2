<?php
$meta_keywords = "";
$meta_description = "";
$page_title = "Liste des membres";
$body_class = "subpages listeAdmin";

// Header
include VIEWPATH . '/common/header.php';
//========================================================
?>

<main>
    <section id="listeAdmin">

        <div class="btn-liens" >
            <!-- Boutton pour afficher la liste des voiture en location d'un membres -->
            <a class="btn btn-danger position" href="<?= $base_url; ?>admin/listeUsagers" >Liste des membres</a>
            <!-- Boutton pour afficher la liste des voitures -->
            <a class="btn btn-danger position" href="<?= $base_url; ?>admin/listeVoitures" >Liste des voitures</a>
            <!-- Boutton pour afficher la des adminitrateurs -->
            <a class="btn btn-danger position" href="<?= $base_url; ?>admin/listeAdmins">Liste des admins </a>
        </div>
        <h1>Les Members</h1>
        <form action="" name="formulaire" id="form-Members-id">
            <table class="table table-responsive">
                <tr>
                    <td class="titre_editable">Nº</td>
                    <td class="titre_editable">Nom</td>
                    <td class="titre_editable">Prenom</td>
                    <td class="titre_editable">Nombre de voitures</td>
                    <td class="titre_editable">E-email</td>
                    <td class="titre_editable">Evaluation</td>
                    <td class="titre_editable">Approuver</td>
                    <td class="titre_editable">Refuser</td>
                </tr>
                <tr>
                    <td class="editable">1</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">
                        <img src="<?= $base_url; ?>assets/images/ok.png" >
                    </td>
                    <td class="editable">
                        <img src="<?= $base_url; ?>assets/images/no.png" >
                    </td>
                </tr>	
                <tr>
                    <td class="editable">2</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">
                        <img src="<?= $base_url; ?>assets/images/ok.png" >
                    </td>
                    <td class="editable">
                        <img src="<?= $base_url; ?>assets/images/no.png" >
                    </td>
                </tr>	
                <tr>
                    <td class="editable">3</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">
                        <img src="<?= $base_url; ?>assets/images/ok.png" >
                    </td>
                    <td class="editable">
                        <img src="<?= $base_url; ?>assets/images/no.png" >
                    </td>
                </tr>	
                <tr>
                    <td class="editable">4</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">
                        <img src="<?= $base_url; ?>assets/images/ok.png" >
                    </td>
                    <td class="editable">
                        <img src="<?= $base_url; ?>assets/images/no.png" >
                    </td>
                </tr>	
                <tr>
                    <td class="editable">5</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">
                        <img src="<?= $base_url; ?>assets/images/ok.png" >
                    </td>
                    <td class="editable">
                        <img src="<?= $base_url; ?>assets/images/no.png" >
                    </td>
                </tr>	
                <tr>
                    <td class="editable">6</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">
                        <img src="<?= $base_url; ?>assets/images/ok.png" >
                    </td>
                    <td class="editable">
                        <img src="<?= $base_url; ?>assets/images/no.png" >
                    </td>
                </tr>	<tr>
                    <td class="editable">7</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">
                        <img src="<?= $base_url; ?>assets/images/ok.png" >
                    </td>
                    <td class="editable">
                        <img src="<?= $base_url; ?>assets/images/no.png" >
                    </td>
                </tr>	
                <tr>
                    <td class="editable">8</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">
                        <img src="<?= $base_url; ?>assets/images/ok.png" >
                    </td>
                    <td class="editable">
                        <img src="<?= $base_url; ?>assets/images/no.png" >
                    </td>
                </tr>	
                <tr>
                    <td class="editable">9</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">test</td>
                    <td class="editable">
                        <img src="<?= $base_url; ?>assets/images/ok.png" >
                    </td>
                    <td class="editable">
                        <img src="<?= $base_url; ?>assets/images/no.png" >
                    </td>
                </tr>	
            </table>
        </form>
    </section>
</main>

<?php
// footer
include VIEWPATH . '/common/footer.php';
//========================================================
?>
