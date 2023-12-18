<body class="bg-gradient-info">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center mt-4">

            <div class="col-xl-5 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-header">
                        <img src="<?php echo base_url('assets/img/eslogov.png') ?>" class="card-img-top mx-auto d-block mt-4" alt="Logo" style="width: 20%;">
                        <h3 class="text-center font-weight-bold text-secondary">Sistem Pakar Diagnosa</h3>
                        <h5 class="text-center font-weight-bold text-primary">Kerusakan Komputer dan Laptop</h5>
                    </div>
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-4">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Silahkan Login!</h1>
                                    </div>
                                    <?php
                                    //   Hide flashdata when page is refreshed
                                    if ($this->session->flashdata('pesan') != null) {
                                        echo $this->session->flashdata('pesan');
                                    }
                                    ?>
                                    <form class="user" method="POST" action="<?php echo base_url('auth/login') ?>">
                                        <div class="form-group">
                                            <input type="textr" class="form-control form-control-user" name="username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Username Anda...">
                                            <?php echo form_error('username', '<div class="text-danger small ml-2">', '</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                                            <?php echo form_error('password', '<div class="text-danger small ml-2">', '</div>') ?>
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                        <button type="submit" class="btn btn-outline-info btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        <a href="<?php echo base_url('auth/register') ?>" class="btn btn-outline-success btn-user btn-block">
                                            Register
                                        </a>
                                        <!-- <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <!-- <hr> -->
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                    <div class="text-center mt-3">
                                        <a class="small" href="<?php echo base_url('home') ?>">Kembali Ke Halaman Utama</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>