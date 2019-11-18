<?php
namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Models\UserModel;
use App\Models\TestModel;

class User extends Controller{
    
    public $model;
    public $locale;

    function __construct()
    {
        $this->locale  =  service('request')->getLocale();
        $this->model = new UserModel();

    }

    /*
     * Listing of users
     */
    function index()
    {

        $pager = \Config\Services::pager();


        $data = [
            'users' => $this->model->paginate(1),
            'pager' => $this->model->pager,
            'locale' => $this->locale
        ];
        echo view('admin/header',$data);
        echo view('admin/user/index',$data);
        echo view('admin/footer');
    }

    /*
     * Adding a new user
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
//				'password' => service('request')->getVar('password'),
				'name_user' => service('request')->getVar('name_user'),
				'sname_user' => service('request')->getVar('sname_user'),
				'email_user' => service('request')->getVar('email_user'),
//				'type_user' => service('request')->getVar('type_user'),
				'date_reg' => service('request')->getVar('date_reg'),
//				'user_phone_life' => service('request')->getVar('user_phone_life'),
//				'user_phone_mtc' => service('request')->getVar('user_phone_mtc'),
//				'user_phone_ks' => service('request')->getVar('user_phone_ks'),
//				'user_phone_t' => service('request')->getVar('user_phone_t'),
//				'active' => service('request')->getVar('active'),
//				'activation_code' => service('request')->getVar('activation_code'),
//				'user_soc_id' => service('request')->getVar('user_soc_id'),
				'money' => service('request')->getVar('money'),
//				'factory' => service('request')->getVar('factory'),
//				'edrpo' => service('request')->getVar('edrpo'),
//				'pay_activ' => service('request')->getVar('pay_activ'),
//				'data_pay' => service('request')->getVar('data_pay'),
//				'char_fac' => service('request')->getVar('char_fac'),
            );
            
            $user_id = $this->model->add_user($params);
            redirect('user/index');
        }
        else
        {            
            $data['_view'] = 'user/add';
            echo view('layouts/main',$data);
        }
    }  

    /*
     * Editing a user
     */
    function edit($id_user)
    {   
        // check if the user exists before trying to edit it
        $data['user'] = $this->model->get_user($id_user);
        
        if(isset($data['user']['id_user']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'password' => service('request')->getVar('password'),
					'name_user' => service('request')->getVar('name_user'),
					'sname_user' => service('request')->getVar('sname_user'),
					'email_user' => service('request')->getVar('email_user'),
					'type_user' => service('request')->getVar('type_user'),
					'date_reg' => service('request')->getVar('date_reg'),
					'user_phone_life' => service('request')->getVar('user_phone_life'),
					'user_phone_mtc' => service('request')->getVar('user_phone_mtc'),
					'user_phone_ks' => service('request')->getVar('user_phone_ks'),
					'user_phone_t' => service('request')->getVar('user_phone_t'),
					'active' => service('request')->getVar('active'),
					'activation_code' => service('request')->getVar('activation_code'),
					'user_soc_id' => service('request')->getVar('user_soc_id'),
					'money' => service('request')->getVar('money'),
					'factory' => service('request')->getVar('factory'),
					'edrpo' => service('request')->getVar('edrpo'),
					'pay_activ' => service('request')->getVar('pay_activ'),
					'data_pay' => service('request')->getVar('data_pay'),
					'char_fac' => service('request')->getVar('char_fac'),
                );

                $this->model->update_user($id_user,$params);            
                redirect('user/index');
            }
            else
            {
                $data['_view'] = 'user/edit';
                echo view('layouts/main',$data);
            }
        }
        else
            show_error('The user you are trying to edit does not exist.');
    } 

    /*
     * Deleting user
     */
    function remove($id_user)
    {
        $user = $this->model->get_user($id_user);

        // check if the user exists before trying to delete it
        if(isset($user['id_user']))
        {
            $this->model->delete_user($id_user);
            redirect('user/index');
        }
        else
            show_error('The user you are trying to delete does not exist.');
    }
    
}
