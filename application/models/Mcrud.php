<?php
/**
 * 
 */
class Mcrud extends CI_Model
{

    public function cek_login($u, $p)
    {
        $q = $this->db->get_where('t_pelanggan', array('username' => $u, 'password' => $p, ));
        return $q;
    }

    public function get_all_data($tabel)
    {
        $q = $this->db->get($tabel);
        return $q;
    }
    public function get_all_data_d($tabel, $order_by_column = NULL, $order_by_type = 'ASC')
    {
        if ($order_by_column) {
            $this->db->order_by($order_by_column, $order_by_type);
        }
        return $this->db->get($tabel)->result();
    }
    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function get_by_id($tabel, $id)
    {
        return $this->db->get_where($tabel, $id);
    }

    public function update($tabel, $data, $pk, $id)
    {
        $this->db->where($pk, $id);
        $this->db->update($tabel, $data);
    }

    public function hapus_data($where, $tabel)
    {
        $this->db->where($where);
        $this->db->delete($tabel);
    }
    public function join_tbl($tabel, $tbl_join, $join)
    {
        $this->db->join($tbl_join, $join);
        return $this->db->get($tabel);
    }
    public function get_all_new_data($tabel, $id)
    {
        $this->db->order_by($id, 'DESC');
        $this->db->limit(10);
        return $this->db->get($tabel);
    }
    public function get_data_by_field($table, $field, $value)
    {
        $this->db->where($field, $value);
        $query = $this->db->get($table);
        return $query->row();
    }
    public function get_data_bukti_sorted_by_tanggal_desc()
    {
        $this->db->order_by('tgl_bayar', 'DESC');
        return $this->db->get('t_bukti')->result();
    }
    public function get_data_sewa_sorted_by_tanggal_desc()
    {
        $this->db->order_by('tgl_bayar', 'DESC');
        return $this->db->get('t_bukti')->result();
    }
}
?>