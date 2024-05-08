<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('login_view');
    }

   public function process_login() {
    $mobile = $this->input->post('mobile');
    $password = $this->input->post('password');

    $user = $this->user_model->login($mobile, $password);
var_dump($user);
    if ($user) {
        // Set user session data
        $this->session->set_userdata('user_id', $user['id']); // Store user ID in session
        $this->session->set_userdata('username', $user['name']);
        redirect('Voter/index'); 
    } else {
        // Show login error message
        $data['error_message'] = 'Invalid mobile number or password';
        $this->load->view('login_view', $data);
    }
}

}