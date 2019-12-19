<?php


namespace App\Models;

use CodeIgniter\Model;
class SearchModel extends Model
{
    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('product');

    }

    function getAllProduct(){
        return $this->builder->get()->getResultArray();
    }
}