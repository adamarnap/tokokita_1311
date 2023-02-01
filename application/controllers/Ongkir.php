<?php

class ongkir extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        $this->load->model('Madmin');
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
        $data['ongkir'] = $this->Madmin->get_ongkir()->result();
        $this->template->load('layout_admin', 'admin/ongkir/index', $data);
    }

    public function add()
    {
        $data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
        $data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
        $this->template->load('layout_admin', 'admin/ongkir/ongkir_add', $data);
    }

    public function save()
    {
        $kurir =  $this->input->post('kurir');
        $asal =  $this->input->post('asal');
        $tujuan =  $this->input->post('tujuan');
        $biaya =  $this->input->post('biaya');

        if ($asal == $tujuan) {
            $this->session->set_flashdata('flash', 'Tidak Boleh Sama');
            redirect('ongkir/add');
        } else {
            $count_duplikat_ongkir = $this->Madmin->cek_duplikat_ongkir($asal, $tujuan, $kurir)->num_rows();
            if ($count_duplikat_ongkir > 0) {
                $this->session->set_flashdata('flash', 'Sudah Tersedia');
                redirect('ongkir/add');
            } else {
                $dataInsert = array('idKurir' => $kurir, 'idKotaAsal' => $asal, 'idKotaTujuan' => $tujuan, 'biaya' => $biaya);
                $this->Mcrud->insert('tbl_biaya_kirim', $dataInsert);
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('ongkir');
            }
        }
    }

    public function getid($id)
    {
        $dataWhere = array('idBiayaKirim' => $id);
        $data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
        $data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
        $data['ongkir'] = $this->Mcrud->get_by_id('tbl_biaya_kirim', $dataWhere)->row_object();
        $this->template->load('layout_admin', 'admin/ongkir/ongkir_edit', $data);
    }

    public function edit()
    {
        $id = $this->input->post('idBiayaKirim');
        $kurir =  $this->input->post('kurir');
        $asal =  $this->input->post('asal');
        $tujuan =  $this->input->post('tujuan');
        $biaya =  $this->input->post('biaya');

        $dataUpdate = array('idKurir' => $kurir, 'idKotaAsal' => $asal, 'idKotaTujuan' => $tujuan, 'biaya' => $biaya);
        $this->Mcrud->update('tbl_biaya_kirim', $dataUpdate, 'idBiayaKirim', $id);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('ongkir');
    }

    public function delete($id)
    {
        $dataWhere = array('idBiayaKirim' => $id);
        $data['ongkir'] = $this->Mcrud->get_by_id('tbl_biaya_kirim', $dataWhere)->row_object();

        $this->Mcrud->delete('tbl_biaya_kirim', $dataWhere, 'idBiayaKirim', $id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('ongkir');
    }
}
