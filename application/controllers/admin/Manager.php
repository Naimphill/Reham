<?php
class Manager extends CI_Controller
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
    //     if (empty($username) || $username == 'admin') {
    //         redirect('admin/Login');
    //     }
    //     if (empty($hak_akses)) {
    //         $this->session->sess_destroy();
    //         redirect('Login');
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
        } elseif ($hak_akses == 'admin') {
            redirect('admin/Adminpanel');
        } elseif ($hak_akses == 'manager') {
            // lanjutkan ke halaman admin panel
        }
    }


    public function index()
    {
        $data['content'] = "manager/manager";
        $data['bukti'] = $this->Mcrud->get_all_data('t_bukti')->result();
        //load view
        $this->load->view('template_manager', $data);
    }
    public function sewa()
    {
        $data['content'] = "manager/sewa";
        $data['sewa'] = $this->Mcrud->get_data_sewa_sorted_by_tanggal_desc();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['bukti'] = $this->Mcrud->get_all_data('t_bukti')->result();
        $data['user'] = $this->Mcrud->get_all_data('t_pelanggan')->result();
        //load view
        $this->load->view('template_manager', $data);
    }
    public function laporan_sewa()
    {
        $data['content'] = "manager/laporan_sewa";
        $data['bukti'] = $this->Mcrud->get_data_bukti_sorted_by_tanggal_desc();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa')->result();
        $data['user'] = $this->Mcrud->get_all_data('t_pelanggan')->result();
        //load view
        $this->load->view('template_manager', $data);
    }
    public function pengguna()
    {
        // load view
        $data['content'] = "manager/pengguna";
        // load data
        $data['pengguna'] = $this->Mcrud->get_all_data('t_pengguna')->result();
        $this->load->view('template_manager', $data);
    }
    public function edit_pengguna()
    {
        $id = $_POST['id_pengguna'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $dataUpdate = array(
            'username' => $username,
            'password' => $password
        );
        $this->Mcrud->update('t_pengguna', $dataUpdate, 'id_pengguna', $id);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('admin/manager/pengguna');
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
            ->order_by('tgl_bayar', 'DESC')
            ->get();
        $data['bukti'] = $query->result();
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['user'] = $this->Mcrud->get_all_data('t_pelanggan')->result();
        //load view
        $data['content'] = "manager/laporan_sewa";
        $this->load->view('template_manager', $data);
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
        //load view
        $data['content'] = "manager/jadwal";
        $this->load->view('template_manager', $data);
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
        redirect('admin/manager/sewa');
    }
    public function hapus_sewa()
    {
        $ids = $_POST['id_sewa'];
        $idb = $_POST['id_bukti'];
        $datasewa = array('id_sewa' => $ids);
        $databukti = array('id_bukti' => $idb);
        $this->Mcrud->hapus_data($datasewa, 't_sewa');
        $this->Mcrud->hapus_data($databukti, 't_bukti');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/manager/sewa');
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
        $this->load->view('manager/cetak_laporan', $data);
    }

    public function export_excel()
    {
        // Load library PHPExcel
        require_once APPPATH . 'third_party/PHPExcel.php';

        $tgl_m = $_POST['tanggal_mulai'];
        $tgl_a = $_POST['tanggal_akhir'];
        $tgl_mulai = date('Y-m-d H:i:s', strtotime($tgl_m));
        $tgl_akhir = date('Y-m-d 23:59:59', strtotime($tgl_a));
        $data['tgl_mulai'] = $tgl_m;
        $data['tgl_akhir'] = $tgl_a;

        // memperbarui variabel $data['bukti'] dengan data yang sesuai dengan range tanggal yang diminta
        $query = $this->db->select('*')->from('t_bukti')
            ->where('tgl_bayar >=', $tgl_mulai)
            ->where('tgl_bayar <=', $tgl_akhir)
            ->order_by('tgl_bayar', 'asc')
            ->get();
        $data = $query->result();

        // Buat objek PHPExcel
        $objPHPExcel = new PHPExcel();

        // Buat header pada file Excel
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID Invoice')
            ->setCellValue('C1', 'ID Boking')
            ->setCellValue('D1', 'Nama Pelanggan')
            ->setCellValue('E1', 'Tanggal Bayar')
            ->setCellValue('F1', 'Total');

        // Set kolom pada file Excel
        $kolom = 2; // baris ke 2
        $nomor = 1;
        foreach ($data as $row) {
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor++)
                ->setCellValue('B' . $kolom, $row->id_bukti)
                ->setCellValue('C' . $kolom, $row->id_sewa)
                ->setCellValue('D' . $kolom, $row->id_pelanggan)
                ->setCellValue('E' . $kolom, date('d-m-Y', strtotime($row->tgl_bayar)))
                ->setCellValue('F' . $kolom, $row->tot_biaya);

            $kolom++;
        }

        // Set format file Excel
        $filename = 'data_bukti.xls';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Buat file Excel dan download
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }


}