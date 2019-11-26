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
        $this->builder = $this->db->table('menu');
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

    /*
        * Get menu by id
        */
    function get_menu($id)
    {
        return $this->builder->getWhere(['id'=>$id])->getResultArray();
    }

    /*
     * Get all menu
     */
    function get_all_menu()
    {
        $this->builder->orderBy('id', 'desc');
        return $this->builder->get()->getResultArray();
    }

    /*
     * function to add new menu
     */
    function add_menu($params)
    {
        $this->builder->insert($params);
    }

    /*
     * function to update menu
     */
    function update_menu($id,$params)
    {
        $this->builder->where('id',$id);
        return $this->builder->update($params);
    }

    /*
     * function to delete menu
     */
    function delete_menu($id)
    {
        return $this->builder->delete(['id'=>$id]);
    }
}