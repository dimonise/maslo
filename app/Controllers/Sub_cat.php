<?php
namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\Sub_catModel;
use App\Models\CategoryModel;

class Sub_cat extends Controller
{
    public $model;
    public $locale;

    function __construct()
    {
        $this->locale  =  service('request')->getLocale();
        $this->model = new Sub_catModel();
    }

    /*
     * Listing of sub_cat
     */
    function index()
    {
        $data = [
            'sub_cat' => $this->model->paginate(20),
            'pager' => $this->model->pager
        ];

        echo view('admin/header',$data);
        echo view('admin/sub_cat/index',$data);
        echo view('admin/footer');
    }

    /*
     * Adding a new sub_cat
     */
    function add()
    {
        if(isset($_POST) && count($_POST) > 0)
        {
            $params = array(
                'id_cat' => service('request')->getVar('id_cat'),
                'sub_name_ua' => service('request')->getVar('sub_name_ua'),
                'sub_name_ru' => service('request')->getVar('sub_name_ru'),
                'sub_key_ua' => service('request')->getVar('sub_key_ua'),
                'sub_key_ru' => service('request')->getVar('sub_key_ru'),
                'sub_desc_ua' => service('request')->getVar('sub_desc_ua'),
                'sub_desc_ru' => service('request')->getVar('sub_desc_ru'),
            );

            $sub_cat_id = $this->model->add_sub_cat($params);
            return redirect()->to('/sub_cat/index');
        }
        else
        {
            $catmodel = new CategoryModel();
            $data['all_category'] = $catmodel->get_all_category();

            echo view('admin/header',$data);
            echo view('admin/sub_cat/add',$data);
            echo view('admin/footer');
        }
    }

    /*
     * Editing a sub_cat
     */
    function edit($id_sub)
    {
        // check if the sub_cat exists before trying to edit it
        $data['sub_cat'] = $this->Sub_cat_model->get_sub_cat($id_sub);

        if(isset($data['sub_cat']['id_sub']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
                    'id_cat' => service('request')->getVar('id_cat'),
                    'sub_name_ua' => service('request')->getVar('sub_name_ua'),
                    'sub_name_ru' => service('request')->getVar('sub_name_ru'),
                    'sub_key_ua' => service('request')->getVar('sub_key_ua'),
                    'sub_key_ru' => service('request')->getVar('sub_key_ru'),
                    'sub_desc_ua' => service('request')->getVar('sub_desc_ua'),
                    'sub_desc_ru' => service('request')->getVar('sub_desc_ru'),
                );

                $this->Sub_cat_model->update_sub_cat($id_sub,$params);
                return redirect()->to('/sub_cat/index');
            }
            else
            {
                $this->load->model('Category_model');
                $data['all_category'] = $this->Category_model->get_all_category();

                $data['_view'] = 'sub_cat/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            echo'The sub_cat you are trying to edit does not exist.';
    }

    /*
     * Deleting sub_cat
     */
    function remove($id_sub)
    {
        $sub_cat = $this->Sub_cat_model->get_sub_cat($id_sub);

        // check if the sub_cat exists before trying to delete it
        if(isset($sub_cat['id_sub']))
        {
            $this->Sub_cat_model->delete_sub_cat($id_sub);
            return redirect()->to('/sub_cat/index');
        }
        else
            echo'The sub_cat you are trying to delete does not exist.';
    }

}
