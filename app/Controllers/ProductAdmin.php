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
        $this->locale  =  service('request')->getLocale();
        $this->model = new ProductAdminModel();
        helper('menu');
    } 

    /*
     * Listing of product
     */
    function index()
    {
        $data = [
            'product' => $this->model->paginate(20),
            'pager' => $this->model->pager
        ];

        echo view('admin/header',$data);
        echo view('admin/product/index',$data);
        echo view('admin/footer');
    }

    /*
     * Adding a new product
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
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
            
            $product_id = $this->Product_model->add_product($params);
            redirect('product/index');
        }
        else
        {            
            $data['_view'] = 'product/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a product
     */
    function edit($product_id)
    {   
        // check if the product exists before trying to edit it
        $data['product'] = $this->model->get_product($product_id);
        
        if(isset($data['product'][0]['product_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
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

                $this->model->update_product($product_id,$params);
                redirect('productadmin/index');
            }
            else
            {
                $dataPCL = $this->model->get_cat_link($data['product'][0]['product_id']);

                foreach($dataPCL as $value) {
                    $data['cat'][] = menu($value['id_cat']);
                    $data['cat'][] = menu($value['id_sub_cat']);
                    if($value['id_sub_sub_cat'] != null) {
                        $data['cat'][] = menu($value['id_sub_sub_cat']);
                    }
                }
                $data['menu'] = menu();
                echo view('admin/header',$data);
                echo view('admin/product/edit',$data);
                echo view('admin/footer');
            }
        }
        else
            echo 'The product you are trying to edit does not exist.';
    } 

    /*
     * Deleting product
     */
    function remove($product_id)
    {
        $product = $this->Product_model->get_product($product_id);

        // check if the product exists before trying to delete it
        if(isset($product['product_id']))
        {
            $this->Product_model->delete_product($product_id);
            redirect('product/index');
        }
        else
            show_error('The product you are trying to delete does not exist.');
    }
    
}
