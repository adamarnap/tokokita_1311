<?php
class Toko extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mfrontend');
        $this->load->model('Mmember');
        $this->load->model('Mtoko');
        $this->load->model('Mcrud');
    }

    public function main($idToko)
    {
        $data['namaToko'] = $this->Mtoko->get_toko_front($idToko)->row_object();
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/toko_home', $data);
    }

    public function produkmain($idToko)
    {

        $data['namaToko'] = $this->Mtoko->get_toko_front($idToko)->row_object();
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['produk'] = $this->Mtoko->get_produk_by_toko($idToko)->result();
        $this->template->load('layout_frontend', 'frontend/toko_produk', $data);
    }

    public function buat_produk($idToko)
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['namaToko'] = $this->Mtoko->get_toko_front($idToko)->row_object();
        $data['idToko'] = $idToko;
        $this->template->load('layout_frontend', 'frontend/buat_produk', $data);
    }

    public function input_produk()
    {
        $idKat = $this->input->post('idKat');
        $idToko = $this->input->post('id_toko');
        $namaProduk = $this->input->post('namaProduk');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $berat = $this->input->post('berat');
        $deskripsiProduk = $this->input->post('deskripsiProduk');

        $config['upload_path'] = './upload_produk/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $data_file = $this->upload->data();
            $data_insert = array(
                'idKat' => $idKat,
                'idToko' => $idToko,
                'namaProduk' => $namaProduk,
                'harga' => $harga,
                'stok' => $stok,
                'berat' => $berat,
                'foto' => $data_file['file_name'],
                'deskripsiProduk' => $deskripsiProduk,

            );

            $this->Mtoko->input_produk($data_insert);
            redirect('tokohome/Toko/produkmain/' . $idToko);
            $this->session->set_flashdata('flash', 'Ditambahkan');
        } else {
            redirect('tokohome/Toko/buat_produk/' . $idToko);
        }
    }


    public function getid($id, $idToko)
    {

        $datawhere = array('idProduk' => $id);
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['namaToko'] = $this->Mtoko->get_toko_front($idToko)->row_object();
        $data['idToko'] = $idToko;
        $data['Produk'] = $this->Mfrontend->get_all_kategori()->result();
        $data['produk'] = $this->Mcrud->get_by_id('tbl_produk', $datawhere)->row_object();
        $this->template->load('layout_frontend', 'frontend/toko_edit', $data);
    }


    public function edit()
    {
        $id = $this->input->post('idProduk');
        $idToko = $this->input->post('idToko');
        $namaProduk = $this->input->post('namaProduk');
        $idKat = $this->input->post('idKat');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $berat = $this->input->post('berat');
        $deskripsiProduk = $this->input->post('deskripsiProduk');


        //    $this->Mcrud->update('tbl_produk', $dataUpdate, 'idProduk', $id);   
        //   if($this->db->affected_rows() > 0 ) {
        //   $this->session->set_flashdata('success','Data Berhasil Disimpan');    
        //    }
        //    redirect('toko_front/toko/produk/'. $idToko);  

        $config['upload_path'] = './upload_produk/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $data_file = $this->upload->data();
            $data_update = array(
                'idToko' => $idToko,
                'namaProduk' => $namaProduk,
                'idKat' => $idKat,
                'stok' => $stok,
                'harga' => $harga,
                'berat' => $berat,
                'foto' => $data_file['file_name'],
                'deskripsiProduk' => $deskripsiProduk
            );
            $this->Mcrud->update('tbl_produk', $data_update, 'idProduk', $id);

            redirect('tokohome/Toko/produkmain/' . $idToko);
            $this->session->set_flashdata('flash', 'Diubah');
        } else {
            redirect('tokohome/Toko/buat_produk/' . $idToko);
        }
    }

    public function del($id, $idToko)
    {
        $datawhere = array('idProduk' => $id);
        $data['produk'] = $this->Mcrud->get_by_id('tbl_produk', $datawhere)->row_object();
        $this->Mcrud->delete('tbl_produk', $datawhere, 'idProduk', $id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('tokohome/Toko/produkmain/' . $idToko);
    }
}
