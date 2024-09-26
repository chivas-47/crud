<?php 
class SanPham {
    private $name;
    private $price;

    function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function getName() {
        return $this->name;
    }

    function getPrice() {
        return $this->price;
    }

    function xuatThongTin() {
        echo "Tên sản phẩm: " . $this->name . "<br>";
        echo "Giá: " . $this->price . "<br>";
    }
}

class QuanLiSanPham {
    private $dsSanPham = array();

    // Thêm sản phẩm
    function themSanPham($sanPham) {
        $this->dsSanPham[] = $sanPham;
    }

    // Xóa sản phẩm theo tên
    function xoaSanPham($name) {
        foreach ($this->dsSanPham as $key => $sanPham) {
            if ($sanPham->getName() === $name) {
                unset($this->dsSanPham[$key]);
                echo "Đã xóa sản phẩm: $name<br>";
                return;
            }
        }
        echo "Sản phẩm không tồn tại: $name<br>";
    }

    // Hiển thị tất cả sản phẩm
    function hienThiSanPham() {
        if (empty($this->dsSanPham)) {
            echo "Danh sách sản phẩm trống.<br>";
        } else {
            foreach ($this->dsSanPham as $sanPham) {
                $sanPham->xuatThongTin();
            }
        }
    }
}

// Khởi tạo sản phẩm
$iphone = new SanPham('iPhone', '15tr');
$samsung = new SanPham('Samsung', '12tr');

// Quản lý sản phẩm
$quanLi = new QuanLiSanPham();
$quanLi->themSanPham($iphone);
$quanLi->themSanPham($samsung);

// Hiển thị sản phẩm
echo "Danh sách sản phẩm:<br>";
$quanLi->hienThiSanPham();

// Xóa sản phẩm
$quanLi->xoaSanPham('Samsung');

// Hiển thị lại danh sách sản phẩm sau khi xóa
echo "<br>Danh sách sản phẩm sau khi xóa:<br>";
$quanLi->hienThiSanPham();





// class QuanLiSanPham {
//    private $dsSanPham = array();

//    // Thêm sản phẩm
//    function adsanpham($sanPham) {
//        $this->dsSanPham[] = $sanPham;
//    }

//    // Hiển thị tất cả sản phẩm
//    function hienThiSanPham() {
//        if (empty($this->dsSanPham)) {
//            echo "Danh sách sản phẩm trống.<br>";
//        } else {
//            foreach ($this->dsSanPham as $sanPham) {
//                $sanPham->xuatThongTin();
//            }
//      }
//  }
//  }
//  // tạo  đói   tượng quản lí  sản  phẩm 
//  $QuanliSanpham= new QuanliSanpham();
//  $QuanliSanpham->adsanpham(new SanPham("iPhone", "15tr"));
//  $QuanliSanpham->adsanpham(new SanPham("Samsung", "12tr"));
//  $QuanliSanpham->hienThiSanPham();
// echo $sanpham;
// ?>
