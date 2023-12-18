<div class="container-fluid">

    <!-- Tabel -->

    <?php echo $this->session->flashdata('pesan') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="m-0 font-weight-bold text-primary">Data Kerusakan</h3>
                </div>
                <div class="col-md-6 text-right">
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#tambah_kerusakan"><i class="fas fa-plus"></i> Tambah Kerusakan</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered table-stripped" id="table_id" width="100%" cellspacing="0">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Kerusakan</th>
                            <th>Jenis Kerusakan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kerusakan as $p) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $p->nama_kerusakan ?></td>
                                 <td><?php echo $p->jenis ?></td>
                                <td class="text-center">
                                   <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#edit_kerusakan<?php echo $p->fault_id ?>"><i class="fas fa-edit"></i> Ubah</button>
                                    <a href="<?php echo site_url('admin/kerusakan/hapus_kerusakan/' . $p->fault_id); ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

     <!-- Modal Tambah Gejala-->
    <div class="modal fade" id="tambah_kerusakan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Input Data Kerusakan/Fault</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <form action="<?= base_url('admin/kerusakan/tambah_kerusakan') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_kerusakan">Nama Kerusakan</label>
                            <input type="text" name="nama_kerusakan" id="nama_kerusakan" class="form-control" placeholder="Masukkan Nama Kerusakan" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis Kerusakan</label>
                            <select name="jenis" id="jenis" class="form-control">
                                <option selected disabled>Pilih Jenis Kerusakan</option>
                                <option value="Hardware">Hardware</option>
                                <option value="Software">Software</option>
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

    <!-- Modal Edit Gejala -->
    <?php foreach ($kerusakan as $p) : ?>
        <div class="modal fade" id="edit_kerusakan<?php echo $p->fault_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Input Data Gejala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <form action="<?= base_url('admin/kerusakan/edit_kerusakan/' . $p->fault_id) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_kerusakan">Nama Kerusakan</label>
                            <input type="hidden" name="fault_id" id="fault_id" class="form-control" value="<?php echo $p->fault_id ?>">
                            <input type="text" name="nama_kerusakan" id="nama_kerusakan" class="form-control" value="<?php echo $p->nama_kerusakan ?>">
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis Kerusakan</label>
                            <select name="jenis" id="jenis" class="form-control">
                                <?php
                                if ($p->jenis == "Hardware") {
                                    echo "<option value='Hardware' selected>Hardware</option>";
                                    echo "<option value='Software'>Software</option>";
                                } else {
                                    echo "<option value='Hardware'>Hardware</option>";
                                    echo "<option value='Software' selected>Software</option>";
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