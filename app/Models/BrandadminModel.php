<?php
namespace App\Models;

use CodeIgniter\Model;

class BrandadminModel extends Model {
    protected $db;
    protected $builder;

    function __construct() {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('brand');
    }
    
    function get_brand() {
        return $this->builder->get()->getResultArray();
    }

    function update_brand($id_stat, $params) {
        $this->builder->where('id', $id_stat);
        return $this->builder->update($params);
    }
    function save_img($id, $img) {
        $data = $this->db->query("SELECT * FROM brand
                                      WHERE id=?  ", [$id])->getResultArray();
        if (count($data) > 0) {
            $this->builder->where('id', $id);
            $this->builder->update($img);
        }
    }
}
