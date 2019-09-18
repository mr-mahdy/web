<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model 
{
    public function getHariBayar($tanggal){
        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        
        $num = date('N', strtotime($tanggal));

        return $hari[$num];
    }
}