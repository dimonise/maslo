<?php

namespace App\Models;

use CodeIgniter\Model;

class FeatureModel extends Model {

    protected $db;
    protected $builder;

    function __construct() {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('feature');
        $this->builder_val = $this->db->table('feature_val');
    }

    /*
     * Get feature by id_name_har
     */

    function get_feature($id_name_har) {
        $feature = $this->db->query("
            SELECT * FROM `feature` LEFT JOIN `feature_val` ON `feature`.`id_name_har`=`feature_val`.`id_feature` WHERE `id_name_har` = ?", array($id_name_har))->getResultArray();

        return $feature;
    }

    /*
     * Get feature value by id_name_har
     */

    function get_feature_val($id_name_har) {
        $feature = $this->db->query("
            SELECT
                *

            FROM
                `feature_val`

            WHERE
                `id_feature` = ?
        ", array($id_name_har))->getResultArray();

        return $feature;
    }

    /*
     * Save feature value by id_name_har
     */

    function save_val_har($params) {
        return $this->builder_val->insert($params);
    }

    /*
     * Get all feature
     */

    function get_all_feature() {
        return $this->builder->get()->getResultArray();
    }

    /*
     * Delete feature value by id_name_har
     */

    function del_val_har($params) {
        $this->builder_val->delete(['id' => $params]);
    }

    /*
     * function to add new feature
     */

    function add_feature($params) {
        $this->builder->insert($params);
        return $this->db->insertID();
    }

    function add_feature_val($params) {
        $this->builder_val->insert($params);
    }

    /*
     * function to update feature
     */

    function update_feature($id_name_har, $params, $group) {
        $this->builder->where($id_name_har);
        $this->builder->update($params);
        $this->builder_val->where(['id_feature' => $id_name_har]);


        return $this->builder_val->update(['groupa' => $group]);
    }

    /*
     * function to delete feature
     */

    function delete_feature($id_name_har) {
        $this->builder_val->delete(['id_feature' => $id_name_har]);
        return $this->builder->delete(['id_name_har' => $id_name_har]);
    }

    function get_cats() {
        $data = $this->db->query("SELECT *  FROM menu WHERE parent = 0 ")->getResultArray();

        return $data;
    }

}
