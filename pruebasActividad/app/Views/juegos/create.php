<section>
    <a href="<?= base_url('juegos') ?>">Return</a>
    <h2><?= esc($title) ?></h2>

    <?= session()->getFlashdata('error') ?>
    <?= validation_list_errors() ?>

    <form action="<?= base_url('juegos/create') ?>" method="post">
        <?= csrf_field() ?>

        <label for="nombre">Juegos</label>
        <input type="input" name="nombre" value="<?= set_value('nombre') ?>">
        <br>

        <input type="submit" name="submit" value="Create news item">
    </form>
</section>
