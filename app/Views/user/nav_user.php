<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        
        @media (min-width: 500px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        body {
            min-height: 400px;
            padding-top: 4.5rem;
            }
        #footer{
            color: white;
        }
        .bg-cover{
            background-size: cover !important;
            background-image: url('img/perpus.jpg');
            height : 300px;
        }
    </style>

</head>

<body>
    <div class="container">
        <nav class=" navbar navbar-expand-md navbar-dark fixed-top bg-dark ">
            <div class="container-fluid ">
                <a class="navbar-brand" href="#">| PERPUSTAKAAN UMUM |</a> 
                <div class="collapse navbar-collapse " id="navbarCollapse ">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0 ">
                        <li class="nav-item ">
                           <a class="nav-link active " aria-current="page " href="<?= base_url('/user/home')?>">Beranda</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page " href="<?= base_url('/user/bukuuser')?>">Daftar Buku</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page "  href="<?= base_url('/user/pinjam')?>" >Pinjam Buku</a>
                        </li>
                    </ul>
                    <form class="d-flex ">
                        <a href="<?= base_url('/keluar')?>" role="button"class="btn btn-outline-danger me-2" >KELUAR</a>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <?= $this->renderSection('content')?>

<br><br><br>
    <footer class="mt-5 mb-0 bg-dark" >
        <br>
        <div class="container text-center" id="footer" >Copyright &copy <?= Date('Y')?> | PERPUSTAKAAN UMUM |</div>
        <br>
    </footer>

    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    
</body>

</html>