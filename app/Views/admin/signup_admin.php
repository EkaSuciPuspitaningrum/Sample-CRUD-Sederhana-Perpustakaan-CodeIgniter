<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>PERPUSTAKAAN</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        
        html, body {
        height: 100%;
        }

        body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-image: url('img/perpus.jpg');
        }

        .form-signin {
        width: 100%;
        max-width: 600px;
        padding: 10px;
        margin: auto;
        }

        .form-signin .form-floating:focus-within {
        z-index: 2;
        }

        .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }

        .h1, .h4, p{
            color: white;
        }

        }
    </style>

</head>

<body class="text-center">

    <main class="form-signin">
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h4>Periksa Kembali Data</h4>
                </hr />
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif;?>

        <form method="post" action="<?= base_url(); ?>/Admin/prosesDaftar">
            <?= csrf_field(); ?>
            <h1 class="h1 mb-3 fw-normal">Silahkan Masukkan Data Diri</h1>
            <h1 class="h4 mb-3 fw-normal">Untuk Mendaftarkan Diri Sebagai Admin</h1>
           
            <div class="form-floating">
                <input type="text" class="form-control" id="nomor_keanggotaan" name="nomor_keanggotaan" placeholder="Nomor Keanggotaan">
                <label for="nomor_keanggotaan">Nomor Keanggotaan</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap">
                <label for="nama_lengkap">Nama Lengkap</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="contoh@contoh.com">
                <label for="email">Email</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="username"  name="username" placeholder="Username">
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password"  name="password" placeholder="Password">
                <label for="password">Password</label>
            </div>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Daftar</button>
            <br><br><br>
            <p>Sudah Mempunyai Akun?</p>
            <a href="<?= base_url('loginAdmin')?>" role="button" class="w-100 btn btn-lg btn-warning" type="submit">Masuk</a>

        </form>
    </main>

    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    

</body>

</html>