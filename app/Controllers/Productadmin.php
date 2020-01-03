<?php

namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\ProductAdminModel;

class Productadmin extends Controller
{

    public $model;
    public $locale;

    public function __construct()
    {
        $this->locale = service('request')->getLocale();
        $this->model = new ProductAdminModel();
        helper('menu');
    }

    /*
     * Listing of product
     */
    public function index()
    {
        $data = [
            'product' => $this->model->paginate(20),//$this->model->get_all_product(),
            'pager' => $this->model->pager
        ];

        echo view('admin/header', $data);
        echo view('admin/product/index', $data);
        echo view('admin/footer');
    }

    /*
     * Adding a new product
     */
    public function add()
    {

        $data['spec'] = $this->model->get_all_specifications();
        $data['spec_sel'] = $this->model->all_specifications();
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'oem' => service('request')->getVar('oem'),
                'product_name_ua' => service('request')->getVar('product_name_ua'),
                'product_name_ru' => service('request')->getVar('product_name_ru'),
                'product_key_ua' => service('request')->getVar('product_key_ua'),
                'product_key_ru' => service('request')->getVar('product_key_ru'),
                'price' => service('request')->getVar('price'),
                'date_add' => service('request')->getVar('date_add'),
                'warhouse' => service('request')->getVar('warhouse'),
                'product_desc_ua' => service('request')->getVar('product_desc_ua'),
                'product_desc_ru' => service('request')->getVar('product_desc_ru'),
                'is_rekomm' => service('request')->getVar('rekomm'),
                'is_akcii' => service('request')->getVar('akcii'),
            );

            $id_prod = $this->model->add_product($params);

            $cat = [
                'id_prod' => $id_prod,
                'id_cat' => service('request')->getVar('category'),
                'id_sub_cat' => service('request')->getVar('sub_cat'),
                'id_sub_sub_cat' => service('request')->getVar('sub_sub_cat'),
            ];

            $har_name = service('request')->getVar('add-spec-name');
            $har_val = service('request')->getVar('add-spec');
            $feature = [];

            foreach ($har_name as $val) {
                $feature['id_product'][] = $id_prod;
                $feature['id_name_feature'][] = $val;
            }
            foreach ($har_val as $val) {
                $feature['id_feature'][] = $val;
            }
            $feature_data = array_merge($feature);


            for ($i = 0; $i < count($feature['id_product']); $i++) {
                $data = [
                    'id_product' => $feature_data['id_product'][$i],
                    'id_name_feature' => $feature_data['id_name_feature'][$i],
                    'id_feature' => $feature_data['id_feature'][$i],
                ];

                $this->model->add_product_feature($data);
            }

            $this->model->add_product_link($cat);
            $file = $this->request->getFile('upload');

            if ($file->getName() != ''):

                // Move the file to it's new home
                $name = $file->getName();
                $PATH = getcwd();
                $file->move($PATH . '\img\product', $name);

                $img = [
                    'img' => '/img/product/' . $name
                ];
                $this->model->save_img($id_prod, $img);

