<?= $this->extend('admin/navbar') ?>
<?= $this->section('content') ?>

<div class="container" style="margin:30px">
    <h3>TAMBAH PEMINJAMAN BUKU</h3>
    <br>
    <div class="modal-body">
            <form class="col-md-12 col-sm-12" method="post" action="<?= base_url(); ?>/pinjam/tambahpinjam">
                    <?= csrf_field(); ?>
                    <div class="row g-2">
                        <div class="col-md">
                            <label for="nama_lengkap" class="col-form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Silahkan Masukkan Nama Lengkap Peminjam">
                        </div>
                        <div class="col-md">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Silahkan Masukkan Email Peminjam">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <label for="buku_satu" class="col-form-label">Buku Satu</label>
                            <input type="text" class="form-control" id="buku_satu" name="buku_satu" placeholder="Silahkan Masukkan Judul Buku (1)">
                        </div>
                        <div class="col-md">
                            <label for="buku_dua" class="col-form-label">Buku Dua</label>
                            <input type="text" class="form-control" id="buku_dua" name="buku_dua" placeholder="Silahkan Masukkan Judul Buku (2)">
                        </div>
                    </div>
                    <br><br>
                    <button class="btn btn-primary" type="submit">Tambah</button>
            </form>
      </div>
</div>

<?= $this->endSection() ?>