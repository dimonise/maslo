<?php

namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\ProductAdminModel;

class ProductAdmin extends Controller
{

    public $model;
    public $locale;

    function __construct()
    {
        $this->locale = service('request')->getLocale();
        $this->model = new ProductAdminModel();
        helper('menu');
    }

    /*
     * Listing of product
     */
    function index()
    {
        $data = [
            'product' => $this->model->get_all_product(),
            'pager' => $this->model->pager
        ];

        echo view('admin/header', $data);
        echo view('admin/product/index', $data);
        echo view('admin/footer');
    }

    /*
     * Adding a new product
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'oem' => service('request')->getVar('oem'),
                'product_name_ua' => service('request')->getVar('product_name_ua'),
                'product_name_ru' => service('request')->getVar('product_name_ru'),
                'product_key_ua' => service('request')->getVar('product_key_ua'),
                'product_key_ru' => service('request')->getVar('product_key_ru'),
                'price' => service('request')->getVar('price'),
                'date_add' => service('request')->getVar('date_add'),
                'warhouse' => service('request')->getVar('warhouse'),
                'product_desc_ua' => service('request')->getVar('product_desc_ua'),
                'product_desc_ru' => service('request')->getVar('product_desc_ru'),
            );

            $cat = [
                'id_cat' => service('request')->getVar('category'),
                'id_sub_cat' => service('request')->getVar('sub_cat'),
                'id_sub_sub_cat' => service('request')->getVar('sub_sub_cat'),
            ];

            $product_id = $this->model->add_product($params);
            $product_id = $this->model->add_product_link($cat);
            return redirect()->to('productadmin/index');
        } else {
            $data['_view'] = 'product/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a product
     */
    function edit($product_id)
    {
        // check if the product exists before trying to edit it
        $data['product'] = $this->model->get_product($product_id);
        $data['spec'] = $this->model->get_all_specifications();
        $data['spec_sel'] = $this->model->all_specifications();

        if (isset($data['product'][0]['product_id'])) {
            if (isset($_POST) && count($_POST) > 0) {

                //product table
                $params = array(
                    'oem' => service('request')->getVar('oem'),
                    'product_name_ua' => service('request')->getVar('product_name_ua'),
                    'product_name_ru' => service('request')->getVar('product_name_ru'),
                    'product_key_ua' => service('request')->getVar('product_key_ua'),
                    'product_key_ru' => service('request')->getVar('product_key_ru'),
                    'price' => service('request')->getVar('price'),
                    'warhouse' => service('request')->getVar('warhouse'),
                    'product_desc_ua' => service('request')->getVar('product_desc_ua'),
                    'product_desc_ru' => service('request')->getVar('product_desc_ru'),
                );

                $this->model->update_product($product_id, $params);

                //product -> menu link
                $cat = [
                    'id_cat' => service('request')->getVar('category'),
                    'id_sub_cat' => service('request')->getVar('sub_cat'),
                    'id_sub_sub_cat' => service('request')->getVar('sub_sub_cat'),
                ];
                $this->model->update_product_link($product_id, $cat);

                //product specification's
                dd(service('request')->getVar('spec'));
//                $har = [
//                    'id_cat' => service('request')->getVar('category'),
//                    'id_sub_cat' => service('request')->getVar('sub_cat'),
//                    'id_sub_sub_cat' => service('request')->getVar('sub_sub_cat'),
//                ];


                return redirect()->to('/productadmin/index');
            } else {
                $dataPCL = $this->model->get_cat_link($data['product'][0]['product_id']);

                foreach ($dataPCL as $value) {
                    $data['cat'][] = menu($value['id_cat']);
                    $data['cat'][] = menu($value['id_sub_cat']);
                    if ($value['id_sub_sub_cat'] != null) {
                        $data['cat'][] = menu($value['id_sub_sub_cat']);
                    }
                }
                $data['menu'] = menu();
                echo view('admin/header', $data);
                echo view('admin/product/edit', $data);
                echo view('admin/footer');
            }
        } else
            echo 'The product you are trying to edit does not exist.';
    }

    /*
     * Deleting product
     */
    function remove($product_id)
    {
        $product = $this->Product_model->get_product($product_id);

        // check if the product exists before trying to delete it
        if (isset($product['product_id'])) {
            $this->Product_model->delete_product($product_id);
            redirect('product/index');
        } else
            show_error('The product you are trying to delete does not exist.');
    }

    function sel_spec()
    {
        $id = service('request')->getVar('spec');
        $data = $this->model->get_spec_val($id);

        return json_encode($data);
    }

    function savehar()
    {
        $name = service('request')->getVar('name');
        $idprod = service('request')->getVar('prod');
        $data = ['id_product'=>$idprod, 'id_feature'=>$name];
        $this->model->save_har_for_prod($data);
        return;

    }
}
