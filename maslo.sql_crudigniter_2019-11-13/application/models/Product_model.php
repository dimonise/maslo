<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Product_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get product by product_id
     */
    function get_product($product_id)
    {
        $product = $this->db->query("
            SELECT
                *

            FROM
                `product`

            WHERE
                `product_id` = ?
        ",array($product_id))->row_array();

        return $product;
    }
        
    /*
     * Get all product
     */
    function get_all_product()
    {
        $product = $this->db->query("
            SELECT
                *

            FROM
                `product`

            WHERE
                1 = 1

            ORDER BY `product_id` DESC
        ")->result_array();

        return $product;
    }
        
    /*
     * function to add new product
     */
    function add_product($params)
    {
        $this->db->insert('product',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update product
     */
    function update_product($product_id,$params)
    {
        $this->db->where('product_id',$product_id);
        return $this->db->update('product',$params);
    }
    
    /*
     * function to delete product
     */
    function delete_product($product_id)
    {
        return $this->db->delete('product',array('product_id'=>$product_id));
    }
}
