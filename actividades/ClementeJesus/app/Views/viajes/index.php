<section>

    <h2><?= esc($title) ?></h2>

    
    <?php if ($viajes !== []): ?>

        <?php foreach ($viajes as $viajes_item): ?>

        
            <div class="main">
           
            <p>
                <a href="<?= base_url('viajes/'.$viajes_item['id']) ?>"><b><?= esc($viajes_item['viaje']) ?></b></a>                
            </p>


        <?php endforeach ?>

    <?php else: ?>

        <h3>No Viaje</h3>

        <p>Unable to find any Viaje for you.</p>

    <?php endif ?>
</section>
