
<h2><?= $title; ?></h2>

<ul class="list-group">
    
    <?php foreach($marques as $marque) : ?>
    
        <li class="list-group-item"><a href="<?php echo site_url('/marques/vehicules/'.$marque['marque_id']); ?>">
            
            <?php echo $marque['nom_marque']; ?></a>
            
            <?php if($this->session->userdata('user_id') == $marque['user_id']): ?>
            
                <form class="marque-delete" action="marques/deleteMarque/<?php echo $marque['marque_id']; ?>" method="POST">
                    
                        <input type="submit" class="btn-link text-danger" value="[X]">
                        
                </form>
            <?php endif; ?>
            
        </li>
        
    <?php endforeach; ?>
</ul>