<?php
class M_belanja extends CI_Model {
   public function simpan_pesanan($data) {
        $this->db->insert('tbl_pesanan', $data);
        return $this->db->insert_id(); // Mengembalikan id_pesanan yang baru disimpan
    }

    public function simpan_rincian_pesanan($data_rincian) {
        $this->db->insert('tbl_detailPesanan', $data_rincian);
	}
}
?>
