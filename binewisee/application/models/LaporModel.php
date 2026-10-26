<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporModel extends CI_Model {

    protected $table = 'laporan';

    public function __construct() {
        parent::__construct();
    }

    /**
     * Ambil semua laporan milik user tertentu
     */
    public function getByUser($idUser, $sort = 'DESC') {
        $sort = strtoupper($sort) === 'ASC' ? 'ASC' : 'DESC';
        $this->db->where('id_user', $idUser);
        $this->db->order_by('tanggal_laporan', $sort);
        return $this->db->get($this->table)->result_array();
    }

    /**
     * Ambil semua laporan + nama warga (untuk admin)
     */
    public function getAll($sort = 'DESC') {
        $sort = strtoupper($sort) === 'ASC' ? 'ASC' : 'DESC';
        $this->db->select('l.*, u.nama as nama_warga, u.nomorhp');
        $this->db->from('laporan l');
        $this->db->join('users u', 'l.id_user = u.id');
        $this->db->order_by('l.tanggal_laporan', $sort);
        return $this->db->get()->result_array();
    }

    /**
     * Ambil laporan berdasarkan ID (dan opsional id_user untuk keamanan)
     */
    public function getById($id, $idUser = null) {
        $this->db->where('id_laporan', $id);
        if ($idUser !== null) {
            $this->db->where('id_user', $idUser);
        }
        return $this->db->get($this->table)->row_array();
    }

    /**
     * Simpan laporan baru
     */
    public function simpan($data) {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Update laporan
     */
    public function update($id, $data, $idUser = null) {
        $this->db->where('id_laporan', $id);
        if ($idUser !== null) {
            $this->db->where('id_user', $idUser);
        }
        return $this->db->update($this->table, $data);
    }

    /**
     * Update status laporan (khusus admin)
     */
    public function updateStatus($id, $status) {
        $allowed = ['menunggu', 'diproses', 'selesai'];
        if (!in_array($status, $allowed)) return false;
        return $this->db->update($this->table, ['status' => $status], ['id_laporan' => $id]);
    }

    /**
     * Hapus laporan
     */
    public function hapus($id, $idUser = null) {
        $this->db->where('id_laporan', $id);
        if ($idUser !== null) {
            $this->db->where('id_user', $idUser);
        }
        return $this->db->delete($this->table);
    }

    /**
     * Statistik laporan per user
     */
    public function statistikUser($idUser) {
        $stats = [];
        $stats['total']    = $this->db->where('id_user', $idUser)->count_all_results($this->table);
        $stats['menunggu'] = $this->db->where(['id_user' => $idUser, 'status' => 'menunggu'])->count_all_results($this->table);
        $stats['diproses'] = $this->db->where(['id_user' => $idUser, 'status' => 'diproses'])->count_all_results($this->table);
        $stats['selesai']  = $this->db->where(['id_user' => $idUser, 'status' => 'selesai'])->count_all_results($this->table);
        return $stats;
    }

    /**
     * Statistik laporan semua (untuk admin)
     */
    public function statistikAdmin() {
        $stats = [];
        $stats['total']    = $this->db->count_all($this->table);
        $stats['menunggu'] = $this->db->where('status', 'menunggu')->count_all_results($this->table);
        $stats['diproses'] = $this->db->where('status', 'diproses')->count_all_results($this->table);
        $stats['selesai']  = $this->db->where('status', 'selesai')->count_all_results($this->table);
        return $stats;
    }
}
