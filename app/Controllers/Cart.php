<?php
namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\CartModel;
use App\Controllers\Search as Search;
class Cart extends Controller{

    public $model;
    public $locale;
    public $search;

    function __construct()
    {
        $this->locale  =  service('request')->getLocale();
        $this->model = new CartModel();
        $this->search = new Search();
    }

    /*
     * Listing of cart
     */
    function index()
    {

        $data = [
            'cart' => $this->model->paginate(25),
            'pager' => $this->model->pager
        ];
        $data['search'] = $this->search->index();
        echo view('admin/header',$data);
        echo view('admin/cart/index',$data);
        echo view('admin/footer');
    }

    /*
     * Adding a new cart
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'id_product' => service('request')->getVar('id_product'),
				'count_product' => service('request')->getVar('count_product'),
				'price' => service('request')->getVar('price'),
				'img' => service('request')->getVar('img'),
				'user' => service('request')->getVar('user'),
            );
            
            $cart_id = $this->Cart_model->add_cart($params);
            redirect('cart/index');
        }
        else
        {            
            $data['_view'] = 'cart/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a cart
     */
    function edit($id_cart)
    {   
        // check if the cart exists before trying to edit it
        $data['cart'] = $this->model->get_cart($id_cart);
        $data['search'] = $this->search->index();
        if(isset($data['cart'][0]['id_cart']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'id_product' => service('request')->getVar('id_product'),
					'count_product' => service('request')->getVar('count_product'),
					'price' => service('request')->getVar('price'),
					'img' => service('request')->getVar('img'),
					'user' => service('request')->getVar('user'),
                );

                $this->model->update_cart($id_cart,$params);
                $this->index();
            }
            else
            {
                echo view('admin/header',$data);
                echo view('admin/cart/edit',$data);
                echo view('admin/footer');
            }
        }
        else
            echo'The cart you are trying to edit does not exist.';
    } 

    /*
     * Deleting cart
     */
    function remove($id_cart)
    {
        $cart = $this->Cart_model->get_cart($id_cart);

        // check if the cart exists before trying to delete it
        if(isset($cart['id_cart']))
        {
            $this->Cart_model->delete_cart($id_cart);
            redirect('cart/index');
        }
        else
            show_error('The cart you are trying to delete does not exist.');
    }
    
}
