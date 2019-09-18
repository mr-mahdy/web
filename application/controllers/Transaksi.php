<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller 
{
	public function index(){
		
	}
	public function bulan(){
		$data['data'] = $this ->Menu_model->getBulan();
		$data['content'] = 'content';
		$this->load->view('user/transaksi/bayar',$data);
		

		}
}
