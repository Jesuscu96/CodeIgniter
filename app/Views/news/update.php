<section>
    <a href="<?= base_url('/') ?>">Return</a>
    <h2><?= esc($title) ?></h2>

    <?= session()->getFlashdata('error') ?>
    <?= validation_list_errors() ?>
    <?php if(!empty($news) && is_array($news)) : ?>
    <form action="<?= base_url('news/update/updated/' . $news['id']) ?>" method="post">
        <?= csrf_field() ?>

        <label for="title">Title</label>
        <input type="input" name="title" value="<?= $news['title'] ?>">
        <br>

        <label for="body">Text</label>
        <textarea name="body" cols="45" rows="4"><?= $news['body'] ?></textarea>
        <br>

        <input type="submit" name="submit" value="Create news item">
    </form>
    <?php endif ?>
</section>
