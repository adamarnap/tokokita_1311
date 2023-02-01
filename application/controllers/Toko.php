<?php

class toko extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        $this->load->model('Mtoko');
        $this->cek_login();
    }

    private function cek_login()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }
    }

    public function index()
    {
        $data['toko'] = $this->Mtoko->get_toko('')->result();
        $this->template->load('layout_admin', 'admin/toko/index', $data);
    }

    public function aktif($id)
    {
        $dataUpdate = array('statusAktif' => 'Y');
        $this->Mcrud->update('tbl_toko', $dataUpdate, 'idKonsumen', $id);
        redirect('toko');
    }

    public function non_aktif($id)
    {
        $dataUpdate = array('statusAktif' => 'N');
        $this->Mcrud->update('tbl_toko', $dataUpdate, 'idKonsumen', $id);
        redirect('toko');
    }
}
