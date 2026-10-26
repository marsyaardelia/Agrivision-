<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LaporModel');
        $this->_cekLogin();
    }

    public function index() {
        $sort   = $this->input->get('sort') ?: 'desc';
        $idUser = $this->session->userdata('id');

        $data['laporan'] = $this->LaporModel->getByUser($idUser, $sort);
        $data['sort']    = $sort;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('laporan/riwayat', $data);
        $this->load->view('template/footer');
    }

    public function tambah() {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('laporan/tambah');
        $this->load->view('template/footer');
    }

    public function simpan() {
        if ($this->input->method() !== 'post') {
            redirect('laporan/tambah');
            return;
        }

        $idUser = $this->session->userdata('id');
        $namaFoto = '';

        if (!empty($_FILES['foto']['name'])) {
            // Gunakan path absolut agar tidak tergantung working directory
            $uploadPath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR;

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, TRUE);
            }

            $configUpload = array(
                'upload_path'   => $uploadPath,
                'allowed_types' => 'jpg|jpeg|png|gif',
                'max_size'      => 2048,
                'encrypt_name'  => TRUE,
                'detect_mime'   => FALSE,
            );

            $this->load->library('upload', $configUpload);

            if (!$this->upload->do_upload('foto')) {
                $error = strip_tags($this->upload->display_errors());
                $this->session->set_flashdata('error', 'Gagal upload foto: ' . $error);
                redirect('laporan/tambah');
                return;
            }

            $namaFoto = $this->upload->data('file_name');
        }

        $data = array(
            'id_user'       => $idUser,
            'jenis_laporan' => $this->input->post('jenis_laporan'),
            'deskripsi'     => $this->input->post('deskripsi'),
            'alamat'        => $this->input->post('alamat'),
            'foto'          => $namaFoto,
            'status'        => 'menunggu',
        );

        if (empty($data['jenis_laporan']) || empty($data['deskripsi']) || empty($data['alamat'])) {
            $this->session->set_flashdata('error', 'Semua field wajib diisi.');
            redirect('laporan/tambah');
            return;
        }

        $this->LaporModel->simpan($data);
        $this->session->set_flashdata('success', 'Laporan berhasil dikirim!');
        redirect('laporan');
    }

    public function detail($id) {
        $idUser  = $this->session->userdata('id');
        $laporan = $this->LaporModel->getById($id, $idUser);

        if (!$laporan) {
            $this->session->set_flashdata('error', 'Laporan tidak ditemukan.');
            redirect('laporan');
            return;
        }

        $data['laporan'] = $laporan;
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('laporan/Detail', $data);
        $this->load->view('template/footer');
    }

    public function edit($id) {
        $idUser  = $this->session->userdata('id');
        $laporan = $this->LaporModel->getById($id, $idUser);

        if (!$laporan) {
            $this->session->set_flashdata('error', 'Laporan tidak ditemukan.');
            redirect('laporan');
            return;
        }

        $data['laporan'] = $laporan;
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('laporan/edit', $data);
        $this->load->view('template/footer');
    }

    public function update() {
        if ($this->input->method() !== 'post') {
            redirect('laporan');
            return;
        }

        $idUser    = $this->session->userdata('id');
        $idLaporan = (int) $this->input->post('id_laporan');
        $laporan   = $this->LaporModel->getById($idLaporan, $idUser);

        if (!$laporan) {
            redirect('laporan');
            return;
        }

        $data = array(
            'alamat'        => $this->input->post('alamat'),
            'jenis_laporan' => $this->input->post('jenis_laporan'),
            'deskripsi'     => $this->input->post('deskripsi'),
        );

        $this->LaporModel->update($idLaporan, $data, $idUser);
        $this->session->set_flashdata('success', 'Laporan berhasil diperbarui.');
        redirect('laporan');
    }

    public function hapus($id) {
        $idUser = $this->session->userdata('id');
        $this->LaporModel->hapus($id, $idUser);
        $this->session->set_flashdata('success', 'Laporan berhasil dihapus.');
        redirect('laporan');
    }

    private function _cekLogin() {
        if (!$this->session->userdata('id')) {
            redirect('auth');
        }
    }
}
