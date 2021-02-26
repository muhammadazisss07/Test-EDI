<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('M_login', 'login');
        $this->load->helper('security');
    }

    public function index(){
        $this->load->view('login/V_login');
    }

    public function doLogin() {
        $email = strip_tags(str_replace("'", "", $this->input->post('email')));
        $password = strip_tags(str_replace("'", "", $this->input->post('password')));

        $data = [
            'email' => $email,
            'password' => md5($password)
        ];

        $login = $this->login->login($this->security->xss_clean($data));

        if (!empty($login) > 0) {
            $this->session->set_userdata('login', true);
            $this->session->set_userdata('id', $login[0]['id']);
            $this->session->set_userdata('email', $login[0]['email']);
            $this->session->set_userdata('level', $login[0]['level']);

            if ($login[0]['level'] == 1) {
                redirect('Admin');
            } else if ($login[0]['level'] == 2) {
                redirect('Profile');
            }
            
        } else {
            echo $this->session->set_flashdata('flash', 'failed');
            redirect('Login');
        }
    }

    public function register(){
        $this->load->view('login/V_register');
    }

    public function doRegister() {
        $email = strip_tags(str_replace("'", "", $this->input->post('email')));
        $password = strip_tags(str_replace("'", "", $this->input->post('password')));

        $data = [
            'email' => $email,
            'password' => md5($password)
        ];

        $login = $this->login->register($this->security->xss_clean($data));

        if ($login == 'success') {
            echo $this->session->set_flashdata('flash', 'Your account was created. Please login!');

            redirect('Login');
        } else {
            echo $this->session->set_flashdata('flash', 'failed');

            redirect('Login');
        }
    }

    public function cek_email() {
        $email = strip_tags(str_replace("'", "", $this->input->post('email')));

        $cek_email = $this->login->cek_email($this->security->xss_clean($email));

        if ($cek_email) {
            echo 'exist';
        } else {
            echo 'oke';
        }
    }

    public function doLogout() {
        $user = $this->session->userdata('email');

        $logout = $this->login->logout($user);

        $this->session->sess_destroy();
        $url = base_url('Login');
        redirect($url);
    }
}
?>