<?= $this->extend('user/nav_user') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <h3 class="font-weight-bold text-center">Daftar Buku</h3>
    <hr/><br>
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
                            
                        </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?= $pager->links('boot', 'bootstrap_pagination');?>
    </div>
</div>




<script>
    function confirmToDelete(el){
        $('#delete-button').attr('href', el.dataset.href);
        $('#confirm-dialog').modal("show");
    }
</script>

<?= $this->endSection() ?>