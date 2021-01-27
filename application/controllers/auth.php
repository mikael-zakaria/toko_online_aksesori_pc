<?php 
	
class Auth extends CI_Controller {
		
	public function login() {

		//Rules untuk pesan error
		$this->form_validation->set_rules('username','Username','required', ['required' => 'Username Wajib Diisi!']);
		$this->form_validation->set_rules('password','Pasword','required', ['required' => 'Password Wajib Diisi!']);

		//Apabila tidak berjalan
		if( $this->form_validation->run() == FALSE ) {

			$this->load->view('templates/header');
			$this->load->view('login');
			$this->load->view('templates/footer');

		} else {

			//Cek Login melalui model
			$auth = $this->model_auth->cek_login();

			//Apabila Cek Login Gagal
			if ($auth == FALSE) {
				//Tampilkan Pesan Error
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Username atau Password Anda Salah!</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
				//Redirect
				redirect('auth/login');
			} else {

				//Set Username dan Role id
				$this->session->set_userdata('username', $auth->username);
				$this->session->set_userdata('role_id', $auth->role_id);

				//Switch untuk Redirect
				switch ($auth->role_id) {
					case 1:
						redirect('admin/dashboard_admin');
						break;

					case 2:
						redirect('dashboard_welcome');
						break;
					
					default:
						break;
				}
			}

		}

	}

	public function logout(){

		$this->session->sess_destroy();
		
		redirect('auth/login');
	}


}