<?php

namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\OrdersAdminModel;

class Ordersadmin extends Controller {

    public $model;
    public $locale;

    function __construct() {
        $this->locale = service('request')->getLocale();
        $this->model = new OrdersAdminModel();
        helper('menu');
    }

    /*
     * Listing of orders
     */

    function index() {
        $data = [
            'orders' => $this->model->paginate(20), //$this->model->get_all_product(),
            'pager' => $this->model->pager
        ];

        echo view('admin/header', $data);
        echo view('admin/order/index', $data);
        echo view('admin/footer');
    }

    /*
     * Adding a new order
     */

    function add() {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'id_order' => service('request')->getVar('id_order'),
                'id_user' => service('request')->getVar('id_user'),
                'name_user' => service('request')->getVar('name_user'),
                'date' => service('request')->getVar('date'),
                'address' => service('request')->getVar('address'),
                'status_ua' => service('request')->getVar('status_ua'),
                'status_ru' => service('request')->getVar('status_ru'),
                'product' => service('request')->getVar('product'),
            );

            $order_id = $this->Order_model->add_order($params);
            redirect('order/index');
        } else {
            $data['_view'] = 'order/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a order
     */

    function edit($id) {
        // check if the order exists before trying to edit it
        $data['order'] = $this->model->get_order($id);

        if (isset($data['order'][0]['id'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'id_order' => service('request')->getVar('id_order'),
                    'name_user' => service('request')->getVar('name_user'),
                    'date' => service('request')->getVar('date'),
                    'address' => service('request')->getVar('address'),
                    'status_ua' => service('request')->getVar('status_ru'),
                    'status_ru' => service('request')->getVar('status_ru'),
                    'product' => service('request')->getVar('product'),
                );

                $this->model->update_order($id, $params);
                return redirect()->to('/ordersadmin/index');
            } else {
                echo view('admin/header', $data);
                echo view('admin/order/edit', $data);
                echo view('admin/footer');
            }
        } else
            echo 'The order you are trying to edit does not exist.';
    }

    /*
     * Deleting order
     */

    function remove($id) {
        $order = $this->model->get_order($id);

        // check if the order exists before trying to delete it
        if (isset($order[0]['id'])) {
            $this->model->delete_order($id);
            return redirect()->to('/ordersadmin/index');
        } else
            echo 'The order you are trying to edit does not exist.';
    }

}
