<?php
class Manager extends CI_Controller
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
        $data['content'] = "manager/manager";
        $data['bukti'] = $this->Mcrud->get_all_data('t_bukti')->result();
        //load view
        $this->load->view('template_manager', $data);
    }
    public function sewa()
    {
        $data['content'] = "manager/sewa";
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa', NULL, NULL, 'tanggal DESC')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['bukti'] = $this->Mcrud->get_all_data('t_bukti')->result();
        $data['user'] = $this->Mcrud->get_all_data('t_pelanggan')->result();
        //load view
        $this->load->view('template_manager', $data);
    }
    public function laporan_sewa()
    {
        $data['content'] = "manager/laporan_sewa";
        $data['bukti'] = $this->Mcrud->get_all_data('t_bukti', NULL, NULL, 'tanggal DESC')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa')->result();
        $data['user'] = $this->Mcrud->get_all_data('t_pelanggan')->result();
        //load view
        $this->load->view('template_manager', $data);
    }
    public function jadwal()
    {
        // load view
        $data['content'] = "manager/jadwal";
        // load data
        $data['lapangan'] = $this->Mcrud->get_all_data('t_lapangan')->result();
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['jadwal'] = $this->Mcrud->get_all_data('t_jam')->result();
        $this->load->view('template_manager', $data);
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

        $dataUpdate = array(
            'status' => $status
        );
        $this->Mcrud->update('t_sewa', $dataUpdate, 'id_sewa', $id);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('manager/manager/sewa');
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