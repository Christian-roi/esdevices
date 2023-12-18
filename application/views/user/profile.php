<div class="container-fluid">
    <?php echo $this->session->flashdata('pesan') ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Profile</h3>
                </div>
            <div class="card-body">
            <?php foreach ($user as $p) : ?>
                    <div class="row">
                        <div class="col-md-3">
                            <img src="<?= base_url('assets/img/undraw_profile.svg')?>" class="card-img">
                        </div>
                        <div class="col-md-8">
                            <table class="table">
                                <tr>
                                    <td width="10%">
                                        Nama
                                    </td>
                                    <td>:</td>
                                    <td width="90%">
                                        <?= $p->nama_lengkap; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>:</td>
                                    <td><?= $p->username; ?></td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                        if ($p->role == 1) {
                                            echo "Admin";
                                        } else {
                                            echo "User";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </table>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#editProfile"><i class="fas fa-edit"></i> Edit Profile</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Modal Edit Profile -->
<?php foreach ($user as $p) : ?>
    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Data Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <form method="post" action="<?php echo base_url() . 'user/profile/edit_profile' ?>">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $p->user_id ?>">
                            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $p->nama_lengkap ?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?php echo $p->username ?>">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password" class="form-control" value="<?php echo $p->password ?>">
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