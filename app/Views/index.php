<div class="row slider">
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="img-fluid" src="/img/slide1.png" alt="...">
            </div>
            <div class="carousel-item">
                <img class="img-fluid" src="/img/slide2.png" alt="...">
            </div>
        </div>
    </div>
</div>
<div class="row static-adv">
    <div class="col-md-2 offset-1"><img src="/img/stab.png"></div>
    <div class="col-md-2"><img src="/img/best-price.png"></div>
    <div class="col-md-2"><img src="/img/quality.png"></div>
    <div class="col-md-2"><img src="/img/price.png"></div>
    <div class="col-md-2"><img src="/img/trust.png"></div>
</div>

<div class="row">
    <div class="col-md-11 offset-1">
        <h4><?= lang('Language.sale') ?></h4>
        <div id="carousel" class="sale slide" data-ride="carousel">
            <div class="owl-carousel owl-theme rekomms">
                <?php

                foreach ($akc as $item) {
                    ?>
                    <div class="item">
                        <a href="/<?= $locale; ?>/product/<?= $item['product_id'] ?>">
                            <img class="img-fluid scroller" src="<?= $item['img']; ?>"
                                 alt="<?= $item['product_name_' . $locale] ?>"><br>
                            <span><?= $item['product_name_' . $locale] ?></span>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="row link">
    <div class="button-cat">
        <a href="/<?= $locale ?>/catalog"><h6>ПЕРЕЙТИ В КАТАЛОГ</h6></a>
    </div>
</div>
<div class="row">
    <div class="col-md-12"></div>
</div>
<div class="row">
    <div class="col-md-12 how-it">
        <img src="/img/how-it-works.png">
    </div>
</div>
<div class="row">
    <div class="col-md-11 offset-1">
        <h4><?= lang('Language.rekomm') ?></h4>
        <div id="carousel" class="rekomm slide" data-ride="carousel">
            <div class="owl-carousel owl-theme rekomms">
                <?php

                foreach ($rekomm as $item) {
                    ?>
                    <div class="item">
                        <a href="/<?= $locale; ?>/product/<?= $item['product_id'] ?>">
                            <img class="img-fluid scroller" src="<?= $item['img']; ?>"
                                 alt="<?= $item['product_name_' . $locale] ?>"><br>
                            <span><?= $item['product_name_' . $locale] ?></span>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 manufacture-title"><h4><?= lang('Language.manufacture') ?></h4></div>
</div>
<div class="row manufacture">
    <div class="col-md-2"></div>
    <div class="col-md-2"><img src="/img/manufacture/bizol.png"></div>
    <div class="col-md-2"><img src="/img/manufacture/aral.png"></div>
    <div class="col-md-2"><img src="/img/manufacture/castrol.png"></div>
    <div class="col-md-2"><img src="/img/manufacture/elf.png"></div>
</div>
<div class="row manufacture">
    <div class="col-md-2"></div>
    <div class="col-md-2"><img src="/img/manufacture/bizol.png"></div>
    <div class="col-md-2"><img src="/img/manufacture/aral.png"></div>
    <div class="col-md-2"><img src="/img/manufacture/castrol.png"></div>
    <div class="col-md-2"><img src="/img/manufacture/elf.png"></div>
</div>
<div class="row manufacture ">
    <div class="col-md-2"></div>
    <div class="col-md-2"><img src="/img/manufacture/bizol.png"></div>
    <div class="col-md-2"><img src="/img/manufacture/aral.png"></div>
    <div class="col-md-2"><img src="/img/manufacture/castrol.png"></div>
    <div class="col-md-2"><img src="/img/manufacture/elf.png"></div>
</div>
<div class="row">
    <div class="col-md-12 last"></div>
</div>
<div class="row news">
    <div class="col-md-12 news-title"><h4><?= lang('Language.news-title') ?></h4></div>

    <div class="row news-item">
        <div class="col-md-2"></div>

        <?php
        foreach ($lastn as $lnews):
            ?>
            <div class="col-md-2">
                <a href="<?= $locale ?>/news/<?= $lnews['id_news'] ?>" style="text-decoration: none">
                    <img src="<?= $lnews['img_news']; ?>">
                    <p class="news-date"><?= $lnews['data']; ?></p>
                    <p class="title-news"><?= $lnews['title_news_' . $locale]; ?></p>
                    <p class="body-news"><?= mb_strimwidth($lnews['text_news_' . $locale],0,50,'...', 'UTF-8'); ?></p>
                </a>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-11 offset-1">
        <h4><?= lang('Language.new') ?></h4>
        <div id="carousel" class="new slide" data-ride="carousel">
            <div class="owl-carousel owl-theme rekomms">
                <?php

                foreach ($last as $item) {
                    ?>
                    <div class="item">
                        <a href="/<?= $locale; ?>/product/<?= $item['product_id'] ?>">
                            <img class="img-fluid scroller" src="<?= $item['img']; ?>"
                                 alt="<?= $item['product_name_' . $locale] ?>"><br>
                            <span><?= $item['product_name_' . $locale] ?></span>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-10 about-title"><h4><?= lang('Language.about') ?></h4></div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-7 about-body">
        <p><?= $about[0]['text_stat_'.$locale]; ?></p>
    </div>
    <div class="col-md-3">
        <img src="/img/about.png">
    </div>
</div>
