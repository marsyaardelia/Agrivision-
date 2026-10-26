<?php
class Laporan {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function tambah($nama, $kategori, $deskripsi, $file) {
        $gambar = "";

        if ($file['name'] != "") {
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $allowed = ['jpg','jpeg','png'];

            if (in_array($ext, $allowed)) {
                $gambar = time().".".$ext;
                move_uploaded_file($file['tmp_name'], "uploads/".$gambar);
            }
        }

        $stmt = $this->conn->prepare("INSERT INTO laporan_sampah (nama,kategori,deskripsi,gambar) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $nama, $kategori, $deskripsi, $gambar);
        return $stmt->execute();
    }

    public function tampil() {
        return $this->conn->query("SELECT * FROM laporan_sampah");
    }

    public function hapus($id) {
        $data = $this->conn->query("SELECT gambar FROM laporan_sampah WHERE id=$id")->fetch_assoc();

        if ($data && file_exists("uploads/".$data['gambar'])) {
            unlink("uploads/".$data['gambar']);
        }

        return $this->conn->query("DELETE FROM laporan_sampah WHERE id=$id");
    }
    
    public function update($id, $nama, $kategori, $deskripsi, $file) {
        if ($file['name'] != "") {
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $gambar = time().".".$ext;
            move_uploaded_file($file['tmp_name'], "uploads/".$gambar);

            $stmt = $this->conn->prepare("UPDATE laporan_sampah SET nama=?, kategori=?, deskripsi=?, gambar=? WHERE id=?");
            $stmt->bind_param("ssssi", $nama, $kategori, $deskripsi, $gambar, $id);
        } else {
            $stmt = $this->conn->prepare("UPDATE laporan_sampah SET nama=?, kategori=?, deskripsi=? WHERE id=?");
            $stmt->bind_param("sssi", $nama, $kategori, $deskripsi, $id);
        }

        return $stmt->execute();
    }
}
?>