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

        return $this->builder->getWhere(['id_user'=>$id_user])->getResultArray();
    }
        
    /*
     * Get all users
     */
    function get_all_users()
    {

//        $this->builder->select('id_user, name_user');
        $this->builder->orderBy('id_user', 'asc');
        $a = $this->builder->get()->getResult();

      return $a;
    }
        
    /*
     * function to add new user
     */
    function add_user($params)
    {
        $params['date_reg'] = date('Y-m-d h:i:s', time());
        $this->builder->insert($params);
//        return $this->builder->insertID();
    }
    
    /*
     * function to update user
     */
    function update_user($id_user,$params)
    {

        $this->builder->where('id_user',$id_user);
        return $this->builder->update($params);
    }
    
    /*
     * function to delete user
     */
    function delete_user($id_user)
    {
        return $this->builder->delete(['id_user'=>$id_user]);
    }
}
