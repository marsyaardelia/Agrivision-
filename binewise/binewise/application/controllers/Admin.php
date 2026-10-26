<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LaporModel');
        $this->_cekAdmin();
    }

    /**
     * Manajemen semua laporan
     */
    public function laporan() {
        $data['stats']   = $this->LaporModel->statistikAdmin();
        $data['laporan'] = $this->LaporModel->getAll();

        $this->load->view('dashboard/DashboardAdmin', $data);
    }

    /**
     * Update status laporan oleh admin
     */
    public function update_status() {
        if ($this->input->method() !== 'post') {
            redirect('admin/laporan');
            return;
        }

        $idLaporan  = (int) $this->input->post('id_laporan');
        $statusBaru = $this->input->post('status');

        $this->LaporModel->updateStatus($idLaporan, $statusBaru);
        $this->session->set_flashdata('success', 'Status laporan diperbarui.');
        redirect('dashboard/admin');
    }

    // ─── Private helpers ───────────────────────────────────────────────

    private function _cekAdmin() {
        if (!$this->session->userdata('id') || $this->session->userdata('role') !== 'admin') {
            redirect('auth');
        }
    }
}
