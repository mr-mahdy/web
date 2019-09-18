
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



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
<th scope="col">Kelas</th>
<th scope="col">Action</th>

</tr>
</thead>
<tbody>
    <?php foreach($kelas as $k) : ?>
      <?php 
       $pecah = explode('-', $k['kelas']);
       $huruf = $pecah[0];?>
      <?php if($_POST['p'] == 'spp') : ?>
        <tr>
          <form action=" <?= base_url('user/transaksi') ?>" method="post" >
            <input type="hidden" name="p" value="spp">
            <input type="hidden" name="id" value="<?= $k['id']?>">
            <td></td>
            <td><input type="hidden" name="kelas" value="<?= $k['kelas']?>"><?= $k['kelas']?></td>
            <td>
              <button type="submit" class="btn btn-success" >Lihat Semua</button>           
            </td>
          </form> 
        </tr>
      <?php elseif($_POST['p'] == 'akhir tahun') : ?>
        <tr>
          <form action=" <?= base_url('user/transaksi') ?>" method="post">
            <input type="hidden" name="p" value="akhir tahun">
            <input type="hidden" name="id" value="<?= $k['id']?>">
            <td></td>
            <td><input type="hidden" name="kelas" value="<?= $k['kelas']?>"><?= $k['kelas']?></td>
            <td>
              <button type="submit" class="btn btn-success" >Lihat Semua</button>           
            </td>
          </form> 
        </tr>
      <?php else : ?>
        <?php if($huruf == 'X') : ?>
          <tr>
            <form action=" <?= base_url('user/transaksi') ?>" method="post">
              <input type="hidden" name="p" value="dpp">
              <input type="hidden" name="id" value="<?= $k['id']?>">
              <td></td>
              <td><input type="hidden" name="kelas" value="<?= $k['kelas']?>"><?= $k['kelas']?></td>
              <input type="hidden" name="dpp" value="1">
              <td>
                <button type="submit" class="btn btn-success" >Lihat Semua</button>           
              </td>
            </form> 
          </tr>
        <?php endif;?>
      <?php endif;?>
    <?php endforeach; ?>
</tbody>
</table>



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