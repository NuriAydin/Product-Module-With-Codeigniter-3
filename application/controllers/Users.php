<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->database();
        $this->load->model('User_model');
        $this->load->library(array('session', 'form_validation'));
        $this->check_session();
    }

    public function register() {
        $this->form_validation->set_rules('email', 'Mail', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password_confirm', 'Password Again', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Please check your information!');
            $this->load->view('register');
        } else {
            $data = array(
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password'))
            );

            $this->User_model->register($data);
            redirect('login?v=1');
        }
    }


    private function check_session()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('products');
        }
    }
}
?>
