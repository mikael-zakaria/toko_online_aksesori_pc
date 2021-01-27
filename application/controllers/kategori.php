<?php 
	
	class Kategori extends CI_Controller {

		function ram() {
			
			$data['ram'] = $this->model_kategori->data_ram()->result();

			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('ram', $data);	
			$this->load->view('templates/footer');

		}

		function ssd() {

			$data['ssd'] = $this->model_kategori->data_ssd()->result();

			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('ssd', $data);	
			$this->load->view('templates/footer');
			
		}

		function mouse() {
			
			$data['mouse'] = $this->model_kategori->data_mouse()->result();

			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('mouse', $data);	
			$this->load->view('templates/footer');
			
		}

	}

