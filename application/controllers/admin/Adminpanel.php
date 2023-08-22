<?php
class Adminpanel extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        $this->cek_login();
    }

    // public function cek_login()
    // {
    //     $username = $this->session->userdata('username');
    //     $hak_akses = $this->session->userdata('hak_akses');
    //     if (empty($username) || $username == 'manager') {
    //         redirect('admin/Login');
    //     }
    //     if (empty($hak_akses)) {
    //         redirect('Dashboard');
    //     }
    // }
    public function cek_login()
    {
        $username = $this->session->userdata('username');
        $hak_akses = $this->session->userdata('hak_akses');

        if (empty($username) || empty($hak_akses)) {
            redirect('admin/login');
        }

        if ($hak_akses == 'pelanggan') {
            redirect('Dashboard');
        } elseif ($hak_akses == 'manager') {
            redirect('admin/Manager');
        } elseif ($hak_akses == 'owner') {
            redirect('admin/Owner');
        } elseif ($hak_akses == 'admin') {
            // lanjutkan ke halaman admin panel
        }
    }


    public function index()
    {
        $data['content'] = "admin/admin";
        $data['bukti'] = $this->Mcrud->get_all_data('t_bukti')->result();
        //load view
        $this->load->view('template_admin', $data);
    }
    public function pengguna()
    {
        $data['content'] = "admin/pengguna";
        $data['pengguna'] = $this->Mcrud->get_all_data('t_pengguna')->result();
        //load view
        $this->load->view('template_admin', $data);
    }
    public function lapangan()
    {
        $this->cek_login();
        $data['content'] = "admin/lapangan";
        $data['lapangan'] = $this->Mcrud->get_all_data('t_lapangan')->result();
        //load view
        $this->load->view('template_admin', $data);
    }
    public function pelanggan()
    {
        $data['content'] = "admin/pelanggan";
        $data['pelanggan'] = $this->Mcrud->get_all_data('t_pelanggan')->result();
        //load view
        $this->load->view('template_admin', $data);
    }
    // public function sewa()
    // {
    //     $data['content'] = "admin/sewa";
    //     $data['sewa'] = $this->Mcrud->get_all_data('t_sewa', NULL, NULL, 'tanggal DESC')->result();
    //     $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
    //     $data['bukti'] = $this->Mcrud->get_all_data('t_bukti')->result();
    //     $data['user'] = $this->Mcrud->get_all_data('t_pelanggan')->result();
    //     //load view
    //     $this->load->view('template_admin', $data);
    // }
    public function sewa()
    {
        $data['content'] = "admin/sewa";
        $data['sewa'] = $this->Mcrud->get_all_data_d('t_sewa', 'tanggal', 'DESC'); // Mengurutkan berdasarkan tanggal secara descending
        $data['jam'] = $this->Mcrud->get_all_data_d('t_jam');
        $data['bukti'] = $this->Mcrud->get_all_data_d('t_bukti');
        $data['user'] = $this->Mcrud->get_all_data_d('t_pelanggan');
        $data['data_sewa'] = $this->Mcrud->get_all_data('t_data_sewa')->result();
        // Load view
        $this->load->view('template_admin', $data);
    }
    public function laporan_sewa()
    {
        $data['content'] = "admin/laporan_sewa";
        $data['bukti'] = $this->Mcrud->get_all_data('t_bukti', 'NULL, NULL', 'tanggal DESC')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa')->result();
        $data['user'] = $this->Mcrud->get_all_data('t_pelanggan')->result();
        $data['data_sewa'] = $this->Mcrud->get_all_data('t_data_sewa')->result();
        //load view
        $this->load->view('template_admin', $data);
    }
    // public function laporan_sewa()
    // {
    //     $data['content'] = "admin/laporan_sewa";
    //     $data['bukti'] = $this->Mcrud->get_all_data_d('t_bukti', 'tgl_bayar', 'DESC'); // Mengurutkan berdasarkan tanggal secara descending
    //     $data['jam'] = $this->Mcrud->get_all_data_d('t_jam');
    //     $data['sewa'] = $this->Mcrud->get_all_data_d('t_sewa');
    //     $data['user'] = $this->Mcrud->get_all_data_d('t_pelanggan');
    //     // Load view
    //     $this->load->view('template_admin', $data);
    // }

    public function jadwal()
    {
        // load view
        $data['content'] = "admin/jadwal";
        // load data
        $data['lapangan'] = $this->Mcrud->get_all_data('t_lapangan')->result();
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['jadwal'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['data_sewa'] = $this->Mcrud->get_all_data('t_data_sewa')->result();
        $this->load->view('template_admin', $data);
    }
    public function laporancari()
    {
        if (isset($_POST['tanggal_mulai']) && isset($_POST['tanggal_akhir'])) {
            $tgl_m = $_POST['tanggal_mulai'];
            $tgl_a = $_POST['tanggal_akhir'];
            $tgl_mulai = date('Y-m-d H:i:s', strtotime($tgl_m));
            $tgl_akhir = date('Y-m-d 23:59:59', strtotime($tgl_a));
            $data['tgl_mulai'] = $tgl_m;
            $data['tgl_akhir'] = $tgl_a;
        }
        // memperbarui variabel $data['bukti'] dengan data yang sesuai dengan range tanggal yang diminta
        $query = $this->db->select('*')->from('t_bukti')
            ->where('tgl_bayar >=', $tgl_mulai)
            ->where('tgl_bayar <=', $tgl_akhir)
            ->order_by('tgl_bayar', 'asc')
            ->get();
        $data['bukti'] = $query->result();
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['user'] = $this->Mcrud->get_all_data('t_pelanggan')->result();
        $data['data_sewa'] = $this->Mcrud->get_all_data('t_data_sewa')->result();
        //load view
        $data['content'] = "admin/laporan_sewa";
        $this->load->view('template_admin', $data);
    }
    public function jadwalcari()
    {
        if (isset($_POST['tanggal_input'])) {
            $data['tgl'] = $_POST['tanggal_input'];
        }
        $data['lapangan'] = $this->Mcrud->get_all_data('t_lapangan')->result();
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['jadwal'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['data_sewa'] = $this->Mcrud->get_all_data('t_data_sewa')->result();
        //load view
        $data['content'] = "admin/jadwal";
        $this->load->view('template_admin', $data);
    }
    public function save_lapangan()
    {
        $nm_lapangan = $_POST['nm_lapangan'];
        $id_lapangan = $_POST['id_lapangan'];

        //setting file foto
        $data_file = $_FILES['foto'];
        $config['file_name'] = time() . $data_file['name'];
        $config['upload_path'] = './upload_gambar/';
        $config['allowed_types'] = 'jpg|png|jpeg|PNG';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        //foto
        $this->upload->do_upload('foto');
        $data = $this->upload->data();
        $foto = $data['file_name'];

        $dataInsert = array(
            'nm_lapangan' => $nm_lapangan,
            'id_lapangan' => $id_lapangan,
            'foto' => $foto
        );
        $this->Mcrud->insert('t_lapangan', $dataInsert);
        $this->session->set_flashdata('flash', 'Disimpan');
        redirect('admin/Adminpanel/lapangan');
    }

    public function edit_lapangan()
    {
        $id = $_POST['id_lapangan'];
        $nm_lapangan = $_POST['nm_lapangan'];
        $fotolama = $_POST['fotolama'];

        //setting file foto
        $data_file = $_FILES['foto'];
        $config['file_name'] = time() . $data_file['name'];
        $config['upload_path'] = './upload_gambar/';
        $config['allowed_types'] = 'jpg|png|jpeg|PNG';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        //foto
        if ($this->upload->do_upload('foto')) {
            $data = $this->upload->data();
            $foto = $data['file_name'];
        } else {
            $foto = $fotolama;
        }
        $dataUpdate = array(
            'nm_lapangan' => $nm_lapangan,
            'foto' => $foto
        );
        $this->Mcrud->update('t_lapangan', $dataUpdate, 'id_lapangan', $id);
        $this->session->set_flashdata('flash', 'Disimpan');
        redirect('admin/Adminpanel/lapangan');
    }

    public function hapus_lapangan($id)
    {
        $datawhere = array('id_lapangan' => $id);
        $this->Mcrud->hapus_data($datawhere, 't_lapangan');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/Adminpanel/lapangan');
    }
    public function hapus_pelanggan($id)
    {
        $datawhere = array('id_pelanggan' => $id);
        $this->Mcrud->hapus_data($datawhere, 't_pelanggan');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/Adminpanel/pelanggan');
    }
    public function hapus_sewa()
    {
        $ids = $_POST['id_sewa'];
        $idb = $_POST['id_bukti'];
        $this->db->where('id_sewa', $ids);
        $query = $this->db->get('t_data_sewa');
        $data_sewa = $query->result();
        foreach ($data_sewa as $key) {
            $idd = $key->id_data;
            $data_sewa = array('id_data' => $idd);
            $this->Mcrud->hapus_data($data_sewa, 't_data_sewa');
        }
        $datasewa = array('id_sewa' => $ids);
        $databukti = array('id_bukti' => $idb);
        $this->Mcrud->hapus_data($datasewa, 't_sewa');
        $this->Mcrud->hapus_data($databukti, 't_bukti');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/Adminpanel/sewa');
    }
    public function edit_jadwal()
    {
        $id = $_POST['id_jam'];
        $harga = $_POST['harga'];

        $dataUpdate = array(
            'harga' => $harga
        );
        $this->Mcrud->update('t_jam', $dataUpdate, 'id_jam', $id);
        $this->session->set_flashdata('flash', 'Disimpan');
        redirect('admin/Adminpanel/jadwal');
    }
    public function edit_status_sewa()
    {
        $id = $_POST['id_sewa'];
        $status = $_POST['status'];

        $idb = $_POST['id_bukti'];
        $status_byr = $_POST['status_byr'];
        $dibayar = $_POST['bayar'];
        if ($status_byr == 'LUNAS') {
            $bayar = $dibayar;
        } elseif ($status_byr == 'DP') {
            $bayar = '50000';
        }
        $dataUpdate = array(
            'status' => $status
        );
        $dataBukti = array(
            'status' => $status_byr,
            'bayar' => $bayar
        );
        $this->Mcrud->update('t_sewa', $dataUpdate, 'id_sewa', $id);
        $this->Mcrud->update('t_bukti', $dataBukti, 'id_bukti', $idb);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('admin/Adminpanel/sewa');
    }

    public function cetak_laporan()
    {
        $tgl_m = $_POST['tanggal_mulai'];
        $tgl_a = $_POST['tanggal_akhir'];
        $status = $_POST['status'];
        $tgl_mulai = date('Y-m-d H:i:s', strtotime($tgl_m));
        $tgl_akhir = date('Y-m-d 23:59:59', strtotime($tgl_a));
        $data['status'] = $status;
        $data['tgl_mulai'] = $tgl_m;
        $data['tgl_akhir'] = $tgl_a;
        // memperbarui variabel $data['bukti'] dengan data yang sesuai dengan range tanggal yang diminta
        $query = $this->db->select('*')->from('t_bukti')
            ->where('tgl_bayar >=', $tgl_mulai)
            ->where('tgl_bayar <=', $tgl_akhir)
            ->order_by('tgl_bayar', 'asc')
            ->get();
        $data['bukti'] = $query->result();
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['user'] = $this->Mcrud->get_all_data('t_pelanggan')->result();
        $data['data_sewa'] = $this->Mcrud->get_all_data('t_data_sewa')->result();
        //load view
        $this->load->view('admin/cetak_laporan', $data);
    }

    public function cetak_pelanggan()
    {
        $data['user'] = $this->Mcrud->get_all_data('t_pelanggan')->result();
        //load view
        $this->load->view('admin/cetak_pelanggan', $data);
    }
    public function cetak_sewa()
    {
        $status = $_POST['status'];
        $data['status'] = $status;
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa', NULL, NULL, 'tanggal DESC')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['bukti'] = $this->Mcrud->get_all_data('t_bukti')->result();
        $data['user'] = $this->Mcrud->get_all_data('t_pelanggan')->result();
        $data['data_sewa'] = $this->Mcrud->get_all_data('t_data_sewa')->result();
        //load view
        $this->load->view('admin/cetak_sewa', $data);
    }
}