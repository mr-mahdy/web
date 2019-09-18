<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{

	public function getTransaksi(){
		$query = "SELECT siswa . id, siswa . nama, siswa . thn_ajar, kelas . kelas, bulan . nama_bulan, transaksi_siswa . tanggal_bayar , transaksi_siswa . jenis, transaksi_siswa . jumlahdpp, transaksi_siswa . cicilan, transaksi_siswa . jmlakhirthn, transaksi_siswa . cicilakhir
                    FROM siswa, kelas, bulan, transaksi_siswa 
                    WHERE siswa . id_kelas = kelas . id 
                    AND transaksi_siswa . id_siswa  = siswa . id 
                    AND transaksi_siswa . id_bulan = bulan . id";

		return $this->db->query($query)->result_array();
    }

    public function cari($cari) {
        
        $query = "SELECT siswa . id, siswa . nama, siswa . thn_ajar, kelas . kelas, bulan . nama_bulan, transaksi_siswa . tanggal_bayar , transaksi_siswa . jenis, transaksi_siswa . jumlahdpp, transaksi_siswa . cicilan, transaksi_siswa . jmlakhirthn, transaksi_siswa . cicilakhir
                    FROM siswa, kelas, bulan, transaksi_siswa 
                    WHERE tanggal_bayar LIKE '%$cari%'
                    AND siswa . id_kelas = kelas . id 
                    AND transaksi_siswa . id_siswa  = siswa . id 
                    AND transaksi_siswa . id_bulan = bulan . id
                    ";

        return $this->db->query($query)->result_array();
    }

    public function cariS($cari) {
        
        $query = "SELECT siswa . id, siswa . nama, siswa . thn_ajar, kelas . kelas, bulan . nama_bulan, transaksi_siswa . tanggal_bayar , transaksi_siswa . jenis, transaksi_siswa . jumlahdpp, transaksi_siswa . cicilan, transaksi_siswa . jmlakhirthn, transaksi_siswa . cicilakhir
                    FROM siswa, kelas, bulan, transaksi_siswa 
                    WHERE nama LIKE '%$cari%'
                    AND siswa . id_kelas = kelas . id 
                    AND transaksi_siswa . id_siswa  = siswa . id 
                    AND transaksi_siswa . id_bulan = bulan . id
                    ";

        return $this->db->query($query)->result_array();
    }
    
    public function insertTransaksi($data, $tr){
        $idSiswa = $data['id_siswa'];
        $jenis = $data['p'];
        
        $tgl = date('d-m-Y', time());


        if ($jenis == 'spp') {
            $idBulan = $data['id_bulan'];
            $query = "INSERT INTO transaksi_siswa VALUES
                    ('', $idSiswa, $idBulan, '$tgl', '$jenis', 0, 0,0,0) ";

             $this->db->query($query);
        } else {
            $jml = 0;
            $jmlAkhir = 0;
            $cicil = $data['cicilan'];
            $j = 0;
            $a = 0;
            foreach($tr as $t) {
                if( $idSiswa == $t['id'] && $t['jenis'] == 'dpp') {
                    $jml = $data['cicilan'];
                    $j = $t['jumlahdpp'];
                }
            }
            foreach($tr as $t) {
                if( $idSiswa == $t['id'] && $t['jenis'] == 'akhir tahun') {
                    $jmlAkhir = $data['cicilan'];
                    $a = $t['jmlakhirthn'];
                }
            }
            $jml = $jml + $j;
            $jmlAkhir = $jmlAkhir + $a;
            if($_POST['p'] == 'dpp') {
                $query = "INSERT INTO transaksi_siswa VALUES
                        ('', $idSiswa, 13, '$tgl', '$jenis', $jml, $cicil, $jmlAkhir, 0) ";
            } else {
                $query = "INSERT INTO transaksi_siswa VALUES
                        ('', $idSiswa, 13, '$tgl', '$jenis', $jml, 0, $jmlAkhir, $cicil) ";
            }
             $this->db->query($query);
        }
		
        

		return 1;
	}
	
}