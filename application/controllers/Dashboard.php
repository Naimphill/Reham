<?php
class Dashboard extends CI_Controller
{



    public function index()
    {
        $data['content'] = "dashboard";
        //load view
        $this->load->view('template', $data);
    }
}