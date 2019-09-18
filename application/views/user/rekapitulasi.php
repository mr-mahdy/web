		<div class="container-fluid">
        	<link href="<?= base_url('assets/'); ?>css/index.css" rel="stylesheet">

		
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

		  <table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nama</th>
					<th scope="col">Kelas</th>
					<th scope="col">Harga</th>
					<th scope="col">Tanggal Transaksi</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($transaksi as $t) : ?>
				<tr>
					<form action="<?= base_url('index.php/laporanpdf') ?>" method="post" target="_blank">
						<input type="hidden" name="id" value="<?= $t['id']?>">
						<td></td>
						<td><input type="hidden" name="nama" value="<?= $t['nama']?>"><?= $t['nama']?></td>
						<td><input type="hidden" name="kelas" value="<?= $t['kelas']?>"><?= $t['kelas']?></td>
						<input type="hidden" name="sudahbayar" value="0">
						<td>350000</td>
						<td><input type="hidden" name="tanggal_bayar" value="<?= $t['tanggal_bayar']?>"><?= $t['tanggal_bayar']?></td>
						<td>
							<button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fas fa-print"></i> cetak</button>       
						</td>
					</form> 
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>



          <div>
          
          	
          </div>



          <div class="row">

   			<div class="col-lg">