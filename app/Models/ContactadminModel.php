<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactadminModel extends Model {

    protected $db;
    protected $builder;

    function __construct() {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('contact');
    }

    function get_contact($id) {
        return $this->builder->where('id', $id)->get()->getResultArray();
    }

    function update_contact($id_stat, $params) {
        $this->builder->where('id', $id_stat);
        return $this->builder->update($params);
    }

}
