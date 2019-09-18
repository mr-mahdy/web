<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

	public function getSiswa(){
		$query = "SELECT siswa . id, siswa . nama, siswa . thn_ajar, kelas . kelas FROM siswa JOIN kelas ON siswa . id_kelas = kelas . id ";

		return $this->db->query($query)->result_array();
	}
	
}