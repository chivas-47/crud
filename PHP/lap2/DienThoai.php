<?php
require_once 'SanPham.php';

class DienThoai extends SanPham {
    public $heDieuHanh;

    public function __construct($id, $ten, $gia, $heDieuHanh) {
        parent::__construct($id, $ten, $gia);
        $this->heDieuHanh = $heDieuHanh;
    }

    public function hienThi() {
        parent::hienThi();
        echo "Hệ điều hành: $this->heDieuHanh<br>";
    }
}
?>
