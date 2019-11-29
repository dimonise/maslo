<?php

namespace App\Models;


use CodeIgniter\Model;

class ProductAdminModel extends Model
{
    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('product');
        $this->link = $this->db->table('product_cat_link');
        $this->har = $this->db->table('product_feature_val');
    }

    /*
     * Get product by product_id
     */
    function get_product($product_id)
    {

        $data = $this->db->query("SELECT * FROM product p JOIN product_img pim ON p.product_id = pim.prod_id 
                                        LEFT JOIN product_cat_link pcl ON pcl.id_prod = p.product_id 
                                        LEFT JOIN product_feature_val pfv ON p.product_id = pfv.id_product 
                                        LEFT JOIN feature_val fv ON fv.id = pfv.id_feature 
                                        LEFT JOIN feature f ON f.id_name_har=fv.id_feature 
                                        WHERE p.product_id=?  ", [$product_id])->getResultArray();
        return $data;
    }

    /*
         * Get product link menu by product_id
         */
    function get_cat_link($product_id)
    {
        $data = $this->db->query("SELECT * FROM product_cat_link pcl
                                      WHERE pcl.id_prod=?  ", [$product_id])->getResultArray();
        return $data;
    }


    /*
     * Get all product
     */
    function get_all_product()
    {
        $data = $this->db->query("SELECT * FROM product p JOIN product_img pim ON p.product_id = pim.prod_id 
                                      LEFT JOIN product_cat_link pcl ON pcl.id_prod = p.product_id")->getResultArray();


        return $data;
    }

    /*
     * function to add new product
     */
    function add_product($params)
    {
        $this->db->insert('product', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update product
     */
    function update_product($product_id, $params)
    {
        $this->builder->where('product_id', $product_id);
        return $this->builder->update($params);

    }

    function update_product_link($product_id, $cat)
    {
        $this->link->where('id_prod', $product_id);
        return $this->link->update($cat);
    }


    /*
     * function to delete product
     */
    function delete_product($product_id)
    {
        return $this->db->delete('product', array('product_id' => $product_id));
    }

    /*
     * get all product specifications
     */
    function get_all_specifications()
    {

        $data = $this->db->query("SELECT *  FROM feature_val fv LEFT JOIN feature f ON f.id_name_har=fv.id_feature ")->getResultArray();
        return $data;
    }

    function all_specifications()
    {

        $data = $this->db->query("SELECT *  FROM feature")->getResultArray();
        return $data;
    }

    function get_spec_val($id_name_har)
    {
        $data = $this->db->query("SELECT * FROM feature_val 
                                      WHERE id_feature=?  ", [$id_name_har])->getResultArray();
        return $data;
    }

    function save_har_for_prod($params)
    {

        return $this->har->insert($params);

    }
}