            endif;
            return redirect()->to('/productadmin/index');
        } else {


            $data['menu'] = menu();

            echo view('admin/header');
            echo view('admin/product/add', $data);
            echo view('admin/footer');
        }
    }

    /*
     * Editing a product
     */
    public function edit($product_id)
    {
        // check if the product exists before trying to edit it
        $data['product'] = $this->model->get_product($product_id);
        $data['spec'] = $this->model->get_all_specifications();
        $data['spec_sel'] = $this->model->all_specifications();

        if (isset($data['product'][0]['product_id'])) {
            if (isset($_POST) && count($_POST) > 0) {

                if (!empty(service('request')->getVar('rekomm'))) {
                    $rek = service('request')->getVar('rekomm');
                } else {
                    $rek = 0;
                }
                if (!empty(service('request')->getVar('akcii'))) {
                    $akc = service('request')->getVar('akcii');
                } else {
                    $akc = 0;
                }
                //product table
                $params = array(
                    'oem' => service('request')->getVar('oem'),
                    'product_name_ua' => service('request')->getVar('product_name_ua'),
                    'product_name_ru' => service('request')->getVar('product_name_ru'),
                    'product_key_ua' => service('request')->getVar('product_key_ua'),
                    'product_key_ru' => service('request')->getVar('product_key_ru'),
                    'price' => service('request')->getVar('price'),
                    'warhouse' => service('request')->getVar('warhouse'),
                    'product_desc_ua' => service('request')->getVar('product_desc_ua'),
                    'product_desc_ru' => service('request')->getVar('product_desc_ru'),
                    'is_rekomm' => $rek,
                    'is_akcii' => $akc,
                );

                $this->model->update_product($product_id, $params);

                //product -> menu link
                $cat = [
                    'id_cat' => service('request')->getVar('category'),
                    'id_sub_cat' => service('request')->getVar('sub_cat'),
                    'id_sub_sub_cat' => service('request')->getVar('sub_sub_cat'),
                ];


                //product specification's
                foreach (service('request')->getVar('spec') as $key => $val):

                    $har = [
                        'id_feature' => $val[0],
                    ];
                    $this->model->update_feature_link($product_id, $key, $har);

                endforeach;
                $file = $this->request->getFile('upload');

                if ($file->getName() != ''):

                    // Move the file to it's new home
                    $name = $file->getName();
                    $PATH = getcwd();
                    $file->move($PATH . '\img\product', $name);

                    $img = [
                        'img' => '/img/product/' . $name
                    ];
                    $this->model->save_img($product_id, $img);

                endif;


                return redirect()->to('/productadmin/index');
            } else {
                $dataPCL = $this->model->get_cat_link($data['product'][0]['product_id']);

                foreach ($dataPCL as $value) {
                    $data['cat'][] = menu($value['id_cat']);
                    $data['cat'][] = menu($value['id_sub_cat']);
                    if ($value['id_sub_sub_cat'] != null) {
                        $data['cat'][] = menu($value['id_sub_sub_cat']);
                    }
                }
                $data['menu'] = menu();
                echo view('admin/header', $data);
                echo view('admin/product/edit', $data);
                echo view('admin/footer');
            }
        } else
            echo 'The product you are trying to edit does not exist.';
    }

    /*
     * Deleting product
     */
    public function remove($product_id)
    {
        $product = $this->model->get_product($product_id);

        // check if the product exists before trying to delete it
        if (isset($product[0]['product_id'])) {
            $this->model->delete_product($product_id);

            return redirect()->to('/productadmin/index');
        } else
            echo 'The product you are trying to delete does not exist.';
    }

    public function sel_spec()
    {
        $id = service('request')->getVar('spec');
        $data = $this->model->get_spec_val($id);

        return json_encode($data);
    }

    public function savehar()
    {
        $name = service('request')->getVar('name');
        $val = service('request')->getVar('val');
        $idprod = service('request')->getVar('prod');
        $data = ['id_product' => $idprod, 'id_feature' => $val, 'id_name_feature' => $name];
        $this->model->save_har_for_prod($data);
        return;

    }

    public function sel_sub()
    {
        $id_cat = service('request')->getVar('spec');
        $data = $this->model->find_sub_cat($id_cat);
        return json_encode($data);
    }

    public function addhar()
    {
        $data = $this->model->all_specifications();
        $datas = [];
        foreach ($data as $val) {
            $datas['id'][] = $val['id_name_har'];
            $datas['name'][] = $val['name_har_ru'];
        }
        return json_encode($datas);
    }

    public function del_har_edit()
    {
        $id_prod = service('request')->getVar('id_prod');
        $id_har = service('request')->getVar('id_name_har');

        $this->model->del_har_from_prod($id_prod, $id_har);
        return json_encode('ok');
    }

    public function export()
    {

        $allProduct = $this->model->get_clear_product();
        //var_dump($allProduct);die;
        $fp = fopen(getcwd() . '/export/price.csv', 'w+');

        $sep = "\t";
        $head = '№ в базе' . $sep . 'OEM' . $sep . 'Наименование укр' . $sep . 'Наименование рус' . $sep . 'Ключевые слова укр' . $sep .
            'Описание укр' . $sep . 'Ключевые слова рус' . $sep . 'Описание рус' . $sep . 'Цена' . $sep . 'Дата добавления' . $sep . 'На складе' . $sep . 'В рекомендованых' . $sep . 'Акция' . $sep . 'Изображение' . "\n";
        $body = '';

//        foreach ($allProduct[0] as $column_name => $column_val) {
//            $head .= $column_name . $sep;
//        }
//        print("\n");

        foreach ($allProduct as $column_name => $column_val) {
            $schema_insert = "";
            foreach ($column_val as $val) {
                if (!isset($val))
                    $schema_insert .= "NULL" . $sep;
                elseif ($column_val != "")
                    $schema_insert .= "$val" . $sep;
                else
                    $schema_insert .= "" . $sep;
            }
            $schema_insert = str_replace($sep . "$", "", $schema_insert);

            $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
            $schema_insert .= "\t";
            $body .= trim(addslashes($schema_insert));
            $body .= "\n";
            $all = $head . $body;
        }
        fwrite($fp, $all);

        $file = getcwd() . '/export/price.csv';
        if (file_exists($file)) {
            if (ob_get_level()) {
                ob_end_clean();
            }

            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            // читаем файл и отправляем его пользователю

exit;
        }

    }

    public function import()
    {
        $file = $this->request->getFile('import');

        if ($file->getName() != ''):

            // Move the file to it's new home
            $name = $file->getName();
            $PATH = getcwd();
            $file->move($PATH . '/import', $name);


            $fp = file(FCPATH . '/import/' . $name);

            for ($i = 0; $i < count($fp); $i++):
                $exp = explode("\t", $fp[$i]);

                $params = array(
                    'oem' => $exp[1],
                    'product_name_ua' => $exp[2],
                    'product_name_ru' => $exp[3],
                    'product_key_ua' => $exp[4],
                    'product_key_ru' => $exp[6],
                    'price' => $exp[8],
                    'warhouse' => $exp[10],
                    'product_desc_ua' => $exp[5],
                    'product_desc_ru' => $exp[7],
                    'is_rekomm' => $exp[11],
                    'is_akcii' => $exp[12],
                );

                $this->model->update_product($exp[0], $params);
            endfor;
        endif;
        $path = FCPATH . '/import/' . $name;
        unlink($path);
        return redirect()->to('/productadmin/index');
    }
}
