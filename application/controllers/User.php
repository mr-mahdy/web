<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{

	public function __construct(){
		parent::__construct();
		is_logged_in();
	}

	public function index(){

		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}


	public function kelas(){
		$data['title'] = 'Daftar Kelas';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kelas'] = $this->db->get('kelas')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/kelas', $data);
		$this->load->view('templates/footer');
	}

	

	public function transaksi(){
		$data['title'] = 'Transaksi Pembayaran';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Siswa_model', 'siswa');
		$data['siswa'] = $this->siswa->getSiswa();

		$this->load->model('Transaksi_model', 'transaksi');
		$data['transaksi'] = $this->transaksi->getTransaksi();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/transaksi', $data);
		$this->load->view('templates/footer');
	}

	public function bayar(){
		$data['title'] = 'Pembayaran';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Transaksi_model', 'transaksi');
		$data['transaksi'] = $this->transaksi->getTransaksi();

		$this->load->model('Siswa_model', 'siswa');
		$data['siswa'] = $this->siswa->getSiswa();
		$data['bulan'] = $this->db->get('bulan')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/bayar', $data);
		$this->load->view('templates/footer');
	}

	public function transaksipdf(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		

		$this->load->view('index.php/transaksipdf', $data);
	}

	public function laporanpdf(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('index.php/laporanpdf', $data);
	}
	

	public function laporan(){
		$data['title'] = 'Laporan Transaksi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Transaksi_model', 'transaksi');
		$data['transaksi'] = $this->transaksi->getTransaksi();

		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/laporan', $data);
		$this->load->view('templates/footer');
	}
	public function rekapitulasi(){
			$data['title'] = 'Rekapitulasi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['transaksi'] = $this->db->get('transaksi')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/rekapitulasi', $data);
		$this->load->view('templates/footer');
	}

	

	
}