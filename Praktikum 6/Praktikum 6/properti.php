<?php
class Mobil {
    public $warna; 
    private $merk;
    protected $ukuran;

    public function _construct($warna, $merk, $ukuran) {
        $this->warna = $warna;
        $this->merk = $merk;
        $this->ukuran = $ukuran;
    }
    public function getMerk() {
        return $this->merk;
    }
}

$mobilBaru = new Mobil("Merah", "Toyoto", "Sedan");
echo "Warna mobil: " . $mobilBaru->warna;
?>