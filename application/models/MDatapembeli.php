<?php

class MDatapembeli extends CI_Model{
    public function get_all_data($tabel){
		$q=$this->db->get($tabel);
		return $q;
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

}