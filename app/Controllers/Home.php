<?php

namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Helpers\Menu;

class Home extends Controller
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
        $data['title'] = 'Главная';
        $data['tree'] = menu();

        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);
        echo view('templates/header',$data);
        echo view('index',$data);
        echo view('templates/footer',$data);
    }

public function admin(){
    echo view('admin/admin');
}
    //--------------------------------------------------------------------

}
