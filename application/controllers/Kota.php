<?php

class kota extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
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
        $data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
        $this->template->load('layout_admin', 'admin/kota/index', $data);
    }

    public function add()
    {
        $this->template->load('layout_admin', 'admin/kota/kota_add');
    }

    public function save()
    {
        $namaKota = $this->input->post('namaKota');
        $dataInsert = array('namaKota' => $namaKota);

        $this->Mcrud->insert('tbl_kota', $dataInsert);
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('kota');
    }

    public function getid($id)
    {
        $dataWhere = array('idKota' => $id);
        $data['kota'] = $this->Mcrud->get_by_id('tbl_kota', $dataWhere)->row_object();
        $this->template->load('layout_admin', 'admin/kota/kota_edit', $data);
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $namaKota = $this->input->post('namaKota');
        $dataUpdate = array('namaKota' => $namaKota);

        $this->Mcrud->update('tbl_kota', $dataUpdate, 'idKota', $id);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('kota');
    }

    public function delete($id)
    {
        $dataWhere = array('idKota' => $id);
        $data['kota'] = $this->Mcrud->get_by_id('tbl_kota', $dataWhere)->row_object();

        $this->load->model('Madmin');
        $count_kota = $this->Madmin->cek_kota($id)->num_rows();
        if ($count_kota) {
            $this->session->set_flashdata('pesan', 'tidak boleh  Dihapus');
            redirect('kota');
        } else {
            $this->Mcrud->delete('tbl_kota', $dataWhere, 'idKota', $id);
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('kota');
        }
    }
}
