<?php

use App\Models\MenuModel;

function menu($id=null)
{
    $model = new MenuModel();
    return $model->getMenu($id);
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
    $locale  =  service('request')->getLocale();
    if (is_array($data)):
        $menu = '';
        foreach ($data as $item):

            $menu .= '<div class="col-1">
                         <nav>';
            $menu .= '<ul class="topmenu">';
            $menu .= '<li class="verh">';
            $menu .= "<a href=\"/{$locale}/catalog/{$item['id']}\">";
            $menu .= $item['name_'.$locale];
            $menu .= "</a>";


            if (count($item['children']) > 0):
                $menu .= '<ul class="submenu">';
                foreach ($item['children'] as $val):

                    $menu .= '<li>';
                    $menu .= "<a href=\"/{$locale}/catalog/{$val['id']}\">";
                    $menu .= $val['name_'.$locale];
                    $menu .= "</a>";

                    if (count($val['children']) > 0):

                        $menu .= '<ul class="submenu">';
                        foreach ($val['children'] as $v):

                            $menu .= '<li>';
                            $menu .= "<a href=\"/{$locale}/catalog/{$v['id']}\">";
                            $menu .= $v['name_'.$locale];
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

