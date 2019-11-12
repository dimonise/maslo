<h2><?= $title ?></h2>

<?php if (! empty($news) && is_array($news)) : ?>

    <?php foreach ($news as $news_item): ?>

        <h3><?= $news_item['title_news_'.$locale] ?></h3>
<?= $locale?>
        <div class="main">
            <?= $news_item['text_news_'.$locale] ?>
        </div>
        <p><a href="<?= '/'.$locale.'/news/'.$news_item['id_news'] ?>">View article</a></p>

    <?php endforeach; ?>

<?php else : ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>