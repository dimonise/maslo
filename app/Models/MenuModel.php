<?php
/**
 * Created by PhpStorm.
 * User: димон
 * Date: 13.10.2019
 * Time: 10:36
 */

namespace App\Models;


use CodeIgniter\Model;


class MenuModel extends Model
{

    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }


    public function getMenu($id = null)
    {
        if ($id == null) {
            $data = $this->db->query("SELECT * FROM menu")->getResultArray();
        } else {
            $data = $this->db->query("SELECT * FROM menu WHERE id = ?", [$id])->getResultArray();
        }
        return $data;
    }


}