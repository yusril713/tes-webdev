<?php
	class Pages extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->library('session');
			$this->load->library("pagination");
			date_default_timezone_set("Asia/Jakarta");
			//$this->load->library('session');
		}

		public function index(){
			if($this->session->userdata('username')) {
				$this->load->view('templates/header');
				$this->load->view('templates/navbar');
				$this->load->view('pages/home');
				$this->load->view('templates/footer');
			} else {
				$this->load->view('templates/header');
				$this->load->view('pages/index');
				$this->load->view('templates/footer');
			}
		}

		public function login(){

			$data['count'] = $this->model->LoginUser();
			$data['level'] = $this->model->AmbilLevelUser();
			if ($data['count'] === 1) {
				$arraydata = array(
					'username' => $this->input->post('username'),
					'level' => $data['level'],
				);
				$this->session->set_userdata($arraydata);
				$this->load->view('templates/header');
				$this->load->view('templates/navbar');
				$this->load->view('pages/home');
				$this->load->view('templates/footer');
			}
		}

		public function daftar_makanan(){
			$data['data_makanan']['id_makanan'] = "";
			$data['data_makanan']['nama'] = "";
			$data['data_makanan']['harga'] = "";
	 		$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('pages/data_makanan', $data);
			$this->load->view('templates/footer');
		}

		public function pagination_daftar_makanan() {
		  	$this->load->model("model");
		  	$this->load->library("pagination");
		  	$config = array();
		  	$config["base_url"] = "#";
		  	$config["total_rows"] = $this->model->AmbilJumlahMakanan();
		  	$config["per_page"] = 10;
		  	$config["uri_segment"] = 3;
		 	$config["use_page_numbers"] = TRUE;
		  	$config["full_tag_open"] = '<ul class="pagination">';
		  	$config["full_tag_close"] = '</ul>';
		  	$config["first_tag_open"] = '<li>';
		  	$config["first_tag_close"] = '</li>';
		  	$config["last_tag_open"] = '<li>';
		  	$config["last_tag_close"] = '</li>';
		  	$config['next_link'] = '&gt;';
		  	$config["next_tag_open"] = '<li>';
		  	$config["next_tag_close"] = '</li>';
		  	$config["prev_link"] = "&lt;";
		  	$config["prev_tag_open"] = "<li>";
		  	$config["prev_tag_close"] = "</li>";
		  	$config["cur_tag_open"] = "<li class='active'><a href='#'>";
		  	$config["cur_tag_close"] = "</a></li>";
		  	$config["num_tag_open"] = "<li>";
		  	$config["num_tag_close"] = "</li>";
		  	$config["num_links"] = 1;
		  	$this->pagination->initialize($config);
		  	$page = $this->uri->segment(3);
		  	$start = ($page - 1) * $config["per_page"];

		  	$output = array(
		   		'pagination_link'  => $this->pagination->create_links(),
		   		'country_table'   => $this->model->AmbilDaftarMakanan($config["per_page"], $start)
		  	);
		  	echo json_encode($output);
	 	}

	 	public function hapus_makanan(){
	 		$data = json_decode($_POST['data']);
			foreach ($data as $key => $value) {
				if ($key == "id_makanan") {
					$id_makanan = $value;
				}
			}
			$hapus = $this->model->HapusMakanan($id_makanan);
			
			if ($hapus) 
				print_r('Data berhasil dihapus');
	 	}

	 	public function edit_makanan(){
	 		$id_makanan =  $this->uri->segment(2);
	 		$data['data_makanan'] = $this->model->SelectDaftarMakanan($id_makanan);
	 		$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('pages/data_makanan', $data);
			$this->load->view('templates/footer');
	 	}

	 	public function simpan_makanan() {
	 		$this->model->SimpanMakanan();
	 		header('location: http://localhost/pemesanan/daftar-makanan');
	 	}

	 	public function daftar_minuman(){
			$data['data_minuman']['id_minuman'] = "";
			$data['data_minuman']['nama'] = "";
			$data['data_minuman']['harga'] = "";
	 		$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('pages/data_minuman', $data);
			$this->load->view('templates/footer');
		}

		public function pagination_daftar_minuman() {
		  	$this->load->model("model");
		  	$this->load->library("pagination");
		  	$config = array();
		  	$config["base_url"] = "#";
		  	$config["total_rows"] = $this->model->AmbilJumlahMinuman();
		  	$config["per_page"] = 10;
		  	$config["uri_segment"] = 3;
		 	$config["use_page_numbers"] = TRUE;
		  	$config["full_tag_open"] = '<ul class="pagination">';
		  	$config["full_tag_close"] = '</ul>';
		  	$config["first_tag_open"] = '<li>';
		  	$config["first_tag_close"] = '</li>';
		  	$config["last_tag_open"] = '<li>';
		  	$config["last_tag_close"] = '</li>';
		  	$config['next_link'] = '&gt;';
		  	$config["next_tag_open"] = '<li>';
		  	$config["next_tag_close"] = '</li>';
		  	$config["prev_link"] = "&lt;";
		  	$config["prev_tag_open"] = "<li>";
		  	$config["prev_tag_close"] = "</li>";
		  	$config["cur_tag_open"] = "<li class='active'><a href='#'>";
		  	$config["cur_tag_close"] = "</a></li>";
		  	$config["num_tag_open"] = "<li>";
		  	$config["num_tag_close"] = "</li>";
		  	$config["num_links"] = 1;
		  	$this->pagination->initialize($config);
		  	$page = $this->uri->segment(3);
		  	$start = ($page - 1) * $config["per_page"];

		  	$output = array(
		   		'pagination_link'  => $this->pagination->create_links(),
		   		'country_table'   => $this->model->AmbilDaftarMinuman($config["per_page"], $start)
		  	);
		  	echo json_encode($output);
	 	}

	 	public function hapus_minuman(){
	 		$data = json_decode($_POST['data']);
			foreach ($data as $key => $value) {
				if ($key == "id_minuman") {
					$id_minuman = $value;
				}
			}
			$hapus = $this->model->HapusMinuman($id_minuman);
			
			if ($hapus) 
				print_r('Data berhasil dihapus');
	 	}

	 	public function edit_minuman(){
	 		$id_minuman =  $this->uri->segment(2);
	 		$data['data_minuman'] = $this->model->SelectDaftarMinuman($id_minuman);
	 		$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('pages/data_minuman', $data);
			$this->load->view('templates/footer');
	 	}

	 	public function simpan_minuman() {
	 		$this->model->SimpanMinuman();
	 		header('location: http://localhost/pemesanan/daftar-minuman');
	 	}

	 	public function buat_pesanan() {
	 		$data['p'] = $this->model->SetKodePesanan();
	 		$data['kode_pesanan'] = 'ERP' .(date('dmY')). '-00' . ($data['p']['count'] + 1);
	 		$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('pages/buat_pesanan', $data);
			$this->load->view('templates/footer');
	 	}

	 	public function logout() {
	 		$this->load->view('pages/logout');
	 		$this->index();
	 	}
	}