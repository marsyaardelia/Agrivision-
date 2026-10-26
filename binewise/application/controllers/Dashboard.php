<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LaporModel');
    }

    /**
     * Dashboard Warga
     */
    public function index() {
        if (!$this->session->userdata('id') || $this->session->userdata('role') !== 'warga') {
            redirect('auth');
            return;
        }

        $idUser = $this->session->userdata('id');
        $data['stats']   = $this->LaporModel->statistikUser($idUser);
        $data['laporan'] = $this->LaporModel->getByUser($idUser);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('dashboard/Dashboard', $data);
        $this->load->view('template/footer');
    }

    /**
     * Dashboard Admin
     */
    public function admin() {
        if (!$this->session->userdata('id') || $this->session->userdata('role') !== 'admin') {
            redirect('auth');
            return;
        }

        $data['stats']   = $this->LaporModel->statistikAdmin();
        $data['laporan'] = $this->LaporModel->getAll();

        $this->load->view('dashboard/DashboardAdmin', $data);
    }
}
