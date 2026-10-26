<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
    }

    /**
     * Halaman pilih jenis login
     */
    public function index() {
        // Jika sudah login, redirect sesuai role
        if ($this->session->userdata('id')) {
            $this->_redirectByRole();
            return;
        }
        $this->load->view('auth/login');
    }

    /**
     * Proses login warga
     */
    public function login() {
        if ($this->input->method() !== 'post') {
            $this->load->view('auth/loginwarga');
            return;
        }

        $nama     = trim($this->input->post('nama'));
        $password = $this->input->post('password');

        if (empty($nama) || empty($password)) {
            $this->_loginView('warga', 'Nama dan kata sandi tidak boleh kosong.');
            return;
        }

        $user = $this->UserModel->cekLoginWarga($nama, $password);
        if ($user) {
            $this->_setSession($user);
            redirect('dashboard');
        } else {
            $this->_loginView('warga', 'Nama atau kata sandi salah.');
        }
    }

    /**
     * Halaman login warga (GET)
     */
    public function loginwarga() {
        if ($this->session->userdata('id')) {
            redirect('dashboard');
        }
        $this->load->view('auth/loginwarga');
    }

    /**
     * Halaman login admin (GET)
     */
    public function loginadmin() {
        if ($this->session->userdata('id')) {
            redirect('dashboard/admin');
        }
        $this->load->view('auth/loginadmin');
    }

    /**
     * Proses login admin
     */
    public function loginadmin_post() {
        $nama     = trim($this->input->post('nama'));
        $password = $this->input->post('password');

        if (empty($nama) || empty($password)) {
            $this->session->set_flashdata('error', 'Nama dan kata sandi tidak boleh kosong.');
            redirect('auth/loginadmin');
            return;
        }

        $user = $this->UserModel->cekLoginAdmin($nama, $password);
        if ($user) {
            $this->_setSession($user);
            redirect('dashboard/admin');
        } else {
            $this->session->set_flashdata('error', 'Nama atau kata sandi salah.');
            redirect('auth/loginadmin');
        }
    }

    /**
     * Halaman register warga
     */
    public function register() {
        if ($this->input->method() === 'post') {
            $this->_prosesRegister();
            return;
        }
        $this->load->view('auth/register');
    }

    /**
     * Lupa password — cek email
     */
    public function lupa() {
        if ($this->input->method() === 'post') {
            $email = trim($this->input->post('email'));
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->session->set_flashdata('error', 'Masukkan email yang valid.');
                redirect('auth/lupa');
                return;
            }
            $user = $this->UserModel->getByEmail($email);
            if (!$user) {
                $this->session->set_flashdata('error', 'Email tidak ditemukan.');
                redirect('auth/lupa');
                return;
            }
            redirect('auth/reset?id=' . $user['id']);
            return;
        }
        $this->load->view('auth/forget');
    }

    /**
     * Reset password
     */
    public function reset() {
        $id = (int) $this->input->get('id');
        if (!$id || !$this->UserModel->getById($id)) {
            redirect('auth/lupa');
            return;
        }

        if ($this->input->method() === 'post') {
            $pass    = $this->input->post('password');
            $konfirm = $this->input->post('konfirmasi');

            if (empty($pass) || $pass !== $konfirm) {
                $this->session->set_flashdata('error', 'Kata sandi tidak cocok.');
                redirect('auth/reset?id=' . $id);
                return;
            }
            if (strlen($pass) < 6) {
                $this->session->set_flashdata('error', 'Kata sandi minimal 6 karakter.');
                redirect('auth/reset?id=' . $id);
                return;
            }
            $this->UserModel->resetPassword($id, $pass);
            $this->session->set_flashdata('success', 'Kata sandi berhasil direset. Silakan masuk.');
            redirect('auth');
            return;
        }

        $this->load->view('auth/resetpassword', ['id' => $id]);
    }

    /**
     * Logout
     */
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }

    // ─── Private helpers ───────────────────────────────────────────────

    private function _setSession($user) {
        $this->session->set_userdata([
            'id'    => $user['id'],
            'nama'  => $user['nama'],
            'email' => $user['email'],
            'role'  => $user['role'],
        ]);
    }

    private function _redirectByRole() {
        if ($this->session->userdata('role') === 'admin') {
            redirect('dashboard/admin');
        } else {
            redirect('dashboard');
        }
    }

    private function _loginView($type, $error) {
        $view = $type === 'admin' ? 'auth/loginadmin' : 'auth/loginwarga';
        $this->load->view($view, ['error' => $error]);
    }

    private function _prosesRegister() {
        $nama      = trim($this->input->post('nama'));
        $email     = trim($this->input->post('email'));
        $nomorhp   = trim($this->input->post('nomorhp'));
        $alamat    = trim($this->input->post('alamat'));
        $password  = $this->input->post('password');
        $konfirmasi = $this->input->post('konfirmasi');

        $error = '';
        if (empty($nama) || empty($email) || empty($nomorhp) || empty($alamat) || empty($password)) {
            $error = 'Semua field wajib diisi.';
        } elseif ($password !== $konfirmasi) {
            $error = 'Konfirmasi kata sandi tidak cocok.';
        } elseif (strlen($password) < 6) {
            $error = 'Kata sandi minimal 6 karakter.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Format email tidak valid.';
        } elseif ($this->UserModel->cekEmail($email)) {
            $error = 'Email sudah terdaftar.';
        }

        if ($error) {
            $this->load->view('auth/register', ['error' => $error]);
            return;
        }

        $this->UserModel->daftar(compact('nama', 'email', 'nomorhp', 'alamat', 'password'));
        $this->load->view('auth/register', ['success' => 'Registrasi berhasil! Silakan masuk.']);
    }
}
