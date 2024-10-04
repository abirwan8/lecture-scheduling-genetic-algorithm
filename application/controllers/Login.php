<?php
/**
 *
 */
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('cookie');
        if ($this->session->userdata('hasLogin')) {
            redirect('admin/index');
        }
    }

    function index()
    {
        // Cek apakah cookie tersedia
        $cookieUsername = get_cookie('username');
        $cookiePassword = get_cookie('password');

        if ($cookieUsername && $cookiePassword) {
            // Jika cookie tersedia, lakukan login otomatis
            $cek = $this->db->get_where('tbl_admin', array('username' => $cookieUsername, 'password' => $cookiePassword))->result_array();
            if (count($cek) > 0) {
                $set = array(
                    "hasLogin" => 'true',
                    "role" => $cek[0]['role'],
                    "nama" => $cek[0]['nama']
                );
                $this->session->set_userdata($set);
                redirect('admin/index');
            }
        }

        $this->load->view('login/index');
    }

    function cekLogin()
    {
        $keys = array_column($this->input->post('data'), 'name');
        $values = array_column($this->input->post('data'), 'value');

        $data = array_combine($keys, $values);

        $user = $data['username'];
        $pass = md5($data['password']);
        $rememberMe = isset($data['rememberMe']) && $data['rememberMe'] == 'true';

        $cek = $this->db->get_where('tbl_admin', array('username' => $user, 'password' => $pass))->result_array();

        if (count($cek) > 0) {
            $res = true;
            $set = array(
                "hasLogin" => 'true',
                "role" => $cek[0]['role'],
                "nama" => $cek[0]['nama']
            );
            if ($rememberMe) {
                set_cookie('username', $user, 86500); // 1 day
                set_cookie('password', $pass, 86500); // 1 day
            } else {
                delete_cookie('username');
                delete_cookie('password');
            }

            $this->session->set_userdata($set);
        } else {
            $res = false;
        }

        echo json_encode($res);
    }
}
