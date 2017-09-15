<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="<?= $base_url ?>/assets/css/styles.css" rel="stylesheet" media="screen and (min-width: 0px)" type ="text/css" />
        <title>Isertion de données</title>

        <!-- Appel la function Jquery -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Jquery et ajax -->
        <script src="js/jquerytAjax.js"></script>

        <!-- Appel la function Jquery UI  -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    </head>
    <body>
        <div class="container">
            <?php include VIEWPATH . '/admin/Affichage_boutton.php'; ?>

            <h1>Admins</h1>
            <form action="" name="formulaire" id="form-Admins-id">
                <table class="table table-responsive">
                    <tr>
                        <td class="titre_editable">Nº</td>
                        <td class="titre_editable">Nom</td>
                        <td class="titre_editable">Prenom</td>
                        <td class="titre_editable">E-email</td>
                        <td class="titre_editable">Approuver</td>
                        <td class="titre_editable">Refuser</td>
                    </tr>
                    <tr>
                        <td class="editable">1</td>
                        <td class="editable">test</td>
                        <td class="editable">test</td>
                        <td class="editable">test</td>
                        <td class="editable">
                            <img src="images/available.png" >
                        </td>
                        <td class="editable">
                            <img src="images/supprimer.png" >
                        </td>
                    </tr>
                    <tr>
                        <td class="editable">2</td>
                        <td class="editable">test</td>
                        <td class="editable">test</td>
                        <td class="editable">test</td>
                        <td class="editable">
                            <img src="images/available.png" >
                        </td>
                        <td class="editable">
                            <img src="images/supprimer.png" >
                        </td>
                    </tr>
                    <tr>
                        <td class="editable">3</td>
                        <td class="editable">test</td>
                        <td class="editable">test</td>
                        <td class="editable">test</td>
                        <td class="editable">
                            <img src="images/available.png" >
                        </td>
                        <td class="editable">
                            <img src="images/supprimer.png" >
                        </td>
                    </tr>
                    <tr>
                        <td class="editable">4</td>
                        <td class="editable">test</td>
                        <td class="editable">test</td>
                        <td class="editable">test</td>
                        <td class="editable">
                            <img src="images/available.png" >
                        </td>
                        <td class="editable">
                            <img src="images/supprimer.png" >
                        </td>
                    </tr>
                    <tr>
                        <td class="editable">5</td>
                        <td class="editable">test</td>
                        <td class="editable">test</td>
                        <td class="editable">test</td>
                        <td class="editable">
                            <img src="images/available.png" >
                        </td>
                        <td class="editable">
                            <img src="images/supprimer.png" >
                        </td>
                    </tr>
                    <tr>
                        <td class="editable">6</td>
                        <td class="editable">test</td>
                        <td class="editable">test</td>
                        <td class="editable">test</td>
                        <td class="editable">
                            <img src="images/available.png" >
                        </td>
                        <td class="editable">
                            <img src="images/supprimer.png" >
                        </td>
                    </tr>
                    <tr>
                        <td class="editable">7</td>
                        <td class="editable">test</td>
                        <td class="editable">test</td>
                        <td class="editable">test</td>
                        <td class="editable">
                            <img src="images/available.png" >
                        </td>
                        <td class="editable">
                            <img src="images/supprimer.png" >
                        </td>
                    </tr>
                    <tr>
                        <td class="editable">8</td>
                        <td class="editable">test</td>
                        <td class="editable">test</td>
                        <td class="editable">test</td>
                        <td class="editable">
                            <img src="images/available.png" >
                        </td>
                        <td class="editable">
                            <img src="images/supprimer.png" >
                        </td>
                    </tr>
                    <tr>
                        <td class="editable">9</td>
                        <td class="editable">test</td>
                        <td class="editable">test</td>
                        <td class="editable">test</td>
                        <td class="editable">
                            <img src="images/available.png" >
                        </td>
                        <td class="editable">
                            <img src="images/supprimer.png" >
                        </td>
                    </tr>
                </table>
            </form>

        </div>
        <!-- Div pour affichage -->
        <div id="resultat"></div>
        <div id="divAuto_Members"></div>
    </body>
</html>

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

