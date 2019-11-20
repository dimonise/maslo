<?php

use App\Models\MenuModel;

function menu(){
    $model = new MenuModel();
    $cat = [];
    foreach ($model->getMenu() as $item){
        $cat[$item['id']] = $item;
    }

    return $cat;
}



function getNameCat($id)
{
    $model = new MenuModel();
    return $model->getCategory($id);
}

function getNameSubCat($id)
{
    $model = new MenuModel();
    return $model->getSubCat($id);
}

function getNameSubSubCat($id)
{
    $model = new MenuModel();
    return $model->getSubSubCat($id);
}

