<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function load_view($view_name, $data = array()) {
        $this->load->view('layouts/main', array('content' => $this->load->view($view_name, $data, TRUE)));
    }

}
