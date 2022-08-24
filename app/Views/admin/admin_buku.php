<?= $this->extend('admin/navbar') ?>
<?= $this->section('content') ?>

<div class="container" style="margin:30px">
    <h3>DAFTAR BUKU</h3>
    <br>
    <br>
    <h6>Daftar Koleksi Buku</h6>
    <hr>
    <div class="container">
    <form action="" method="post">
            <div class="input-group mb-3 col-6">
                <input type="text" class="form-control" placeholder="Masukkan Kata Kunci Pencarian" name="keyword">
                <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Nama Penulis</th>
                    <th>Penerbit</th>
                    <th>Jumlah Halaman</th>
                    <th>Tahun Terbit</th>
                    <th>Jenis Buku</th>
                    <th>Aktifitas</th>
                </thead>
                <tbody>
                    <?php $key = 1 + (5 * ($currentPage - 1)) ; ?>
                    <?php foreach ($daftarbuku as $data) : ?>
                        <tr>
                            <td><?php echo $key ++ ; ?></td>
                            <td><?php echo $data->judul_buku; ?></td>
                            <td><?php echo $data->nama_penulis; ?></td>
                            <td><?php echo $data->penerbit; ?></td>
                            <td><?php echo $data->jumlah_halaman; ?></td>
                            <td><?php echo $data->tahun_terbit; ?></td>
                            <td><?php echo $data->jenis_buku; ?></td>
                            <td>
                                <a href="<?php echo base_url('koleksi/bukunya/' . $data->id . '/edit'); ?>" class="btn btn-sm btn-outline-warning">EDIT</a>
                                <a data-href="<?= base_url('koleksi/bukunya/' . $data->id . '/delete')?>" 
                                onclick= "confirmToDelete(this)" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal">HAPUS</a>
                            </td>
                            
                        </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?= $pager->links('boot', 'bootstrap_pagination');?>
    </div>

</div>


<!-- Modal -->
<div id="confirm-dialog" class="modal" tabindex="1" role="dialog">
 <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Data Buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <h2 class="h2">Apakah Anda YAKIN??</h2>
            <p>Data akan terhapus secara permanen!</p>
       </div>
       <div class="modal-footer">
            <a href="#" role="button" id="delete-button" class="btn btn-danger">HAPUS</a>
        </div>
    </div>
  </div>
</div>


<script>
    function confirmToDelete(el){
        $('#delete-button').attr('href', el.dataset.href);
        $('#confirm-dialog').modal("show");
    }
</script>

<?= $this->endSection() ?>