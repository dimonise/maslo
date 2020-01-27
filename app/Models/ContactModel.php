<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model {

    protected $builder;
    protected $db;

    function __construct() {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('contact');
    }

    function index() {
        return $this->builder->get()->getResultArray();
    }

}
