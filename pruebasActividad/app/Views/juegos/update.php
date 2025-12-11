<section>
    <a href="<?= base_url('/') ?>">Return</a>
    <h2><?= esc($title) ?></h2>

    <?= session()->getFlashdata('error') ?>
    <?= validation_list_errors() ?>
    <?php if(!empty($juegos) && is_array($juegos)) : ?>
    <form action="<?= base_url('juegos/update/updated/' . $juegos['id']) ?>" method="post">
        <?= csrf_field() ?>

        <label for="nombre">Juegos</label>
        <input type="input" name="nombre" value="<?= $juegos['nombre'] ?>">
        
        <br>

        <input type="submit" name="submit" value="Update juegos item">
    </form>
    <?php endif ?>
</section>
