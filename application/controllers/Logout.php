<?php
class Logout extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'session'));
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->sess_destroy();
        redirect('login');
    }
}
