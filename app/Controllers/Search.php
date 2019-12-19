<?php


namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\SearchModel;

class Search extends Controller
{

    public function __construct()
    {
        $this->locale = service('request')->getLocale();
        $this->model = new SearchModel();


        helper('menu');
    }

    public function index(){
        $data = $this->model->getAllProduct();

        return $data;
    }
}