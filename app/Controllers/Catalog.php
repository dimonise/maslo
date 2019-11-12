<?php

namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\CatalogModel;

class Catalog extends Controller
{
    public $locale;


    public function __construct()
    {

        $this->locale  =  service('request')->getLocale();
        helper('menu');

    }

    public function index()
    {
        $data['locale'] = $this->locale;
        $data['title'] = 'Каталог';
        $data['menu'] = menuCat();
        $data['smenu'] = menuSubCat();
        $data['ssmenu'] = menuSubSubCat();

        $catalog = new CatalogModel();
        $data['last'] = $catalog->getLastNine();

        echo view('templates/header',$data);
        echo view('catalog',$data);
        echo view('templates/footer',$data);
    }

    public function subcat($id){
        $data['locale'] = $this->locale;
        $data['title_prep'] = getNameSubCat($id);
        $data['menu'] = menuCat();
        $data['smenu'] = menuSubCat();
        $data['ssmenu'] = menuSubSubCat();
        $data['title'] = $data['title_prep'][0]['sub_name_'.$this->locale];
        $catalog = new CatalogModel();

        $data['last'] = $catalog->getSubCatProd($id);

        echo view('templates/header',$data);
        echo view('catalog',$data);
        echo view('templates/footer',$data);
    }

    public function subsubcat($id_sub,$id_sub_sub){
        $data['locale'] = $this->locale;
        $data['title_prep'] = getNameSubSubCat($id_sub_sub);
        $data['menu'] = menuCat();
        $data['smenu'] = menuSubCat();
        $data['ssmenu'] = menuSubSubCat();
        $data['title'] = $data['title_prep'][0]['name_sub_sub_'.$this->locale];
        $catalog = new CatalogModel();

        $data['last'] = $catalog->getSubSubCatProd($id_sub,$id_sub_sub);

        echo view('templates/header',$data);
        echo view('catalog',$data);
        echo view('templates/footer',$data);
    }
    //--------------------------------------------------------------------

}