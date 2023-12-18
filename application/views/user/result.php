<div class="container-fluid">
    <div class="row">
        <!-- Buatlah Halaman untuk menampilkan hasil perhitungan Naive Bayes -->
        <?php
            $user_id = $this->session->userdata('user_id');
            $diagnosa_id = $this->uri->segment(4);       
            $kerusakan1 = $this->model_diagnosa->jawaban_ya_per_kerusakan($diagnosa_id, 1);
            // echo floatval($kerusakan1);
            // echo '<br>';
            $kerusakan2 = $this->model_diagnosa->jawaban_ya_per_kerusakan($diagnosa_id, 2);
            // echo floatval($kerusakan2);
            // echo '<br>';
            $kerusakan3 = $this->model_diagnosa->jawaban_ya_per_kerusakan($diagnosa_id, 3);
            // echo floatval($kerusakan3);
            // echo '<br>';
            $kerusakan4 = $this->model_diagnosa->jawaban_ya_per_kerusakan($diagnosa_id, 4);
            // echo floatval($kerusakan4);
            // echo '<br>';
            $kerusakan5 = $this->model_diagnosa->jawaban_ya_per_kerusakan($diagnosa_id, 5);
            // echo floatval($kerusakan5);
            // echo '<br>';

            $total = $kerusakan1 + $kerusakan2 + $kerusakan3 + $kerusakan4 + $kerusakan5;

            //Find max and second max
            $array = array($kerusakan1, $kerusakan2, $kerusakan3, $kerusakan4, $kerusakan5);
            $max = max($array);
            // echo $max;
            $max2 = max(array_diff($array, array($max)));
            
            if($max == $kerusakan1){
                $faultMax = 1;
            }else if($max == $kerusakan2){
                $faultMax = 2;
            }else if($max == $kerusakan3){
                $faultMax = 3;
            }else if($max == $kerusakan4){
                $faultMax = 4;
            }else if($max == $kerusakan5){
                $faultMax = 5;
            }

            if($max2 == $kerusakan1){
                $faultMax2 = 1;
            }else if($max2 == $kerusakan2){
                $faultMax2 = 2;
            }else if($max2 == $kerusakan3){
                $faultMax2 = 3;
            }else if($max2 == $kerusakan4){
                $faultMax2 = 4;
            }else if($max2 == $kerusakan5){
                $faultMax2 = 5;
            }

            // echo $faultMax;
            
            
            $query = $this->db->query("SELECT * FROM tb_kerusakan WHERE fault_id = '$faultMax'");
            $row = $query->row();
            // echo '<div class="alert alert-success" role="alert">Kerusakan : ' . $row->nama_kerusakan . ' - ' . intval(($max2/$total)*100) . '%</div>';
            // echo '<div class="alert alert-success" role="alert">Kerusakan : ' . $row->nama_kerusakan . ' - ' . intval(($max/$total)*100) . '%</div>';
           ?>
        <!-- Make Circle Diagram  -->
        <div class="col-md-6 offset-3 text-center">
            <h5 class="font-weight-bold"  id="page-top">Hasil Diagnosa</h5>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 offset-3">
                                <h3 class="font-weight-bolder"  id="page-top"><?php echo intval(($max/$total)*100) ?>%</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 offset-3">
                                <!-- Progress Bar -->
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="<?php echo intval(($max/$total)*100) ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo intval(($max/$total)*100) ?>%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-8 offset-2">
                                <p class="font-weight-bold">Perangkat 
                                <?php
                                    $query = $this->db->query("SELECT * FROM tb_device INNER JOIN tb_diagnosa ON tb_device.device_id = tb_diagnosa.device_id WHERE tb_diagnosa.diagnosa_id = '$diagnosa_id'");
                                    $row2 = $query->row();
                                    echo '<span class="text-info">' . $row2->nama_perangkat . '</span>';
                                ?>
                                anda di diagnosa mengalami
                                </p>
                                <div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading font-weight-bolder"><?php echo $row->nama_kerusakan ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row for Rekomendasi -->
    <div class="row p-5">
        <!-- Make accordion -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-chart-bar"></i> Solusi dan Rekomendasi </h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show animated--fade-in" id="collapseCardExample">
                     <div class="card-body">
                        <?php
                        $query = $this->db->query("SELECT * FROM tb_device INNER JOIN tb_diagnosa ON tb_device.device_id = tb_diagnosa.device_id WHERE tb_diagnosa.diagnosa_id = '$diagnosa_id'");
                        $row2 = $query->row();
                        echo '<p class="font-weight-bold">Perangkat <span class="text-info">' . $row2->nama_perangkat . '</span> anda di diagnosa mengalami <span class="text-danger">' . $row->nama_kerusakan . '</span>, solusi yang dapat anda lakukan adalah :</p>';
                        if($faultMax == 1){
                            echo '<div class="text-center">';
                            echo '<img src="' . base_url() . 'assets/img/virus.png" class="img-thumbnail m-4" alt="Responsive image" width="200px">';
                            echo '</div>';
                            if($row2->status_garansi == 'Ya'){
                                echo '<p class="font-weight-bold text-center">Perangkat anda masih dalam masa garansi, silahkan hubungi pihak service center untuk melakukan perbaikan</p>';
                                echo '<ul class="list-group">';
                                echo '<li class="list-group-item">1. Jalankan pemindaian menyeluruh menggunakan antivirus yang terupdate untuk mengidentifikasi dan menghapus malware.</li>';
                                echo '<li class="list-group-item">2. Boot perangkat dalam mode aman dan lakukan pemindaian antivirus sekali lagi untuk menghapus infeksi yang lebih sulit.</li>';
                                echo '<li class="list-group-item">3. Pastikan sistem operasi, aplikasi, dan antivirus selalu diperbarui dengan pembaruan terkini untuk mengisi celah keamanan yang mungkin dieksploitasi oleh malware.</li>';
                                echo '<li class="list-group-item">4. Hapus aplikasi atau ekstensi yang dicurigai sebagai sumber infeksi.</li>';
                                echo '<li class="list-group-item">5. Gunakan backup eksternal yang aman dan terisolasi untuk menyimpan file penting guna menghindari kehilangan data.</li>';
                                echo '<li class="list-group-item">6. Jika semua upaya tidak berhasil, berkonsultasilah dengan ahli keamanan atau profesional TI untuk membantu menangani infeksi yang lebih serius.</li>';
                                echo '</ul>';
                            }else{
                                echo '<ul class="list-group">';
                                echo '<li class="list-group-item">1. Jalankan pemindaian menyeluruh menggunakan antivirus yang terupdate untuk mengidentifikasi dan menghapus malware.</li>';
                                echo '<li class="list-group-item">2. Boot perangkat dalam mode aman dan lakukan pemindaian antivirus sekali lagi untuk menghapus infeksi yang lebih sulit.</li>';
                                echo '<li class="list-group-item">3. Pastikan sistem operasi, aplikasi, dan antivirus selalu diperbarui dengan pembaruan terkini untuk mengisi celah keamanan yang mungkin dieksploitasi oleh malware.</li>';
                                echo '<li class="list-group-item">4. Hapus aplikasi atau ekstensi yang dicurigai sebagai sumber infeksi.</li>';
                                echo '<li class="list-group-item">5. Gunakan backup eksternal yang aman dan terisolasi untuk menyimpan file penting guna menghindari kehilangan data.</li>';
                                echo '<li class="list-group-item">6. Jika semua upaya tidak berhasil, berkonsultasilah dengan ahli keamanan atau profesional TI untuk membantu menangani infeksi yang lebih serius.</li>';
                                echo '</ul>';
                            }
                        }else if($faultMax == 2){
                            echo '<div class="text-center">';
                            echo '<img src="' . base_url() . 'assets/img/baterai.jpg" class="img-thumbnail m-4" alt="Responsive image" width="200px">';
                            echo '</div>';
                            if($row2->status_garansi == 'Ya'){
                                echo '<p class="font-weight-bold text-center">Perangkat anda masih dalam masa garansi, silahkan hubungi pihak service center untuk melakukan perbaikan</p>';
                                echo '<ul class="list-group">';
                                echo '<li class="list-group-item">1. Periksa kondisi fisik baterai untuk melihat adanya kerusakan fisik seperti pembengkakan, kebocoran, atau tanda-tanda aus yang ekstrem.</li>';
                                echo '<li class="list-group-item">2. Pastikan kontak baterai dan konektor di perangkat dalam keadaan bersih dan tidak terkontaminasi yang bisa mengganggu pengisian.</li>';
                                echo '<li class="list-group-item">3. Pastikan sistem operasi dan driver terkini, karena pembaruan ini dapat mengoptimalkan kinerja baterai.</li>';
                                echo '<li class="list-group-item">4. Pastikan sumber daya listrik yang digunakan terhubung dengan baik dan dalam kondisi normal.</li>';
                                echo '<li class="list-group-item">5. Jika kabel atau adaptor terlihat rusak atau tidak berfungsi dengan baik, gantilah dengan yang baru dan sesuai.</li>';
                                echo '<li class="list-group-item">6. Jika tidak yakin atau kerusakan terlalu rumit, konsultasikan dengan ahli perangkat keras atau teknisi untuk bantuan lebih lanjut</li>';
                                echo '</ul>';
                            }else{
                                echo '<ul class="list-group">';
                                echo '<li class="list-group-item">1. Periksa kondisi fisik baterai untuk melihat adanya kerusakan fisik seperti pembengkakan, kebocoran, atau tanda-tanda aus yang ekstrem.</li>';
                                echo '<li class="list-group-item">2. Pastikan kontak baterai dan konektor di perangkat dalam keadaan bersih dan tidak terkontaminasi yang bisa mengganggu pengisian.</li>';
                                echo '<li class="list-group-item">3. Pastikan sistem operasi dan driver terkini, karena pembaruan ini dapat mengoptimalkan kinerja baterai.</li>';
                                echo '<li class="list-group-item">4. Pastikan sumber daya listrik yang digunakan terhubung dengan baik dan dalam kondisi normal.</li>';
                                echo '<li class="list-group-item">5. Jika kabel atau adaptor terlihat rusak atau tidak berfungsi dengan baik, gantilah dengan yang baru dan sesuai.</li>';
                                echo '<li class="list-group-item">6. Jika tidak yakin atau kerusakan terlalu rumit, konsultasikan dengan ahli perangkat keras atau teknisi untuk bantuan lebih lanjut</li>';
                                echo '</ul>';
                            }
                        }else if($faultMax == 3){
                            if($row2->status_garansi == 'Ya'){
                                echo '<p class="font-weight-bold text-center">Perangkat anda masih dalam masa garansi, silahkan hubungi pihak service center untuk melakukan perbaikan</p>';
                                echo '<ul class="list-group">';
                                echo '<li class="list-group-item">1. Lakukan pemeriksaan fisik terhadap port dan peripheral yang terdampak. Periksa apakah ada kerusakan fisik seperti kabel yang rusak, kontak yang bengkok, atau kotoran yang menyumbat port.</li>';
                                echo '<li class="list-group-item">2. Periksa apakah driver perangkat terkait telah terinstal dengan benar atau perlu diperbarui.</li>';
                                echo '<li class="list-group-item">3. Coba peripheral yang bermasalah pada perangkat lain untuk memastikan apakah kerusakan berasal dari peripheral atau port tersebut.</li>';
                                echo '<li class="list-group-item">4. Lakukan reboot perangkat dan reset pengaturan jika diperlukan untuk mengatasi masalah konfigurasi yang mungkin terjadi.</li>';
                                echo '<li class="list-group-item">5. Pastikan bahwa peripheral yang digunakan kompatibel dengan perangkat yang Anda gunakan.</li>';
                                echo '<li class="list-group-item">6. Jika kerusakan parah dan tidak dapat diperbaiki, pertimbangkan untuk mengganti peripheral atau port yang terkena masalah.</li>';
                                echo '</ul>';
                            }else{
                                echo '<ul class="list-group">';
                                echo '<li class="list-group-item">1. Lakukan pemeriksaan fisik terhadap port dan peripheral yang terdampak. Periksa apakah ada kerusakan fisik seperti kabel yang rusak, kontak yang bengkok, atau kotoran yang menyumbat port.</li>';
                                echo '<li class="list-group-item">2. Periksa apakah driver perangkat terkait telah terinstal dengan benar atau perlu diperbarui.</li>';
                                echo '<li class="list-group-item">3. Coba peripheral yang bermasalah pada perangkat lain untuk memastikan apakah kerusakan berasal dari peripheral atau port tersebut.</li>';
                                echo '<li class="list-group-item">4. Lakukan reboot perangkat dan reset pengaturan jika diperlukan untuk mengatasi masalah konfigurasi yang mungkin terjadi.</li>';
                                echo '<li class="list-group-item">5. Pastikan bahwa peripheral yang digunakan kompatibel dengan perangkat yang Anda gunakan.</li>';
                                echo '<li class="list-group-item">6. Jika kerusakan parah dan tidak dapat diperbaiki, pertimbangkan untuk mengganti peripheral atau port yang terkena masalah.</li>';
                                echo '</ul>';
                            }
                        }else if($faultMax == 4){
                            if($row2->status_garansi == 'Ya'){
                                echo '<p class="font-weight-bold text-center">Perangkat anda masih dalam masa garansi, silahkan hubungi pihak service center untuk melakukan perbaikan</p>';
                                echo '<ul class="list-group">';
                                echo '<li class="list-group-item">1. Cobalah untuk melakukan restart pada perangkat komputer atau laptop. Kadang-kadang masalah sederhana pada sistem operasi dapat diperbaiki dengan melakukan restart.</li>';
                                echo '<li class="list-group-item">2. Masuk ke Safe Mode untuk melihat apakah sistem operasi masih dapat berjalan di dalam mode ini. Dari sini, Anda bisa mencoba melakukan perbaikan atau pembaruan yang diperlukan.</li>';
                                echo '<li class="list-group-item">3. Pastikan sistem operasi Anda telah diperbarui ke versi terbaru yang telah dirilis oleh penyedia sistem operasi.</li>';
                                echo '<li class="list-group-item">4. Jika masalahnya serius dan tidak dapat diperbaiki, pertimbangkan untuk melakukan reinstall sistem operasi. Pastikan Anda memiliki cadangan data penting sebelum melakukan langkah ini.</li>';
                                echo '<li class="list-group-item">5. Gunakan fitur pemulihan sistem yang disediakan oleh sistem operasi untuk mengembalikan komputer ke titik pemulihan sebelum terjadinya masalah.</li>';
                                echo '<li class="list-group-item">6. Jika Anda tidak yakin atau tidak berhasil menangani masalah tersebut, konsultasikan dengan teknisi atau ahli IT yang dapat membantu menyelesaikan masalah.</li>';
                                echo '</ul>';
                            }else{
                                echo '<ul class="list-group">';
                                echo '<li class="list-group-item">1. Cobalah untuk melakukan restart pada perangkat komputer atau laptop. Kadang-kadang masalah sederhana pada sistem operasi dapat diperbaiki dengan melakukan restart.</li>';
                                echo '<li class="list-group-item">2. Masuk ke Safe Mode untuk melihat apakah sistem operasi masih dapat berjalan di dalam mode ini. Dari sini, Anda bisa mencoba melakukan perbaikan atau pembaruan yang diperlukan.</li>';
                                echo '<li class="list-group-item">3. Pastikan sistem operasi Anda telah diperbarui ke versi terbaru yang telah dirilis oleh penyedia sistem operasi.</li>';
                                echo '<li class="list-group-item">4. Jika masalahnya serius dan tidak dapat diperbaiki, pertimbangkan untuk melakukan reinstall sistem operasi. Pastikan Anda memiliki cadangan data penting sebelum melakukan langkah ini.</li>';
                                echo '<li class="list-group-item">5. Gunakan fitur pemulihan sistem yang disediakan oleh sistem operasi untuk mengembalikan komputer ke titik pemulihan sebelum terjadinya masalah.</li>';
                                echo '<li class="list-group-item">6. Jika Anda tidak yakin atau tidak berhasil menangani masalah tersebut, konsultasikan dengan teknisi atau ahli IT yang dapat membantu menyelesaikan masalah.</li>';
                                echo '</ul>';
                            }
                        }else if($faultMax == 5){
                            if($row2->status_garansi == 'Ya'){
                                echo '<p class="font-weight-bold text-center">Perangkat anda masih dalam masa garansi, silahkan hubungi pihak service center untuk melakukan perbaikan</p>';
                                echo '<ul class="list-group">';
                                echo '<li class="list-group-item">1. Gunakan utilitas atau software pihak ketiga yang dapat membantu Anda memeriksa kondisi fisik dan kesehatan hard disk. Contohnya, CrystalDiskInfo, HD Tune, atau program sejenisnya.</li>';
                                echo '<li class="list-group-item">2. Untuk sistem operasi Windows, jalankan perintah CHKDSK melalui Command Prompt untuk memeriksa dan memperbaiki kesalahan file sistem yang mungkin terjadi pada hard disk.</li>';
                                echo '<li class="list-group-item">3. Periksa bad sector pada hard disk menggunakan software yang sesuai. Jika terdeteksi bad sector, coba perbaiki dengan alat bawaan sistem operasi atau utilitas khusus.</li>';
                                echo '<li class="list-group-item">4. Seringkali, masalah kabel yang rusak atau port yang tidak berfungsi dapat menjadi penyebab malfungsi pada hard disk. Ganti kabel SATA atau coba port yang berbeda.</li>';
                                echo '<li class="list-group-item">5. Overheating dapat merusak hard disk. Pastikan kipas pendingin pada komputer berfungsi dengan baik untuk mencegah kerusakan lebih lanjut.</li>';
                                echo '<li class="list-group-item">6. Jika langkah-langkah di atas tidak berhasil atau jika Anda tidak yakin cara mengatasinya, konsultasikan dengan teknisi atau ahli hardware yang berpengalaman untuk memperbaiki atau mengganti hard disk yang rusak.</li>';
                                echo '</ul>';
                            }else{
                                echo '<ul class="list-group">';
                                echo '<li class="list-group-item">1. Gunakan utilitas atau software pihak ketiga yang dapat membantu Anda memeriksa kondisi fisik dan kesehatan hard disk. Contohnya, CrystalDiskInfo, HD Tune, atau program sejenisnya.</li>';
                                echo '<li class="list-group-item">2. Untuk sistem operasi Windows, jalankan perintah CHKDSK melalui Command Prompt untuk memeriksa dan memperbaiki kesalahan file sistem yang mungkin terjadi pada hard disk.</li>';
                                echo '<li class="list-group-item">3. Periksa bad sector pada hard disk menggunakan software yang sesuai. Jika terdeteksi bad sector, coba perbaiki dengan alat bawaan sistem operasi atau utilitas khusus.</li>';
                                echo '<li class="list-group-item">4. Seringkali, masalah kabel yang rusak atau port yang tidak berfungsi dapat menjadi penyebab malfungsi pada hard disk. Ganti kabel SATA atau coba port yang berbeda.</li>';
                                echo '<li class="list-group-item">5. Overheating dapat merusak hard disk. Pastikan kipas pendingin pada komputer berfungsi dengan baik untuk mencegah kerusakan lebih lanjut.</li>';
                                echo '<li class="list-group-item">6. Jika langkah-langkah di atas tidak berhasil atau jika Anda tidak yakin cara mengatasinya, konsultasikan dengan teknisi atau ahli hardware yang berpengalaman untuk memperbaiki atau mengganti hard disk yang rusak.</li>';
                                echo '</ul>';
                            }
                        }
                        ?>
                    </div>
                    <div class="card-footer">
                        <p class="font-weight-bold text-center">Hubungi Email : <span class="text-info"> pusatperbaikan@gmail.com </span> atau Klik <a href="tel:08123456789" class="text-info">Disini</a> untuk menghubungi kami</p>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url() ?>user/diagnosa/riwayat" class="btn btn-danger"><i class="fas fa-turn"></i>Kembali</a>
        </div>
    </div>
</div>