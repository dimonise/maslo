<?php
/**
 * Created by PhpStorm.
 * User: димон
 * Date: 16.12.2019
 * Time: 20:04
 */

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel
{
    protected $db;
    protected $builder;

    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('orders');
        $this->builder_cart = $this->db->table('cart');
        $this->builder_obl = $this->db->table('region');
        $this->builder_rayon = $this->db->table('rayon');
        $this->builder_city = $this->db->table('city');
    }

    function getOrders(){
        return $this->builder->where('id_user',session('id_user'))->get()->getResultArray();
    }

    function confirm($id_user, $params)
    {

        $this->builder->insert($params);
        $id_order = $this->db->insertID();
        $data['id_order'] = $id_order.'-'.date('d/m/Y',time());
        $this->builder->where('id', $id_order);
        $this->builder->update($data);
        $this->builder_cart->delete(['user' => $params['id_user']]);

        return $this->builder->get()->getResultArray();
    }


    function getOblast($id)
    {
        return $this->builder_obl->where('id_region', $id)->get()->getResultArray();
    }

    function getRayon($id)
    {
        return $this->builder_rayon->where('id_rayon', $id)->get()->getResultArray();
    }

    function getCart($id_user)
    {
        return $this->builder_cart->where('user', $id_user)->get()->getResultArray();
    }

}