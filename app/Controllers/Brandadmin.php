<?php
namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\BrandadminModel;

class Brandadmin extends Controller{
    public $model;
    public $locale;
    
    function __construct() {
        $this->locale = service('request')->getLocale();
        $this->model = new BrandadminModel();
        helper('menu');
    }
    
    function index() {
        $data['brand'] = $this->model->get_brand();


        echo view('admin/header', $data);
        echo view('admin/brand/index', $data);
        echo view('admin/footer');
    }

    function edit($id) {
        // check if the static exists before trying to edit it
        $data['brand'] = $this->model->get_brand($id);

        if (isset($data['brand'][0]['id'])) {

            if (isset($_POST) && count($_POST) > 0) {

                $params = array(
                    'name' => htmlspecialchars(service('request')->getVar('name')),
                    'img' => htmlspecialchars(service('request')->getVar('img')),
                   
                );

                $this->model->update_brand($id, $params);
                $file = $this->request->getFile('upload');

            if ($file->getName() != ''):

                // Move the file to it's new home
                $name = $file->getName();
                $PATH = getcwd();
                $file->move($PATH . '\img\brand', $name);

                $img = [
                    'img' => $name
                ];
                $this->model->save_img($id, $img);

            endif;
                return redirect()->to('/brandadmin/index');
            } else {
                echo view('admin/header', $data);
                echo view('admin/brand/edit', $data);
                echo view('admin/footer');
            }
        } else {
            echo 'The static you are trying to delete does not exist.';
        }
    }
}
