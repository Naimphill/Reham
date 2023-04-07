<?php

class Jadwal_model extends CI_Model
{
    public function get_jadwal()
    {
        $query = $this->db->get('jadwal');
        return $query->result();
    }

    public function tambah_jadwal($tgl_mulai, $tgl_selesai)
    {
        $tgl = $tgl_mulai;
        $waktu = '09:00:00';
        $harga = 0;

        while ($tgl <= $tgl_selesai) {
            for ($i = 9; $i <= 24; $i++) {
                $jam_mulai = sprintf("%02d", $i) . ':00:00';
                $jam_selesai = sprintf("%02d", $i + 1) . ':00:00';
                if ($i < 12) {
                    $harga = 85000;
                } elseif ($i < 15) {
                    $harga = 100000;
                } elseif ($i < 17) {
                    $harga = 120000;
                } else {
                    $harga = 150000;
                }
                $data = array(
                    'tanggal' => $tgl,
                    'jam_mulai' => $jam_mulai,
                    'jam_selesai' => $jam_selesai,
                    'harga' => $harga
                );
                $this->db->insert('jadwal', $data);
            }
            $tgl = date('Y-m-d', strtotime($tgl . ' +1 day'));
        }
    }
}