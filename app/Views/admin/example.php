<!DOCTYPE html>
<html>
<head>
    <title>Администратор</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/skin/css/adm.css" type="text/css" rel="stylesheet">
    <?php
    foreach ($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>"/>
    <?php endforeach; ?>
    <?php foreach ($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
</head>
<body>

<div class="adm_menu">

    <a href='<?php echo site_url('/admin/cards') ?>'>Объявления</a>
    <a href='<?php echo site_url('/admin/user') ?>'>Пользователи</a>
    <a href='<?php echo site_url('/admin/about') ?>'>О нас</a>
    <a href='<?php echo site_url('/admin/contact') ?>'>Контакты</a>
    <a href='<?php echo site_url('/admin/news') ?>'>Новости</a>
    <a href='<?php echo site_url('/admin/service') ?>'>Услуги</a>
    <a href='<?php echo site_url('/admin/rules') ?>'>Правила пользования</a>
    <a href='<?php echo site_url('/admin/sale') ?>'>Продажа</a>
    <a href='<?php echo site_url('/admin/rent') ?>'>Аренда</a>
    <a href='<?php echo site_url('/admin/adver') ?>'>Реклама</a>
    <a href='<?php echo site_url('/admin/vakancy') ?>'>Вакансии</a>
    <a href='<?php echo site_url('/admin/loyer') ?>'>Юр.услуги</a>
    <a href='<?php echo site_url('/admin/expert') ?>'>Экспертная проверка</a>
    <a href='<?php echo site_url('/admin/confidence') ?>'>Политика конфиденциальности</a>
    <a href='<?php echo site_url('/admin/checking') ?>'>Оценка</a>
    <a href='<?php echo site_url('/admin/guard') ?>'>Страховка</a>
    <a href='<?php echo site_url('/admin/review') ?>'>Отзывы</a>
    <a href='<?php echo site_url('/admin/partners') ?>'>Партнеры</a>
    <a href='<?php echo site_url('/admin/seo') ?>'>SEO</a>
    <a href='<?php echo site_url('/admin/hometext') ?>'>Текст на главной</a>
    <a href='<?php echo site_url('/admin/adv_index') ?>'>Реклама на главной</a>
    <a href='<?php echo site_url('/admin/adv_search') ?>'>Реклама на поисковой</a>
    <a href='<?php echo site_url('/admin/adv_card') ?>'>Реклама на Объявлении</a>
    <a href='<?php echo site_url('/admin/adv_about') ?>'>Реклама на "О нас"</a>
    <a href='<?php echo site_url('/admin/adv_news') ?>'>Реклама на Новости</a>
    <a href='<?php echo site_url('/admin/adv_rews') ?>'>Реклама на Отзывы</a>
    <a href='<?php echo site_url('/admin/adv_serv') ?>'>Реклама на Услуги</a>
    <a href='<?php echo site_url('/admin/top_price') ?>'>Цены на ТОП и Рекомендовано Арендатор</a>
    <a href='<?php echo site_url('/admin/top_price_aren') ?>'>Цены на ТОП и Рекомендовано Арендодатель</a>
    <a href='<?php echo site_url('/admin/manager') ?>'>Менеджеры</a>
    <a href='<?php echo site_url('/admin/rielter') ?>'>Риелтеры</a>


    <a href='<?php echo site_url('/auth/logout') ?>'>Выход на сайт</a>
</div>
<?php
echo $output;
?>
</body>
</html>