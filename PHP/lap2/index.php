<?php
require_once 'QuanLySanPham.php';

// Ví dụ sử dụng
$quanLySanPham = new QuanLySanPham();

// Thêm sản phẩm
$quanLySanPham->themSanPham(new DienThoai(1, "iPhone", 20000, "iOS"));
$quanLySanPham->themSanPham(new Laptop(2, "MacBook", 30000, "Intel i7"));

// Hiển thị danh sách sản phẩm
echo "Danh sách sản phẩm:<br>";
$quanLySanPham->hienThiDanhSach();

// Sửa sản phẩm
echo "Sửa sản phẩm:<br>";
$quanLySanPham->suaSanPham(1, "iPhone 15", 25000);

// Hiển thị danh sách sản phẩm sau khi sửa
echo "Danh sách sản phẩm sau khi sửa:<br>";
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
?>
