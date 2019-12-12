<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/js/owl-carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/js/owl-carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="/js/owl-carousel/dist/owl.carousel.min.js"></script>
</head>
<body>
<div class="container-liquid">
    <div class="row header-top">
        <div class="col-4"></div>
        <div class="col-4">
            <a href="/<?= $locale; ?>"><?= lang('Language.home'); ?></a>
            <a href="/<?= $locale; ?>/catalog"><?= lang('Language.cat'); ?></a>
            <a href=""><?= lang('Language.article'); ?></a>
            <a href=""><?= lang('Language.delivery'); ?></a>
            <a href=""><?= lang('Language.contact'); ?></a>
        </div>
        <div class="col-4">
            <?php

            if (!session('name_user')) {

                echo "<a href='/" . $locale . "/login'>" . lang('Language.login') . "</a>";
                //echo "<a href='/".$locale."/login'>".lang('Language.noacc2')."</a>";
            } else {
                $user = session('name_user');
                echo lang('Language.hello') . ' ' . $user;
                echo "<a href='/".$locale."/cabinet' style='margin-left:5%;color:#10ff00'>".lang('Language.cabinet')."</a>";
                echo "<a href='/".$locale."/logout' style='margin-left:5%;color:red'>".lang('Language.logout')."</a>";
            }
            ?>
        </div>
    </div>
    <div class="row header-middle">
        <div class="col-12">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2"><a href="/<?= $locale; ?>"><img src="/img/logo_for_site.png" class="logo"></a></div>
                <div class="col-3">
                    <div style="float:left"><img src="/img/clock-white.png"></div>
                    <div style="margin-left: 45px;"><?= lang('Language.grafik-head') ?></div>
                </div>
                <div class="col-3">
                    <div style="float:left"><img src="/img/point-white.png"></div>
                    <div style="margin-left: 45px;"><?= lang('Language.grafik') ?></div>
                </div>
                <div class="col-2" style="text-align: center;">
                    <a href="#backphone" class="btn btn-success"><?= lang('Language.phone') ?></a>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
        <div class="col-12">
            <div class="row searcher">
                <div class="col-2"></div>
                <div class="col-1"></div>
                <div class="col-6">
                    <input type="text" placeholder="<?= lang('Language.search') ?>" id="search">
                    <button type="button" class="btn btn-warning"><i
                                class="fa fa-search"></i><?= lang('Language.sech') ?>
                    </button>
                </div>
                <div class="col-2" style="text-align: center;">
                    <a href="/<?= $locale; ?>/cart">
                        <img src="/img/cart.png">
                        <div class="item-cart">
                            <?php
                            $cart = new \App\Models\CatalogModel();
                            if (!session('name_user')) {
                                $user = session_id();
                            } else {
                                $user = session('name_user');
                            }
                            $item = $cart->checkCart($user);
                            echo @$item[0]['cou'];
                            ?>
                        </div>
                    </a>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </div>
    <div class="row header-bottom">
        <div class="col-1"></div>
        <?php
        echo $mmm;
        ?>
    </div>
    <?php
    $uri = service('uri', current_url(true));
    if ($uri->getSegment(2)){
    ?>
    <div class="banner">
        <h5 class="ban-title"><?= $title; ?></h5>
    </div>
<?php
}
?>