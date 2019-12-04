<?php
namespace App\Models;


use CodeIgniter\Model;
 
class FeatureModel extends Model
{
    protected $db;
    protected $builder;

    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('feature');
    }
    
    /*
     * Get feature by id_name_har
     */
    function get_feature($id_name_har)
    {
        $feature = $this->db->query("
            SELECT
                *

            FROM
                `feature`

            WHERE
                `id_name_har` = ?
        ",array($id_name_har))->row_array();

        return $feature;
    }
        
    /*
     * Get all feature
     */
    function get_all_feature()
    {
        return $this->builder->get()->getResultArray();
    }
        
    /*
     * function to add new feature
     */
    function add_feature($params)
    {
        $this->db->insert('feature',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update feature
     */
    function update_feature($id_name_har,$params)
    {
        $this->db->where('id_name_har',$id_name_har);
        return $this->db->update('feature',$params);
    }
    
    /*
     * function to delete feature
     */
    function delete_feature($id_name_har)
    {
        return $this->db->delete('feature',array('id_name_har'=>$id_name_har));
    }
}
