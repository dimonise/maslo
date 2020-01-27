<?php

namespace App\Controllers;

use App\Controllers\BaseController as Controller;
use App\Helpers\Menu;
use App\Models\ContactModel;
use App\Controllers\Search as Search;

class Auth extends Controller {

    public $locale;
    protected $table = 'users';
    private $db;
    private $session;
    private $search;
    public $contact;

    public function __construct() {
        $this->locale = service('request')->getLocale();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
        $this->search = new Search();
        $this->contact = new ContactModel();
        helper(['form', 'url', 'menu']);
    }

    public function index() {
        $data['locale'] = $this->locale;
        $data['title'] = lang('Language.login');
        $data['tree'] = menu();
        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);
        $data['search'] = $this->search->index();
        $data['contact'] = $this->contact->index();
        echo view('templates/header', $data);
        echo view('login');
        echo view('templates/footer', $data);
    }

    public function registration() {
        $data['locale'] = $this->locale;
        $data['title'] = "Регистрация";
        $data['tree'] = menu();
        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);
        $data['search'] = $this->search->index();
        $data['contact'] = $this->contact->index();
        echo view('templates/header', $data);
        echo view('registration', $data);
        echo view('templates/footer', $data);
    }

    public function new_user() {
        $this->session->sess_destroy();
        $this->registration();
    }

    public function creat_user_soc() {
        $data['locale'] = $this->locale;

        $token = service('request')->getPost('token');
        $result = file_get_contents('http://ulogin.ru/token.php?token=' . $token . '&host=' . $_SERVER['HTTP_HOST']);
        //$datas = json_decode($result, true);
        //$user['network'] - соц. сеть, через которую авторизовался пользователь
        //$user['identity'] - уникальная строка определяющая конкретного пользователя соц. сети
        //$user['first_name'] - имя пользователя
        //$user['last_name'] - фамилия пользователя

        $datas = $result ? json_decode($result, true) : array();
        $builder = $this->db->table('users');
        $builder->where('user_soc_id', $datas['uid']);
        $coun = $builder->get()->getResult();

        //$coun = $this->db->query('select user_soc_id from users where user_soc_id = :slug:',['slug' => $datas['uid']]);

        if ($coun[0]->user_soc_id > 0) {
            foreach ($coun as $val) {

                if ($datas['uid'] == $val->user_soc_id) {
                    $arr = array(
                        'name_user' => $val->name_user,
                        'sname_user' => $val->sname_user,
                        'email_user' => $val->email_user,
                        'uid' => $val->user_soc_id,
                        'id_user' => $val->id_user,
                        'type' => $val->type_user,
                        'lang' => $data['locale']
                    );
                    $session = session();
                    $session->set($arr);
                    return redirect()->to('/');
                }
            }
        } else {

            $s = "1234567890abvgdegziyklmnoprstufieABVGDEGZIYKLMNOPRSTUFIE";
            $g = substr($s, rand(0, strlen($s)), 25);
            if (!isset($datas['email'])) {
                $dat = array('email' => 'test');
            } else {
                $dat = $datas['email'];
            }

            $opt = array(
                'activation_code' => $g,
                'name_user' => $datas['first_name'],
                'sname_user' => $datas['last_name'],
                'email_user' => $dat['email'],
                'password' => md5($datas['uid']),
                'user_soc_id' => $datas['uid'],
                'active' => 1,
            );
            $builder->insert($opt);
            $arr = array(
                'email_user' => $dat['email'],
                'uid' => $datas['uid'],
            );
            $session = session();
            $session->set($arr);
            return redirect()->to('/');
        }
    }

    public function creat_user() {
        $validation = \Config\Services::validation();


        $fname = service('request')->getPost('fname');
        $email_user = service('request')->getPost('email');

        $builder = $this->db->table('users');
        $builder->selectCount('email_user');
        $builder->where('email_user', $email_user);
        $query = $builder->get()->getResult();

        if ($query[0]->email_user == 0) {

            $pass = service('request')->getPost('password');

            $rules = [
                'fname' => [
                    'label' => lang('Language.fname'),
                    'rules' => 'required|min_length[4]',
                    'errors' => [
                        'required' => lang('Language.create_user_name_label')
                    ]
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'valid_email|required',
                    'errors' => [
                        'required' => lang('Language.create_user_email_label')
                    ]
                ],
                'password' => [
                    'label' => 'Пароль',
                    'rules' => 'min_length[8]|required|matches[repassword]',
                    'errors' => [
                        'min_length' => lang('Language.create_user_password_label'),
                    //'matches' => lang('Language.create_user_password_label')
                    ]
                ],
                'repassword' => [
                    'label' => lang('Language.repass'),
                    'rules' => 'required|min_length[8]',
                    'errors' => [
                        'min_length' => lang('Language.create_user_password_confirm_label')
                    ]
                ]
            ];

            if (!$this->validate($rules)) {
                $error = $validation->getErrors();
                //var_dump($error);
                $res['error'] = '1';
                $res['msg'] = $error;
                echo json_encode($res);
            } else {


                $s = "1234567890abvgdegziyklmnoprstufieABVGDEGZIYKLMNOPRSTUFIE";
                $g = substr($s, rand(0, strlen($s)), 25);
                $opt = array(
                    'activation_code' => $g,
                    'email_user' => $email_user,
                    'password' => md5($pass),
                    'name_user' => $fname,
                    'active' => 0,
                );
                $builder->insert($opt);
                $em = str_replace('@', '-', $email_user);
                $mess = "Для подтверждения почтового адреса, указанного при регистрации, перейдите по ссылке ниже.
                            <br> <a href='http://maslo.loc/" . $this->locale . "/auth/activator/" . $em . "/" . $g . "'>ACTIVE ACCOUNT</a>";

                $email = \Config\Services::email();
                $config['mailtype'] = 'html';
                $config['wordWrap'] = true;
                $email->initialize($config);

                $email->setFrom('maslo@gmail.com', 'Admin');
                $email->setTo($email_user);

                $email->setSubject('http://maslo.loc');
                $email->setMessage('<h3>Активация аккаунта</h3>' . $mess);

                $email->send();

                $res['error'] = '0';
                echo json_encode($res);
            }
        } else {
            $res['error'] = '2';
            echo json_encode($res);
            redirect(base_url(), 'location');
        }
    }

    public function success_isset() {
        $lang = $this->locale;
        $data['title'] = "Авторизация";
        $data['txt'] = 'Пользователь с таким email существует! <a href="/' . $lang . '/login" style="color:green;text-decoration: underline"> Авторизуйтесь! </a>';
        $data['tree'] = menu();
        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);
        $data['search'] = $this->search->index();
        $data['contact'] = $this->contact->index();
        echo view('templates/header-login', $data);
        echo view('success', $data);
        echo view('templates/footer-login', $data['locale']);
    }

    public function success() {
        $data['locale'] = $this->locale;
        $data['title'] = "Авторизация";
        $data['txt'] = 'Поздравляем! Вы успешно зарегистрировались на нашем портале. 
                В течении нескольких минут на указанный Вами при регистрации email придет письмо со ссылкой для активации Вашего аккаунта.';
        $data['tree'] = menu();
        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);
        $data['search'] = $this->search->index();
        $data['contact'] = $this->contact->index();
        echo view('templates/header', $data);
        echo view('success', $data);
        echo view('templates/footer', $data);
    }

    public function login() {
        $data['locale'] = $this->locale;


        $login = service('request')->getVar('email');
        $password = md5(service('request')->getVar('password'));

        if (!empty($login) && isset($login)) {
            $builder = $this->db->table('users');
            $builder->where('email_user', $login);
            $builder->where('active', 1);
            $query = $builder->get()->getResult();

//d($login);
            d($query);
            if ($query) {
                foreach ($query as $val) {

                    if ($val->password == $password) {

//                        $this->load->model('cabinet_model');
                        //$money = $this->cabinet_model->money($val->id_user);

                        $arr = array(
                            'name_user' => $val->name_user,
                            'last_name' => $val->sname_user,
                            'email_user' => $val->email_user,
                            'id_user' => $val->id_user,
                            'type' => $val->type_user,
                            'lang' => $data['locale'],
                                //'money' => $money[0]->money
                        );
                        $session = session();
                        $session->set($arr);
//                        var_dump( $this->session->userdata());die;
                        return redirect()->to('/');
                    } else {
                        $this->forgot_view();
                    }
                }
            } else {
                $this->forgot_view();
            }
        } else {
            $this->forgot_view();
        }
    }

    public function forgot_view() {
        $data['locale'] = $this->locale;
        $data['title'] = "Восстановление пароля";
        $data['tree'] = menu();
        $tree = createTree($data['tree']);
        $data['mmm'] = renderTemplate($tree);
        $data['search'] = $this->search->index();
        $data['contact'] = $this->contact->index();
        echo view('templates/header', $data);
        echo view('forgot', $data);
        echo view('templates/footer', $data);
    }

    public function forgot() {
        $data['locale'] = $this->locale;

        $to = service('request')->getPost('email');
        $validation = \Config\Services::validation();

        $rules = [

            'email' => [
                'label' => 'Email',
                'rules' => 'valid_email|required',
                'errors' => [
                    'required' => lang('Language.create_user_email_label')
                ]
            ]
        ];
        if ($this->validate($rules)) {

            $builder = $this->db->table('users');
            $builder->where('email_user', $to);
            $builder->selectCount('email_user');
            $query = $builder->get()->getResult();


            if ($query[0]->email_user > 0) {
                $s = "12&$%34lmnoprstufie567890iushgccujKLMNOPRSTabvg*&degziykABVGDEGZIYUFIE";

                $g = substr($s, rand(0, strlen($s)), 10);

                if (strlen($g) < 8) {
                    $g = substr($s, rand(0, strlen($s)), 10);
                    $this->forgot();
                } else {
                    $email = \Config\Services::email();
                    $message = lang('Language.email_new_password_revo') . " <b>" . $g . "</b>";
                    $email->setFrom('admin@maslo.com', 'Admin');
                    $email->setTo($to);
                    $email->setSubject('Forgot password');
                    $email->setMessage($message);
                    $email->send();

                    $arr = array(
                        'password' => md5($g)
                    );

                    $builder = $this->db->table('users');
                    $builder->where('email_user', $to);
                    $builder->update($arr);

                    return "<script> alert('" . lang('Language.go_pass_fog') . "'); location.href='/'</script>";
                }
            } else {
                echo "<script> alert('" . lang('Language.go_pass_no_acc') . "'); location.href='/'</script>";
            }
        }
    }

    public function activator() {

        $data['locale'] = $this->locale;
        $uri = service('uri', current_url(true));

        $em = str_replace('-', '@', $uri->getSegment(4));
        $a = array('email_user' => $em);
        //echo $a['email_user'];die;
        $this->session->set($a);
        $code = $uri->getSegment(5);
        $builder = $this->db->table('users');
        $builder->where('activation_code', $code);
        $query = $builder->get()->getResult();

        if ($query[0]->id_user > 0) {
            foreach ($query as $val) {
                $data = array(
                    'active' => 1
                );
                $builder = $this->db->table('users');
                $builder->where('activation_code', $code);
                $builder->update($data);
            }
        }
//dd($uri->getHost());
        return redirect()->to('/'); /* .'/'. $lang . "/personal/settings", 'refresh'); */
    }

    public function logout() {

        $this->session->destroy();
        return redirect()->to('/');
    }

}
