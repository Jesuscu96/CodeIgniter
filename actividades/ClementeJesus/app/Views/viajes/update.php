<section>
    <a href="<?= base_url('/') ?>">Return</a>
    <h2><?= esc($title) ?></h2>

    <?= session()->getFlashdata('error') ?>
    <?= validation_list_errors() ?>
    <?php if(!empty($viajes) && is_array($viajes)) : ?>
    <form action="<?= base_url('viajes/update/updated/' . $viajes['id']) ?>" method="post">
        <?= csrf_field() ?>

        <label for="viaje">Viaje</label>
        <input type="input" name="viaje" value="<?= $viajes['viaje'] ?>">
        <br>
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" value="<?= $viajes['fecha'] ?>">
        <br>

        <label for="plazas">Plazas</label>
        <input type="number" name="plazas" value="<?= $viajes['plazas'] ?>">
        <br>

        <input type="submit" name="submit" value="Update viaje item">
    </form>
    <?php endif ?>
</section>
