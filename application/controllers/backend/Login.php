<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {

        parent::__construct();

        if (isset($_SESSION['lang'])) {
            $this->lang->load('content', $_SESSION['lang']);
        } else {
            $this->lang->load('content', 'english');
        }
    }

    public function index() {

        if (isset($_SESSION['user_auth'])) {


            if ($_SESSION['user_auth'] == true && $_SESSION['userType'] == "admin") {

                $this->session->set_flashdata('message', 'Welcome to Admin Panel.');
                redirect('admin', 'refresh');
            }
            
            if ($_SESSION['user_auth'] == true && $_SESSION['userType'] == "agent") {

                $this->session->set_flashdata('message', 'Welcome to Agent Panel.');
                redirect('agent', 'refresh');
            }
           
            if ($_SESSION['user_auth'] == true && $_SESSION['userType'] == "user") {

                $this->session->set_flashdata('message', 'Welcome to User Panel.');
                redirect('user', 'refresh');
            }
            
        }

        $this->load->view('backEnd/login_view');
    }

    public function login_validation() {

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $remember_me = $this->input->post('remember_me');

        if ($remember_me == "on") {

            $this->db->where('password', sha1($password));
            $this->db->group_start()
                    ->where('status', 1)
                    ->where('email', $email)
                    ->or_where('username', $email)
                    ->group_end();
            $savedLoginQuery = $this->db->get('user');
            $user = $savedLoginQuery->num_rows();

            if ($user > 0) {

                $this->session->set_userdata('user_auth', true);

                $this->session->set_userdata('loginname', $email);
                $this->session->set_userdata('userid', $savedLoginQuery->row()->id);
                $this->session->set_userdata('username', $savedLoginQuery->row()->username);
                $this->session->set_userdata('username_first', $savedLoginQuery->row()->firstname);
                $this->session->set_userdata('username_last', $savedLoginQuery->row()->lastname);

                $this->session->set_userdata('userType', $savedLoginQuery->row()->userType);
                $this->session->set_userdata('userPhoto', $savedLoginQuery->row()->photo);

                $this->lang_set();
                redirect('login', 'refresh');
            } else {

                //flash data wrong username or password
                $this->session->set_flashdata('message', 'Login Failed !');
                redirect('login', 'refresh');
            }
        } else {
            $this->session->set_flashdata('message', 'Login Failed !');
            redirect('login', 'refresh');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }

    public function lang_set($lang = 'english') {
        $this->session->set_userdata('lang', $lang);
        redirect('login', 'refresh');
    }

    public function setting_change() {
        redirect('login', 'refresh');
    }

    public function forgot_password()
    {
        $this->load->view('backEnd/forgot_password');
    }

    

        


        
    

    public function reset_password()
    {

        $data['request_id'] = $this->input->get('reqs', true);

        $data['user_id']    = $this->db->where('id', $data['request_id'])->get('password_recovery')->row()->userId;

        $data['reset_password'] = 'yes';

        $this->load->view('backEnd/login_view', $data);
        
    }

    public function save_reset_password()
    {
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id           = $this->input->post('user_id', true);
            $new_password = sha1($this->input->post('new_password', true));
            $request_id   = $this->input->post('request_id', true);

                $this->db->where('id', $id)->update('user', array('password'=>$new_password));

                $this->db->where('id', $request_id)->update('password_recovery', array('status'=>2));

                echo "Your Password Changed Successfully! You can <a href='".base_url('login')."'>Login </a> Now";
        }
    }

    

}
