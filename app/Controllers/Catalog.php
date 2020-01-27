<?php

namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\CatalogModel;
use App\Controllers\Search as Search;
use App\Models\ContactModel;

class Catalog extends Controller {

    public $locale;
    public $model;
    public $search;
    public $contact;

    public function __construct() {

        $this->locale = service('request')->getLocale();
        $this->model = new CatalogModel();
        $this->search = new Search();
        $this->contact = new ContactModel();
        helper('menu');
    }

    public function index() {
        $data['locale'] = $this->locale;
        $data['title'] = 'Каталог';
        $data['tree'] = menu();

        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);
        $data['search'] = $this->search->index();

        $data['last'] = $this->model->paginate(2);
        $data['pager'] = $this->model->pager;
        $data['contact'] = $this->contact->index();
        $data['brend'] = $this->model->getBrendCat();

        echo view('templates/header', $data);
        echo view('catalog', $data);
        echo view('templates/footer', $data);
    }

    public function subcat($id) {
        $data['locale'] = $this->locale;
        $data['title_prep'] = menu($id);
        $data['tree'] = menu();

        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);

        $data['title'] = $data['title_prep'][0]['name_' . $this->locale];
        $catalog = new CatalogModel();
        $data['search'] = $this->search->index();
        $data['last'] = $catalog->getSubCatProd($id);
        $data['brend'] = $this->model->getBrend($id);
        $data['contact'] = $this->contact->index();
        echo view('templates/header', $data);
        echo view('catalog', $data);
        echo view('templates/footer', $data);
    }

    public function subsubcat($cat, $podcat) {
        $data['locale'] = $this->locale;
        $data['title_prep'] = menu($podcat);
        $data['tree'] = menu();

        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);
        $data['search'] = $this->search->index();
        $data['title'] = $data['title_prep'][0]['name_' . $this->locale];
        $catalog = new CatalogModel();
        $data['contact'] = $this->contact->index();
        $data['last'] = $catalog->getSubSubCatProd($cat, $podcat);
        $data['brend'] = $this->model->getBrend($cat);
        echo view('templates/header', $data);
        echo view('catalog', $data);
        echo view('templates/footer', $data);
    }

    public function subsubsubcat($cat, $podcat, $subpodcat) {
        $data['locale'] = $this->locale;
        $data['title_prep'] = menu($subpodcat);
        $data['tree'] = menu();
        $data['contact'] = $this->contact->index();
        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);
        $data['brend'] = $this->model->getBrend($cat);
        $data['title'] = $data['title_prep'][0]['name_' . $this->locale];
        $catalog = new CatalogModel();
        $data['search'] = $this->search->index();
        $data['last'] = $catalog->getSubSubSubCatProd($cat, $podcat, $subpodcat);

        echo view('templates/header', $data);
        echo view('catalog', $data);
        echo view('templates/footer', $data);
    }

    public function search_filtr() {

        $start = service('request')->getVar('startPrice');
        $finish = service('request')->getVar('finishPrice');
        $price = service('request')->getVar('price');
        $data['filtr'] = service('request')->getVar('filtr');
        $data['search'] = $this->search->index();
        $data['contact'] = $this->contact->index();
        $getProductId = $this->model->getFiltr($data['filtr']);

        if ($getProductId) {
            $id = [];
            foreach ($getProductId as $item) {
                $id[] = $item['id_product'];
            }
        } else {
            $id = 0;
        }
        if (!isset($price)) {
            $start = null;
            $finish = null;
        }
        $getProduct = $this->model->showProductFiltr($id, $start, $finish);

        $data['startPrice'] = service('request')->getVar('startPrice');
        $data['finishPrice'] = service('request')->getVar('finishPrice');


        $data['locale'] = $this->locale;
        $data['title'] = 'Каталог';
        $data['tree'] = menu();

        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);

        $data['last'] = $getProduct;
        $data['pager'] = $this->model->pager;

        $data['brend'] = $this->model->getBrendCat();

        echo view('templates/header', $data);
        echo view('catalog', $data);
        echo view('templates/footer', $data);
    }

    public function sort() {
        $sort = service('request')->getVar('sort');
        $onpage = service('request')->getVar('onpage');

        $data = $this->model->sort($sort, $onpage);

        return json_encode($data);
    }

    public function search() {
        $prod = service('request')->getVar('id');

        $data['locale'] = $this->locale;


        $product = new CatalogModel();

        $dataId = $product->showProductSearch($prod, $data['locale']);
        $url = '/' . $data['locale'] . '/product/' . $dataId[0]['product_id'];


        echo json_encode($url);
    }

}
