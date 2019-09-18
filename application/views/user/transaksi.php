
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title . " " . $_POST['p']; ?></h1>



   		<div class="row">
   			<div class="col-lg">

          <?php if(validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
              <?= validation_errors(); ?>
            </div>
   				<?php endif; ?>

   				  <?= $this->session->flashdata('message'); ?>
   				
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Kelas</th>
      <th scope="col">Tahun Ajaran</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Sisa Pembayaran</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody> 
    <?php $sudahBayar = 0; foreach($siswa as $s) : $sudahBayar = 0;?>
      <?php if($_POST['kelas'] == $s['kelas']) : ?>
        <tr> 
          <form action=" <?= base_url('user/bayar') ?>" method="post">
            <input type="hidden" name="p" value="<?= $_POST['p']?>">
            <input type="hidden" name="kelas" value="<?= $_POST['kelas']?>">
            <td><input type="hidden" name="id" value="<?= $s['id']?>"></td>
            <td><input type="hidden" name="nama" value="<?= $s['nama']?>"><?= $s['nama']?></td>
            <td><?= $s['kelas']?></td>
            <td><?= $s['thn_ajar']?></td>
            <?php if($_POST['p'] == 'spp') : ?>
              <td>350.000</td>
            <?php elseif($_POST['p'] == 'dpp') : ?>
              <td>600.000</td>
            <?php else : ?>
              <td>700.000</td>
            <?php endif; ?>

            

            <?php $sisa = 0;   foreach($transaksi as $t) : ?>
              <?php if($s['nama'] == $t['nama']) : ?>
                <?php if($t['jenis'] == 'spp') : ?>
                    <?php $sisa = 0; ?>
                <?php elseif($t['jenis'] == 'dpp') : ?>
                    <?php $sisa =  $t['jumlahdpp']; ?>
                <?php else : ?>
                    <?php $sisa = $t['jmlakhirthn']; ?>
                <?php endif; ?>
              <?php endif; ?>
            <?php endforeach; ?>

            <?php  if($_POST['p'] == 'spp') : ?>
            <?php elseif($_POST['p'] == 'dpp') : ?>
                <?php $sisa = 600000 - $sisa; ?>
            <?php else : ?>
                <?php $sisa = 700000 - $sisa; ?>
            <?php endif; ?>
            <td><?= $sisa ?></td>
            <td>
            <?php $i =0; foreach($transaksi as $t) : ?>
              <?php if($t['jumlahdpp'] == 600000 && $s['nama'] == $t['nama'] || $t['jmlakhirthn'] == 700000 && $s['nama'] == $t['nama']) : ?>
                <?php $i = 1; ?>  
              <?php endif; ?>  
            <?php endforeach; ?>
            <?php if($_POST['p'] == 'spp') : ?>
              <button type="submit" class="btn btn-danger" >Bayar</button>
            <?php else : ?>
              <?php if($i == 1) : ?>
                <button type="button" class="btn btn-success" >Lunas</button>
              <?php else : ?>
                <button type="submit" class="btn btn-danger" >Bayar</button>
              <?php endif; ?>   
            <?php endif; ?>           
            </td>
            
          </form>
        </tr>
      <?php endif; ?>
    <?php endforeach; ?>
  </tbody>
</table>

<form action=" <?= base_url('user/kelas') ?>"  method="post">
  <input type="hidden" name="p" value="<?= $_POST['p']?>">
  <button type="submit" class="btn-danger">Kembali</button>
</form>


   			</div>

   		</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubMenuMenuModal">Add New SubMenu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?php base_url('menu/submenu');  ?>" method = "post">
      <div class="modal-body">

      	  <div class="form-group">
    <input type="text" class="form-control" id="title" name="title" placeholder="SubMenu Title">
  </div>

    <div class="form-group">
      <select name="menu_id" id="menu_id" class="form-control">
        <option value="">Select Menu</option>
        <?php foreach($menu as $m) : ?>
          <option value=" <?= $m['id']; ?>"><?= $m['menu']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

          <div class="form-group">
    <input type="text" class="form-control" id="url" name="url" placeholder="SubMenu url">
  </div>

        <div class="form-group">
    <input type="text" class="form-control" id="icon" name="icon" placeholder="SubMenu icon">
  </div>

  <div class="form-group">
    <div class="form-check">
  <input class="form-check-input" type="checkbox" value="1" name = "is_active" id="is_active" checked="">
  <label class="form-check-label" for="is_active">
Active ?  </label>
</div>
  </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Add</button>
      </div>
      </form>

    </div>
  </div>
</div>


