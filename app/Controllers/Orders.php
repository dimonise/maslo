<?php


namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\OrdersModel;
use App\Controllers\Search as Search;

class Orders extends Controller
{
    public $locale;
    public $model;
    public $search;

    public function __construct()
    {

        $this->locale = service('request')->getLocale();
        $this->model = new OrdersModel();
        $this->search = new Search();
        helper('menu');

    }

    public function index()
    {
        $data['locale'] = $this->locale;
        $data['title'] = lang('Language.cabinet');
        $data['tree'] = menu();

        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);


    }

    public function confirm($id_user)
    {
        $data['locale'] = $this->locale;
        $data['title'] = lang('Language.orders');
        $data['tree'] = menu();

        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);

        $oblast = $this->model->getOblast(service('request')->getVar('region'));
        $rayon = $this->model->getRayon(service('request')->getVar('rayon'));
        $city = service('request')->getVar('city');
        $punkt = service('request')->getVar('address');
        $product = $this->model->getCart($id_user);

        $prod = '';
        foreach ($product as $val) {
            $prod .= $val['id_product'] . "({$val['count_product']} шт.), ";
        }

        if (service('request')->getVar('deliv') == 'NP'):
            $params = [
                'id_order' => 1,
                'id_user' => $id_user,
                'name_user' => service('request')->getVar('name_user').' '.service('request')->getVar('sname_user'),
                'product' => $prod,
                'address' => $oblast[0]['name'] . ', ' . $rayon[0]['rayon'] . ', ' . $city . ' №' . $punkt
            ];
        else:
            $params = [
                'id_order' => 1,
                'id_user' => $id_user,
                'name_user' => service('request')->getVar('name_user_sam').' '.service('request')->getVar('sname_user_sam'),
                'product' => $prod,
                'address' => 'Заберу сам'
            ];
        endif;
        $data['order'] = $this->model->confirm($id_user, $params);
        $data['search'] = $this->search->index();

        echo view('templates/header', $data);
        echo view('order', $data);
        echo view('templates/footer', $data);
    }
}