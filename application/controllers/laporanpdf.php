<?php
ob_start();
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
				$this->load->library('pdf');
				
    }
    
    function index(){
		// intance object dan memberikan pengaturan halaman PDF
			$pdf = new FPDF('l','mm','A5');
			// membuat halaman baru
			$pdf->AddPage();
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',16);
			// mencetak string 
			$pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUSAN PASUNDAN RANCAEKEK',0,1,'C');
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
				
			// Memberikan space kebawah agar tidak terlalu rapat
			$pdf->Cell(10,7,'',0,1);
				
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(10,6,'ID',1,0);
			$pdf->Cell(28,6,'NAMA SISWA',1,0);
			$pdf->Cell(28,6,'KELAS',1,0);
			$pdf->Cell(28,6,'THN AJAR',1,0);
			$pdf->Cell(28,6,'BULAN',1,0);
			$pdf->Cell(35,6,'TANGGAL BAYAR',1,0);
			$pdf->Cell(28,6,'KETERANGAN',1,1);
				
			$pdf->SetFont('Arial','',10);
			

			$this->load->model('Transaksi_model', 'transaksi');
			$transaksi = $this->transaksi->getTransaksi();
			
			if (isset($_POST['cari'] )) {
				$transaksi = $this->transaksi->cari($_POST['cari']);
				foreach ($transaksi as $t) {
				
					$pdf->Cell(10,6, $t['id'] ,1,0);
					$pdf->Cell(28,6, $t['nama'],1,0);
					$pdf->Cell(28,6, $t['kelas'],1,0);
					$pdf->Cell(28,6, $t['thn_ajar'],1,0);
					$pdf->Cell(28,6, $t['nama_bulan'],1,0);
					$pdf->Cell(35,6, $t['tanggal_bayar'],1,0);
					$pdf->Cell(28,6,'LUNAS',1,1);
						
					
				} 
				
			} elseif(isset($_POST['siswa'] )) {
				$transaksi = $this->transaksi->cariS($_POST['siswa']);
				foreach ($transaksi as $t) {

					$pdf->Cell(10,6, $t['id'] ,1,0);
					$pdf->Cell(28,6, $t['nama'],1,0);
					$pdf->Cell(28,6, $t['kelas'],1,0);
					$pdf->Cell(28,6, $t['thn_ajar'],1,0);
					$pdf->Cell(28,6, $t['nama_bulan'],1,0);
					$pdf->Cell(35,6, $t['tanggal_bayar'],1,0);
					$pdf->Cell(28,6,'LUNAS',1,1);
						
					
				}
			}

			$pdf->Cell(10,7,'',0,1);
			$pdf->Cell(10,7,'',0,1);
			$pdf->Cell(10,7,'',0,1);
			$pdf->Cell(10,7,'',0,1);
			$pdf->Cell(10,7,'',0,1);


			$pdf->Cell(10,7,'KORDINATOR KEUANGAN',0,1);
			$pdf->Cell(10,7,'',0,1);
			$pdf->Cell(10,7,'',0,1);
			$pdf->Cell(10,7,'',0,1);
			$pdf->Cell(10,7,'TEING SAHA',0,1);
			$pdf->Output();
			
		
    }
}