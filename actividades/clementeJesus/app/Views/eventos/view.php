<section>
    <h2>Evento : <?= esc($eventos['nombre']) ?></h2>
    <p>Fecha :<?= esc($eventos['fecha']) ?></p>
    <p>Aforo :<?= esc($eventos['aforo']) ?></p>
    <p>Ciudad :<?= esc($eventos ['ciudad']) ?></p>
    <a href="<?= base_url('eventos') ?>">Volver</a>
    <a href="<?= base_url('eventos/new')?>">Create Eventos</a>
    <a href="<?= base_url('eventos/del/'.$eventos['id'])?>">Delete Eventos</a>
    <a href="<?= base_url('eventos/update/'.$eventos['id'])?>">Update Eventos</a>

</section>