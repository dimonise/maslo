<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model{
    protected $db;
    protected $builder;

    function __construct() {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('adminuser');
    }
    
    function login($log = null)
    {
        $this->builder->where('login', $log);
        $sel = $this->builder->get()->getResultArray();
//        print_r($this->db->queries);die;
        return $sel;
    }
}
