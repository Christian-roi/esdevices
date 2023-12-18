<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('dashboard') ?>">
                <div class="sidebar-brand-image">
                    <img src="<?php echo base_url('assets/img/eslogov.png') ?>" alt="Logo" width="50px">
                </div>
                <div class="sidebar-brand-text mx-3">ESDKLP</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('dashboard') ?>">
                    <i class="fa-solid fa-house-chimney"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Utama
            </div>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('user/diagnosa') ?>">
                   <i class="fa-solid fa-comment-medical"></i>
                    <span>Mulai Diagnosa</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('user/perangkat') ?>">
                    <i class="fa-solid fa-desktop"></i>
                    <span>Perangkat Saya</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('user/diagnosa/riwayat') ?>">
                    <i class="fa-solid fa-file-medical"></i>
                    <span>Riwayat Diagnosa</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h3 class="h3 mb-0 text-info"><?php echo $title ?></h3>
                    <!-- Topbar Search -->
                    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->

                        <ul class="nav navbar-nav navbar-right">

                            <?php if ($this->session->userdata('username')) { ?>
                                <li class="nav item dropdown no-arrow">
                                    <a href="" class="nav-link dropdown-toggle" id="navDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo "Hai, " . $this->session->userdata('username') ?>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="navDropdown">
                                        <a href="<?php echo base_url('user/profile') ?>" class="dropdown-item">Profile</a>
                                        <a href="<?php echo base_url('auth/logout') ?>" class="dropdown-item">Logout</a>
                                    </div>
                                    
                                </li>
                            <?php } else { ?>
                                <li><?php echo anchor('auth/login', 'Login'); ?></li>
                            <?php } ?>
                        </ul>

                    </ul>

                </nav>
                <!-- End of Topbar -->