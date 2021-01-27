<?php 

class Dashboard extends CI_Controller {
	
	//Membuat Method agar user wajib login ke web disini
	public function __construct(){
		parent::__construct();

		if( $this->session->userdata('role_id') != '2' ) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Anda Belum Login!</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('auth/login');
		}
	}

	public function index () {

		$data['barang'] = $this->model_barang->tampil_data()->result();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard', $data);	
		$this->load->view('templates/footer');
	}


	//Membuat Fitur Tambah keranjang
	public function tambah_ke_keranjang ($id) {

		//mengambil data dari method find
		$barang = $this->model_barang->find($id);

		//Array khusus untuk library Cart
		$data = array (
	        'id'      => $barang->id_brg,
	        'qty'     => 1,
	        'price'   => $barang->harga,
	        'name'    => $barang->nama_barang
	    );

		//insert data ke library cart
		$this->cart->insert($data);

		redirect('dashboard_welcome');
	}	

	//Untuk Menu detail_Keranjang
	function detail_keranjang(){
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('keranjang');	
		$this->load->view('templates/footer');
	}

	//Untuk Hapus
	function hapus_keranjang(){
		$this->cart->destroy();
		redirect('dashboard_welcome');
	}
	
	//Untuk Pembayaran
	function pembayaran(){
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pembayaran');	
		$this->load->view('templates/footer');
	}

	//Untuk Konfimasi pesanan 
	function proses_pesanan(){

		$is_processed = $this->model_invoice->index();

		if ($is_processed) {
			$this->cart->destroy();

			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('proses_pesanan');	
			$this->load->view('templates/footer');

		} else {
			echo("Pesanan Anda Gagal Diproses");		
		}
	}

	public function detail($id_brg){

		$data['barang'] = $this->model_barang->detail_barang($id_brg);

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail_barang', $data);	
		$this->load->view('templates/footer');

	}


}	