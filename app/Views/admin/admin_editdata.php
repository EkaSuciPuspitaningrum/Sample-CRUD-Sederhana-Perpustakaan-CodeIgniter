<?= $this->extend('admin/navbar') ?>
<?= $this->section('content') ?>

<div class="container" style="margin:30px">
    <h3>EDIT DATA BUKU</h3>
    <br>
    <div class="modal-body">
            <form class="col-md-12 col-sm-12" method="post" id="text-editor" >
                    <div class="row g-2">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $daftarbuku->id; ?>" placeholder="Silahkan Masukkan ID Buku" required>
                        <div class="col-md">
                            <label for="judul_buku" class="col-form-label">Judul Buku</label>
                            <input type="text" class="form-control" id="judul_buku" value="<?php echo $daftarbuku->judul_buku; ?>" name="judul_buku" placeholder="Silahkan Masukkan Judul Buku" required>
                        </div>
                        <div class="col-md">
                            <label for="nama_penulis" class="col-form-label">Nama Penulis</label>
                            <input type="text" class="form-control" id="nama_penulis" name="nama_penulis" value="<?php echo $daftarbuku->nama_penulis; ?>"  placeholder="Silahkan Masukkan Nama Penulis" required>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <label for="penerbit" class="col-form-label">Nama Penerbit</label>
                            <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?php echo $daftarbuku->penerbit; ?>" placeholder="Silahkan Masukkan Penerbit Buku" required>
                        </div>
                        <div class="col-md">
                            <label for="jumlah_halaman" class="col-form-label">Jumlah Halaman Buku</label>
                            <input type="text" class="form-control" id="jumlah_halaman" name="jumlah_halaman" value="<?php echo $daftarbuku->jumlah_halaman; ?>" placeholder="Silahkan Masukkan Jumlah Halaman Buku">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <label for="tahun_terbit" class="col-form-label">Tahun Terbit Buku</label>
                            <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?php echo $daftarbuku->tahun_terbit; ?>" placeholder="Silahkan Masukkan Tahun Terbit Buku">
                        </div>
                        <div class="col-md">
                            <label for="jenis_buku" class="col-form-label">Jenis Buku</label>
                            <input type="text" class="form-control" id="jenis_buku" name="jenis_buku" value="<?php echo $daftarbuku->jenis_buku; ?>"  placeholder="Silahkan Masukkan Jenis Buku">
                        </div>
                    </div>
                    <br><br>
                    <button class="btn btn-warning" type="submit">EDIT</button>
            </form>
      </div>
</div>

<?= $this->endSection() ?>