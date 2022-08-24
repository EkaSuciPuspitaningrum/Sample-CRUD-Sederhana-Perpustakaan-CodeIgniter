<?= $this->extend('admin/navbar') ?>
<?= $this->section('content') ?>

<div class="container" style="margin:30px">
    <h3>DAFTAR PEMINJAMAN BUKU</h3>
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
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Buku Satu</th>
                    <th>Buku Dua</th>
                    <th>Waktu Pinjam</th>
                    <th>Aktifitas</th>
                </thead>
                <tbody>
                    <?php $key = 1 + (5 * ($currentPage - 1)) ; ?>
                    <?php foreach ($pinjambuku as $data) : ?>
                        <tr>
                            <td><?php echo $key ++ ; ?></td>
                            <td><?php echo $data->nama_lengkap; ?></td>
                            <td><?php echo $data->email; ?></td>
                            <td><?php echo $data->buku_satu; ?></td>
                            <td><?php echo $data->buku_dua; ?></td>
                            <td><?php echo $data->created_at; ?></td>
                            <td>
                                <a data-href="<?= base_url('koleksi/pinjam/' . $data->id . '/hapus')?>" 
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">KELUAR</button>
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