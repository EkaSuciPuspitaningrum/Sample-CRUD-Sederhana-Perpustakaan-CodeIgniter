<!doctype html>
<html lang="en" class="h-100">

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
        /*
        * Globals
        */


        /* Custom default button */
        .btn-secondary,
        .btn-secondary:hover,
        .btn-secondary:focus {
        color: #333;
        text-shadow: none; /* Prevent inheritance from `body` */
        }


        /*
        * Base structure
        */

        body {
        text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
        box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
        background-image: url('img/perpus.jpg');
        }

        .cover-container {
        max-width: 42em;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body class="d-flex h-100 text-center text-white">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <br><br><br><br><br><br>
        <main class="px-3">
            <h1>LOGIN</h1>
            <br>
            <p class="lead">Silahkan lakukan login sebelum memasuki halaman perpustakaan. ADMIN DAN PENGGUNA WAJIB LOGIN!</p>
            <br>
            <p class="lead">
                <a href="<?= base_url('loginAdmin')?>" role="button" class="btn btn-lg btn-outline-success fw-bold">Admin</a>
                <a href="<?= base_url('loginUser')?>" class="btn btn-lg btn-outline-warning fw-bold">Pengguna</a>
            </p>
        </main>
        <br><br><br>
        <footer class="mt-5 mb-0" >
            <br>
            <div class="container text-center" id="footer" >Copyright &copy <?= Date('Y')?> | PERPUSTAKAAN UMUM |</div>
            <br>
        </footer>
    </div>

    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    </div>



</body>

</html>