<div class="row">
    <div class="col-2"></div>
    <?php

    if (!empty($news) && is_array($news)) : ?>

        <?php foreach ($news as $news_item): ?>

            <div class="col-md-1 col-xs-2" style="text-align: center;">

                <img src="<?= $news_item['img_news'] ?>" style="width:100%;min-height:150px;max-height: 150px">
                <p class="news-date"><?= date('d-m-Y', strtotime($news_item['data']));?></p>
                <p class="title-news-color"><?= $news_item['title_news_' . $locale] ?></p>
                <p><a href="<?= '/' . $locale . '/news/' . $news_item['id_news'] ?>"><?= lang('Language.readmore');?></a></p>
            </div>


        <?php endforeach; ?>

    <?php else : ?>

        <h3>No News</h3>

        <p>Unable to find any news for you.</p>

    <?php endif ?>
    <div class="col-2"></div>
</div>
<div class="row">
    <div class="col-12">
    <?= $pager->links(); ?>
</div>
