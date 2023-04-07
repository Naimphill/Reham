<?php

class Jadwal extends CI_Controller
{
    public function index()
    {
        $this->load->model('jadwal_model');
        $data['jadwal'] = $this->jadwal_model->get_jadwal();
        $data['content'] = "admin/jadwal_view";
        $this->load->view('template_admin', $data);
    }

    public function tambah_jadwal()
    {
        $this->load->model('jadwal_model');
        $tgl_sekarang = date('Y-m-d');
        $data['jam'] = array();
        for ($i = 9; $i < 24; $i++) {
            if ($i < 12) {
                $harga = 85000;
            } elseif ($i < 15) {
                $harga = 100000;
            } elseif ($i < 17) {
                $harga = 120000;
            } else {
                $harga = 150000;
            }
            $data['jam'][] = array(
                'jam' => $i . ':00',
                'harga' => $harga
            );
        }
        $data['tanggal'] = array();
        for ($i = 0; $i < 7; $i++) {
            $tgl = date('Y-m-d', strtotime('+' . $i . ' days', strtotime($tgl_sekarang)));
            $data['tanggal'][] = $tgl;
        }
        $data['content'] = "admin/tambah_jadwal";
        $this->load->view('template_admin', $data);
    }

    public function simpan_jadwal()
    {
        $this->load->model('jadwal_model');
        $data = array(
            'tanggal' => $this->input->post('tanggal'),
            'jam' => $this->input->post('jam'),
            'harga' => $this->input->post('harga')
        );
        $this->jadwal_model->tambah_jadwal($data);
        redirect('jadwal');
    }

}