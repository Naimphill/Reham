<?php
/**
 * 
 */
class Mulogin extends CI_Model
{

    public function cek_login($u, $p)
    {
        $q = $this->db->get_where('t_pelanggan', array('username' => $u, 'password' => $p));
        return $q;
    }

    public function get_user($where)
    {
        $sql = "SELECT * from t_pelanggan where id_pelanggan = ?";
        $query = $this->db->query($sql, $where);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
}
?>