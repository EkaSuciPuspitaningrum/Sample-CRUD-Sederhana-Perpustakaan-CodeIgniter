<?= $this->extend('admin/navbar') ?>
<?= $this->section('content') ?>

<div class="container" style="margin:30px">
    <h3>KONTAK MASUK</h3>
    <br><br>
    <h6>Daftar Kontak Masuk</h6>
    <hr>
    <br>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Aktifitas</th>
                </thead>
                <tbody>
                    <?php $key = 1 + (5 * ($currentPage - 1)) ; ?>
                    <?php foreach ($pesankontak as $data) : ?>
                        <tr>
                            <td><?php echo $key ++ ; ?></td>
                            <td><?php echo $data->nama_lengkap; ?></td>
                            <td><?php echo $data->email; ?></td>
                            <td><?php echo $data->pesan; ?></td>
                            <td><a href="#" data-href="<?= base_url('admin/kontak/' . $data->id . '/delete')?>" 
                            onclick= "confirmToDelete(this)" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal">HAPUS</a></td>
                        </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
            <div id="confirm-dialog" class="modal" tabindex="1" role="dialog">
                <div class="modal-dialog" role="document">
                        <div class="modal-content">
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
        </div>
        <?= $pager->links('bootstrap', 'bootstrap_pagination');?>
    </div>
</div>
<script>
    function confirmToDelete(el){
        $('#delete-button').attr('href', el.dataset.href);
        $('#confirm-dialog').modal("show");
    }
</script>

<?= $this->endSection() ?>