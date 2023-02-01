<?php

class Mtoko extends CI_Model
{
    public function get_toko()
    {
        $q = $this->db->query("SELECT tbl_toko.idToko, tbl_member.namaKonsumen, tbl_toko.namaToko, tbl_toko.logo, tbl_toko.deskripsi , tbl_toko.StatusAktif FROM tbl_toko 
        JOIN tbl_member ON tbl_toko.idKonsumen=tbl_member.idKonsumen");
        return $q;
    }

    public function get_toko_front($idToko)
    {
        $q = $this->db->get_where('tbl_toko', array('idToko' => $idToko));
        return $q;
    }

    public function get_produk_by_toko($idToko)
    {
        $q = $this->db->get_where('tbl_produk', array('idToko' => $idToko));
        return $q;
    }

    public function cek_login($u, $p)
    {
        $q = $this->db->get_where('tbl_toko', array('userName' => $u, 'password' => $p));
        return $q;
    }

    public function input_produk($data)
    {
        $this->db->insert('tbl_produk', $data);
    }

    public function edit_produk($data)
    {
        $this->db->update('tbl_produk', $data);
    }
}
