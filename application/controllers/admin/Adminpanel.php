<?php
class Adminpanel extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        $this->cek_login();
    }

    public function cek_login()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('admin/Login');
        }
    }

    public function index()
    {
        $data['content'] = "admin/admin";
        $data['bukti'] = $this->Mcrud->get_all_data('t_bukti')->result();
        //load view
        $this->load->view('template_admin', $data);
    }
    public function manager()
    {
        $data['content'] = "manager";
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
    public function sewa()
    {
        $data['content'] = "admin/sewa";
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa', NULL, NULL, 'tanggal DESC')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['bukti'] = $this->Mcrud->get_all_data('t_bukti')->result();
        $data['user'] = $this->Mcrud->get_all_data('t_pelanggan')->result();
        //load view
        $this->load->view('template_admin', $data);
    }
    public function laporan_sewa()
    {
        $data['content'] = "admin/laporan_sewa";
        $data['bukti'] = $this->Mcrud->get_all_data('t_bukti', NULL, NULL, 'tanggal DESC')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa')->result();
        $data['user'] = $this->Mcrud->get_all_data('t_pelanggan')->result();
        //load view
        $this->load->view('template_admin', $data);
    }
    public function jadwal()
    {
        // load view
        $data['content'] = "admin/jadwal";
        // load data
        $data['lapangan'] = $this->Mcrud->get_all_data('t_lapangan')->result();
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['jadwal'] = $this->Mcrud->get_all_data('t_jam')->result();
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
        //load view
        $data['content'] = "admin/jadwal";
        $this->load->view('template_admin', $data);
    }
    public function save_lapangan()
    {
        $nm_lapangan = $_POST['nm_lapangan'];
        $id_lapangan = $_POST['id_lapangan'];

        //setting file foto
        $config['file_name'] = time() . $data_file['file_name'];
        $config['upload_path'] = './upload_gambar/';
        $config['allowed_types'] = 'jpg|png|jpeg|PNG';

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
        $config['file_name'] = time() . $data_file['file_name'];
        $config['upload_path'] = './upload_gambar/';
        $config['allowed_types'] = 'jpg|png|jpeg|PNG';

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
        $data['bukti'] = $query->result();
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['user'] = $this->Mcrud->get_all_data('t_pelanggan')->result();
        //load view
        $this->load->view('admin/cetak_laporan', $data);
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