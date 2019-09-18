

        <!-- Begin Page Content -->
        <div class="container-fluid">
        	<link href="<?= base_url('assets/'); ?>css/index.css" rel="stylesheet">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          
                
            <div class="row">
				<div class="col-lg kotakLuar">
				<?php if($_POST['p'] == 'spp') : ?>
					<?php $id =0; foreach($bulan as $b) : ?>
						<?php if($b['nama_bulan'] != '-') : ?>
							<form action="<?= base_url('index.php/transaksipdf') ?>" method="post">	
								<div class="kotak">	
									<input type="hidden" name="p" value="<?= $_POST['p']?>">
									<input type="hidden" name="id_bulan" value="<?= $b['id']?>">
									<button type="button" id="btn2"><h3 class="text-center nama_bulan"><?= $b['nama_bulan']?></h3></button>
									<div class="text-center" id="harga">350.000</div>
									<div></div>
									<br>
									<?php $sudahBayar =0; foreach($siswa as $s) : ?>
										<?php if($_POST['nama'] == $s['nama']) : ?>
											<?php if(count($transaksi) > 0) : ?>
												<?php foreach($transaksi as $t) : ?>
													<?php if($b['nama_bulan'] == $t['nama_bulan'] && $t['nama'] == $s['nama']) : ?>
														
														<?php $sudahBayar =1; ?>
													<?php else : ?>
														<?php $id = $_POST['id']; ?>
														<input type="hidden" name="nama" value="<?= $_POST['nama']?>">
													<?php endif; ?>
												
												<?php endforeach; ?>
											<?php else : ?>
												<?php $id = $_POST['id']; ?>
											<?php endif; ?>
										
										<?php endif; ?>
									<?php endforeach; ?>
									<?php if($sudahBayar == 1) : ?>
										<button type="button" class="btn btn-success btn-lg btn-block">Lunas</button>
									<?php else : ?>
										<input type="hidden" name="id_siswa" value="<?= $id;?>">
										<button type="submit" class="btn btn-danger btn-lg btn-block" onclick="const bool = confirm('Apakah anda ingin membayar?');if(bool) {setAttribute('class', 'btn btn-success btn-lg btn-block');
innerHTML = 'Lunas';}return bool;">Bayar</button>
									<?php endif; ?>
								</div>		
							</form>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php else : ?>
					<?php $arr = [100000, 200000, 300000, 400000, 500000, 600000]; ?>
					<?php for($i=0; $i < count($arr); $i++) : ?>
						<form action="<?= base_url('index.php/transaksipdf') ?>" method="post">	
							<div class="kotak">	
								<input type="hidden" name="p" value="<?= $_POST['p']?>">
								<input type="hidden" name="id_siswa" value="<?= $_POST['id']?>">
								<input type="hidden" name="nama" value="<?= $_POST['nama']?>">

								<button type="button" id="btn2"><h3 class="text-center">Jumlah Cicilan</h3></button>
								<div class="text-center" id="harga">
									<input type="hidden" name="cicilan" value="<?= $arr[$i]?>">
									<?= $arr[$i]?>
								</div>
								<div></div>
								<br>
								
								<button type="submit" class="btn btn-danger btn-lg btn-block" onclick="const bool = confirm('Apakah anda ingin membayar?');return bool; ">Bayar</button>
							</div>		
						</form>
					<?php endfor; ?>
				<?php endif; ?>
				</div>
			</div>

			<form action=" <?= base_url('user/transaksi') ?>"  method="post">
  <input type="hidden" name="p" value="<?= $_POST['p']?>">
  <input type="hidden" name="kelas" value="<?= $_POST['kelas']?>">
  <button type="submit" class="btn-danger">Kembali</button>
</form>

			
					
					

