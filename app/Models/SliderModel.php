<?php

namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model {

    protected $db;
    protected $builder;

    function __construct() {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('slider');
    }

    /*
     * Get slider by id
     */

    function get_slider($id) {
        return $this->builder->where('id',$id)->get()->getResultArray();
    }

    /*
     * Get all slider
     */

    function get_all_slider() {

        return $this->builder->get()->getResultArray();
    }

    /*
     * function to add new slider
     */

    function add_slider($params) {
        $this->builder->insert($params);
        return $this->db->insertID();
    }

    /*
     * function to update slider
     */

    function update_slider($id, $params) {
        $this->builder->where('id',$id);
        return $this->builder->update($params);
    }

    /*
     * function to delete slider
     */

    function delete_slider($id) {
        return $this->builder->delete(['id' => $id]);
    }

    function save_img($id, $img) {
        $data = $this->db->query("SELECT * FROM slider
                                      WHERE id=?  ", [$id])->getResultArray();
        if (count($data) > 0) {
            $this->builder->where('id', $id);
            $this->builder->update($img);
        }
    }

}
