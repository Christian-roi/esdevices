<div class="container-fluid">
    <!-- Tabel -->
    <?php echo $this->session->flashdata('pesan') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="m-0 font-weight-bold text-primary">Riwayat Diagnosa</h3>
                </div>
                <!-- <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tambahPerangkat"><i class="fas fa-plus"></i> Tambah Perangkat</button>
                </div> -->
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
                            <th>Waktu Diagnosa</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($diagnosa as $p) :
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td><?php 
                                $query = $this->db->query("SELECT * FROM tb_device INNER JOIN tb_diagnosa ON tb_device.device_id = tb_diagnosa.device_id WHERE diagnosa_id = '$p->diagnosa_id'");
                                $row = $query->row();
                                echo $row->nama_perangkat;
                                ?></td>
                                <td><?php 
                                $query = $this->db->query("SELECT * FROM tb_device INNER JOIN tb_diagnosa ON tb_device.device_id = tb_diagnosa.device_id WHERE diagnosa_id = '$p->diagnosa_id'");
                                $row = $query->row();
                                echo $row->jenis;
                                ?></td>
                                <td><?php echo tgl_indo($p->tgl_diagnosa) ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url() ?>user/diagnosa/result/<?php echo $p->diagnosa_id ?>" class="btn btn-outline-primary text-center"><i class="fas fa-eye"></i> Hasil Diagnosa</a>
                                    <a href="<?php echo base_url() ?>user/diagnosa/delete/<?php echo $p->diagnosa_id ?>" class="btn btn-outline-danger text-center" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
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