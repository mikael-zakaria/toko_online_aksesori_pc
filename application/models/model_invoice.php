<?php 

//Menggunakan Composer untuk waktu
require 'vendor/autoload.php';
use Carbon\Carbon;

class Model_invoice extends CI_Model {
	
	public function index() {

		//Date time berdasar jakarta
		date_default_timezone_set('Asia/Jakarta');

		//Ambil dari method post
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		
		//Simpan di Array invoice
		$invoice = array (
			'nama' => $nama,
			'alamat' => $alamat,
			'tgl_pesan' => Carbon::now(),
			'batas_bayar' => Carbon::now()->addDay()
		);

		//input data ke database tabel tb_invoice
		$this->db->insert('tb_invoice', $invoice);

		//ambil nilai dari insert_id
		$id_invoice = $this->db->insert_id();

		//Perulangan untuk simpan daya ke database 
		foreach ($this->cart->contents() as $item) {
			$data = array (
				'id_invoice' => $id_invoice,
				'id_barang'	=> $item['id'],
				'nama_barang' => $item['name'],
				'jumlah'	=> $item['qty'],
				'harga'	=> $item['price']
			);

			//input data ke database tabel tb_pesanan
			$this->db->insert('tb_pesanan', $data);
		}
		return TRUE;
	}

	public function tampil_data(){

		$result = $this->db->get('tb_invoice');

		if($result->num_rows() > 0){

			return $result->result();
		
		} else {

			return array();

		}
	}

}