<?php

namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\ContactadminModel;

class Contactadmin extends Controller {

    public $model;
    public $locale;

    function __construct() {
        $this->locale = service('request')->getLocale();
        $this->model = new ContactadminModel();
        helper('menu');
    }

    function index() {
        $data['contact'] = $this->model->get_contact(1);


        echo view('admin/header', $data);
        echo view('admin/contact/index', $data);
        echo view('admin/footer');
    }

    function edit($id) {
        // check if the static exists before trying to edit it
        $data['contact'] = $this->model->get_contact(1);

        if (isset($data['contact'][0]['id'])) {

            if (isset($_POST) && count($_POST) > 0) {

                $params = array(
                    'grafic_ua' => htmlspecialchars(service('request')->getVar('grafic_ua')),
                    'grafic_ru' => htmlspecialchars(service('request')->getVar('grafic_ua')),
                    'address_ua' => htmlspecialchars(service('request')->getVar('address_ua')),
                    'address_ru' => htmlspecialchars(service('request')->getVar('address_ru')),
                );

                $this->model->update_contact($id, $params);
                return redirect()->to('/contactadmin/index');
            } else {
                echo view('admin/header', $data);
                echo view('admin/contact/edit', $data);
                echo view('admin/footer');
            }
        } else {
            echo 'The static you are trying to delete does not exist.';
        }
    }

}
