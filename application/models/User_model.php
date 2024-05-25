<?php
class User_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_user($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $query = $this->db->get('users');
        return $query->row();
    }

    public function register($data) {
        return $this->db->insert('users', $data);
    }
}
