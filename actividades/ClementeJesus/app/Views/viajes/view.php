<section>
    <h2><?= esc($viajes['viaje']) ?></h2>
    <p><?= esc($viajes['fecha']) ?></p>
    <p><?= esc($viajes['plazas']) ?></p>
    


        

    <p><a href="<?= base_url('viajes/update/'.$viajes['id']) ?>">Edit Viaje</a></p>
    <p><a href="<?= base_url('viajes/del/'.$viajes['id']) ?>">Delete Viaje</a></p>
    <p><a href="<?= base_url('viajes') ?>">Volver</a>
    </p></p>
</section>