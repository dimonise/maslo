<?php
/**
 * Created by PhpStorm.
 * User: димон
 * Date: 11.12.2019
 * Time: 20:41
 */

namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\CabinetModel;

class Cabinet extends Controller
{
    public $locale;
    public $model;

    public function __construct()
    {

        $this->locale = service('request')->getLocale();
        $this->model = new CabinetModel();
        helper('menu');

    }

    public function index()
    {
        $data['locale'] = $this->locale;
        $data['title'] = lang('Language.cabinet');
        $data['tree'] = menu();

        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);

        $id = session('id_user');
        $data['user'] = $this->model->getUser($id);
        $data['pager'] = $this->model->pager;

        $data['oblast'] = $this->model->getOblast();
        $data['allrayon'] = $this->model->getRayonAll();

        echo view('templates/header', $data);
        echo view('cabinet', $data);
        echo view('templates/footer', $data);
    }

    function edit($id_user)
    {
        // check if the user exists before trying to edit it
        $data['user'] = $this->model->getUser($id_user);

        if (isset($data['user'][0]['id_user'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'password' => service('request')->getVar('password'),
                    'name_user' => service('request')->getVar('name_user'),
                    'sname_user' => service('request')->getVar('sname_user'),
                    'email_user' => service('request')->getVar('email_user'),
                    'type_user' => service('request')->getVar('type_user'),
                    'password' => service('request')->getVar('password'),
                    'user_phone_life' => service('request')->getVar('user_phone_life'),
//				'user_phone_mtc' => service('request')->getVar('user_phone_mtc'),
//				'user_phone_ks' => service('request')->getVar('user_phone_ks'),
//				'user_phone_t' => service('request')->getVar('user_phone_t'),
//				'active' => service('request')->getVar('active'),
//				'activation_code' => service('request')->getVar('activation_code'),
//				'user_soc_id' => service('request')->getVar('user_soc_id'),
//                    'money' => service('request')->getVar('money'),
//				'factory' => service('request')->getVar('factory'),
//				'edrpo' => service('request')->getVar('edrpo'),
				'region' => service('request')->getVar('region'),
				'rayon' => service('request')->getVar('rayon'),
				'city' => service('request')->getVar('city'),
				'address' => trim(service('request')->getVar('address')),
                );

                $this->model->update_user($id_user, $params);
                return redirect()->to('/cabinet/index');
            }
        } else
            echo 'The user you are trying to edit does not exist.';
    }

    function search_rayon(){
        $id = service('request')->getVar('id');

        $data = $this->model->getRayon($id);

        return json_encode($data);
    }

    function search_city(){
        $id = service('request')->getVar('id');

        $data = $this->model->getCity($id);

        return json_encode($data);
    }
}