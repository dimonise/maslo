<?php
/**
 * Created by PhpStorm.
 * User: димон
 * Date: 02.11.2019
 * Time: 8:22
 */

namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\CatalogModel;
use App\Models\CabinetModel as Cabinet;


class Product extends Controller
{
    protected $request;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->locale = service('request')->getLocale();
        helper('menu');
    }

    public function index($id_prod)
    {
        $data['locale'] = $this->locale;

        $data['tree'] = menu();
        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);

        $product = new CatalogModel();

        $data['product'] = $product->showProduct($id_prod);
        $data['title'] = $data['product'][0]['product_name_' . $this->locale];


        echo view('templates/header', $data);
        echo view('product', $data);
        echo view('templates/footer', $data);
    }

    public function inCart()
    {

        if ($this->request->isAJAX()) {

            $db = \Config\Database::connect();
            $builder = $db->table('cart');

            $prodID = service('request')->getVar('id');

            $count = service('request')->getVar('count');
            $product = new CatalogModel();
            $getProductInfo = $product->showProduct($prodID);

            if (!session('id_user')) {
                $user = session_id();
            } else {
                $user = session('id_user');
            }
            $data = [
                'id_product' => $getProductInfo[0]['oem'],
                'count_product' => $count,
                'price' => $getProductInfo[0]['price'] * $count,
                'img' => $getProductInfo[0]['img'],
                'user' => $user
            ];
            //$this->session->set($data);
            $builder->insert($data);

            return json_encode($getProductInfo[0]['product_name_' . $this->locale], JSON_UNESCAPED_UNICODE);
        }

    }

    public function cart()
    {
        $data['locale'] = $this->locale;

        $data['tree'] = menu();
        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);

        $data['title'] = lang('Language.cart');

        $product = new CatalogModel();
        if (!session('id_user')) {
            $user = session_id();
        } else {
            $user = session('id_user');
        }
        $data['product'] = $product->Cart($user);
        $cabinet = new Cabinet();

        $data['oblast'] = $cabinet->getOblast();
        $data['allrayon'] = $cabinet->getRayonAll();
        echo view('templates/header', $data);
        echo view('cart', $data);
        echo view('templates/footer', $data);
    }

    public function delCart()
    {
        if ($this->request->isAJAX()) {

            $prodID = service('request')->getVar('prod_id');
            $userID = service('request')->getVar('user');

            $product = new CatalogModel();

            $product->delCart($prodID, $userID);
            return json_encode('deleted');
        }
    }
}