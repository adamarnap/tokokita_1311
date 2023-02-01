<?php

class home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mfrontend');
        $this->load->model('Mmember');
        $this->load->model('Mtoko');
    }


    public function index()
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['produk_terbaru'] = $this->Mfrontend->get_all_produk_terbaru()->result();
        $this->template->load('layout_frontend', 'frontend/home', $data);
    }

    public function register()
    {
        $data['kota'] = $this->Mfrontend->get_all_kota()->result();
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/register', $data);
    }

    public function act_reg()
    {
        $nama = $this->input->post('namaKonsumen');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //$password_confirm = $this->input->post('password_confirm');
        $alamat = $this->input->post('alamat');
        $kota = $this->input->post('idKota');
        $no_telpon = $this->input->post('tlpn');

        $dataInsert = array('namaKonsumen' => $nama, 'email' => $email, 'username' => $username, 'password' => $password, 'alamat' => $alamat, 'idKota' => $kota, 'tlpn' => $no_telpon);
        $this->Mfrontend->insert('tbl_member', $dataInsert);
        redirect('home');
    }

    public function login()
    {
        $data['kota'] = $this->Mfrontend->get_all_kota()->result();
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/login', $data);
    }

    public function act_login()
    {
        $this->load->model('Mmember');
        $u = $this->input->post('username');
        $p = $this->input->post('password');

        $cek = $this->Mmember->cek_login($u, $p)->num_rows();
        $result = $this->Mmember->cek_login($u, $p)->result();

        if ($cek == 1) {
            $data_session = array(
                'userName' => $u,
                'id' => $result[0]->idKonsumen,
                'status' => 'login'
            );

            $this->session->set_userdata($data_session);
            redirect('home/member');
        } else {
            $this->session->set_flashdata('flash', 'Salah');
            redirect('home/login');
        }
    }

    public function member()
    {
        $data['kota'] = $this->Mfrontend->get_all_kota()->result();
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/member', $data);
    }

    public function toko()
    {
        $data['kota'] = $this->Mfrontend->get_all_kota()->result();
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['toko'] = $this->Mtoko->get_toko('')->result();

        $this->template->load('layout_frontend', 'frontend/toko', $data);
    }

    public function buat_toko()
    {
        $data['kota'] = $this->Mfrontend->get_all_kota()->result();
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/buat_toko', $data);
    }

    public function input_toko()
    {
        $id = $this->session->userdata('id');
        $nama_toko = $this->input->POST('namaToko');
        $deskripsi = $this->input->POST('deskripsi');

        $config['upload_path'] = './upload_logo_toko/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('logo')) {
            $data_file = $this->upload->data();
            $data_insert = array(
                'idKonsumen' => $id,
                'namaToko' => $nama_toko,
                'logo' => $data_file['file_name'],
                'deskripsi' => $deskripsi,
                'statusAktif' => 'Y'
            );

            $this->Mmember->input_toko($data_insert);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('home/toko');
        } else {
            redirect('home/buat_toko');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }
}
