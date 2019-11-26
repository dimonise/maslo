<?php

use App\Models\MenuModel;

function menu($id = null)
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
    $locale = service('request')->getLocale();
    if (is_array($data)):
        $menu = '';
        foreach ($data as $item):

            $menu .= '<div class="col-1">
                         <nav>';
            $menu .= '<ul class="topmenu">';
            $menu .= '<li class="verh">';
            $menu .= "<a href=\"/{$locale}/catalog/{$item['id']}\">";
            $menu .= $item['name_' . $locale];
            $menu .= "</a>";


            if (count($item['children']) > 0):
                $menu .= '<ul class="submenu">';
                foreach ($item['children'] as $val):

                    $menu .= '<li>';
                    $menu .= "<a href=\"/{$locale}/catalog/{$item['id']}/{$val['id']}\">";
                    $menu .= $val['name_' . $locale];
                    $menu .= "</a>";

                    if (count($val['children']) > 0):

                        $menu .= '<ul class="submenu">';
                        foreach ($val['children'] as $v):

                            $menu .= '<li>';
                            $menu .= "<a href=\"/{$locale}/catalog/{$item['id']}/{$val['id']}/{$v['id']}\">";
                            $menu .= $v['name_' . $locale];
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

/**
 * @param $data
 * Рендерим вид для админки
 */
function renderTemplateAdmin($data)
{

    if (is_array($data)):
        $menu = '';

        foreach ($data as $item):

            $menu .= '<tr>
                            <td>' . $item['id'] . '</td>
                            <td>' . $item['parent'] . '</td>
                            <td class="subtd">' . $item['name_ru'] . '</td>
                            <td class="subtd">' . $item['name_ua'] . '</td>
                            <td>
                                <a href="' . site_url('menu/edit/' . $item['id']) . '" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                <a href="' . site_url('menu/remove/' . $item['id']) . '" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                            </td>
                      </tr>';
            if (count($item['children']) > 0):

                foreach ($item['children'] as $val):

                    $menu .= '<tr class="sub">
                            <td>' . $val['id'] . '</td>
                            <td>' . $val['parent'] . '</td>
                            <td class="subtd">' . $val['name_ru'] . '</td>
                            <td class="subtd">' . $val['name_ua'] . '</td>
                            <td>
                                <a href="' . site_url('menu/edit/' . $val['id']) . '" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                <a href="' . site_url('menu/remove/' . $val['id']) . '" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                            </td>
                      </tr>';
                    if (count($val['children']) > 0):


                        foreach ($val['children'] as $v):

                            $menu .= '<tr class="subsub">
                            <td>' . $v['id'] . '</td>
                            <td >' . $v['parent'] . '</td>
                            <td class="subtd">' . $v['name_ru'] . '</td>
                            <td class="subtd">' . $v['name_ua'] . '</td>
                            <td>
                                <a href="' . site_url('menu/edit/' . $v['id']) . '" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                <a href="' . site_url('menu/remove/' . $v['id']) . '" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                            </td>
                      </tr>';
                        endforeach;

                        renderTemplate($val['children']);
                    endif;

                endforeach;
                renderTemplate($item['children']);
            endif;

        endforeach;

    endif;
    return $menu;
}