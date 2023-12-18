<div class="container-fluid">

    <!-- Tabel -->

    <?php echo $this->session->flashdata('pesan') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="m-0 font-weight-bold text-primary">Data Gejala</h3>
                </div>
                <div class="col-md-6 text-right">
                   <button class="btn btn-outline-primary" data-toggle="modal" data-target="#tambah_gejala"><i class="fas fa-plus"></i> Tambah Gejala</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered table-stripped" id="table_id" width="100%" cellspacing="0">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Kode Gejala</th>
                            <th>Keterangan Gejala</th>
                            <th>Format Pertanyaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($gejala as $p) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo 'G0',$p->symp_id ?></td>
                                <td><?php echo $p->keterangan ?></td>
                                <td class="text-center"><button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalPertanyaan<?php echo $p->symp_id ?>"><i class="fas fa-eye"></i> Lihat</button></td>
                                <td class="text-center">
                                    <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#edit_gejala<?php echo $p->symp_id ?>"><i class="fas fa-edit"></i> Ubah</button>
                                    <a href="<?php echo site_url('admin/gejala/hapus_gejala/' . $p->symp_id); ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php foreach ($gejala as $p) : ?>
         <!-- Modal -->
        <div class="modal fade" id="modalPertanyaan<?php echo $p->symp_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Pertanyaan G0<?php echo $p->symp_id ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><?php echo $p->pertanyaan ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Modal Tambah Gejala-->
    <div class="modal fade" id="tambah_gejala" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Input Data Gejala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <form action="<?= base_url('admin/gejala/tambah_gejala') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="keterangan">Keterangan Gejala</label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan Keterangan Gejala Kerusakan" required>
                        </div>
                        <div class="form-group">
                            <label for="pertanyaan">Pertanyaan Berdasarkan Gejala</label>
                            <input type="text" name="pertanyaan" id="pertanyaan" class="form-control" placeholder="Masukkan Pertanyaan berdasarkan Gejala">
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
    <?php foreach ($gejala as $p) : ?>
        <div class="modal fade" id="edit_gejala<?php echo $p->symp_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Input Data Gejala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <form action="<?= base_url('admin/gejala/edit_gejala/' . $p->symp_id) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="keterangan">Keterangan Gejala</label>
                            <input type="hidden" name="symp_id" id="symp_id" class="form-control" value="<?php echo $p->symp_id ?>">
                            <input type="text" name="keterangan" id="keterangan" class="form-control" value="<?php echo $p->keterangan ?>">
                        </div>
                        <div class="form-group">
                            <label for="pertanyaan">Pertanyaan Berdasarkan Gejala</label>
                            <input type="text" name="pertanyaan" id="pertanyaan" class="form-control" value="<?php echo $p->pertanyaan ?>">
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