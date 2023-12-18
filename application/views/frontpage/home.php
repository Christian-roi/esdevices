<body style="background-image: url('assets/img/wallpaper1.png'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-primary">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('home'); ?>"><img src="<?= base_url('assets/img/eslogov.png'); ?>" alt="" width="30" height="30" class="d-inline-block align-text-top">ES</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= base_url('home'); ?>">Home</a></li>
                     <!-- <li class="nav-item"><a class="nav-link" aria-current="page" href="<?= base_url(''); ?>">Articles</a></li> -->
                      <!-- <li class="nav-item"><a class="nav-link" aria-current="page" href="<?= base_url(''); ?>">About</a></li> -->
                </ul>
                <ul class="navbar-nav ms-auto mb-2 ml-auto mb-lg-0">
                     <li class="nav-item"><a class="nav-link" href="<?= base_url('auth/login'); ?>">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container mt-5">
        <img src="<?= base_url('assets/img/eslogov.png'); ?>" alt="" width="200" height="200" class="d-inline-block align-text-top">
        <h1 class="text-left text-bold mt-5 text-white">Selamat datang di Sistem Pakar Diagnosa</h1>
        <h1 class="text-left text-bold text-white">Kerusakan Laptop dan Komputer</h1>
        <h1 class="text-left text-bold text-white">Dengan Metode Naive Bayes</h1>
        <a class="btn btn-info btn-lg mt-5" href="<?= base_url('auth/login'); ?>"><i class="fa fa-wrench" aria-hidden="true"></i> Mulai Diagnosa</a>
    </div>
 
    <!-- Footer-->
    <footer class="bg-dark navbar fixed-bottom">
        <div class="container px-4 px-lg-5 align-items-center justify-content-center">
            <p class="m-0 text-center text-white">Copyright &copy; 2023 Christian Roi Tua Sinaga</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <!-- <script src="js/scripts.js"></script> -->
</body>