<?php
namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\CategoryModel;
 
class Category extends Controller
{

    public $model;
    public $locale;

    function __construct()
    {
        $this->locale  =  service('request')->getLocale();
        $this->model = new CategoryModel();
    }
    /*
     * Listing of category
     */
    function index()
    {
        $data = [
            'category' => $this->model->paginate(20),
            'pager' => $this->model->pager
        ];

        echo view('admin/header',$data);
        echo view('admin/category/index',$data);
        echo view('admin/footer');
    }

    /*
     * Adding a new category
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'name_cat_ru' => service('request')->getVar('name_cat_ru'),
				'desc_cat_ru' => service('request')->getVar('desc_cat_ru'),
				'name_cat_ua' => service('request')->getVar('name_cat_ua'),
				'desc_cat_ua' => service('request')->getVar('desc_cat_ua'),
            );
            
            $category_id = $this->model->add_category($params);
            return redirect()->to('/category/index');
        }
        else
        {
            echo view('admin/header');
            echo view('admin/category/add');
            echo view('admin/footer');
        }
    }  

    /*
     * Editing a category
     */
    function edit($id_cat)
    {   
        // check if the category exists before trying to edit it
        $data['category'] = $this->model->get_category($id_cat);

        if(isset($data['category'][0]['id_cat']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'name_cat_ru' => service('request')->getVar('name_cat_ru'),
					'desc_cat_ru' => service('request')->getVar('desc_cat_ru'),
					'name_cat_ua' => service('request')->getVar('name_cat_ua'),
					'desc_cat_ua' => service('request')->getVar('desc_cat_ua'),
                );

                $this->model->update_category($id_cat,$params);
                $this->index();
            }
            else
            {
                echo view('admin/header');
                echo view('admin/category/edit',$data);
                echo view('admin/footer');
            }
        }
        else
            echo'The category you are trying to edit does not exist.';
    } 

    /*
     * Deleting category
     */
    function remove($id_cat)
    {
        $category = $this->model->get_category($id_cat);

        // check if the category exists before trying to delete it
        if(isset($category[0]['id_cat']))
        {
            $this->model->delete_category($id_cat);
            return redirect()->to('/category/index');
        }
        else
            echo'The category you are trying to delete does not exist.';
    }
    
}
