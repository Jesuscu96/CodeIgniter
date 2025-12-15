<section>
    <a href="<?= base_url('/') ?>">Return</a>
    <h2><?= esc($title) ?></h2>

    <?= session()->getFlashdata('error') ?>
    <?= validation_list_errors() ?>
    <?php if(!empty($categories) && is_array($categories)) : ?>
    <form action="<?= base_url('categories/update/updated/' . $categories['id']) ?>" method="post">
        <?= csrf_field() ?>

        <label for="category">Categories</label>
        <input type="input" name="category" value="<?= $categories['category'] ?>">
        
        <br>

        <input type="submit" name="submit" value="Update news item">
    </form>
    <?php endif ?>
</section>
