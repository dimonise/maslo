<?php

namespace App\Models;


use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $db;
    protected $builder;

    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('category');
    }

    /*
     * Get category by id_cat
     */
    function get_category($id_cat)
    {
        $category = $this->db->query("SELECT * FROM `category` WHERE `id_cat` = ?", array($id_cat))->getResultArray();

        return $category;
    }

    /*
     * Get all category
     */
    function get_all_category()
    {
        $category = $this->db->query("SELECT * FROM `category` ORDER BY `id_cat` DESC")->getResultArray();

        return $category;
    }

    /*
     * function to add new category
     */
    function add_category($params)
    {
        $this->builder->insert($params);
        return;
    }

    /*
     * function to update category
     */
    function update_category($id_cat, $params)
    {
        $this->builder->where('id_cat', $id_cat);
        return $this->builder->update($params);
    }

    /*
     * function to delete category
     */
    function delete_category($id_cat)
    {
        return $this->builder->delete(['id_cat' => $id_cat]);
    }
}
