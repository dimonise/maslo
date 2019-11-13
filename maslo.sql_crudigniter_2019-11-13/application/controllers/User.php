<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class User extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    } 

    /*
     * Listing of users
     */
    function index()
    {
        $data['users'] = $this->User_model->get_all_users();
        
        $data['_view'] = 'user/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new user
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'password' => $this->input->post('password'),
				'name_user' => $this->input->post('name_user'),
				'sname_user' => $this->input->post('sname_user'),
				'email_user' => $this->input->post('email_user'),
				'type_user' => $this->input->post('type_user'),
				'date_reg' => $this->input->post('date_reg'),
				'user_phone_life' => $this->input->post('user_phone_life'),
				'user_phone_mtc' => $this->input->post('user_phone_mtc'),
				'user_phone_ks' => $this->input->post('user_phone_ks'),
				'user_phone_t' => $this->input->post('user_phone_t'),
				'active' => $this->input->post('active'),
				'activation_code' => $this->input->post('activation_code'),
				'user_soc_id' => $this->input->post('user_soc_id'),
				'money' => $this->input->post('money'),
				'factory' => $this->input->post('factory'),
				'edrpo' => $this->input->post('edrpo'),
				'pay_activ' => $this->input->post('pay_activ'),
				'data_pay' => $this->input->post('data_pay'),
				'char_fac' => $this->input->post('char_fac'),
            );
            
            $user_id = $this->User_model->add_user($params);
            redirect('user/index');
        }
        else
        {            
            $data['_view'] = 'user/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a user
     */
    function edit($id_user)
    {   
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($id_user);
        
        if(isset($data['user']['id_user']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'password' => $this->input->post('password'),
					'name_user' => $this->input->post('name_user'),
					'sname_user' => $this->input->post('sname_user'),
					'email_user' => $this->input->post('email_user'),
					'type_user' => $this->input->post('type_user'),
					'date_reg' => $this->input->post('date_reg'),
					'user_phone_life' => $this->input->post('user_phone_life'),
					'user_phone_mtc' => $this->input->post('user_phone_mtc'),
					'user_phone_ks' => $this->input->post('user_phone_ks'),
					'user_phone_t' => $this->input->post('user_phone_t'),
					'active' => $this->input->post('active'),
					'activation_code' => $this->input->post('activation_code'),
					'user_soc_id' => $this->input->post('user_soc_id'),
					'money' => $this->input->post('money'),
					'factory' => $this->input->post('factory'),
					'edrpo' => $this->input->post('edrpo'),
					'pay_activ' => $this->input->post('pay_activ'),
					'data_pay' => $this->input->post('data_pay'),
					'char_fac' => $this->input->post('char_fac'),
                );

                $this->User_model->update_user($id_user,$params);            
                redirect('user/index');
            }
            else
            {
                $data['_view'] = 'user/edit';
                $this->load->view('layouts/main',$data);
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
        $user = $this->User_model->get_user($id_user);

        // check if the user exists before trying to delete it
        if(isset($user['id_user']))
        {
            $this->User_model->delete_user($id_user);
            redirect('user/index');
        }
        else
            show_error('The user you are trying to delete does not exist.');
    }
    
}