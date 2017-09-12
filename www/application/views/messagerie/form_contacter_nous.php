<?php
// Header
include VIEWPATH . 'common/header.php';
//========================================================
?>
<main>
    <section id="contacterNous">
        <div class="row">
                            <div class="map"></div>
                        </div>
        <div class="container">
            <div class="rows4 title-container">
                <div class="cols6">
                    <div class="blocks6">
                        <h2><?= $title ?></h2>
                    </div>
                </div>
            </div>
            <div class="row rows3">
                <div class="clos5 col-sm-offset-2 col-md-offset-2 col-md-12 col-sm-12">
                    <div class="blocks5">
                        <div class="col-md-offset-3 col-sm-offset-3 title-container">
                            <h4> SOCIETÉ RENTCARS </h4>

                            <h4> RENTCARS@GMAIL.COM </h4>
                            <h4> Telephone (514) 318-4728 </h4>
                        </div>

                        <form action="<?=$base_url?>contact/enregistrer" method="post" id="main-form">
                            <div class="row rows1">
                                <div class="cols1 col-md-6">
                                    <label for="fullname">Nom complet</label>
                                    <input type="text" class="form-control" placeholder="" name="fullname" required="">
                                </div>
                                <div class="cols2 col-md-6">
                                    <label for="company">Compagnie (facultatif)</label>
                                    <input type="text" class="form-control" placeholder="" name="company">
                                </div>
                                <div class="cols3 col-md-6">
                                    <label for="phone">Téléphone</label>
                                    <input type="tel" class="form-control" placeholder="" name="phone" required="">
                                </div>
                                <div class="cols4 col-md-6">
                                    <label for="email">Courriel</label>
                                    <input type="email" class="form-control" placeholder="" name="email" required="">
                                </div>
                            </div>

                            <div class="rows2">

                                <label for="subject">Sujet</label>
                                <select class="form-control" id="subject" name="subject" required="">
                                    <option value="">-- Sujet (en choisir un) --</option>
                                    <option value="Informations">Informations</option>
                                    <option value="Soumission">Soumission</option>
                                    <option value="Comptabilite">Comptabilité</option>
                                    <option value="Carrieres">Carrières</option>
                                    <option value="Autre">Autre</option>
                                </select>

                                <label for="message">Message</label>
                                <textarea id="comment" placeholder="" name="message" required=""></textarea>

                                <div class="containerbottom text-right">
                                    <button class="btn" type="submit">ENVOYER</button>
                                </div>
                            </form>
                        </div>


                    </div>

            </div>
        </div>
    </section>

</main>
<?php
//========================================================
//Footer
include VIEWPATH . 'common/footer.php';

