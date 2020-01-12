<?php

namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\SliderModel;

class Slider extends Controller {

    public $model;
    public $locale;

    function __construct() {
        $this->locale = service('request')->getLocale();
        $this->model = new SliderModel();
    }

    /*
     * Listing of slider
     */

    function index() {
        $data['slider'] = $this->model->get_all_slider();

        $data['_view'] = 'slider/index';
        echo view('admin/header', $data);
        echo view('admin/slider/index', $data);
        echo view('admin/footer');
    }

    /*
     * Adding a new slide
     */

    public function add() {


        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'slider' => service('request')->getVar('slider'),
                'title_ua' => service('request')->getVar('title_ua'),
                'title_ru' => service('request')->getVar('title_ru'),
                'text_ua' => service('request')->getVar('text_ua'),
                'text_ru' => service('request')->getVar('text_ru'),
                'button_ua' => service('request')->getVar('button_ua'),
                'button_ru' => service('request')->getVar('button_ru'),
            );

            $id_slide = $this->model->add_slider($params);

            $file = $this->request->getFile('upload');

            if ($file->getName() != ''):

                // Move the file to it's new home
                $name = $file->getName();
                $PATH = getcwd();
                $file->move($PATH . '\img\slider', $name);

                $img = [
                    'slider' => '/img/slider/' . $name
                ];
                $this->model->save_img($id_slide, $img);

            endif;
            return redirect()->to('/slider/index');
        } else {

            echo view('admin/header');
            echo view('admin/slider/add');
            echo view('admin/footer');
        }
    }

    /*
     * Editing a slider
     */

    function edit($id_stat) {
        // check if the slider exists before trying to edit it
        $data['slider'] = $this->model->get_slider($id_stat);

        if (isset($data['slider'][0]['id'])) {

            if (isset($_POST) && count($_POST) > 0) {

                $params = array(
                    //'slider' => service('request')->getVar('slider'),
                    'title_ua' => service('request')->getVar('title_ua'),
                    'title_ru' => service('request')->getVar('title_ru'),
                    'text_ua' => service('request')->getVar('text_ua'),
                    'text_ru' => service('request')->getVar('text_ru'),
                    'button_ua' => htmlspecialchars(service('request')->getVar('button_ua')),
                    'button_ru' => htmlspecialchars(service('request')->getVar('button_ru')),
                );

                $this->model->update_slider($id_stat, $params);
                $file = $this->request->getFile('upload');
                if ($file->getName() != ''):

                    // Move the file to it's new home
                    $name = $file->getName();
                    $PATH = getcwd();
                    $file->move($PATH . '\img\slider', $name);

                    $img = [
                        'slider' => '/img/slider/' . $name
                    ];
                    $this->model->save_img($id_stat, $img);

                endif;
                return redirect()->to('/slider/index');
            } else {
                echo view('admin/header', $data);
                echo view('admin/slider/edit', $data);
                echo view('admin/footer');
            }
        } else {
            echo 'The static you are trying to delete does not exist.';
        }
    }

    /*
     * Deleting static
     */

    function remove($id) {
        $slider = $this->model->get_slider($id);

        // check if the slider exists before trying to delete it
        if (isset($slider[0]['id'])) {
            $this->model->delete_slider($id);
            return redirect()->to('/slider/index');
        } else
            echo 'The static you are trying to delete does not exist.';
    }

}
