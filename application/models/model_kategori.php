<?php 

class Model_kategori extends CI_Model {
	
	public function data_ram() {
		return $this->db->get_where('tb_barang', array('kategori' => 'ram'));
	}

	public function data_ssd() {
		return $this->db->get_where('tb_barang', array('kategori' => 'ssd'));
	}

	public function data_mouse() {
		return $this->db->get_where('tb_barang', array('kategori' => 'mouse'));
	}

}