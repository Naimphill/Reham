<?php
/**
 * 
 */
class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mulogin');
    }
    public function index()
    {
        $this->load->view('login');
    }

    public function register()
    {
        $this->load->view('register');
    }

    public function aksi_login()
    {
        $this->load->model('Mulogin');
        $u = $_POST['username'];
        $p = md5($_POST['password']);
        $cek = $this->Mulogin->cek_login($u, $p)->num_rows();
        $result = $this->Mulogin->cek_login($u, $p)->result();
        if ($cek == 1) {

            foreach ($result as $sess) {
                // $sess_data['logged_in'] = 'Sudah Loggin';
                $sess_data['id_pelanggan'] = $sess->id_pelanggan;
                $sess_data['username'] = $sess->username;
                $sess_data['password'] = $sess->password;
                $sess_data['nama_lengkap'] = $sess->nama_lengkap;
                $sess_data['no_tlp'] = $sess->no_tlp;
                $this->session->set_userdata($sess_data);
            }

            redirect('Dashboard');

        } else {
            $this->session->set_flashdata('salah', 'Username dan Password salah');
            redirect('login');
        }
    }

    public function save_register()
    {
        $this->load->model('Mcrud');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $username = $this->input->post('username');
        $no_tlp = $this->input->post('no_tlp');
        $password = md5($_POST['password']);
        $dataInsert = array(
            'nama_lengkap' => $nama_lengkap,
            'username' => $username,
            'password' => $password,
            'no_tlp' => $no_tlp
        );
        $this->Mcrud->insert('t_pelanggan', $dataInsert);
        $this->session->set_flashdata('flash', 'Register Berhasil Disimpan');
        redirect('login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>