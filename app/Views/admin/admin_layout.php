<?= $this->extend('admin/navbar') ?>
<?= $this->section('content') ?>

<div class="container" style="margin:30px">
    <h3>HALAMAN DASHBOARD</h3>
    <br><br>
    <h6>Daftar Hadir Pengunjung</h6>
    <hr>
    <br>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Waktu Hadir</th>
                </thead>
                <tbody>
                    <?php $key = 1 + (5 * ($currentPage - 1)) ; ?>
                    <?php foreach ($daftarhadir as $data) : ?>
                        <tr>
                            <td><?php echo $key ++ ; ?></td>
                            <td><?php echo $data->nama_lengkap; ?></td>
                            <td><?php echo $data->email; ?></td>
                            <td><?php echo $data->created_at; ?></td>
                        </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?= $pager->links('bootstrap', 'bootstrap_pagination');?>
    </div>
</div>

<?= $this->endSection() ?>