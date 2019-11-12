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
use App\Controllers\Catalog as Catalog;
use Config\Services;

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

        $data['menu'] = menuCat();
        $data['smenu'] = menuSubCat();
        $data['ssmenu'] = menuSubSubCat();

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

            if (!session('name_user')) {
                $user = session_id();
            } else {
                $user = session('name_user');
            }
            $data = [
                'id_product' => $getProductInfo[0]['oem'],
                'count_product' => $count,
                'price' => $getProductInfo[0]['price'] * $count,
                'img' => $getProductInfo[0]['img'],
                'user' => $user
            ];
            $this->session->set($data);
            $builder->insert($data);

            return json_encode(lang('Language.incart'));
        }

    }

    public function cart(){
        $data['locale'] = $this->locale;

        $data['menu'] = menuCat();
        $data['smenu'] = menuSubCat();
        $data['ssmenu'] = menuSubSubCat();

        $data['title'] = lang('Language.cart');

        $product = new CatalogModel();

        $data['product'] = $product->Cart();
        echo view('templates/header', $data);
        echo view('cart', $data);
        echo view('templates/footer', $data);
    }

    public function delCart(){
        if ($this->request->isAJAX()) {

            $prodID = service('request')->getVar('prod_id');
            $userID = service('request')->getVar('user');

            $product = new CatalogModel();

            $product->delCart($prodID,$userID);

        }
    }
}