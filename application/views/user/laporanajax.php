<?php
    $transaksicari = $this->transaksi->cari($cari, $transaksi);
    
?>

<?php if(empty($transaksicari)) : ?>


<?php endif;?>
    <tbody class="tbody">
        
        <?php foreach($transaksicari as $t) : ?>
                <tr>
                    <form action="<?= base_url('index.php/laporanpdf') ?>" method="post" target="_blank">
                        <td><input type="hidden" name="cari" value="<?=$cari?>"></td>
                        <td><?= $t['nama']?></td>
                        <td><?= $t['kelas']?></td>
                        <td><?= $t['thn_ajar']?></td>
                        <td><?= $t['tanggal_bayar']?></td>
                        <td><?= $t['jenis']?></td>
                        <td>
                            <button type="button" class="btn btn-danger" >Rekapitulasi</button> 
                        </td>
                    </form> 
                </tr>
        <?php endforeach; ?>
    
    </tbody>

        <?php if(empty($transaksicari)) : ?>
                <h3 class="text-center">Data tidak Ditemukan</h3>


        <?php endif;?>