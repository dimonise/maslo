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
        $this->builder_obl = $this->db->table('region');
        $this->builder_rayon = $this->db->table('rayon');
        $this->builder_city = $this->db->table('city');
        $this->builder_mail = $this->db->table('quest');
    }

    function getUser($id){
        return  $this->builder->where('id_user',$id)->get()->getResultArray();
    }

    function update_user($id_user,$params)
    {

        $this->builder->where('id_user',$id_user);
        return $this->builder->update($params);
    }

    function getOblast(){
        return $this->builder_obl->get()->getResultArray();
    }

    function getRayon($id){
        return $this->builder_rayon->where('id_oblast',$id)->get()->getResultArray();
    }

    function getCity($id){
        return $this->builder_city->where('id_region',$id)->get()->getResultArray();
    }

    function getRayonAll(){
        return $this->builder_rayon->get()->getResultArray();
    }

    function sendEmail($params){
        $this->builder_mail->insert($params);
    }
}