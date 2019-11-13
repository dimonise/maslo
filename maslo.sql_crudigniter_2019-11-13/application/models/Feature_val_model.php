<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Feature_val_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get feature_val by 
     */
    function get_feature_val($)
    {
        return $this->db->get_where('feature_val',array(''=>$))->row_array();
    }
        
    /*
     * Get all feature_val
     */
    function get_all_feature_val()
    {
        $this->db->order_by('', 'desc');
        return $this->db->get('feature_val')->result_array();
    }
        
    /*
     * function to add new feature_val
     */
    function add_feature_val($params)
    {
        $this->db->insert('feature_val',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update feature_val
     */
    function update_feature_val($,$params)
    {
        $this->db->where('',$);
        return $this->db->update('feature_val',$params);
    }
    
    /*
     * function to delete feature_val
     */
    function delete_feature_val($)
    {
        return $this->db->delete('feature_val',array(''=>$));
    }
}