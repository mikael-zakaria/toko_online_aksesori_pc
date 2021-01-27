<?php 
	
class Registrasi extends CI_Controller {
		
	public function index() {

		//Aturan Rule Untuk Form Daftar Akun
		$this->form_validation->set_rules('nama', 'Nama', 'required', ['required' => 'Nama Wajib Diisi!']);
		$this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username Wajib Diisi!']);
		$this->form_validation->set_rules('password', 'Password', 'required|matches[password_2]', 
			['required' => 'Password Wajib Diisi!',
			'matches' => 'Password Tidak Cocok!']
		);
		$this->form_validation->set_rules('password_2', 'Password', 'required|matches[password]', 
			['required' => 'Password Wajib Diisi!',
			'matches' => 'Password Tidak Cocok!']
		);

		//Apabila Validas Gagal
		if($this->form_validation->run() == FALSE){
		
			//Load Views
			$this->load->view('templates/header');
			$this->load->view('registrasi');
			$this->load->view('templates/footer');
		
		} else {

			//Simpan ke Array
			$data = array(
				'id' => '',
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'role_id' => 2
			);

			//Insert Ke Database
			$this->db->insert('tb_user', $data);
			redirect('auth/login');
		}
	}
}