<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-3 align-center text-center mt-5">
            <div class="card">
                <img src="<?= base_url('assets/img/pict1.png'); ?>" class="card-img-top" alt="Wallpaper Image">
                <div class="card-body text-center">
                    <?php
                        $user_id = $this->session->userdata('user_id');
                        $query = $this->db->query("SELECT * FROM tb_device WHERE user_id = '$user_id'");
                        $row = $query->row();
                        if (isset($row)) {
                            // Make alert
                            echo '<div class="alert alert-success" role="alert">Anda sudah memiliki perangkat. Silahkan mulai diagnosa.</div>';
                            ?>
                            <a href="<?php echo base_url() ?>user/diagnosa/form_diagnosa" class="btn btn-primary"><i class="fa fa-wrench"></i> Mulai Diagnosa</a></div>
                        <?php } else {
                            // Make alert
                            echo '<div class="alert alert-danger" role="alert">Anda belum memiliki perangkat. Silahkan tambahkan perangkat Anda terlebih dahulu.</div>';
                            ?>
                            <a href="<?php echo base_url() ?>user/perangkat" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Perangkat Anda</a></div>
                        <?php }
                    ?>
            </div>
        </div>
    </div>
</div>