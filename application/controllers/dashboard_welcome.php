<?php 

class Dashboard_welcome extends CI_Controller {

	//Untuk Tanpa login
	public function index () {

		$data['barang'] = $this->model_barang->tampil_data()->result();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard', $data);	
		$this->load->view('templates/footer');
	}
}
