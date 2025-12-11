<section>

    <h2><?= esc($title) ?></h2>
    <p><a href="<?= base_url('juegos/new') ?>">Create Juegos</a></p>
    
    <?php if ($juegos !== []): ?>

        <?php foreach ($juegos as $juegos_item): ?>

        
            <div class="main">
                Juegos: <b><?= esc($juegos_item['nombre']) ?></b>
            </div>
            <p>
                

                <a href="<?= base_url('juegos/del/'.$juegos_item['id']) ?>">Delete Juegos</a>

                <a href="<?= base_url('juegos/update/'.$juegos_item['id']) ?>">Edit Juegos</a>
                
            </p>


        <?php endforeach ?>

    <?php else: ?>

        <h3>No juegos</h3>

        <p>Unable to find any juegos for you.</p>

    <?php endif ?>
</section>
