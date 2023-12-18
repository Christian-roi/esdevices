<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Content Row -->
      <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                Total Gejala</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $query = $this->db->query("SELECT * FROM tb_gejala");
                                    echo '<h3 class="font-weight-bold">'.$query->num_rows().'</h3>';
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- People Icon -->
                            <i class="fa-solid fa-notes-medical fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <a href="<?= base_url('admin/gejala') ?>" class="btn btn-outline-primary btn-md mt-3"><i class="fa fa-eye"></i> Lihat</a>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-success text-uppercase mb-1">
                                Total Kerusakan</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $query2 = $this->db->query("SELECT * FROM tb_kerusakan");
                                    echo '<h3 class="font-weight-bold">'.$query2->num_rows().'</h3>';
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- Icon city -->
                            <i class="fa-solid fa-viruses fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <a href="<?= base_url('admin/kerusakan') ?>" class="btn btn-outline-success btn-md mt-3"><i class="fa fa-eye"></i> Lihat</a>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-info text-uppercase mb-1">
                                Aturan Diagnosa</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $query3 = $this->db->query("SELECT * FROM tb_rules");
                                    echo '<h3 class="font-weight-bold">'.$query3->num_rows().'</h3>';
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- Family Icon -->
                            <i class="fa-solid fa-hospital-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <a href="<?= base_url('admin/rules') ?>" class="btn btn-outline-info btn-md mt-3"><i class="fa fa-eye"></i> Lihat</a>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                                Akun Terdaftar</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $query4 = $this->db->query("SELECT * FROM tb_user WHERE role = 2");
                                    echo '<h3 class="font-weight-bold">'.$query4->num_rows().'</h3>';
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- Icon Message -->
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <a href="<?= base_url('admin/user') ?>" class="btn btn-outline-warning btn-md mt-3"><i class="fa fa-eye"></i> Lihat</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->