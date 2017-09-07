<h2><?= $title; ?></h2>
<ul class="list-group">
    <?php foreach($modeles as $modele) : ?>
        <li class="list-group-item"><a href="<?php echo site_url('/modeles/marques/'.$modele['modele_id']); ?>"><?php echo $modele['nom_modele']; ?></a>
            <?php //if($this->session->userdata('user_id') == $modele['user_id']): ?>
                <form class="modele-delete" action="modeles/delete/<?php echo $modele['modele_id']; ?>" method="POST">
                        <input type="submit" class="btn-link text-danger" value="[X]">
                </form>
            <?php //endif; ?>
        </li>
    <?php endforeach; ?>
</ul>