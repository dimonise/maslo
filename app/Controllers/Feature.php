<?php
namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\FeatureModel;
class Feature extends Controller{
    function __construct()
    {
        $this->locale  =  service('request')->getLocale();
        $this->model = new FeatureModel();
    } 

    /*
     * Listing of feature
     */
    function index()
    {
        $data['feature'] = $this->model->get_all_feature();
        

        echo view('admin/header',$data);
        echo view('admin/feature/index',$data);
        echo view('admin/footer');
    }

    /*
     * Adding a new feature
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'name_har_ua' => $this->input->post('name_har_ua'),
				'name_har_ru' => $this->input->post('name_har_ru'),
            );
            
            $feature_id = $this->Feature_model->add_feature($params);
            redirect('feature/index');
        }
        else
        {            
            $data['_view'] = 'feature/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a feature
     */
    function edit($id_name_har)
    {   
        // check if the feature exists before trying to edit it
        $data['feature'] = $this->Feature_model->get_feature($id_name_har);
        
        if(isset($data['feature']['id_name_har']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'name_har_ua' => $this->input->post('name_har_ua'),
					'name_har_ru' => $this->input->post('name_har_ru'),
                );

                $this->Feature_model->update_feature($id_name_har,$params);            
                redirect('feature/index');
            }
            else
            {
                $data['_view'] = 'feature/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The feature you are trying to edit does not exist.');
    } 

    /*
     * Deleting feature
     */
    function remove($id_name_har)
    {
        $feature = $this->Feature_model->get_feature($id_name_har);

        // check if the feature exists before trying to delete it
        if(isset($feature['id_name_har']))
        {
            $this->Feature_model->delete_feature($id_name_har);
            redirect('feature/index');
        }
        else
            show_error('The feature you are trying to delete does not exist.');
    }
    
}
