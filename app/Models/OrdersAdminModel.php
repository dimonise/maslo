<?php

namespace App\Models;


use CodeIgniter\Model;


class OrdersAdminModel extends Model
{
    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('orders');
//        $this->link = $this->db->table('product_cat_link');
//        $this->har = $this->db->table('product_feature_val');
//        $this->img = $this->db->table('product_img');
    }
    
    /*
     * Get order by id
     */
    function get_order($id)
    {
        return $this->builder->where(array('id'=>$id))->get()->getResultArray();
    }
        
    /*
     * Get all orders
     */
    function get_all_orders()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('orders')->result_array();
    }
        
    /*
     * function to add new order
     */
    function add_order($params)
    {
        $this->db->insert('orders',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update order
     */
    function update_order($id,$params)
    {
        $this->builder->where('id',$id);
        return $this->builder->update($params);
    }
    
    /*
     * function to delete order
     */
    function delete_order($id)
    {
        return $this->builder->delete(array('id'=>$id));
    }
}
