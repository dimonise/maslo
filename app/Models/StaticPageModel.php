<?php


namespace App\Models;


class StaticPageModel
{

    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('static');

    }


    function getPage($id)
    {
        return $this->builder->where('id_stat',$id)->get()->getResultArray();
    }
}