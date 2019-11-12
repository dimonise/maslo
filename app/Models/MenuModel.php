<?php
/**
 * Created by PhpStorm.
 * User: димон
 * Date: 13.10.2019
 * Time: 10:36
 */

namespace App\Models;


use CodeIgniter\Model;


class MenuModel extends Model
{

    protected  $db;

    public function __construct()
    {
       $this->db = \Config\Database::connect();
    }

    public function getCategory($id=null)
    {
        if($id == null) {
            $data = $this->db->query("SELECT * FROM category")->getResult();
        }
        else{
            $data = $this->db->query("SELECT * FROM category WHERE id_cat = ?",[$id])->getResult();
        }
        return $data;

    }

    public function getSubCat($id=null)
    {
        if($id == null) {
            foreach ($this->getCategory() as $cat) {
                $data[] = $this->db->query("SELECT * FROM sub_cat WHERE id_cat =?", [$cat->id_cat])->getResultArray();
            }
        }
        else{
                $data = $this->db->query("SELECT * FROM sub_cat WHERE id_sub =?", [$id])->getResultArray();
            }

        return $data;
    }

    public function getSubSubCat($id=null)
    {

        $i = 0;
        if($id == null) {
            foreach ($this->getSubCat()[$i] as $subcat) {
                $data[] = $this->db->query("SELECT * FROM  sub_sub_cat WHERE id_sub =?", [$subcat['id_sub']])->getResultArray();
                $i++;
            }
        }
        else{
            $data = $this->db->query("SELECT * FROM  sub_sub_cat WHERE id_sub_sub =?", [$id])->getResultArray();
        }
        return $data;
    }
}