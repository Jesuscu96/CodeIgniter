<section>
    <a href="<?= base_url('viajes') ?>">Return</a>
    <h2><?= esc($title) ?></h2>

    <?= session()->getFlashdata('error') ?>
    <?= validation_list_errors() ?>

    <form action="<?= base_url('viajes/create') ?>" method="post">
        <?= csrf_field() ?>

        <label for="viaje">Viaje</label>
        <input type="input" name="viaje" value="<?= set_value('viaje') ?>">
        <br>

        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" value="<?= set_value('fecha') ?>">
        <br>

        <label for="plazas">Plazas</label>
        <input type="number" name="plazas" value="<?= set_value('plazas') ?>">
        <br>

        <input type="submit" name="submit" value="Create viaje item">
    </form>
</section>
