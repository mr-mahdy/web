		<div class="container-fluid">
        	<link href="<?= base_url('assets/'); ?>css/index.css" rel="stylesheet">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
               <div class="row">

   			<div class="col-lg">
          <div class="kwitansi text-center">
          	<?php 


			echo(" ATM ID A479");
			echo("<br>");
			echo("PEMBAYARAN CEPAT");	
			echo("<br>");
			echo("=============================");	
			echo("<br>");
			echo("NAMA SISWA : ardhian" );	
			echo("<br>");
			echo("KELAS	     : D" );	
			echo("<br>");
			echo("JUMLAH    : Rp.350.000 ");	
			echo("<br>");
			echo("=============================");	
			echo("<br>");
			echo(" TINGKATKAN PEMBAYARAN DAN");	
			echo("<br>");
			echo("JANGAN LUPA BULAN BULAN SELANJUTNYA");	
			echo("<br>");
			echo("=============================");	
			echo("<br>");
			echo("RESI INI MERUPAKAN BUKTI YANG SAH");	
			echo("<br>");
			echo("=============================");	
			echo("<br>");
			echo("SIMPAN BAIK BAIK NOTA INI SEBAGAI BUKTI PEMBAYARAN");	
			echo("<br>");
			echo("=============================");	
			echo("<br>");
			echo("TIDAK DAPAT MEMINTA RESI KEMBALI");	 
			echo("<br>");
			echo("=============================");	
			echo("<br>");
			?>
          </div>
          <div>
          	 <form action=" <?= base_url('index.php/laporanpdf') ?>" method="post" target="_blank">
				<button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fas fa-print"></i> cetak</button>
		  	</form> 
          </div>
         
     