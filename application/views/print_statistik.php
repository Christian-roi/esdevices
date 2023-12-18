<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="font-family: Arial, Helvetica, sans-serif; margin: 0; padding: 0;">
    <div class="row">
        <div class="col-md-12 text-center text-warning">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="align-items: space-between;">
                <tr>
                    <td width="20%" align="left" valign="top">
                        <img src="<?php echo base_url('assets/img/logo.png') ?>" width="50" alt="">
                    </td>
                    <td width="60%" align="center" valign="middle">
                        <div style="font-size: 18px; font-weight: bold;">
                            PEMERINTAH DESA SIDOMULYO
                        </div>
                        <div style="font-size: 14px; font-weight: bold;">
                            KECAMATAN SIBIRU BIRU
                        </div>
                        <div style="font-size: 12px; font-weight: bold;">
                            Sidomulyo, Kec. Sibiru-biru, Kabupaten Deli Serdang, Sumatera Utara
                        </div>
                    </td>
                    <td width="20%" align="right" valign="top">
                        <img src="<?php echo base_url('assets/img/Lambang_Kabupaten_Deli_Serdang.png') ?>" width="50" alt="">
                    </td>
                </tr>
            </table>

            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center">
            <h3 align="center">Laporan Statistik Penduduk</h3>
        </div>
    </div>

    <div class="row">
        <?php
        $sql = "SELECT * FROM tb_penduduk";
        $query = $this->db->query($sql);
        $row = $query->row();
        ?>
        <h4>Total Keseluruhan Penduduk</h4>
        <p style="font-size: 12px;">Jumlah Penduduk : <?= $query->num_rows() ?> Jiwa</p>
    </div>

    <div class="row">
        <h4>Jumlah Penduduk Berdasarkan Jenis Kelamin</h4>
        <table class="table table-bordered" width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px;">
            <thead style="background-color: #eee;">
                <tr>
                    <th width="50%">Jenis Kelamin</th>
                    <th>Jumlah (Orang)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $kelamin = ['Laki-laki', 'Perempuan'];
                foreach ($kelamin as $k) {
                    $this->db->where('jenis_kelamin', $k);
                    echo "<tr>
                        <td>$k</td>
                        <td>" . $this->db->get('tb_penduduk', ['jenis_kelamin' => $k])->num_rows() . "</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="row">
        <h4>Jumlah Penduduk Berdasarkan Agama</h4>
        <table class="table table-bordered" width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px;">
            <thead style="background-color: #eee;">
                <tr>
                    <th width="50%">Agama</th>
                    <th width="50%">Jumlah (Orang)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'];
                ?>
                <?php foreach ($agama as $row) : ?>
                    <tr>
                        <td><?= $row ?></td>
                        <td><?= $this->db->get_where('tb_penduduk', ['agama' => $row])->num_rows() ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="row" style="margin-bottom: 20px;">
        <h4>Jumlah Penduduk Berdasarkan Pendidikan</h4>
        <table class="table table-bordered" width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px;">
            <thead style="background-color: #eee;">
                <tr>
                    <th width="50%">Pendidikan</th>
                    <th width="50%">Jumlah (Orang)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $pendidikan = ['Tidak Sekolah', 'SD/Sederajat', 'SMP/Sederajat', 'SMA/SMK/Sederajat', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3'];
                ?>
                <?php foreach ($pendidikan as $row) : ?>
                    <tr>
                        <td><?= $row ?></td>
                        <td><?= $this->db->get_where('tb_penduduk', ['pendidikan_akhir' => $row])->num_rows() ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="row">
        <h4>Jumlah Penduduk Berdasarkan Golongan Darah</h4>
        <table class="table table-bordered" width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px;">
            <thead style="background-color: #eee;">
                <tr>
                    <th width="50%">Gologan Darah</th>
                    <th width="50%">Jumlah (Orang)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $goldarah = array('A', 'B', 'AB', 'O');
                $sql = $this->db->get('tb_penduduk')->result();
                foreach ($goldarah as $row) {
                    $this->db->where('gol_darah', $row);
                    $jumlah = "SELECT COUNT(*) AS jumlah FROM tb_penduduk WHERE gol_darah = '$row'";
                    $jumlah = $this->db->query($jumlah)->row()->jumlah;
                    echo "<tr>
                        <td>$row</td>
                        <td>$jumlah</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="row">
        <h4>Jumlah Penduduk Berdasarkan Pekerjaan</h4>
        <table class="table table-bordered" width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px;">
            <thead style="background-color: #eee;">
                <tr>
                    <th width="50%">Pekerjaan</th>
                    <th width="50%">Jumlah (Orang)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_pekerjaan = "SELECT * FROM tb_pekerjaan ORDER BY nama ASC";
                $pekerjaan = $this->db->query($sql_pekerjaan)->result();
                foreach ($pekerjaan as $row) {
                    $this->db->where('pekerjaan', $row->id);
                    $jumlah = "SELECT COUNT(*) AS jumlah FROM tb_penduduk WHERE pekerjaan = '$row->nama'";
                    $jumlah = $this->db->query($jumlah)->row()->jumlah;
                    echo "<tr>
                        <td>$row->nama</td>
                        <td>$jumlah</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="row">
        <h4>Jumlah Penduduk Berdasarkan Status Perkawinan</h4>
        <table class="table table-bordered" width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px;">
            <thead style="background-color: #eee;">
                <tr>
                    <th width="50%">Status Perkawinan</th>
                    <th width="50%">Jumlah (Orang)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $status = ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'];
                ?>
                <?php foreach ($status as $row) : ?>
                    <tr>
                        <td><?= $row ?></td>
                        <td><?php
                            $this->db->where('status_perkawinan', $row);
                            $jumlah = "SELECT COUNT(*) AS jumlah FROM tb_penduduk WHERE status_perkawinan = '$row'";
                            $jumlah = $this->db->query($jumlah)->row()->jumlah;
                            echo $jumlah;
                            ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="row">
        <h4>Jumlah Pemilik Suara Berdasarkan Dusun</h4>
        <table class="table table-bordered" width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size: 12px;">
            <thead style="background-color: #eee;">
                <tr>
                    <th width="50%">Dusun</th>
                    <th width="50%">Jumlah (Orang)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tb_dusun";
                $sql = $this->db->query($sql)->result();
                foreach ($sql as $row) {
                    $sql = "SELECT * FROM tb_penduduk";
                    $sql = $this->db->query($sql)->result();
                    foreach ($sql as $p) {
                        // check if year on field tanggal_lahir is >= 17 when subtracted from current year (date('Y')) and store it in $eligible
                        $eligible = date('Y') - 17;
                        if ($eligible >= 17) {
                            $jumlah = "SELECT COUNT(*) AS jumlah FROM tb_penduduk WHERE dusun = '$row->nama_dusun' AND YEAR(tanggal_lahir) <= '$eligible'";
                            $jumlah = $this->db->query($jumlah)->row()->jumlah;
                        }
                    }
                    echo "<tr>
                        <td>$row->nama_dusun</td>
                        <td>$jumlah</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- <div class="row">
        <p class="text-center">Mengetahui</p>
        <p class="text-center">Kepala Desa</p>
        <br>
        <br>
        <br>
        <p class="text-center">............................................</p>
        <p class="text-center">NIP. ............................................</p>
    </div> -->
</body>

</html>