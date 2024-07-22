<?php

class MPaketmenu extends CI_Model{
    // Get all data with join from tbl_kategori
    public function get_all_with_category() {
        $this->db->select('tbl_paketmenu.*, tbl_kategori.namaKat');
        $this->db->from('tbl_paketmenu');
        $this->db->join('tbl_kategori', 'tbl_paketmenu.idKat = tbl_kategori.idKat');
        $q = $this->db->get();
		return $q->result();
	}

	public function get_all_data($tabel){
		$q=$this->db->get($tabel);
		return $q->result();
	}

	public function insert($tabel, $data){
		$this->db->insert($tabel, $data);
	}

	public function get_by_id($idPaketMenu) {
        return $this->db->get_where('tbl_paketmenu', array('idPaketMenu' => $idPaketMenu))->row();
    }

	public function update($tabel, $data, $pk, $id){
		$this->db->where($pk, $id);
		$this->db->update($tabel, $data);
	}

	public function delete($table, $id, $val) {
        $this->db->delete($table, array($id => $val));
    }

	public function get_all_data_paket()
	{
		$this->db->select("idPaketMenu, namaPaketMenu");
		$this->db->from('tbl_paketmenu');
		$q = $this->db->get();
		return $q->result();
	}

	// public function get_by_id($idPaketMenu){
	// 	return $this->db->get_where('tbl_paketmenu', array('idPaketMenu' => $idPaketMenu))->row();
	// }

}
