<?php

// Lớp cơ bản SanPham
class SanPham {
    public $id;
    public $ten;
    public $gia;

    public function __construct($id, $ten, $gia) {
        $this->id = $id;
        $this->ten = $ten;
        $this->gia = $gia;
    }

    public function hienThi() {
        echo "ID: $this->id - Tên: $this->ten - Giá: $this->gia<br>";
    }
}

// Lớp DienThoai kế thừa từ SanPham
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

// Lớp Laptop kế thừa từ SanPham
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

// Lớp quản lý danh sách sản phẩm
class QuanLySanPham {
    private $danhSachSanPham = [];

    // Thêm sản phẩm
    public function themSanPham(SanPham $sanPham) {
        $this->danhSachSanPham[] = $sanPham;
    }

    // Xóa sản phẩm theo ID
    public function xoaSanPham($id) {
        foreach ($this->danhSachSanPham as $key => $sanPham) {
            if ($sanPham->id == $id) {
                unset($this->danhSachSanPham[$key]);
                echo "Đã xóa sản phẩm ID: $id<br>";
                return;
            }
        }
        echo "Không tìm thấy sản phẩm với ID: $id<br>";
    }

    // Sửa thông tin sản phẩm
    public function suaSanPham($id, $tenMoi, $giaMoi) {
        foreach ($this->danhSachSanPham as $sanPham) {
            if ($sanPham->id == $id) {
                $sanPham->ten = $tenMoi;
                $sanPham->gia = $giaMoi;
                echo "Đã sửa sản phẩm ID: $id<br>";
                return;
            }
        }
        echo "Không tìm thấy sản phẩm với ID: $id<br>";
    }

    // Tìm kiếm sản phẩm theo tên
    public function timKiemSanPham($ten) {
        foreach ($this->danhSachSanPham as $sanPham) {
            if (stripos($sanPham->ten, $ten) !== false) {
                $sanPham->hienThi();
            }
        }
    }

    // Sắp xếp sản phẩm theo giá
    public function sapXepSanPham() {
        usort($this->danhSachSanPham, function ($a, $b) {
            return $a->gia - $b->gia;
        });
    }

    // Hiển thị danh sách sản phẩm
    public function hienThiDanhSach() {
        foreach ($this->danhSachSanPham as $sanPham) {
            $sanPham->hienThi();
            echo "<br>";
        }
    }
}

// Ví dụ sử dụng
$quanLySanPham = new QuanLySanPham();

// Thêm sản phẩm
$quanLySanPham->themSanPham(new DienThoai(1, "iPhone", 20000, "iOS"));
$quanLySanPham->themSanPham(new Laptop(2, "MacBook", 30000, "Intel i7"));

// Hiển thị danh sách sản phẩm
echo "Danh sách sản phẩm:<br>";
$quanLySanPham->hienThiDanhSach();

// Sửa sản phẩm
$quanLySanPham->suaSanPham(1, "iPhone 13", 25000);

// Tìm kiếm sản phẩm
echo "<br>Tìm kiếm sản phẩm có tên 'Mac':<br>";
$quanLySanPham->timKiemSanPham("Mac");

// Sắp xếp sản phẩm theo giá
echo "<br>Danh sách sản phẩm sau khi sắp xếp:<br>";
$quanLySanPham->sapXepSanPham();
$quanLySanPham->hienThiDanhSach();

// Xóa sản phẩm
$quanLySanPham->xoaSanPham(2);
echo "<br>Danh sách sản phẩm sau khi xóa:<br>";
$quanLySanPham->hienThiDanhSach();

?>
