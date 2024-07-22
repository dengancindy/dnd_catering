<?php

class Madmin extends CI_Model {
    public function cek_login($u) {
        $q = $this->db->get_where('tbl_admin', array('userName' => $u));
        return $q->row_array();
    }
}
