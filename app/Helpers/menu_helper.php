<?php

use App\Models\MenuModel;

function menuCat()
{
    $model = new MenuModel();
    return $model->getCategory();
}

function menuSubCat()
{
    $model = new MenuModel();
    return $model->getSubCat();
}

function menuSubSubCat()
{
    $model = new MenuModel();
    return $model->getSubSubCat();
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

