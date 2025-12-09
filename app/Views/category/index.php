<section>

    <h2><?= esc($title) ?></h2>
    <p><a href="<?= base_url('category/new') ?>">Create Noticia</a></p>
    
    <?php if ($category !== []): ?>

        <?php foreach ($category as $category_item): ?>

        
            <div class="main">
                Category: <b><?= esc($category_item['category']) ?></b>
            </div>
            <p>
                

                <a href="<?= base_url('category/del/'.$category_item['id']) ?>">Delete Category</a>

                <a href="<?= base_url('category/update/' . $category_item['id']) ?>">Edit Category</a>
                
            </p>


        <?php endforeach ?>

    <?php else: ?>

        <h3>No category</h3>

        <p>Unable to find any category for you.</p>

    <?php endif ?>
</section>
