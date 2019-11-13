<?php
namespace App\Controllers;

use App\Controllers\BaseController as Controller;

class Admin extends Controller
{
    public $locale;


    public function __construct()
    {

        $this->locale  =  service('request')->getLocale();


    }
    public function index(){

        $data['locale'] = $this->locale;

        echo view('admin/header',$data);
        echo view('admin/admin');
        echo view('admin/footer');
    }
}