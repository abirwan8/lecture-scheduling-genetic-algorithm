<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_check {

    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function check_role($allowed_roles = [])
    {
        $user_role = $this->CI->session->userdata('role');
        if (!$user_role || !in_array($user_role, $allowed_roles)) {
            redirect('no_access'); // Halaman tidak diizinkan
        }
    }
}
