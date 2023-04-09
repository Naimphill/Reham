<?php

class Session_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function sess_read($session_id)
    {
        $query = $this->db->get_where('ci_sessions', array('id' => $session_id));

        if ($query->num_rows() == 1) {
            $row = $query->row();
            return $row->data;
        }

        return '';
    }

    public function sess_write($session_id, $session_data)
    {
        $data = array(
            'id' => $session_id,
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'timestamp' => time(),
            'data' => $session_data
        );

        $this->db->replace('ci_sessions', $data);
    }

    public function sess_destroy($session_id)
    {
        $this->db->delete('ci_sessions', array('id' => $session_id));
    }

    public function sess_gc($maxlifetime)
    {
        $this->db->where('timestamp <', time() - $maxlifetime);
        $this->db->delete('ci_sessions');
    }

}