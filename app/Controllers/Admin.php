<?php

namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\AdminModel;

class Admin extends Controller {

    public $locale;
    private $model;

    public function __construct() {

        $this->locale = service('request')->getLocale();
        $this->model = new AdminModel();
    }

    public function index() {

        echo view('admin/login');
    }

    function log_in() {
        $log = htmlspecialchars(service('request')->getVar('login'));
        $pas = md5(service('request')->getVar('password'));

        $pasw = '';

        $res = $this->model->login($log);

        $pasw = $res[0]['password'];

        if ($pas == $pasw or session('logged_in') == TRUE) {

            $logdata = array(
                'logged_in' => TRUE,
                'user' => $log,
                'pass' => $pasw
            );
            $session = session();
            $session->set($logdata);

            return redirect()->to('/ru/admin/user');
        } else {
            $error['err'] = "<span style='color:red'> Не верный логин или пароль! </span> ";
            echo view('admin/login', $error);
        }
    }

    public function store() {

        $data['locale'] = $this->locale;

        echo view('admin/header', $data);
        echo view('admin/admin');
        echo view('admin/footer');
    }

}
