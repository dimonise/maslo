<?php
/**
 * Created by PhpStorm.
 * User: димон
 * Date: 11.12.2019
 * Time: 20:55
 */

namespace App\Models;


use CodeIgniter\Model;


class CabinetModel extends Model
{

    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    function getUser($id){
        $data =  $this->builder->where('id_user',$id)->get();
        return $data->getResultArray();
    }

    function update_user($id_user,$params)
    {

        $this->builder->where('id_user',$id_user);
        return $this->builder->update($params);
    }
}