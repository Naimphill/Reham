<?php
/**
 * 
 */
class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin');
    }
    public function index()
    {
        $this->load->view('admin/login');
    }


    public function aksi_login()
    {
        $this->load->model('Mlogin');
        $u = $_POST['username'];
        $p = md5($_POST['password']);
        $cek = $this->Mlogin->cek_login($u, $p)->num_rows();
        $result = $this->Mlogin->cek_login($u, $p)->result();
        if ($cek == 1) {

            foreach ($result as $sess) {
                // $sess_data['logged_in'] = 'Sudah Loggin';
                $sess_data['id_pengguna'] = $sess->id_pengguna;
                $sess_data['username'] = $sess->username;
                $sess_data['password'] = $sess->password;
                $sess_data['hak_akses'] = $sess->hak_akses;
                $this->session->set_userdata($sess_data);
            }

            if ($this->session->userdata('hak_akses') == 'admin') {
                redirect('admin/Adminpanel');
            } elseif ($this->session->userdata('hak_akses') == 'manager') {
                redirect('admin/Manager');
            } elseif ($this->session->userdata('hak_akses') == 'owner') {
                redirect('admin/Owner');
            }
        } else {
            $this->session->set_flashdata('salah', 'Username dan atau Password salah');
            redirect('admin/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
?>