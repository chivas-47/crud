<?php
class SanPham {
    private $id;
    private $ten;
    private $gia;

    public function __construct($id, $ten, $gia) {
        $this->id = $id;
        $this->ten = $ten;
        $this->gia = $gia;
    }

    public function hienThi() {
        echo "ID: $this->id - Tên: $this->ten - Giá: $this->gia<br>";
    }

    public function getId() {
        return $this->id;
    }

    public function setTen($value) {
        $this->ten = $value;
    }
    
    public function getTen() {
        return $this->ten;
    }

    public function getGia() {
        return $this->gia;
    }

    public function setGia($gia) {
        $this->gia = $gia;
    }
}
?>
