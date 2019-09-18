<div class="container-fluid">
        	<link href="<?= base_url('assets/'); ?>css/index.css" rel="stylesheet">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
 <div class="row">

   			<div class="col-lg">
          	
			   <form class="d-none d-lg-inline-block form-inline mr-auto navbar-search" method="post">
					<div class="input-group">
						<input type="text" class="form-control bg-light border-0 cari" autocomplete="off" name="cari" placeholder="masukan tanggal bayar" aria-label="Search" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<button class="btn btn-primary" type="submit">
							<i class="fas fa-search fa-sm"></i>
							</button>
						</div>
					</div>
				</form>

				<form class="d-none d-lg-inline-block form-inline mr-auto navbar-search" method="post">
					<div class="input-group">
						<input type="text" class="form-control bg-light border-0 cari" autocomplete="off" name="siswa" placeholder="masukan nama siswa" aria-label="Search" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<button class="btn btn-primary" type="submit">
							<i class="fas fa-search fa-sm"></i>
							</button>
						</div>
					</div>
				</form>
	
   				<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nama</th>
									<th scope="col">Kelas</th>
									<th scope="col">Thn Ajar</th>
									<th scope="col">Tanggal Bayar</th>
									<th scope="col">Jenis</th>
								</tr>
								
							</thead>
							<tbody class="tbody">
								
								<?php 
									if(isset($_POST['cari'])) {
										$this->load->model('Transaksi_model', 'transaksi');
										$transaksi = $this->transaksi->cari($_POST['cari']);
									}

									if(isset($_POST['siswa'])) {
										$this->load->model('Transaksi_model', 'transaksi');
										$transaksi = $this->transaksi->cariS($_POST['siswa']);
									}
								
								foreach($transaksi as $t) : ?>
									
										
										<tr>
											<form action=" <?= base_url('index.php/laporanpdf') ?>" method="post" target="_blank">
											<?php if(isset($_POST['cari'])) :?>
												<input type="hidden" name="cari" value="<?= $_POST['cari'];?>">
											<?php endif;?>
											<?php if(isset($_POST['siswa'])) :?>
												<input type="hidden" name="siswa" value="<?= $_POST['siswa'];?>">
											<?php endif;?>
												<td></td>
												<td><?= $t['nama']?></td>
												<td><?= $t['kelas']?></td>
												<td><?= $t['thn_ajar']?></td>
												<td><?= $t['tanggal_bayar']?></td>
												<td><?= $t['jenis']?></td>
												<td>
													<button type="submit" class="btn btn-danger" >Rekapitulasi</button> 
												</td>
											</form> 
										</tr>
									
								<?php endforeach; ?>
							
							</tbody>
				
				</table>

			

				
				   			


                   