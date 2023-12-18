<div class="container-fluid">

    <!-- Tabel -->

    <?php echo $this->session->flashdata('pesan') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="m-0 font-weight-bold text-primary">Aturan Diagnosa (Rules)</h3>
                </div>
                <div class="col-md-6 text-right">
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#tambah_aturan"><i class="fas fa-plus"></i> Tambah Aturan</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered table-stripped" id="table_id" width="100%" cellspacing="0">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Gejala Perangkat</th>
                            <th>Kerusakan</th>
                            <th>Bobot Persentase</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($rules as $p) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php 
                                $symp_id = $p->symp_id;
                                $query = $this->db->query("SELECT * FROM tb_gejala WHERE symp_id = '$symp_id'");
                                $row = $query->row();
                                echo 'G'.$row->symp_id.' - '.$row->keterangan;
                                ?></td>
                                <td><?php
                                $fault_id = $p->fault_id;
                                $query = $this->db->query("SELECT * FROM tb_kerusakan WHERE fault_id = '$fault_id'");
                                $row = $query->row();
                                echo 'K'.$row->fault_id.' - '.$row->nama_kerusakan; 
                                 ?></td>
                                <td><?php echo $p->bobot_persentase	 ?></td>
                                <td class="text-center">
                                    <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#edit_rules<?php echo $p->rules_id ?>"><i class="fas fa-edit"></i> Ubah</button>
                                    <a href="<?php echo site_url('admin/rules/hapus_rules/' . $p->rules_id); ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

     <!-- Modal Tambah Gejala-->
    <div class="modal fade" id="tambah_aturan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Input Aturan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <form action="<?= base_url('admin/rules/tambah_rules') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="symp_id">Gejala</label>
                            <select name="symp_id" id="symp_id" class="form-control">
                                <option selected disabled>Pilih Gejala/Symptom</option>
                                <?php foreach ($gejala as $g) : ?>
                                    <option value="<?= $g->symp_id ?>"><?= 'G'.$g->symp_id ?> - <?= $g->keterangan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fault_id">Kerusakan</label>
                            <select name="fault_id" id="fault_id" class="form-control">
                                <option selected disabled>Pilih Kerusakan/Fault</option>
                                <?php foreach ($kerusakan as $k) : ?>
                                    <option value="<?= $k->fault_id ?>"><?= 'K'.$k->fault_id ?> - <?= $k->nama_kerusakan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bobot_persentase">Bobot Persentase</label>
                            <input type="text" name="bobot_persentase" id="bobot_persentase" class="form-control" placeholder="Masukkan Bobot Persentase" required>
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
    <?php foreach ($rules as $p) : ?>
    <div class="modal fade" id="edit_rules<?php echo $p->rules_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Input Aturan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <form action="<?= base_url('admin/rules/edit_rules/' . $p->rules_id) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="symp_id">Gejala</label>
                            <select name="symp_id" id="symp_id" class="form-control">
                                <option selected disabled>Pilih Gejala/Symptom</option>
                                <?php
                                $gejala = $this->db->query("SELECT * FROM tb_gejala")->result();
                                foreach ($gejala as $g) {
                                    if ($g->symp_id == $p->symp_id) {
                                        echo "<option value='$g->symp_id' selected>G$g->symp_id - $g->keterangan</option>";
                                    } else {
                                        echo "<option value='$g->symp_id'>G$g->symp_id - $g->keterangan</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fault_id">Kerusakan</label>
                            <select name="fault_id" id="fault_id" class="form-control">
                                <option selected disabled>Pilih Kerusakan/Fault</option>
                                <?php
                                $kerusakan = $this->db->query("SELECT * FROM tb_kerusakan")->result();
                                foreach ($kerusakan as $k) {
                                    if ($k->fault_id == $p->fault_id) {
                                        echo "<option value='$k->fault_id' selected>K$k->fault_id - $k->nama_kerusakan</option>";
                                    } else {
                                        echo "<option value='$k->fault_id'>K$k->fault_id - $k->nama_kerusakan</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bobot_persentase">Bobot Persentase</label>
                            <input type="hidden" name="rules_id" id="rules_id" class="form-control" value="<?php echo $p->rules_id ?>">
                            <input type="text" name="bobot_persentase" id="bobot_persentase" class="form-control" value="<?php echo $p->bobot_persentase ?>">
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