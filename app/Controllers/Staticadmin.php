<?php
namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\StaticAdminModel;

class Staticadmin extends Controller{
   
    public $model;
    public $locale;

    function __construct()
    {
        $this->locale = service('request')->getLocale();
        $this->model = new StaticAdminModel();
        helper('menu');
    }

    /*
     * Listing of static
     */
    function index()
    {
        $data['static'] = $this->model->get_all_static();
        
        $data['_view'] = 'static/index';
        echo view('admin/header', $data);
        echo view('admin/static/index', $data);
        echo view('admin/footer');
    }  

    /*
     * Editing a static
     */
    function edit($id_stat)
    {   
        // check if the static exists before trying to edit it
        $data['static'] = $this->model->get_static($id_stat);
        
        if(isset($data['static'][0]['id_stat'])) {

            if (isset($_POST) && count($_POST) > 0) {

                $params = array(
                    'keywords_stat_ua' => service('request')->getVar('keywords_stat_ua'),
                    'keywords_stat_ru' => service('request')->getVar('keywords_stat_ru'),
                    'description_stat_ua' => service('request')->getVar('description_stat_ua'),
                    'description_stat_ru' => service('request')->getVar('description_stat_ru'),
                    'title_stat_ua' => service('request')->getVar('title_stat_ua'),
                    'title_stat_ru' => service('request')->getVar('title_stat_ru'),
                    'data' => service('request')->getVar('data'),
                    'text_stat_ua' => service('request')->getVar('text_stat_ua'),
                    'text_stat_ru' => service('request')->getVar('text_stat_ru'),
                );

                $this->model->update_static($id_stat, $params);
                return redirect()->to('/staticadmin/index');
            } else {
                echo view('admin/header', $data);
                echo view('admin/static/edit', $data);
                echo view('admin/footer');
            }
        }
        else{
            echo 'The static you are trying to delete does not exist.';
        }

    } 

    /*
     * Deleting static
     */
    function remove($id_stat)
    {
        $static = $this->model->get_static($id_stat);

        // check if the static exists before trying to delete it
        if(isset($static['id_stat']))
        {
            $this->model->delete_static($id_stat);
            return redirect()->to('/staticadmin/index');
        }
        else
            echo 'The static you are trying to delete does not exist.';
    }
    
}
