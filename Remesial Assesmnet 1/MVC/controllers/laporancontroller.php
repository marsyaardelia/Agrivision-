<?php

include 'config/koneksi.php';
include 'models/LaporanModel.php';

class LaporanController{

    private $model;

    public function __construct($conn){

        $this->model =
            new LaporanModel($conn);
    }

    public function index(){

        return $this->model->getAll();
    }

    public function store(){

        if(isset($_POST['simpan'])){

            $lokasi = $_POST['lokasi'];
            $waktu = $_POST['waktu_laporan'];
            $jumlah = $_POST['jumlah_kendaraan'];
            $deskripsi = $_POST['deskripsi'];

            if($jumlah <= 5){
                $status = "Ringan";
            }
            elseif($jumlah <= 15){
                $status = "Sedang";
            }
            else{
                $status = "Berat";
            }

            $foto =
            $_FILES['foto_bukti']['name'];

            move_uploaded_file(
                $_FILES['foto_bukti']['tmp_name'],
                "uploads/".$foto
            );

            $this->model->insert(
                $_SESSION['id'],
                $lokasi,
                $waktu,
                $jumlah,
                $status,
                $deskripsi,
                $foto
            );

            header("Location:index.php?page=laporan");
        }
    }
}