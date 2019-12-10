<?php

namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\FeatureModel;

class Feature extends Controller
{
    function __construct()
    {
        $this->locale = service('request')->getLocale();
        $this->model = new FeatureModel();
    }

    /*
     * Listing of feature
     */
    function index()
    {
        $data['feature'] = $this->model->get_all_feature();


        echo view('admin/header', $data);
        echo view('admin/feature/index', $data);
        echo view('admin/footer');
    }

    /*
     * Adding a new feature
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'name_har_ua' => service('request')->getVar('name_har_ua'),
                'name_har_ru' => service('request')->getVar('name_har_ru'),
            );

            $feature_id = $this->model->add_feature($params);

            $val_har_ua = service('request')->getVar('val_har_ua');
            $val_har_ru = service('request')->getVar('val_har_ru');
            for ($i = 0; $i < count($val_har_ua); $i++) {
                $val = array(
                    'id_feature' => $feature_id,
                    'val_feature_ua' => $val_har_ua[$i],
                    'val_feature_ru' => $val_har_ru[$i],
                );
                $this->model->add_feature_val($val);
            }
            return redirect()->to('/feature/index');
        } else {
            echo view('admin/header');
            echo view('admin/feature/add');
            echo view('admin/footer');
        }
    }

    /*
     * Editing a feature
     */
    function edit($id_name_har)
    {
        // check if the feature exists before trying to edit it
        $data['feature'] = $this->model->get_feature($id_name_har);
        $data['feature_val'] = $this->model->get_feature_val($id_name_har);
        $data['cats'] = $this->model->get_cats();
        if (isset($data['feature'][0]['id_name_har'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'name_har_ua' => service('request')->getVar('name_har_ua'),
                    'name_har_ru' => service('request')->getVar('name_har_ru'),
                );

                $this->model->update_feature($id_name_har, $params);
                return redirect()->to('/feature/index');
            } else {
                echo view('admin/header', $data);
                echo view('admin/feature/edit', $data);
                echo view('admin/footer');
            }
        } else
            echo 'The feature you are trying to edit does not exist.';
    }

    /*
     * Deleting feature
     */
    function remove($id_name_har)
    {
        $feature = $this->model->get_feature($id_name_har);

        // check if the feature exists before trying to delete it
        if (isset($feature[0]['id_name_har'])) {
            $this->model->delete_feature($id_name_har);
            return redirect()->to('/feature/index');
        } else
            echo 'The feature you are trying to delete does not exist.';
    }

    function save_val_har()
    {
        $data['id_feature'] = service('request')->getVar('id');
        $data['val_feature_ua'] = service('request')->getVar('ua');
        $data['val_feature_ru'] = service('request')->getVar('ru');

        $this->model->save_val_har($data);
        return json_encode('ok');
    }

    function del_val()
    {
        $data['id_feature'] = service('request')->getVar('id');
        $this->model->del_val_har($data);
        return json_encode('ok');
    }
}
