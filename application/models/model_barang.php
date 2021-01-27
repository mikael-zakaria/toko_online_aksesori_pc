<?php 

class Model_barang extends CI_Model {
	
	function tampil_data() {
		//Mengabil Data dari tabel barang
		return $this->db->get('tb_barang');
	}

	//Model untuk menambah Barang
	function tambah_barang($data, $table){
		//Insert Data ke Database
		$this->db->insert($table, $data);
	}

	//Digunakan mengambil Data Barang dengan parameter Where
	function edit_barang($where, $table){
		return $this->db->get_where($table, $where);
	}

	//Digunakan untuk Melakukan Update pada database 
	function update_data($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	//Digunakan untuk Melakukan Delete pada database 
	function hapus_data($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	//Membuat method untuk mencari barang dan mengembailkan barang
	public function find($id){
		
		//Simpan ke variabel result dari hasil pencarian
		$result = $this->db->where('id_brg', $id)
						   ->limit(1)
						   ->get('tb_barang');
		
		if($result->num_rows() > 0){
		
			return $result->row();
		
		} else {
		
			return array();
		
		}
	}

	public function detail_barang($id_brg){

		$result = $this->db->where('id_brg', $id_brg)
						   ->get('tb_barang');

		if ( $result->num_rows() > 0) {
			return $result->result();

		}else{

			return false;
		}
	}

}