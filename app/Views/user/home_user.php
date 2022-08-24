<?= $this->extend('user/nav_user') ?>
<?= $this->section('content') ?>

    <div class="container py-5">
        <h3 class="font-weight-bold text-center">Tentang Kami</h3>
        <hr/>
        <br>
        <div class="row">
            <div class="mb-4">
                <p class="font-italic text-muted">PERPUSTAKAAN UMUM merupakan perpustakaan yang dibangun pada tahun 1987 oleh Ibu Suci Puspitasari. Beliau sangat menyukai kegiatan kesenian dan membaca, namun pada jaman itu belum banyak buku-buku yang beredar, Beliau mencoba membangun perpustakaan hingga sekarang tetap kokoh.</p>
                <p class="font-italic text-muted">Perpustakaan ini berisi berbagai jenis buku dari tahun ke tahun dan akan terus diperbarui seiring berjalannya waktu. Selain buku, perpustakaan ini menyediakan berbagai layanan terbaik untuk masyarakat umum.</p>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <h3 class="font-weight-bold text-center">Layanan Kami</h3>
        <hr/>
        <br>
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    KOLEKSI BUKU
                </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    <strong>Koleksi buku yang lengkap.</strong> Kami senantiasa memperbarui koleksi buku setiap tahunnya. Buku-buku ini dapat dibaca dan dipinjam oleh pengunjung sesuai dengan ketentuan yang ada. Tidak hanya buku fisik, perpustakaan kami memiliki koleksi berbagai macam e-book yang dapat dilihat maupun dipinjam, namun e-book ini tidak dapat di download. Jika melanggar maka akan diberikan sanksi!
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    LAYANAN TERBAIK
                </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                <div class="accordion-body">
                    <strong>Perpustakaan kami memiliki layanan terbaik. </strong>Kami menyediakan berbagai layanan yang dapat membuat pengguna maupun pengunjung merasa nyaman. Mulai dari tempat membaca yang nyaman dan berbagai layanan tempat yang kami desain dengan bagus membuat pengunjung betah berlama-lama di perpustakaan kami. Perpustakaan kami buka selama 24 jam, dan terdapat layanan menginap dengan gratis bagi masyarakat yang ingin bermalam di sini. Kami juga menyediakan kantin, tempat ibadah lengkap, bahkan sampai tempat bermain anak. Selain layanan tersebut, tentu layanan untuk peminjaman dan sebaginya sangatlah cepat.
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                    KOMUNITAS
                </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                <div class="accordion-body">
                    <strong>Komunitas terbaik.</strong> Perpustakaan kami ramah dengan para komunitas, kalian dapat mendaftarkan komunitas kalian maupun jika kalian ingin mendaftarkan diri untuk masuk ke komunitas yang telah disediakan. Namun untuk mendaftarkan komunitas perlu adanya peraturan yang harus dipatuhi, jika tidak maka akan diberikan sanksi! Komunitas yang telah bekerja sama dengan kami memiliki berbagai prestasi dan kegiatan sosial.
                </div>
            </div>
        </div>
    </div>
    </div>
<br><br><br>

    <section id="contact">
        <div class="container">
            <h3 class="font-weight-bol text-center">Kontak Kami</h3>
            <hr/>
            <br>
            <div class="row">
                <form class="col-md-12 col-sm-12" method="post" action="<?= base_url(); ?>/prosesPesanUser">
                    <?= csrf_field(); ?>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="">
                                <label for="nama_lengkap">Nama Lengkap<a style="color: red;"> *</a></label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Silahkan Masukkan Nama Lengkap Anda">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="">
                                <label for="email">Email<a style="color: red;"> *</a></label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Silahkan Masukkan Email Anda">
                            </div>
                        </div>
                    </div>
                    <br>
                    <label for="pesan">Pesan<a style="color: red;"> *</a></label>
                    <textarea class="form-control" id="pesan" name="pesan" rows="3" placeholder="Silahkan Masukkan Pesan Anda"></textarea>
                    <br><br>
                    <button style="width: 200px;" class="btn btn-lg btn-primary" type="submit">Kirim</button>
                </form>
            </div>
        </div>
    </section>


<?= $this->endSection() ?>