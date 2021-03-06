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
        $this->img = $this->db->table('product_img');
    }

    /*
     * Get product by product_id
     */
    function get_product($product_id)
    {

        $data = $this->db->query("SELECT * FROM product p 
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

        $data = $this->db->query("SELECT * FROM product p LEFT JOIN product_img pim ON p.product_id = pim.prod_id 
                                      LEFT JOIN product_cat_link pcl ON pcl.id_prod = p.product_id")->getResultArray();


        return $data;
    }

    /*
     * function to add new product
     */
    function add_product($params)
    {
        $params['date_add'] = date('Y-m-d h:i:s', time());
        $this->builder->insert($params);
        return $this->db->insertID();
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

    function save_img($product_id, $img)
    {
        $data = $this->db->query("SELECT * FROM product
                                      WHERE product_id=?  ", [$product_id])->getResultArray();
        if (count($data) > 0) {
            $this->builder->where('product_id', $product_id);
            $this->builder->update($img);
        }
    }

    /*
     * function to delete product
     */
    function delete_product($product_id)
    {
        $this->img->delete(['prod_id' => $product_id]);
        $this->har->delete(['id_product' => $product_id]);
        $this->link->delete(['id_prod' => $product_id]);
        return $this->builder->delete(['product_id' => $product_id]);
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

    function update_feature_link($product_id, $name_har, $har)
    {
        $this->har->where('id_product', $product_id);
        $this->har->where('id_name_feature', $name_har);
        return $this->har->update($har);
    }

    function find_sub_cat($id_cat)
    {
        $data = $this->db->query("SELECT * FROM menu 
                                      WHERE parent=?  ", [$id_cat])->getResultArray();
        return $data;
    }

    function add_product_link($params)
    {
        $this->link->insert($params);
    }

    function add_product_feature($params)
    {

        return $this->har->insert($params);
    }

    function del_har_from_prod($id_prod, $id_har)
    {
        return $this->har->delete(['id_product' => $id_prod, 'id_feature'=>$id_har]);
    }

    function get_clear_product(){
       return $this->builder->get()->getResultArray();
    }
}
