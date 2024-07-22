<?php
class MPesanan extends CI_Model {
    public function get_all_data($tabel) {
        $q = $this->db->get($tabel);
        return $q;
    }

    // Menyisipkan data baru ke tabel
    public function insert($tabel, $data) {
        $this->db->insert($tabel, $data);
    }

    // Mendapatkan data berdasarkan ID
    public function get_by_id($tabel, $id) {
        return $this->db->get_where($tabel, array('idPesanan' => $id));
    }

    // Memperbarui data
    public function update($tabel, $data, $pk, $id) {
        $this->db->where($pk, $id);
        $this->db->update($tabel, $data);
    }

    // Menghapus data
    public function delete($tabel, $id, $val) {
        $this->db->delete($tabel, array($id => $val));
    }

    // Mendapatkan data pesanan dengan informasi lengkap dari beberapa tabel
    public function get_all_orders() {
        $this->db->select('p.idPesanan, pm.namaPembeli, p.alamatPengiriman, p.tglPengiriman, p.jam, pk.namaPaketMenu, dp.quantity');
        $this->db->from('tbl_pesanan p');
        $this->db->join('tbl_pembeli pm', 'p.idPembeli = pm.idPembeli');
        $this->db->join('tbl_detailpesanan dp', 'p.idPesanan = dp.idPesanan');
        $this->db->join('tbl_paketmenu pk', 'dp.idPaketMenu = pk.idPaketMenu');
        $query = $this->db->get();
        return $query->result();
    }

	public function get_pesanan_by_idPembeli($idPembeli) {
        $this->db->where('idPembeli', $idPembeli);
        $query = $this->db->get('tbl_pesanan');
        return $query->row(); // Return a single row if found, otherwise null
    }
	
	public function simpan_pesanan($data) {
        $this->db->insert('tbl_pesanan', $data);
        return $this->db->insert_id(); // Mengembalikan id_pesanan yang baru disimpan
    }

	public function get_pesanan () {
		$this->db->select("*");
		$this->db->from('tbl_pesanan');
		$this->db->join('tbl_pembeli','tbl_pesanan.idPembeli=tbl_pembeli.idPembeli');
		$this->db->join('tbl_paketmenu','tbl_pesanan.idPaketMenu=tbl_paketmenu.idPaketMenu');
		$this->db->join('tbl_detailpesanan','tbl_pesanan.idPesanan=tbl_detailpesanan.idPesanan');
		// $this->db->join('tbl_pembeli','tbl_pesanan.idPembeli=tbl_pembeli.idPembeli');
		$query = $this->db->get();
		return $query->result();
	}

	public function delete_pesanan ($id) {
		$this->db->delete('tbl_pesanan', array('idPesanan' => $id));
	}

	public function update_pesanan($id_pesanan, $data) {
        $this->db->where('idPesanan', $id_pesanan);
        $this->db->update('tbl_pesanan', $data);
    }

    public function update_detail_pesanan($id_pesanan, $data) {
        $this->db->where('idPesanan', $id_pesanan);
        $this->db->update('tbl_detailpesanan', $data);
    }

	// public function get_user()
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('tbl_pembeli');
	// 	$this->db->join('tbl_pesanan','tbl_pembeli.idPembeli=tbl_pesanan.idPembeli');
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }
}
?>
