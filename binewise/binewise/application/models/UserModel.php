<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    protected $table = 'users';

    public function __construct() {
        parent::__construct();
    }

    /**
     * Cek login warga berdasarkan nama + password (bcrypt)
     */
    public function cekLoginWarga($nama, $password) {
        $user = $this->db->get_where($this->table, [
            'nama' => $nama,
            'role' => 'warga'
        ])->row_array();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    /**
     * Cek login admin berdasarkan nama + password (bcrypt)
     */
    public function cekLoginAdmin($nama, $password) {
        $user = $this->db->get_where($this->table, [
            'nama' => $nama,
            'role' => 'admin'
        ])->row_array();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    /**
     * Cek apakah email sudah terdaftar
     */
    public function cekEmail($email, $exceptId = null) {
        $this->db->where('email', $email);
        if ($exceptId) {
            $this->db->where('id !=', $exceptId);
        }
        return $this->db->get($this->table)->row_array();
    }

    /**
     * Daftar user baru (warga)
     */
    public function daftar($data) {
        $insert = [
            'nama'     => $data['nama'],
            'email'    => $data['email'],
            'nomorhp'  => $data['nomorhp'],
            'alamat'   => $data['alamat'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'role'     => 'warga',
        ];
        return $this->db->insert($this->table, $insert);
    }

    /**
     * Ambil user berdasarkan ID
     */
    public function getById($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    /**
     * Ambil user berdasarkan email
     */
    public function getByEmail($email) {
        return $this->db->get_where($this->table, ['email' => $email])->row_array();
    }

    /**
     * Update profil user
     */
    public function updateProfil($id, $data) {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    /**
     * Reset password user
     */
    public function resetPassword($id, $passwordBaru) {
        return $this->db->update($this->table, [
            'password' => password_hash($passwordBaru, PASSWORD_DEFAULT)
        ], ['id' => $id]);
    }
}
