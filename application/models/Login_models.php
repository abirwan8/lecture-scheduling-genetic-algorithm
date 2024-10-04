<?php
class Login_models extends CI_Model {
    public function check_login($username, $password) {
        // Check the database for a user with the given username and password
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('tbl_admin');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}
?>
