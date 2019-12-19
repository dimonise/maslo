<?php

namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Helpers\Menu;
use App\Models\CatalogModel;
use App\Controllers\Search as Search;

class Home extends Controller
{
     public $locale;
     public $search;


    public function __construct()
    {

        $this->locale  =  service('request')->getLocale();
        $this->search = new Search();
        helper('menu');

    }

    public function index()
    {

        $data['locale'] = $this->locale;
        $data['title'] = 'Главная';
        $data['tree'] = menu();

        $data['search'] = $this->search->index();

        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);
        //recomm
        $rekomm = new CatalogModel();
        $data['rekomm'] = $rekomm->getRekomm();
        $data['last'] = $rekomm->getLastNine();
        $data['akc'] = $rekomm->getAkc();


        echo view('templates/header',$data);
        echo view('index',$data);
        echo view('templates/footer',$data);
    }

public function admin(){
    echo view('admin/admin');
}
    //--------------------------------------------------------------------

}
