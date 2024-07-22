<?php

class MKategori extends CI_Model{
   public function get_all_data()
   {
	$this->db->select("*");
	$this->db->from("tbl_kategori");
	$q = $this->db->get();
	return $q->result();
   }

	public function insert($tabel, $data){
		$this->db->insert($tabel, $data);
	}

	public function get_by_id($tabel, $id){
		return $this->db->get_where($tabel, $id);
	}

	public function update($tabel, $data, $pk, $id){
		$this->db->where($pk, $id);
		$this->db->update($tabel, $data);
	}

	public function delete($table, $id, $val) {
        $this->db->delete($table, array($id => $val));
    }
	public function get_by_name($namaKat) {
        $this->db->where('namaKat', $namaKat);
        $q = $this->db->get('tbl_kategori');
        return $q->row();
    }

}
