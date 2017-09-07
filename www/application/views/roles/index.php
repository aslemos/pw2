<h2><?= $title; ?></h2>
<ul class="list-group">
    <?php foreach($roles as $role) : ?>
        <li class="list-group-item"><a href="<?php echo site_url('/roles/usagers/'.$role['role_id']); ?>"><?php echo $role['nom_role']; ?></a>
            <?php if($this->session->userdata('user_id') == $role['user_id']): ?>
                <form class="modele-delete" action="roles/delete/<?php echo $role['role_id']; ?>" method="POST">
                    <input type="submit" class="btn-link text-danger" value="[X]">
                </form>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>