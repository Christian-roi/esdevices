<div class="container-fluid">

    <!-- Tabel -->

    <?php echo $this->session->flashdata('pesan') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="m-0 font-weight-bold text-primary">Data Perangkat</h3>
                </div>
                <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tambahPerangkat"><i class="fas fa-plus"></i> Tambah Perangkat</button>
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
                            <th>Aksi</th>
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
                                <td class="text-center">
                                    <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#edit_device<?php echo $p->device_id ?>"><i class="fas fa-edit"></i> Ubah</button>
                                    <!-- <a href="<?php echo site_url('user/perangkat/hapus_device/' . $p->device_id); ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Hapus</a> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Modal Tambah Device  -->
    <div class="modal fade" id="tambahPerangkat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Input Perangkat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <form action="<?= base_url('user/perangkat/tambah_device') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_perangkat">Nama Perangkat</label>
                            <input type="text" name="nama_perangkat" id="nama_perangkat" class="form-control" placeholder="Masukkan Nama Kerusakan" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis Perangkat</label>
                            <select name="jenis" id="jenis" class="form-control">
                                <option selected disabled>Pilih Jenis Perangkat</option>
                                <option value="Laptop">Laptop</option>
                                <option value="Komputer">Komputer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="processor">Processor</label>
                            <input type="text" name="processor" id="processor" class="form-control" placeholder="Masukkan Processor" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_ram">Jenis RAM/Memori</label>
                            <select name="jenis_ram" id="jenis_ram" class="form-control">
                                <option selected disabled>Pilih Jenis RAM/Memori</option>
                                <option value="DDR3">DDR3</option>
                                <option value="DDR4">DDR4</option>
                                <option value="DDR5">DDR5</option>
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="jenis_penyimpanan">Jenis Penyimpanan</label>
                            <select name="jenis_penyimpanan" id="jenis_penyimpanan" class="form-control">
                                <option selected disabled>Pilih Jenis Penyimpanan</option>
                                <option value="HDD">HDD</option>
                                <option value="SSD">SSD</option>
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="sistem_operasi">Sistem Operasi</label>
                            <input type="text" name="sistem_operasi" id="sistem_operasi" class="form-control" placeholder="Masukkan Nama Kerusakan" required>
                        </div>
                        <div class="form-group">
                            <label for="status_garansi">Status Garansi</label>
                            <select name="status_garansi" id="status_garansi" class="form-control">
                                <option selected disabled>Pilih Status Garansi</option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Device -->
    <?php foreach ($devices as $p) : ?>
        <div class="modal fade" id="edit_device<?php echo $p->device_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Form Ubah Perangkat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"> 
                        <form action="<?= base_url('user/perangkat/edit_device/' . $p->device_id) ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama_perangkat">Nama Perangkat</label>
                                <input type="hidden" name="device_id" id="device_id" class="form-control" value="<?php echo $p->device_id ?>">
                                <input type="text" name="nama_perangkat" id="nama_perangkat" class="form-control" value="<?php echo $p->nama_perangkat ?>">
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis Perangkat</label>
                                <select name="jenis" id="jenis" class="form-control">
                                    <?php
                                        if ($p->jenis == "Laptop") {
                                            echo "<option value='Laptop' selected>Laptop</option>";
                                            echo "<option value='Komputer'>Komputer</option>";
                                        } else {
                                            echo "<option value='Laptop'>Laptop</option>";
                                            echo "<option value='Komputer' selected>Komputer</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="processor">Processor</label>
                                <input type="text" name="processor" id="processor" class="form-control" value="<?php echo $p->processor ?>">
                            </div>
                            <div class="form-group">
                                <label for="jenis_ram">Jenis RAM/Memori</label>
                                <select name="jenis_ram" id="jenis_ram" class="form-control">
                                    <?php
                                        if ($p->jenis_ram == "DDR3") {
                                            echo "<option value='DDR3' selected>DDR3</option>";
                                            echo "<option value='DDR4'>DDR4</option>";
                                            echo "<option value='DDR5'>DDR5</option>";
                                        } elseif ($p->jenis_ram == "DDR4") {
                                            echo "<option value='DDR3'>DDR3</option>";
                                            echo "<option value='DDR4' selected>DDR4</option>";
                                            echo "<option value='DDR5'>DDR5</option>";
                                        } else {
                                            echo "<option value='DDR3'>DDR3</option>";
                                            echo "<option value='DDR4'>DDR4</option>";
                                            echo "<option value='DDR5' selected>DDR5</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jenis_penyimpanan">Jenis Penyimpanan</label>
                                <select name="jenis_penyimpanan" id="jenis_penyimpanan" class="form-control">
                                    <?php
                                        if ($p->jenis_penyimpanan == "HDD") {
                                            echo "<option value='HDD' selected>HDD</option>";
                                            echo "<option value='SSD'>SSD</option>";
                                        } else {
                                            echo "<option value='HDD'>HDD</option>";
                                            echo "<option value='SSD' selected>SSD</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sistem_operasi">Sistem Operasi</label>
                                <input type="text" name="sistem_operasi" id="sistem_operasi" class="form-control" value="<?php echo $p->sistem_operasi ?>">
                            </div>
                            <div class="form-group">
                                <label for="status_garansi">Status Garansi</label>
                                <select name="status_garansi" id="status_garansi" class="form-control">
                                    <?php
                                        if ($p->status_garansi == "Ya") {
                                            echo "<option value='Ya' selected>Ya</option>";
                                            echo "<option value='Tidak'>Tidak</option>";
                                        } else {
                                            echo "<option value='Ya'>Ya</option>";
                                            echo "<option value='Tidak' selected>Tidak</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>