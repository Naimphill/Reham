<?php
class Owner extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        $this->cek_login();
    }


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
        } elseif ($hak_akses == 'admin') {
            redirect('admin/owner');
        } elseif ($hak_akses == 'owner') {
            // lanjutkan ke halaman admin panel
        }
    }

    public function index()
    {
        $data['content'] = "owner/owner";
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa', NULL, NULL, 'tanggal DESC')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['bukti'] = $this->Mcrud->get_all_data('t_bukti')->result();
        $data['user'] = $this->Mcrud->get_all_data('t_pelanggan')->result();
        //load view
        $this->load->view('template_owner', $data);
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
        //load view
        $data['content'] = "owner/owner";
        // var_dump($data);
        $this->load->view('template_owner', $data);
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
        //load view
        $this->load->view('owner/cetak_laporan', $data);
    }
}