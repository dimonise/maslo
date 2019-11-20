<?php
namespace App\Models;


use CodeIgniter\Model;

class Sub_catModel extends Model
{
    protected $db;
    protected $builder;

    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('sub_cat');
    }


    /*
     * Get sub_cat by id_sub
     */
    function get_sub_cat($id_sub)
    {
        $sub_cat = $this->db->query("SELECT * FROM `sub_cat` WHERE `id_sub` = ?",array($id_sub))->getResultArray();

        return $sub_cat;
    }

    /*
     * Get all sub_cat
     */
    function get_all_sub_cat()
    {
        $sub_cat = $this->db->query("SELECT * FROM `sub_cat` ORDER BY `id_sub` DESC")->getResultArray();

        return $sub_cat;
    }

    /*
     * function to add new sub_cat
     */
    function add_sub_cat($params)
    {
        $this->builder->insert($params);
    }

    /*
     * function to update sub_cat
     */
    function update_sub_cat($id_sub,$params)
    {
        $this->db->where('id_sub',$id_sub);
        return $this->db->update('sub_cat',$params);
    }

    /*
     * function to delete sub_cat
     */
    function delete_sub_cat($id_sub)
    {
        return $this->db->delete('sub_cat',array('id_sub'=>$id_sub));
    }
}