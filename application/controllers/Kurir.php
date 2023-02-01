<?php

class kurir extends CI_Controller
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
        $data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
        $this->template->load('layout_admin', 'admin/kurir/index', $data);
    }

    public function add()
    {
        $this->template->load('layout_admin', 'admin/kurir/kurir_add');
    }

    public function save()
    {
        $namaKurir = $this->input->post('namaKurir');
        $dataInsert = array('namaKurir' => $namaKurir);

        $this->Mcrud->insert('tbl_kurir', $dataInsert);
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('kurir');
    }

    public function getid($id)
    {
        $dataWhere = array('idKurir' => $id);
        $data['kurir'] = $this->Mcrud->get_by_id('tbl_kurir', $dataWhere)->row_object();
        $this->template->load('layout_admin', 'admin/kurir/kurir_edit', $data);
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $namaKurir = $this->input->post('namaKurir');
        $dataUpdate = array('namaKurir' => $namaKurir);

        $this->Mcrud->update('tbl_kurir', $dataUpdate, 'idKurir', $id);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('kurir');
    }

    public function delete($id)
    {
        $dataWhere = array('idKurir' => $id);
        $data['kurir'] = $this->Mcrud->get_by_id('tbl_kurir', $dataWhere)->row_object();

        $this->load->model('Madmin');
        $count_kota = $this->Madmin->cek_kota($id)->num_rows();
        if ($count_kota) {
            $this->session->set_flashdata('pesan', 'tidak boleh  Dihapus');
            redirect('kurir');
        } else {
            $this->Mcrud->delete('tbl_kurir', $dataWhere, 'idKurir', $id);
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('kurir');
        }
    }
}
