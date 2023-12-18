<body class="bg-gradient-info">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center mt-3">

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
                                        <h1 class="h4 text-gray-900 mb-4">Form Registrasi</h1>
                                    </div>
                                    <?php
                                    //   Hide flashdata when page is refreshed
                                    if ($this->session->flashdata('pesan') != null) {
                                        echo $this->session->flashdata('pesan');
                                    }
                                    ?>
                                    <form class="user" method="POST" action="<?php echo base_url('auth/register') ?>">
                                     <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="nama_lengkap" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Nama Lengkap Anda...">
                                            <?php echo form_error('nama_lengkap', '<div class="text-danger small ml-2">', '</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Username Anda...">
                                            <?php echo form_error('username', '<div class="text-danger small ml-2">', '</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                                            <?php echo form_error('password', '<div class="text-danger small ml-2">', '</div>') ?>
                                        </div>
                                         <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password2" id="exampleInputPassword" placeholder="Konfirmasi Password">
                                            <?php echo form_error('password2', '<div class="text-danger small ml-2">', '</div>') ?>
                                        </div>
                                        <button type="submit" class="btn btn-outline-info btn-user btn-block">
                                            Register
                                        </button>
                                    </form>
                                    <!-- <hr> -->
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                    <div class="text-center mt-3">
                                        <a class="small" href="<?php echo base_url('auth/login') ?>">Kembali Ke Halaman Login</a>
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