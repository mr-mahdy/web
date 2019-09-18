<?php
ob_start();
Class Transaksipdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){

		$this->load->model('Transaksi_model', 'transaksi');
		$transaksi = $this->transaksi->getTransaksi();

			if( $this->transaksi->insertTransaksi($_POST, $transaksi) > 0) {
		
				// intance object dan memberikan pengaturan halaman PDF
				$pdf = new FPDF('l','mm','A5');
				// membuat halaman baru
				$pdf->AddPage();
				// setting jenis font yang akan digunakan
				$pdf->SetFont('Arial','B',16);
				// mencetak string 
				$pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUSAN PASUNDAN RANCAEKEK',0,1,'C');
				$pdf->SetFont('Arial','B',12);
				$pdf->Cell(190,7,'DAFTAR TRANSAKSI',0,1,'C');
				
				// Memberikan space kebawah agar tidak terlalu rapat
				$pdf->Cell(10,7,'',0,1);
				
				$pdf->SetFont('Arial','B',10);


					$pdf->Cell(10,6,'ID',1,0);
					$pdf->Cell(28,6,'NAMA SISWA',1,0);
					$pdf->Cell(20,6,'BULAN',1,0);
					$pdf->Cell(35,6,'TANGGAL BAYAR',1,0);
					$pdf->Cell(27,6,'JENIS BAYAR',1,0);
					$pdf->Cell(20,6,'JUMLAH',1,0);
					$pdf->Cell(20,6,'SISA',1,0);
					$pdf->Cell(28,6,'KETERANGAN',1,1);

					$pdf->SetFont('Arial','',10);

					$transaksi = $this->transaksi->getTransaksi();
							
					foreach ($transaksi as $t) {
						if ($_POST['nama'] == $t['nama']) {
							$pdf->Cell(10,6, $t['id'],1,0);
							$pdf->Cell(28,6, $t['nama'],1,0);
							$pdf->Cell(20,6, $t['nama_bulan'],1,0);
							$pdf->Cell(35,6, $t['tanggal_bayar'],1,0);
							$pdf->Cell(27,6, $t['jenis'],1,0);
							
							if ($t['jenis'] == 'spp') {
								$pdf->Cell(20,6,'350000',1,0);
								$pdf->Cell(20,6,$t['cicilan'],1,0);
								$pdf->Cell(28,6,'LUNAS',1,1);
							} else {
								
								if ($t['jenis'] == 'dpp') {
									$pdf->Cell(20,6,$t['cicilan'],1,0);
									$pdf->Cell(20,6,600000-$t['jumlahdpp'],1,0);
									if ($t['jumlahdpp'] == 600000){
										$pdf->Cell(28,6,'LUNAS',1,1);
									} else {
										$pdf->Cell(28,6,'BELUM',1,1);
									}
								} else {
									$pdf->Cell(20,6,$t['cicilakhir'],1,0);
									$pdf->Cell(20,6,700000-$t['jmlakhirthn'],1,0);
									if ($t['jmlakhirthn'] == 700000){
										$pdf->Cell(28,6,'LUNAS',1,1);
									} else {
										$pdf->Cell(28,6,'BELUM',1,1);
									}
								}
							}
							
							
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
}
