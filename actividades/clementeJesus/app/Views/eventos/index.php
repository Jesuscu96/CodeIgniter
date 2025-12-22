<section>
   
    <?php if ($eventos_list !== []): ?>

    <?php foreach ($eventos_list as $eventos_item): ?>

    <h3><a href="<?= base_url('eventos/'.$eventos_item['id'])?>"><?= esc($eventos_item['nombre']) ?></a></h3>

    

    
    
    
    


    <?php endforeach ?>

    <?php else: ?>

    <h3>No Eventos</h3>

    <p>Unable to find any Eventos for you.</p>

    <?php endif ?>

</section>