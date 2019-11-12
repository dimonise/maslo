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

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getLastNine()
    {
        $data = $this->db->query("SELECT * FROM product p JOIN product_img pim ON p.product_id = pim.prod_id ORDER BY p.product_id DESC LIMIT 9")->getResultArray();

        return $data;
    }

    public function getSubCatProd($id)
    {

        $data = $this->db->query("SELECT * FROM product p JOIN product_img pim ON p.product_id = pim.prod_id LEFT JOIN product_cat_link pcl ON pcl.id_prod = p.product_id WHERE pcl.id_sub_cat=? ORDER BY p.product_id DESC LIMIT 9 ", [$id])->getResultArray();

        return $data;
    }

    public function getSubSubCatProd($id_sub,$id_sub_sub)
    {

        $data = $this->db->query("SELECT * FROM product p JOIN product_img pim ON p.product_id = pim.prod_id LEFT JOIN product_cat_link pcl ON pcl.id_prod = p.product_id WHERE pcl.id_sub_cat=? AND pcl.id_sub_sub_cat=? ORDER BY p.product_id DESC LIMIT 9 ", [$id_sub,$id_sub_sub])->getResultArray();

        return $data;
    }

    public function showProduct($id_product){

        $data = $this->db->query("SELECT * FROM `product` p LEFT JOIN `product_feature_val` pfv ON p.product_id = pfv.id_product LEFT JOIN feature_val fv ON fv.id = pfv.id_feature LEFT JOIN feature f ON f.id_name_har=fv.id_feature LEFT JOIN product_img pim ON pim.prod_id = p.product_id WHERE p.product_id = ?",[$id_product])->getResultArray();

        return $data;
    }

    public function checkCart(){
        $data = $this->db->query("SELECT *, SUM(`count_product`) as cou FROM `cart`  WHERE user = ?",[session('user')])->getResultArray();

        return $data;
    }

    public function Cart(){
        $data = $this->db->query("SELECT * FROM `cart` c LEFT JOIN `product` as p ON c.id_product = p.oem WHERE user = ? /*GROUP BY c.user*/",[session('user')])->getResultArray();

        return $data;
    }

    public function delCart($prodID,$userID){
        $data = $this->db->query("DELETE  FROM `cart`  WHERE `id_cart` = '$prodID' AND `user` = '$userID'");

        return $data;
    }


}