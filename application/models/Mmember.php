<?php

class Mmember extends CI_Model
{
    public function get_member()
    {
        $q = $this->db->query("SELECT tbl_member.idKonsumen, tbl_member.username, tbl_member.password, tbl_member.namaKonsumen, tbl_member.alamat ,tbl_kota.namaKota, tbl_member.email,  tbl_member.tlpn, tbl_member.statusAktif FROM tbl_member 
        JOIN tbl_kota ON tbl_member.idKota=tbl_kota.idKota");
        return $q;
    }

    public function cek_login($u, $p)
    {
        $q = $this->db->get_where('tbl_member', array('userName' => $u, 'password' => $p));
        return $q;
    }

    public function get_toko_by_member()
    {
        $id = $this->session->userdata('id');
        $q = $this->db->get_where('tbl_toko', array('idKonsumen' => $id));
        return $q;
    }

    public function input_toko($data)
    {
        $this->db->insert('tbl_toko', $data);
    }
}
