<?php
include 'SanPham.php';
require_once 'DienThoai.php';
require_once 'Laptop.php';

class QuanLySanPham {
    private $danhSachSanPham = [];

    // Thêm sản phẩm
    public function themSanPham(SanPham $sanPham) {
        $this->danhSachSanPham[] = $sanPham;
    }

    // Xóa sản phẩm theo ID
    public function xoaSanPham($id) {
        foreach ($this->danhSachSanPham as $key => $sanPham) {
            if ($sanPham->getId() == $id) {
                unset($this->danhSachSanPham[$key]);
                echo "Đã xóa sản phẩm ID: $id<br>";
                return;
            }
        }
        echo "Không tìm thấy sản phẩm với ID: $id<br>";
    }

    // Sửa thông tin sản phẩm
    public function suaSanPham($id, $tenMoi, $giaMoi) {
        for ($i = 0; $i < count($this->danhSachSanPham); $i++) {
            if ($this->danhSachSanPham[$i]->getId() == $id) {
                $this->danhSachSanPham[$i]->setTen($tenMoi);
                $this->danhSachSanPham[$i]->setGia($giaMoi);
                echo "Đã sửa sản phẩm ID: $id<br>";
                return;
            }
        }
        echo "Không tìm thấy sản phẩm với ID: $id<br>";
    }

    // Tìm kiếm sản phẩm theo tên
    public function timKiemSanPham($ten) {
        foreach ($this->danhSachSanPham as $sanPham) {
            if (stripos($sanPham->getTen(), $ten) !== false) {
                $sanPham->hienThi();
            }
        }
    }

    // Sắp xếp sản phẩm theo giá
    public function sapXepSanPham() {
        usort($this->danhSachSanPham, function ($a, $b) {
            return $a->getGia() - $b->getGia();
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
?>
