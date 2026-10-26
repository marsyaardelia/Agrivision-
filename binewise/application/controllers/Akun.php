<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        if (!$this->session->userdata('id')) {
            redirect('auth');
        }
    }

    /**
     * Halaman profil
     */
    public function profil() {
        $id   = $this->session->userdata('id');
        $user = $this->UserModel->getById($id);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('akun/profil', ['user' => $user]);
        $this->load->view('template/footer');
    }

    /**
     * Simpan perubahan profil
     */
    public function simpan() {
        if ($this->input->method() !== 'post') {
            redirect('akun/profil');
            return;
        }

        $id      = $this->session->userdata('id');
        $nama    = trim($this->input->post('nama'));
        $email   = trim($this->input->post('email'));
        $nomorhp = trim($this->input->post('nomorhp'));
        $alamat  = trim($this->input->post('alamat'));
        $passBaru = $this->input->post('password_baru');
        $konfirmasi = $this->input->post('konfirmasi_password');

        $user = $this->UserModel->getById($id);

        // Validasi dasar
        if (empty($nama) || empty($email)) {
            $this->_showProfil($user, 'Nama dan email tidak boleh kosong.');
            return;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->_showProfil($user, 'Format email tidak valid.');
            return;
        }
        if ($this->UserModel->cekEmail($email, $id)) {
            $this->_showProfil($user, 'Email sudah digunakan akun lain.');
            return;
        }

        $update = compact('nama', 'email', 'nomorhp', 'alamat');

        // Ganti password jika diisi
        if (!empty($passBaru)) {
            if ($passBaru !== $konfirmasi) {
                $this->_showProfil($user, 'Konfirmasi kata sandi tidak cocok.');
                return;
            }
            if (strlen($passBaru) < 6) {
                $this->_showProfil($user, 'Kata sandi minimal 6 karakter.');
                return;
            }
            $update['password'] = password_hash($passBaru, PASSWORD_DEFAULT);
        }

        $this->UserModel->updateProfil($id, $update);
        $this->session->set_userdata('nama', $nama);

        $userBaru = $this->UserModel->getById($id);
        $this->_showProfil($userBaru, '', 'Profil berhasil diperbarui.');
    }

    // ─── Private helpers ───────────────────────────────────────────────

    private function _showProfil($user, $error = '', $success = '') {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('akun/profil', compact('user', 'error', 'success'));
        $this->load->view('template/footer');
    }
}
