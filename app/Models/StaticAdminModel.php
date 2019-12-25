<?php
namespace App\Models;


use CodeIgniter\Model;
 
class StaticAdminModel extends Model
{

    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('static');
//        $this->link = $this->db->table('product_cat_link');
//        $this->har = $this->db->table('product_feature_val');
//        $this->img = $this->db->table('product_img');
    }
    
    /*
     * Get static by id_stat
     */
    function get_static($id_stat)
    {
        return $this->builder->where('id_stat',$id_stat)->get()->getResultArray();
    }
        
    /*
     * Get all static
     */
    function get_all_static()
    {
//        $this->builder->orderBy('id_stat', 'desc');
        return $this->builder->get()->getResultArray();
    }
        
    /*
     * function to add new static
     */
    function add_static($params)
    {
        $this->builder->insert($params);
        return $this->builder->insert_id();
    }
    
    /*
     * function to update static
     */
    function update_static($id_stat,$params)
    {
        $this->builder->where('id_stat',$id_stat);
        return $this->builder->update($params);
    }
    
    /*
     * function to delete static
     */
    function delete_static($id_stat)
    {
        return $this->builder->delete(array('id_stat'=>$id_stat));
    }
}
