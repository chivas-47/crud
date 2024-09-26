<?php
include 'SanPham.php';

class Laptop extends SanPham {
    public $cpu;

    public function __construct($id, $ten, $gia, $cpu) {
        parent::__construct($id, $ten, $gia);
        $this->cpu = $cpu;
    }

    public function hienThi() {
        parent::hienThi();
        echo "CPU: $this->cpu<br>";
    }
}
?>
