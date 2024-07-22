<?php
class MPembeli extends CI_Model {

   public function cek_login($u, $p) {
    // Hash the input password
    $hashed_password = md5($p);
    
    // Query the database with username and hashed password
    $q = $this->db->get_where('tbl_pembeli', array('namaPembeli' => $u, 'password' => $hashed_password));
    
    // Return the result
    return $q->row_array();
}


   public function register($data) {
        return $this->db->insert('tbl_pembeli', $data);
    }

	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('tbl_pembeli');
		$q = $this->db->get();
		return $q->result();
	}

	public function pelanggan_login($namaPembeli, $password) {
        $this->db->where('namaPembeli', $namaPembeli);
        $this->db->where('password',$password); // Assuming the password is stored as an MD5 hash
        $query = $this->db->get('tbl_pembeli');
        return $query->row();
    }
}
?>
