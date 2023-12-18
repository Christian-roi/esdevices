<div class="container-fluid">
    <?php echo $this->session->flashdata('pesan'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="m-0 font-weight-bold text-primary">Data Akun</h3>
                </div>
                <div class="col-md-6 text-right">
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#tambah_data_user"><i class="fas fa-plus fa-sm"></i> Tambah Pengguna</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered table-stripped" id="table_id" width="100%" cellspacing="0">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Role</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $usr) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $usr->nama_lengkap ?></td>
                                <?php if ($usr->role == 1) : ?>
                                    <td>Admin Sistem</td>
                                <?php else : ?>
                                    <td>Pengguna</td>
                                <?php endif; ?>
                                <td><?php echo $usr->username ?></td>
                                <td><?php echo $usr->password ?></td>
                                <td class="text-center">
                                    <button class="btn btn-outline-success" data-toggle="modal" data-target="#edit_data_user_<?php echo $usr->user_id ?>"><i class="fas fa-edit fa-sm"></i> Ubah</button>
                                    <a href="<?php echo base_url('admin/user/hapus_data_user/' . $usr->user_id) ?>" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash fa-sm"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_data_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Input Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/user/tambah_data_user') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Lengkap">
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control">
                            <option selected disabled>Pilih Role</option>
                            <option value="1">Admin</option>
                            <option value="2">Pengguna</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password" class="form-control" placeholder="Masukkan Password">
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

<?php foreach ($user as $usr) : ?>
    <div class="modal fade" id="edit_data_user_<?php echo $usr->user_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Data Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <form action="<?= base_url('admin/user/edit_data_user/' . $usr->user_id) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $usr->user_id ?>">
                            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $usr->nama_lengkap ?>">
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option selected disabled>Pilih Role</option>
                                <option value="1" <?php if ($usr->role == 1) {
                                                        echo "selected";
                                                    } ?>>Admin</option>
                                <option value="2" <?php if ($usr->role == 2) {
                                                        echo "selected";
                                                    } ?>>Pengguna</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?php echo $usr->username ?>">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password" class="form-control" value="<?php echo $usr->password ?>">
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