<section>
    <a href="<?= base_url('/') ?>">Return</a>
    <h2><?= esc($title) ?></h2>

    <?= session()->getFlashdata('error') ?>
    <?= validation_list_errors() ?>

    <form action="<?= base_url('category') ?>" method="post">
        <?= csrf_field() ?>

        <label for="title">Categoty</label>
        <input type="input" name="category" value="<?= set_value('category') ?>">
        <br>

        <input type="submit" name="submit" value="Create news item">
    </form>
</section>
