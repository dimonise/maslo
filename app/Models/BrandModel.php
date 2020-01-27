<?php

namespace App\Models;

use CodeIgniter\Model;

class BrandModel extends Model {
    protected $db;
    protected $builder;

    function __construct() {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('brand');
    }
    
    function index(){
        return $this->builder->get()->getResultArray();
    }
}
