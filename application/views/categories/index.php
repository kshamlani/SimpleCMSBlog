<h2><?= $title ?></h2>
<ul list-group>
    <?php foreach($categories as $category): ?>
        <li class="list-group-item"><a href="<?php echo site_url('/categories/contents/'.$category['id']); ?>"><?php echo $category['name']; ?></a>
        
        <?php if($this->session->userdata('admin_id')) : ?>
            <form action="categories/delete/<?php echo $category['id']; ?>" method="post" class="cat-delete">
                <input type="submit" class="btn-link text-danger" value="&cross;">
            </form>
        <?php endif;?>
        </li>
    <?php endforeach; ?>
</ul>