<?php

class M_halaman_utama extends CI_Model{
    // Get all data with join from tbl_kategori
    public function get_all_with_category() {
        $this->db->select('tbl_paketmenu.*, tbl_kategori.namaKat');
        $this->db->from('tbl_paketmenu');
        $this->db->join('tbl_kategori', 'tbl_paketmenu.idKat = tbl_kategori.idKat');
        return $this->db->get()->result();
	}

	public function get_kategori($idKategori) 
	{
		$this->db->select("*");
		$this->db->from("tbl_paketmenu");
		$this->db->join("tbl_kategori", "tbl_paketmenu.idKat = tbl_kategori.idKat");
		$this->db->where("tbl_paketmenu.idKat", $idKategori);
		return $this->db->get()->result();
	}
	public function get_data_kategori() 
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		return $this->db->get()->result();
	}
}
