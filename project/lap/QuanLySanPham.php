<?php
require_once 'SanPham.php';
require_once 'DienThoai.php';
require_once 'LapTop.php';

class QuanLySanPham
{
    private $danhSachSanPham = [];

    // Thêm sản phẩm
    public function themSanPham(SanPham $sanPham)
    {
        $this->danhSachSanPham[] = $sanPham;
    }

    public function getDanhSachSanPham()
    {
        return $this->danhSachSanPham;
    }

    // Xóa sản phẩm theo ID
    public function xoaSanPham($id)
    {
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
    public function suaSanPham($id, $tenMoi, $giaMoi)
    {
        foreach ($this->danhSachSanPham as $sanPham) {
            if ($sanPham->getId() == $id) {
                $sanPham->setTen($tenMoi);
                $sanPham->setGia($giaMoi);
                echo "Đã sửa sản phẩm ID: $id<br>";
                return;
            }
        }
        echo "Không tìm thấy sản phẩm với ID: $id<br>";
    }

    // Tìm kiếm sản phẩm theo tên
    public function timKiemSanPham($ten)
    {
        $found = false;
        foreach ($this->danhSachSanPham as $sanPham) {
            if (stripos($sanPham->getTen(), $ten) !== false) {
                $sanPham->hienThi();
                $found = true;
            }
        }
        if (!$found) {
            echo "Không tìm thấy sản phẩm nào phù hợp với '$ten'.<br>";
        }
    }

    public function KTSanPhambyid($id)
    {
        foreach ($this->danhSachSanPham as $sanPham) {
            if ($sanPham->getId() == $id) {
                return true;
            }
        }
        return false;
    }

    public function getSanPhambyid($id)
    {
        foreach ($this->danhSachSanPham as $sanPham) {
            if ($sanPham->getId() == $id) {
                return $sanPham;
            }
        }
        return null;
    }

    // Sắp xếp sản phẩm theo giá hoặc tên
    public function sapXepSanPham($tieuChi = 'gia')
    {
        if ($tieuChi == 'gia') {
            usort($this->danhSachSanPham, function ($a, $b) {
                return $a->getGia() - $b->getGia();
            });
        } elseif ($tieuChi == 'ten') {
            usort($this->danhSachSanPham, function ($a, $b) {
                return strcmp($a->getTen(), $b->getTen());
            });
        }
    }

    // Hiển thị danh sách sản phẩm
    public function hienThiDanhSach()
    {
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

// Sửa sản phẩm
$quanLySanPham->suaSanPham(1, "iPhone 15", 25000);
$quanLySanPham->hienThiDanhSach();

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
