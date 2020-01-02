<?php
namespace App\Models;


use CodeIgniter\Model;
 
class CartModel extends Model
{
    protected $db;
    protected $builder;

    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('cart');
    }
    
    /*
     * Get cart by id_cart
     */
    function get_cart($id_cart)
    {
        $cart = $this->db->query("
            SELECT
                *

            FROM
                `cart`

            WHERE
                `id_cart` = ?
        ",array($id_cart))->getResultArray();

        return $cart;
    }
    
    /*
     * Get all cart count
     */
    function get_all_cart_count()
    {
        $cart = $this->db->query("
            SELECT
                count(*) as count

            FROM
                `cart`
        ")->row_array();

        return $cart['count'];
    }
        
    /*
     * Get all cart
     */
    function get_all_cart()
    {
        
        $cart = $this->db->query("SELECT * FROM `cart` ORDER BY `id_cart` DESC")->result_array();

        return $cart;
    }
        
    /*
     * function to add new cart
     */
    function add_cart($params)
    {
        $this->db->insert('cart',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update cart
     */
    function update_cart($id_cart,$params)
    {
        $this->builder->where('id_cart',$id_cart);
        return $this->builder->update($params);
    }
    
    /*
     * function to delete cart
     */
    function delete_cart($id_cart)
    {
        return $this->builder->delete(array('id_cart'=>$id_cart));
    }
}
