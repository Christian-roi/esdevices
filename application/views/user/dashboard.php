<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-1">
            <!-- Project Card Example -->
            <div class="card shadow">
                <div class="card-body">
                    <?php
                        $user_id = $this->session->userdata('user_id');
                        $query = $this->db->query("SELECT * FROM tb_user WHERE user_id = '$user_id'");
                        $row = $query->row();
                        echo "<h4 class='h4 mb-0 text-gray-800 text-center'>Selamat Datang $row->nama_lengkap, di Sistem Diagnosis Kerusakan Perangkat Komputer dan Laptop</h4>";
                    ?>
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-4">
            <!-- Heading Row-->
             <div class="row justify-content-center">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-md font-weight-bold text-info text-uppercase mb-1">
                                        Perangkat Anda</div>
                                    <div class="h3 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                        $user_id = $this->session->userdata('user_id');
                                        $query = $this->db->query("SELECT * FROM tb_device WHERE user_id = '$user_id'");
                                        $count = $query->num_rows();
                                        echo $count;
                                    ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <!-- People Icon -->
                                    <i class="fa-solid fa-desktop fa-2x text-gray-300"></i>
                                </div>
                            </div>
                            <a href="<?= base_url('user/perangkat') ?>" class="btn btn-outline-info btn-md mt-3"><i class="fa fa-eye"></i> Lihat</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                        Riwayat Diagnosa</div>
                                    <div class="h3 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                        $user_id = $this->session->userdata('user_id');
                                        $query = $this->db->query("SELECT * FROM tb_diagnosa WHERE user_id = '$user_id'");
                                        $count = $query->num_rows();
                                        echo $count;
                                    ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <!-- People Icon -->
                                    <i class="fa-solid fa-file-medical fa-2x text-gray-300"></i>
                                </div>
                            </div>
                            <a href="<?= base_url('user/diagnosa/riwayat') ?>" class="btn btn-outline-primary btn-md mt-3"><i class="fa fa-eye"></i> Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 align-items-center my-2">
                <div class="col-lg-7"><img class="img-fluid rounded mb-2 mb-lg-0" src="<?= base_url('assets/img/pict1.png'); ?>" alt="..."></div>
                    <div class="col-lg-5">
                        <h2 class="font-weight-light">Kenali Masalah Perangkat Anda sebelum terlambat</h2>
                        <p>Kerusakan pada perangkat komputer dan laptop dapat terjadi kapan saja. Untuk itu, kenali masalah yang terjadi pada perangkat anda sebelum terlambat.</p>
                        <!-- <a class="btn btn-primary" href="<?php echo base_url('user/diagnosa') ?>">Mulai Diagnosa</a> -->
                    </div>
                 </div>
            </div>
             <!-- Content Row -->
           
        </div>
    </div>


    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->