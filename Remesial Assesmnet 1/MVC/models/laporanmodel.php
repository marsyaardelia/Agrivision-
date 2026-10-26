<?php

class LaporanModel{

    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function getAll(){

        return mysqli_query(
            $this->conn,
            "SELECT * FROM laporan"
        );
    }

    public function getById($id){

        return mysqli_query(
            $this->conn,
            "SELECT * FROM laporan
             WHERE id='$id'"
        );
    }

    public function insert(
        $user_id,
        $lokasi,
        $waktu,
        $jumlah,
        $status,
        $deskripsi,
        $foto
    ){

        return mysqli_query(
            $this->conn,
            "INSERT INTO laporan
            (
                user_id,
                lokasi,
                waktu_laporan,
                jumlah_kendaraan,
                status_pelanggaran,
                deskripsi,
                foto_bukti
            )
            VALUES
            (
                '$user_id',
                '$lokasi',
                '$waktu',
                '$jumlah',
                '$status',
                '$deskripsi',
                '$foto'
            )"
        );
    }

    public function delete($id){

        return mysqli_query(
            $this->conn,
            "DELETE FROM laporan
             WHERE id='$id'"
        );
    }
}