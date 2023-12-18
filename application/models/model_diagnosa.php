<?php

class Model_diagnosa extends CI_Model
{
   public function insertJawaban($data)
   {
      $this->db->insert('tb_jawaban', $data);
   }

   public function insertDiagnosa($data)
   {
      $this->db->insert('tb_diagnosa', $data);
   }

   public function tampil_data()
   {
      return $this->db->get('tb_diagnosa');
   }

   public function tampil_data_by_id($id)
   {
      $this->db->select('*');
      $this->db->from('tb_diagnosa');
      $this->db->join('tb_device', 'tb_device.user_id = tb_diagnosa.user_id');
      $this->db->where('tb_diagnosa.diagnosa_id', $id);
      $query = $this->db->get();
      return $query->result();
   }

   public function tampil_data_id()
   {
      $user_id = $this->session->userdata('user_id');
      $this->db->select('*');
      $this->db->from('tb_diagnosa');
      $this->db->join('tb_device', 'tb_device.device_id = tb_diagnosa.device_id');
      $this->db->where('tb_diagnosa.user_id', $user_id);
      $query = $this->db->get();
      return $query->result();
   }

   public function tampil_data_detail_diagnosa()
   {
      $user_id = $this->session->userdata('user_id');
      $this->db->select('*');
      $this->db->from('tb_jawaban');
      $this->db->join('tb_diagnosa', 'tb_diagnosa.diagnosa_id = tb_jawaban.diagnosa_id');
      $this->db->join('tb_gejala', 'tb_gejala.symp_id = tb_jawaban.symp_id');
      $this->db->where('tb_diagnosa.user_id', $user_id);
      $query = $this->db->get();
      return $query->result();
   }

   public function data_jawaban($user_id, $diagnosa_id) {
        $query = $this->db->query("
            SELECT *
            FROM tb_jawaban AS jawaban 
            INNER JOIN tb_diagnosa AS diagnosa ON jawaban.diagnosa_id = diagnosa.diagnosa_id
            WHERE diagnosa.user_id = '$user_id' AND diagnosa.diagnosa_id = '$diagnosa_id' AND jawaban.jawaban = 1
        ");

        return $query->result();
    }

   public function hitungProbabilitas($fault_id, $diagnosa_id){
         $query = $this->db->query("SELECT * FROM tb_rules WHERE fault_id = '$fault_id'");
         $total = $query->num_rows();
         $jumlah = 1;
         foreach ($query->result() as $p) {
            $jumlah = $jumlah * $p->bobot_persentase;
         }

         $query2 = $this->db->query("SELECT * FROM tb_jawaban INNER JOIN tb_rules ON tb_jawaban.symp_id = tb_rules.symp_id WHERE tb_jawaban.jawaban = 1 AND tb_rules.fault_id = '$fault_id'");
         // $query2 = $this->db->query("SELECT * FROM tb_jawaban INNER JOIN tb_rules ON tb_jawaban.symp_id = tb_rules.symp_id WHERE tb_rules.fault_id = '$fault_id'");
         $total2 = $query2->num_rows();
         foreach ($query2->result() as $p) {
            $hasilBayes = $jumlah * $p->bobot_persentase;
         }
         return $hasilBayes;
   }

   public function ambilNilaiKerusakanBySymp($symp_id)
   {
      $this->db->select('*');
      $this->db->from('tb_rules');
      $this->db->where('symp_id', $symp_id);
      $query = $this->db->get();
      return $query->result();
   }

   public function data_kerusakan()
   {
      $query = $this->db->query("SELECT * FROM tb_kerusakan");
      return $query->result();
   }

   public function jawaban_ya($diagnosa_id)
   {
      $query = $this->db->query("SELECT * FROM tb_jawaban INNER JOIN tb_rules ON tb_jawaban.symp_id = tb_rules.symp_id WHERE tb_jawaban.jawaban = 1 AND tb_jawaban.diagnosa_id = '$diagnosa_id'");
      return $query->result();
   }

   public function jawaban_ya_per_kerusakan($diagnosa_id, $fault_id)
   {
      $query = $this->db->query("SELECT * FROM tb_jawaban INNER JOIN tb_rules ON tb_jawaban.symp_id = tb_rules.symp_id WHERE tb_jawaban.jawaban = 1 AND tb_jawaban.diagnosa_id = '$diagnosa_id' AND tb_rules.fault_id = '$fault_id'");
      $totalKaliBobot = 1;
      foreach ($query->result() as $p) {
         $totalKaliBobot = $totalKaliBobot * $p->bobot_persentase;
      }

      $query2 = $this->db->query("SELECT * FROM tb_rules WHERE fault_id = '$fault_id'");
      foreach ($query2->result() as $p) {
         $totalSeluruh = $totalKaliBobot * $p->bobot_persentase;
      }

      return $totalSeluruh;
   }

   public function hapus_diagnosa($id)
   {
      $this->db->where('diagnosa_id', $id);
      $this->db->delete('tb_diagnosa');
      $query = "ALTER TABLE tb_diagnosa AUTO_INCREMENT = 1";
      $this->db->query($query);
      $this->db->where('diagnosa_id', $id);
      $this->db->delete('tb_jawaban');
      $query2 = "ALTER TABLE tb_jawaban AUTO_INCREMENT = 1";
      $this->db->query($query2);
   }
}