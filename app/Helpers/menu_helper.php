<?php

use App\Models\MenuModel;

function menu()
{
    $model = new MenuModel();
    return $model->getMenu();
}

function createTree($data)
{
    $parents = [];
    foreach ($data as $key => $item):
        $parents[$item['parent']][$item['id']] = $item;
    endforeach;
    $treeElem = $parents[0];
    generateElemTree($treeElem, $parents);
    return $treeElem;
}

/**
 * @param $treeElem
 * @param $parents
 * Генерируем элементы дерева с учётом удобного вывода потомков
 */
function generateElemTree(&$treeElem, $parents)
{
    foreach ($treeElem as $key => $item):
        if (!isset($item['children'])):
            $treeElem[$key]['children'] = [];
        endif;

        if (array_key_exists($key, $parents)):
            $treeElem[$key]['children'] = $parents[$key];
            generateElemTree($treeElem[$key]['children'], $parents);
        endif;
    endforeach;
}

/**
 * @param $data
 * Рендерим вид
 */
function renderTemplate($data)
{

    if (is_array($data)):
        $menu = '';
        foreach ($data as $item):

            $menu .= '<div class="col-1">
                         <nav>';
            $menu .= '<ul class="topmenu">';
            $menu .= '<li class="verh">';
            $menu .= "<a href=\"/?=/{$item['id']}\">";
            $menu .= $item['name_ru'];
            $menu .= "</a>";


            if (count($item['children']) > 0):
                $menu .= '<ul class="submenu">';
                foreach ($item['children'] as $val):

                    $menu .= '<li>';
                    $menu .= "<a href=\"/?=/{$val['id']}\">";
                    $menu .= $val['name_ru'];
                    $menu .= "</a>";

                    if (count($val['children']) > 0):

                        d($val['children']);
                        $menu .= '<ul class="submenu">';
                        foreach ($val['children'] as $v):

                            $menu .= '<li>';
                            $menu .= "<a href=\"/?=/{$v['id']}\">";
                            $menu .= $v['name_ru'];
                            $menu .= "</a></li>";
                        endforeach;
                        $menu .= "</ul>";
                        renderTemplate($val['children']);
                    endif;
                    $menu .= "</li>";
                endforeach;
                $menu .= "</ul>";
                renderTemplate($item['children']);
            endif;
            $menu .= ' </li > ';
            $menu .= "</ul></nav></div>";
        endforeach;
    endif;
    return $menu;
}


//https://prowebmastering.ru/rekursiya-php.html