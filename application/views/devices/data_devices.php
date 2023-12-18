<div class="container-fluid">

    <!-- Tabel -->

    <?php echo $this->session->flashdata('message') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="m-0 font-weight-bold text-primary">Data Perangkat Terdaftar</h3>
                </div>
                <div class="col-md-6 text-right">
                    <!-- <a href="<?php echo site_url(''); ?>" class="btn btn-outline-primary btn-md"><i class="fas fa-plus"></i> Tambah Aturan</a> -->
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered table-stripped" id="table_id" width="100%" cellspacing="0">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Perangkat</th>
                            <th>Jenis</th>
                            <th>Processor</th>
                            <th>RAM</th>
                            <th>Penyimpanan</th>
                            <th>Sistem Operasi</th>
                            <th>Status Garansi</th>
                            <!-- <th>Pemilik</th> -->
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($devices as $p) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $p->nama_perangkat ?></td>
                                <td><?php echo $p->jenis ?></td>
                                <td><?php echo $p->processor ?></td>
                                <td><?php echo $p->jenis_ram ?></td>
                                <td><?php echo $p->jenis_penyimpanan ?></td>
                                <td><?php echo $p->sistem_operasi ?></td>
                                <td><?php echo $p->status_garansi ?></td>
                                <!-- <?php 
                                    $id = $p->user_id;
                                    $query = $this->db->query("SELECT nama_lengkap FROM tb_user WHERE user_id = '$id'");
                                    $row = $query->row();
                                    echo "<td>".$row->nama_lengkap."</td>";
                                ?> -->
                                <!-- <td class="text-center">
                                    <a href="<?php echo site_url('' . $p->device_id); ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                                    <a href="<?php echo site_url('' . $p->device_id); ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Hapus</a>
                                </td> -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        <?php

            function tgl_indo($tanggal)
            {
                $bulan = array(
                    1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
                $pecahkan = explode('-', $tanggal);
                return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
            }
        ?>