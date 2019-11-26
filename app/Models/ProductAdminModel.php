<?php
namespace App\Models;


use CodeIgniter\Model;
 
class ProductAdminModel extends Model
{
    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('product');
    }
    
    /*
     * Get product by product_id
     */
    function get_product($product_id)
    {

        $data = $this->db->query("SELECT * FROM product p JOIN product_img pim ON p.product_id = pim.prod_id 
                                      LEFT JOIN product_cat_link pcl ON pcl.id_prod = p.product_id 
                                      WHERE p.product_id=?  ", [$product_id])->getResultArray();
        return $data;
    }

    function get_cat_link($product_id){
        $data = $this->db->query("SELECT * FROM product_cat_link pcl
                                      WHERE pcl.id_prod=?  ", [$product_id])->getResultArray();
        return $data;
    }


    /*
     * Get all product
     */
    function get_all_product()
    {
        $this->builder->orderBy('product_id', 'asc');

        return $this->builder->get()->getResultArray();
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
