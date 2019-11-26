<?php
namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\MenuModel;

class Menu extends Controller
{

    public $model;
    public $locale;

    function __construct()
    {
        $this->locale  =  service('request')->getLocale();
        $this->model = new MenuModel();
        helper('menu');
    }
    /*
     * Listing of menu
     */
    function index()
    {
        $data = [
            'items' => $this->model->paginate(20),
            'pager' => $this->model->pager
        ];

        $data['tree'] = menu();

        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplateAdmin($tree);

        echo view('admin/header',$data);
        echo view('admin/menu/index',$data);
        echo view('admin/footer');
    }

    /*
     * Adding a new menu
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'parent' => service('request')->getVar('parent'),
				'name_ru' => service('request')->getVar('name_ru'),
				'name_ua' => service('request')->getVar('name_ua'),
            );
            
            $menu_id = $this->model->add_menu($params);
            return redirect()->to('/menu/index');
        }
        else
        {			$data['all_menu'] = $this->model->get_all_menu();

            echo view('admin/header',$data);
            echo view('admin/menu/add',$data);
            echo view('admin/footer');
        }
    }  

    /*
     * Editing a menu
     */
    function edit($id)
    {   
        // check if the menu exists before trying to edit it
        $data['menu'] = $this->model->getMenu($id);

        if(isset($data['menu'][0]['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'parent' => service('request')->getVar('parent'),
					'name_ru' => service('request')->getVar('name_ru'),
					'name_ua' => service('request')->getVar('name_ua'),
                );

                $this->model->update_menu($id,$params);
                return redirect()->to('/menu/index');
            }
            else
            {				$data['all_menu'] = $this->model->get_all_menu();

                echo view('admin/header',$data);
                echo view('admin/menu/edit',$data);
                echo view('admin/footer');
            }
        }
        else
            echo 'The menu you are trying to edit does not exist.';
    } 

    /*
     * Deleting menu
     */
    function remove($id)
    {
        $menu = $this->model->get_menu($id);

        // check if the menu exists before trying to delete it
        if(isset($menu[0]['id']))
        {
            $this->model->delete_menu($id);
            return redirect()->to('/menu/index');
        }
        else
           echo 'The menu you are trying to delete does not exist.';
    }
    
}
