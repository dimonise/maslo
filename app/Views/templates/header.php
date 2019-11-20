<!DOCTYPE html>
<html>
<head>
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

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
                echo lang('Language.hello') . ' ' . strtoupper(session('name_user'));
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
                            $item = $cart->checkCart(session('id_product'));
                            echo $item[0]['cou'];
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
        function Process_Array($arr, $depth) {
            $retVal = '<div class="col-1">
                            <nav>
                                <ul class="topmenu">';

            foreach($arr as $k => $v) {
                for($i = 0; $i < $depth; $i++)
                    $retVal .= '&nbsp;&nbsp;';
                $retVal .= '<li class="verh"><a href="/catalog/' . $k . '" >' . @$v['name_ru'] . '</a>';

                if(is_array($v)) {
                    $retVal .= '<ul class="submenu"><li>' . Process_Array($v, $depth + 1) . '</li></ul>';
                }
                else {
                    $retVal .= '<li>' . $v . '</li>';
                }
            }
            $retVal .= '</li>
                           </ul>
                         </nav>
                       </div>';
            return $retVal;
        }





        function getTree($dataset)
        {
            $tree = array();

            foreach ($dataset as $id => &$node) {
                //Если нет вложений

                if (!$node['parent']) {

                    $tree[$id] = &$node;
                } else {
                    //Если есть потомки то перебераем массив
                    $dataset[$node['parent']]['childs'][$id] = &$node;
                }
            }
            return $tree;
        }

        $tree = getTree($menu);
        echo Process_Array($tree, 0);
//
//        //Шаблон для вывода меню в виде дерева
//        function tplMenu($category,$locale)
//        {
//
//            $menus = '<div class="col-1">
//                        <nav>
//                           <ul class="topmenu">';
//            echo $category['parent'];
//            //if($category['parent'] == 0) {
//                $menus .= '
//                                <li class="verh">
//                                    <a href="/'.$locale.'/catalog/' . $category['id'] . '" >' . $category['name_ru'] . '</a>';
//            //}
//
//                if (isset($category['childs'])) {
//
//                    $menus .= '<ul class="submenu"><li><a href="/catalog/">' . showCat($category['childs'],$locale) . '</a></li></ul>';
//
//                }
//
//                $menus .= '        </li>
//                            </ul>
//                          </nav>
//                        </div>';
//
//            return $menus;
//        }
//
//        /**
//         * Рекурсивно считываем наш шаблон
//         **/
//        function showCat($data,$locale)
//        {
//            $string = '';
//            if(!empty($data)) {
//                foreach ($data as $item) {
//                    $string .= tplMenu($item, $locale);
//                }
//
//                return $string;
//            }
//            else{
//                return false;
//            }
//
//        }
//
//        //Получаем HTML разметку
//        $cat_menu = showCat($tree,$locale);
//
//        //Выводим на экран
//        echo $cat_menu;

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