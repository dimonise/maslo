<?php
/**
 * Created by PhpStorm.
 * User: димон
 * Date: 13.10.2019
 * Time: 10:36
 */

namespace App\Models;


use CodeIgniter\Model;


class CatalogModel extends Model
{

    protected $db;
    protected $builder;

    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('product');
        $this->builder_f = $this->db->table('product_feature_val');

    }

    public function getLastNine()
    {
        $data = $this->db->query("SELECT * FROM product p  ORDER BY p.product_id DESC LIMIT 9")->getResultArray();

        return $data;
    }

    public function getSubCatProd($id)
    {

        $data = $this->db->query("SELECT * FROM product p  LEFT JOIN product_cat_link pcl ON pcl.id_prod = p.product_id WHERE pcl.id_cat=? ORDER BY p.product_id DESC LIMIT 9 ", [$id])->getResultArray();

        return $data;
    }

    public function getSubSubCatProd($id_sub, $id_sub_sub)
    {

        $data = $this->db->query("SELECT * FROM product p  LEFT JOIN product_cat_link pcl ON pcl.id_prod = p.product_id WHERE pcl.id_cat=? AND pcl.id_sub_cat=? ORDER BY p.product_id DESC LIMIT 9 ", [$id_sub, $id_sub_sub])->getResultArray();

        return $data;
    }

    public function getSubSubSubCatProd($id_sub, $id_sub_sub, $id_sub_sub_sub)
    {

        $data = $this->db->query("SELECT * FROM product p  LEFT JOIN product_cat_link pcl ON pcl.id_prod = p.product_id WHERE pcl.id_cat=? AND pcl.id_sub_cat=? AND pcl.id_sub_sub_cat=? ORDER BY p.product_id DESC LIMIT 9 ", [$id_sub, $id_sub_sub, $id_sub_sub_sub])->getResultArray();

        return $data;
    }

    public function showProduct($id_product)
    {

        $data = $this->db->query("SELECT * FROM `product` p LEFT JOIN `product_feature_val` pfv ON p.product_id = pfv.id_product 
                                LEFT JOIN feature_val fv ON fv.id = pfv.id_feature 
                                LEFT JOIN feature f ON f.id_name_har=fv.id_feature 
                                WHERE p.product_id = ?", [$id_product])->getResultArray();

        return $data;
    }

    public function showProductSearch($product, $lang)
    {

        $data = $this->db->query("SELECT * FROM `product` p LEFT JOIN `product_feature_val` pfv ON p.product_id = pfv.id_product 
                                LEFT JOIN feature_val fv ON fv.id = pfv.id_feature 
                                LEFT JOIN feature f ON f.id_name_har=fv.id_feature 
                                WHERE p.product_name_{$lang} LIKE ?", [$product])->getResultArray();

        return $data;
    }

    public function checkCart($user)
    {
//        var_dump($user);die;
        $data = $this->db->query("SELECT  *, SUM(`count_product`) as cou FROM `cart`  WHERE user = ? GROUP BY id_cart", [$user])->getResultArray();

        return $data;
    }

    public function Cart($user)
    {

        $data = $this->db->query("SELECT * FROM `cart` c LEFT JOIN `product` as p ON c.id_product = p.oem WHERE user = ? /*GROUP BY c.user*/", [$user])->getResultArray();

        return $data;
    }

    public function delCart($prodID, $userID)
    {
        $data = $this->db->query("DELETE  FROM `cart`  WHERE `id_cart` = '$prodID' AND `user` = '$userID'");

        return $data;
    }

    public function getRekomm()
    {
        $data = $this->db->query("SELECT *  FROM product p  WHERE `is_rekomm` = '1' ")->getResultArray();

        return $data;
    }

    public function getAkc()
    {
        $data = $this->db->query("SELECT *  FROM product p  WHERE `is_akcii` = '1' ")->getResultArray();

        return $data;
    }

    public function getBrend()
    {
        $data = $this->db->query("SELECT *  FROM feature ")->getResultArray();

        return $data;
    }

    public function getBrendValue($id)
    {
        $data = $this->db->query("SELECT *  FROM feature_val WHERE id_feature = ? ", [$id])->getResultArray();

        return $data;
    }

    public function getFiltr($params)
    {

        $where = '';

        if ($params) {
            if (count($params) == 1) {
                $where .= ' id_feature = "' . $params[0] . '"';
            } else {
                $where .= '  id_feature = "' . $params[0] . '"';
                for ($i = 1; $i < count($params); $i++) {
                    $where .= ' OR id_feature = ' . $params[$i];
                }
            }

            $this->builder_f->where($where);
            $data = $this->builder_f->get()->getResultArray();

            return $data;
        }
        return;
    }

    public function showProductFiltr($params, $start, $finish)
    {


        if ($start != NULL && $finish != NULL):

            $where = "`price` >='" . $start . "' AND `price` <='" . $finish . "'";
            $data = $this->builder->where($where)->whereIn('product_id', $params)->get();
        else:
            if ($params != 0):
                $data = $this->builder->whereIn('product_id', $params)->get();
            else:
                $data = $this->builder->where('product_id', $params)->get();
            endif;
        endif;

        return $data->getResultArray();
    }

    public function sort($sort, $onpage)
    {
        if ($sort == 1) {
            $data = $this->db->query("SELECT * FROM product p  ORDER BY p.price ASC LIMIT $onpage")->getResultArray();

            return $data;
        } elseif ($sort == 2) {
            $data = $this->db->query("SELECT * FROM product p  ORDER BY p.price DESC LIMIT $onpage")->getResultArray();

            return $data;
        }
    }
}