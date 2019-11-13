<?php
namespace App\Models;


use CodeIgniter\Model;
 
class UserModel extends Model
{
    protected $db;
    protected $builder;

    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }
    
    /*
     * Get user by id_user
     */
    function get_user($id_user)
    {
        return $this->db->get_where('users',array('id_user'=>$id_user))->row_array();
    }
        
    /*
     * Get all users
     */
    function get_all_users()
    {

//        $this->builder->select('id_user, name_user');
        $this->builder->orderBy('id_user', 'asc');

        return $this->builder->get()->getResultArray();
    }
        
    /*
     * function to add new user
     */
    function add_user($params)
    {
        $this->db->insert('users',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update user
     */
    function update_user($id_user,$params)
    {
        $this->db->where('id_user',$id_user);
        return $this->db->update('users',$params);
    }
    
    /*
     * function to delete user
     */
    function delete_user($id_user)
    {
        return $this->db->delete('users',array('id_user'=>$id_user));
    }
}
