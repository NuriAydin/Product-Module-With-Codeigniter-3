<?php
class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('User_model');
        $this->load->library(array('session', 'form_validation'));
        $this->check_session();
    }

    public function index() {
        $this->load->view('login');
    }

    public function authenticate() {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Invalid email or password');
            $this->load->view('login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->User_model->get_user($email, $password);

            if ($user) {
                $this->session->set_userdata('logged_in', true);
                $this->session->set_userdata('user_id', $user->id);
                redirect('products');
            } else {
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect('login');
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->sess_destroy();
        redirect('login');
    }

    private function check_session()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('products');
        }
    }
}
