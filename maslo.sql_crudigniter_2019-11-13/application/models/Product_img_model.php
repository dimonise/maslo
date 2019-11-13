<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Product_img_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get product_img by img_id
     */
    function get_product_img($img_id)
    {
        return $this->db->get_where('product_img',array('img_id'=>$img_id))->row_array();
    }
        
    /*
     * Get all product_img
     */
    function get_all_product_img()
    {
        $this->db->order_by('img_id', 'desc');
        return $this->db->get('product_img')->result_array();
    }
        
    /*
     * function to add new product_img
     */
    function add_product_img($params)
    {
        $this->db->insert('product_img',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update product_img
     */
    function update_product_img($img_id,$params)
    {
        $this->db->where('img_id',$img_id);
        return $this->db->update('product_img',$params);
    }
    
    /*
     * function to delete product_img
     */
    function delete_product_img($img_id)
    {
        return $this->db->delete('product_img',array('img_id'=>$img_id));
    }
}
