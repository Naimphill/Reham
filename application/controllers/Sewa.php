<?php
class Sewa extends CI_Controller
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
            $this->session->set_flashdata('flash', 'Harus Login Dahulu');
            redirect('Dashboard');
        }
    }

    public function index()
    {
        $data['content'] = "lapangan2";
        $data['lapangan'] = $this->Mcrud->get_all_data('t_lapangan')->result();
        //load view
        $this->load->view('template', $data);
    }
    public function jadwal($id_lapangan)
    {
        $datalapangan = array('id_lapangan' => $id_lapangan);
        $data['content'] = "jadwal";
        $data['lapangan'] = $this->Mcrud->get_by_id('t_lapangan', $datalapangan)->row_object();
        $this->db->where('id_lapangan', $id_lapangan);
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        //load view
        $this->load->view('template', $data);
    }
    public function jadwalcari($id_lapangan)
    {
        if (isset($_POST['tanggal_input'])) {
            $data['tgl'] = $_POST['tanggal_input'];
        }
        $datalapangan = array('id_lapangan' => $id_lapangan);
        $data['lapangan'] = $this->Mcrud->get_by_id('t_lapangan', $datalapangan)->row_object();
        $data['content'] = "jadwal";
        $this->db->where('id_lapangan', $id_lapangan);
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        //load view
        $this->load->view('template', $data);
    }
    public function detail_sewa($id_sewa)
    {
        $data['content'] = "detail_sewa";
        $this->db->where('id_sewa', $id_sewa);
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa')->result();
        $data['bukti'] = $this->Mcrud->get_all_data('t_bukti')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['lapangan'] = $this->Mcrud->get_all_data('t_lapangan')->result();
        //load view
        $this->load->view('template', $data);
    }

    public function cetak($id_sewa)
    {

        $this->db->where('id_sewa', $id_sewa);
        $data['sewa'] = $this->Mcrud->get_all_data('t_sewa')->result();
        $data['bukti'] = $this->Mcrud->get_all_data('t_bukti')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['lapangan'] = $this->Mcrud->get_all_data('t_lapangan')->result();
        //load view
        $this->load->view('cetak', $data);
    }
    public function riwayat()
    {
        $data['content'] = "riwayat";
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $this->db->where('id_pelanggan', $id_pelanggan);
        $data['sewa'] = $this->db->where('id_pelanggan', $id_pelanggan)
            ->order_by('tanggal', 'desc')
            ->get('t_sewa')->result();
        $data['bukti'] = $this->Mcrud->get_all_data('t_bukti')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['lapangan'] = $this->Mcrud->get_all_data('t_lapangan')->result();
        //load view
        $this->load->view('template', $data);
    }
    public function v_sewa()
    {
        // Ambil nilai 'id_lapangan' dan 'id_jam' dari form
        $id_lapangan = $_POST['lapangan'];
        $id_jam = $_POST['jam'];
        $tanggal = $_POST['tgl'];
        $id_pelanggan = $this->session->userdata('id_pelanggan');

        // Buat query untuk mengambil nilai 'id_sewa' terakhir dari tabel 'sewa'
        $this->db->select_max('id_sewa');
        $this->db->where('id_lapangan', $id_lapangan);
        $this->db->where('id_jam', $id_jam);
        $query = $this->db->get('t_sewa');

        // Ambil nomor urut terakhir dari 'id_sewa'
        $row = $query->row();
        $last_id_sewa = $row->id_sewa;
        $last_urut = intval(substr($last_id_sewa, -5));

        // Buat nomor urut baru dengan menambahkan 1 pada nomor urut terakhir
        $new_urut = $last_urut + 1;
        $new_urut_str = str_pad($new_urut, 5, '0', STR_PAD_LEFT);

        // Gabungkan nilai 'R', 'id_lapangan', 'id_jam', dan nomor urut baru untuk menghasilkan 'id_sewa' yang baru
        $new_id_sewa = 'R' . $id_lapangan . $id_jam . $new_urut_str;
        // $new_id_sewa = 'R' . $id_lapangan . date('dmY', strtotime($tanggal)) . $id_jam . $new_urut_str;

        // Simpan data pada tabel 'sewa' dengan nilai 'id_sewa' yang baru
        $dataInput = array(
            'id_sewa' => $new_id_sewa,
            'id_pelanggan' => $id_pelanggan,
            'id_lapangan' => $id_lapangan,
            'id_jam' => $id_jam,
            'tanggal' => $tanggal
        );
        // $this->db->insert('t_sewa', $dataInput);

        $id_sewa = $new_id_sewa;
        $this->db->where('id_sewa', $id_sewa);
        $query = $this->db->get('t_sewa');
        $data['ids'] = $new_id_sewa;
        $data['idp'] = $id_pelanggan;
        $data['idl'] = $id_lapangan;
        $data['idj'] = $id_jam;
        $data['tgl'] = $tanggal;
        $data['content'] = "sewa";
        $data['lapangan'] = $this->Mcrud->get_all_data('t_lapangan')->result();
        $data['jam'] = $this->Mcrud->get_all_data('t_jam')->result();
        $data['sewa'] = $query->row();
        //load view
        $this->load->view('template', $data);

    }
    public function save_sewa()
    {
        // Ambil nilai dari form
        $id_sewa = $_POST['id_sewa'];
        $id_lapangan = $_POST['id_lapangan'];
        $id_jam = $_POST['id_jam'];
        $tanggal = $_POST['tanggal'];
        $tot_bayar = $_POST['bayar'];
        $id_pelanggan = $this->session->userdata('id_pelanggan');

        //setting file foto
        $data_file = $_FILES['bukti'];
        $config['file_name'] = time() . $data_file['file_name'];
        $config['upload_path'] = './upload_bukti/';
        $config['allowed_types'] = 'jpg|png|jpeg|PNG';

        $this->load->library('upload', $config);

        //foto
        $this->upload->do_upload('bukti');
        $data = $this->upload->data();
        $bukti = $data['file_name'];

        $dataInsertsewa = array(
            'id_sewa' => $id_sewa,
            'id_pelanggan' => $id_pelanggan,
            'id_lapangan' => $id_lapangan,
            'tanggal' => $tanggal,
            'id_jam' => $id_jam,
            'status' => 'Belum Main'
        );
        // Ambil nomor urut terakhir dari 'id_sewa'
        $this->db->select_max('id_bukti');
        $query = $this->db->get('t_bukti');
        $row = $query->row();
        $last_id_bukti = $row->id_bukti;
        $last_urut = intval(substr($last_id_bukti, -5));

        // Buat nomor urut baru dengan menambahkan 1 pada nomor urut terakhir
        $new_urut = $last_urut + 1;
        $new_urut_str = str_pad($new_urut, 5, '0', STR_PAD_LEFT);

        // Gabungkan nilai 'R', 'id_lapangan', 'id_jam', dan nomor urut baru untuk menghasilkan 'id_sewa' yang baru
        $new_id_bukti = 'KM' . $new_urut_str;
        $dataInsertbukti = array(
            'id_bukti' => $new_id_bukti,
            'id_sewa' => $id_sewa,
            'tgl_bayar' => date('Y-m-d H:i:s'),
            'bayar' => '50000',
            'tot_biaya' => $tot_bayar,
            'bukti' => $bukti,
            'status' => 'DP'
        );
        $this->Mcrud->insert('t_sewa', $dataInsertsewa);
        $this->Mcrud->insert('t_bukti', $dataInsertbukti);
        $this->session->set_flashdata('pembayaran', 'Disimpan');
        redirect('Sewa/detail_sewa/' . $id_sewa);

    }




}