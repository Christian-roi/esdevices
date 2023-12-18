<div class="container-fluid">
    <div class="row mt-5 mb-5">
        <div class="col-md-6 offset-3 text-center">
            <h5 class="font-weight-bolder"  id="page-top">Form Diagnosa</h5>
        </div>
        <div class="col-md-6 offset-3 justify-content-center align-content-center">
            <div class="card p-4">
                <form action="<?php echo base_url() ?>user/diagnosa/insertJawaban" method="post">
                <label for="perangkat">Pilih Perangkat Yang Didiagnosa</label>
                <div class="form-group">
                    <select name="device_id" class="form-control">
                        <option value="">Pilih Device</option>
                        <?php foreach($device as $p): ?>
                            <option value="<?php echo $p->device_id ?>"><?php echo $p->nama_perangkat ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php
                $no = 1;
                foreach($gejala as $p):
                ?>
                    <div class="form-group">
                        <label for="gejala">Gejala <?php echo $no++ ?> - <?php echo $p->pertanyaan ?></label>
                        <select name="gejala_<?php echo $p->symp_id ?>" class="form-control">
                            <option selected disabled>Jawaban Anda...</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                <?php endforeach; ?>
                <button type="submit" class="btn btn-primary">Kirim</button>
                <a href="<?php echo base_url() ?>user/diagnosa" class="btn btn-danger">Kembali</a>
            </form>
            </div>
        </div>
    </div>
</div>