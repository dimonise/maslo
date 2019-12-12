<?php

namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\CatalogModel;

class Catalog extends Controller
{
    public $locale;
    public $model;

    public function __construct()
    {

        $this->locale = service('request')->getLocale();
        $this->model = new CatalogModel();
        helper('menu');

    }

    public function index()
    {
        $data['locale'] = $this->locale;
        $data['title'] = 'Каталог';
        $data['tree'] = menu();

        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);


        $data['last'] = $this->model->paginate(9);
        $data['pager'] = $this->model->pager;

        $data['brend'] = $this->model->getBrend();

        echo view('templates/header', $data);
        echo view('catalog', $data);
        echo view('templates/footer', $data);
    }

    public function subcat($id)
    {
        $data['locale'] = $this->locale;
        $data['title_prep'] = menu($id);
        $data['tree'] = menu();

        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);

        $data['title'] = $data['title_prep'][0]['name_' . $this->locale];
        $catalog = new CatalogModel();

        $data['last'] = $catalog->getSubCatProd($id);
        $data['brend'] = $this->model->getBrend();

        echo view('templates/header', $data);
        echo view('catalog', $data);
        echo view('templates/footer', $data);
    }

    public function subsubcat($cat, $podcat)
    {
        $data['locale'] = $this->locale;
        $data['title_prep'] = menu($podcat);
        $data['tree'] = menu();

        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);

        $data['title'] = $data['title_prep'][0]['name_' . $this->locale];
        $catalog = new CatalogModel();

        $data['last'] = $catalog->getSubSubCatProd($cat, $podcat);
        $data['brend'] = $this->model->getBrend();
        echo view('templates/header', $data);
        echo view('catalog', $data);
        echo view('templates/footer', $data);
    }

    public function subsubsubcat($cat, $podcat, $subpodcat)
    {
        $data['locale'] = $this->locale;
        $data['title_prep'] = menu($subpodcat);
        $data['tree'] = menu();

        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);
        $data['brend'] = $this->model->getBrend();
        $data['title'] = $data['title_prep'][0]['name_' . $this->locale];
        $catalog = new CatalogModel();

        $data['last'] = $catalog->getSubSubSubCatProd($cat, $podcat, $subpodcat);

        echo view('templates/header', $data);
        echo view('catalog', $data);
        echo view('templates/footer', $data);
    }


    public function search_filtr()
    {
        $data['startPrice'] = service('request')->getVar('startPrice');
        $data['finishPrice'] = service('request')->getVar('finishPrice');
        $data['filtr'] = service('request')->getVar('filtr');

        $getProductId = $this->model->getFiltr($data['filtr']);
        if ($getProductId) {
            $id = [];
            foreach ($getProductId as $item) {
                $id[] = $item['id_product'];

            }
        } else {
            $id = 0;
        }
        $getProduct = $this->model->showProductFiltr($id, $data['startPrice'], $data['finishPrice']);

        $data['locale'] = $this->locale;
        $data['title'] = 'Каталог';
        $data['tree'] = menu();

        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);

        $data['last'] = $getProduct;
        $data['pager'] = $this->model->pager;

        $data['brend'] = $this->model->getBrend();

        echo view('templates/header', $data);
        echo view('catalog', $data);
        echo view('templates/footer', $data);


    }

    public function sort(){
        $sort = service('request')->getVar('sort');
        $onpage = service('request')->getVar('onpage');

        $data=$this->model->sort($sort,$onpage);

        return json_encode($data);
    }

}