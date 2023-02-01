<?php 

class Toko extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Mcrud');
        // $this -> load -> model('Madmin');
        $this->load->model('Mfrontend');
        $this -> load -> model('Mtoko');
    }

    public function main($idToko){
        $data['kategori'] = $this -> Mfrontend -> get_all_kategori() -> result();
        $data['namaToko'] = $this -> Mtoko -> get_toko($idToko) -> row_object();
        $this -> template -> load('layout_frontend', 'frontend/toko_home', $data);
    }

    
    public function getid($idProduk, $idToko) {
        $data['kategori'] = $this -> Mfrontend -> get_all_kategori() -> result();
        $data['namaToko'] = $this -> Mtoko -> get_toko($idToko) -> row_object();
        $data['namaProduk'] = $this -> Mtoko -> get_produk_by_id($idProduk) -> row_object();
        $data['idToko'] = $idToko;
        $data['idProduk'] = $idProduk;
        $this -> template -> load('layout_frontend', 'frontend/toko_edit_produk', $data);
    }

    public function hapus_produk($idProduk, $idToko) {
        $id = $this -> uri -> segment(4);
        $this -> Mtoko -> hapus_produk($idProduk);
        $this->session->set_flashdata('pesan','Data berhasil di Hapus !! ');
        redirect('toko/produk/'. $idToko);
    }

     public function edit_produk(){
         $idKat = $this -> input -> POST('kategori');
        $idToko = $this -> input -> POST('id_toko');
        $namaProduk = $this -> input -> POST('namaProduk');
        $harga = $this -> input -> POST('harga');
        $stok = $this -> input -> POST('stok');
        $berat = $this -> input -> POST('berat');
        $deskripsiProduk = $this -> input -> POST('deskripsiProduk');
      

        $config['upload_path'] = './upload_produk/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this -> load -> library('upload', $config);

            if($this -> upload -> do_upload('foto_produk')){
                $data_file = $this -> upload -> data();
                
                $data_insert = array(
                    'idKat' => $idKat,
                    'idToko' => $idToko,
                    'namaProduk' => $namaProduk,
                    'harga' => $harga,
                    'stok' => $stok,
                    'berat' => $berat,

                    'foto' => $data_file['file_name'],
                    'deskripsiProduk' => $deskripsiProduk
                    
                );
                // echo $id;
                // exit();
                $this -> Mtoko -> insert_produk($data_insert);             
                redirect('toko/produk/'. $idToko); 
            } else {
                redirect('toko/create_produk/'. $idToko);
            }
     }



    public function produk($idToko) {
        $data['kategori'] = $this -> Mfrontend -> get_all_kategori() -> result();
        $data['namaToko'] = $this -> Mtoko -> get_toko($idToko) -> row_object();
        
        // $dataWhere = array('idToko' => $idToko);
        // $data['produk'] = $this -> Mcrud ->  get_by_id('tbl_produk', $dataWhere) -> result_array();

        $data['produk'] = $this -> Mtoko -> get_produk_by_toko($idToko) -> result_array();
        $this -> template -> load('layout_frontend', 'frontend/toko_produk', $data);
    }

    public function create_produk($idToko){
        $data['kategori'] = $this -> Mfrontend -> get_all_kategori() -> result();
        $data['namaToko'] = $this -> Mtoko -> get_toko($idToko) -> row_object();
        $data['idToko'] = $idToko;
        $this -> template -> load('layout_frontend', 'frontend/toko_create_produk', $data);
    }

     public function insert_produk(){
        $idKat = $this -> input -> POST('kategori');
        $idToko = $this -> input -> POST('id_toko');
        $namaProduk = $this -> input -> POST('namaProduk');
        $harga = $this -> input -> POST('harga');
        $stok = $this -> input -> POST('stok');
        $berat = $this -> input -> POST('berat');
        $deskripsiProduk = $this -> input -> POST('deskripsiProduk');
      

        $config['upload_path'] = './upload_produk/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this -> load -> library('upload', $config);

            if($this -> upload -> do_upload('foto_produk')){
                $data_file = $this -> upload -> data();
                
                $data_insert = array(
                    'idKat' => $idKat,
                    'idToko' => $idToko,
                    'namaProduk' => $namaProduk,
                    'harga' => $harga,
                    'stok' => $stok,
                    'berat' => $berat,

                    'foto' => $data_file['file_name'],
                    'deskripsiProduk' => $deskripsiProduk
                    
                );
                // echo $id;
                // exit();
                $this -> Mtoko -> insert_produk($data_insert);             
                redirect('toko/produk/'. $idToko); 
            } else {
                redirect('toko/create_produk/'. $idToko);
            }

    }



    // public function index() {
    //     $data['toko'] = $this -> Madmin -> get_toko() -> result();
    //     $data['toko1'] = $this->Mcrud->get_all_data('tbl_toko')->result();
    //     $this -> template -> load('layout_admin', 'admin/toko/index', $data);
    // }

    // public function add() {
    //     $this -> template -> load('layout_admin','admin/toko/form_add');
    // }

    // public function aktif($id) {
    //     $dataUpdate = array('statusAktif'=> 'Y');
    //     $this -> Mcrud -> update('tbl_toko', $dataUpdate, 'idKonsumen', $id);
    //     redirect('toko');
    // }

    // public function non_aktif($id) {
    //     $dataUpdate = array('statusAktif' => 'N');
    //     $this -> Mcrud -> update('tbl_toko', $dataUpdate, 'idKonsumen', $id);
    //     redirect('toko');
    // }

    // public function save() {
    //     $username = $this -> input -> POST('username');
    //     $password = $this -> input -> POST('password');
    //     $namaKonsumen = $this -> input -> POST('namaKonsumen');
    //     $alamat = $this -> input -> POST('alamat');
    //     $idKota = $this -> input -> POST('idKota');
    //     $email = $this -> input -> POST('email');
    //     $tlpn = $this -> input -> POST('tlpn');
    //     $statusAktif = $this -> input -> POST('statusAktif');

    //     $dataInsert = array('username' => $username, 
    //     'password' => $password, 
    //     'namaKonsumen' => $namaKonsumen,
    //     'alamat' => $alamat,
    //     'idKota' => $idKota,
    //     'email' => $email,
    //     'tlpn' => $tlpn,
    //     'statusAktif' => $statusAktif,
    // );
    //     $this -> Mcrud -> insert('tbl_member', $dataInsert);
    //     $this->session->set_flashdata('pesan','Data berhasil di Tambahkan.'); 
    //     redirect('member');
    // }

}




?>