<?php

class M_laporan extends CI_Model{
  
	public function get_all_data()
	{
		$this->db->select("*");
		$this->db->from('tbl_detailpesanan');
		$this->db->join('tbl_pesanan','tbl_detailpesanan.idPesanan = tbl_pesanan.idPesanan');
		$this->db->join('tbl_pembeli','tbl_pesanan.idPembeli = tbl_pembeli.idPembeli');
		$this->db->join('tbl_paketmenu','tbl_detailpesanan.idPaketMenu = tbl_paketmenu.idPaketMenu');
		return $this->db->get()->result();
		
	}
}

?>