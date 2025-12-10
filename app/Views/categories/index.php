<section>

    <h2><?= esc($title) ?></h2>
    <p><a href="<?= base_url('categories/new') ?>">Create Category</a></p>
    
    <?php if ($categories !== []): ?>

        <?php foreach ($categories as $categories_item): ?>

        
            <div class="main">
                Category: <b><?= esc($categories_item['category']) ?></b>
            </div>
            <p>
                

                <a href="<?= base_url('categories/del/'.$categories_item['id']) ?>">Delete Category</a>

                <a href="<?= base_url('categories/update/'.$categories_item['id']) ?>">Edit Category</a>
                
            </p>


        <?php endforeach ?>

    <?php else: ?>

        <h3>No category</h3>

        <p>Unable to find any category for you.</p>

    <?php endif ?>
</section>
