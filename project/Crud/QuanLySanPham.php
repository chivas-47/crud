<?php 
require_once 'SanPham.php';
require_once 'DienThoai.php';
require_once 'LapTop.php';
require_once 'Connect.php';
// var_dump($conn);

class QuanLySanPham
{   
    private $danhSachSanPham = [];

    // Thêm sản phẩm
    public function themSanPham(SanPham $sanPham)
    {
        echo "called here";
        echo var_dump($sanPham);

        $SP = [
            $sanPham->name,
            $sanPham->gia,
            $sanPham->image,
            $sanPham->danhmuc
        ];

        $sql = "INSERT INTO sanpham (name, gia, image, danhmuc) VALUES (?, ?, ?, ?)";
        try {
            global $conn;
            if (!$conn) {
                throw new Exception("Connection failed");
            }
            $stmt = $conn->prepare($sql);
            $stmt->execute($SP);
            return true; 
        } catch (\Exception $e) {
            var_dump($e);   
            return null;
        }
    }

    public function getDanhSachSanPham()
    {
        /**
         * 1 connect db
         * 2 tao cau query sql -> statement
         * 3 thuc thi cau query sql -> excute statement
         * 4 lay du lieu tra ve -> fetchAll
         */
        try {
            global $conn;
            if (!$conn) {
                throw new Exception("Connection failed");
            }
            $stmt = $conn->prepare("SELECT * FROM sanpham");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            return null;
        }
    }

    // Xóa sản phẩm theo ID
    public function xoaSanPham($id)
    {
        try {
            global $conn;
            if (!$conn) {
                throw new Exception("Connection failed");
            }
            $stmt = $conn->prepare("DELETE FROM sanpham WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->rowCount() > 0; // Check if a row was deleted
        } catch (\Exception $e) {
            return null;
        }
    }

    // Sửa thông tin sản phẩm
    public function suaSanPham($id, $tenMoi, $giaMoi)
    {
        for ($i = 0; $i < count($this->danhSachSanPham); $i++) {
            if ($this->danhSachSanPham[$i]->getId($id) == $id) {
                $this->danhSachSanPham[$i]->setTen($tenMoi);
                $this->danhSachSanPham[$i]->setGia($giaMoi);
                return;
            } else {
                echo "Không tìm thấy sản phẩm với ID: $id<br>";
            }
        }
    }

    // Tìm kiếm sản phẩm theo tên
    public function timKiemSanPham($ten)
    {
        $found = false;
        for ($i = 0; $i < count($this->danhSachSanPham); $i++) {
            if (stripos($this->danhSachSanPham[$i]->getTen(), $ten) !== false) {
                $this->danhSachSanPham[$i]->hienThi();
                $found = true;
            }
        }
        if (!$found) {
            echo "Không tìm thấy sản phẩm nào phù hợp với '$ten'.<br>";
        }
    }

    public function KTSanPhambyid($id)
    {
        for ($i = 0; $i < count($this->danhSachSanPham); $i++) {
            if ($this->danhSachSanPham[$i]->getId() == $id) {
                return true;
            }
        }
        return false;
    }

    public function getSanPhambyid($id)
    {
        /**
         * 1 connect db
         * 2 tao cau query sql -> statement
         * 3 thuc thi cau query sql -> excute statement
         * 4 lay du lieu tra ve -> fetchAll
         */
        try {
            global $conn;
            if (!$conn) {
                throw new Exception("Connection failed");
            }
            $stmt = $conn->prepare("SELECT * FROM sanpham where id = ?");
            $stmt->execute([$id]);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            return null;
        }
    }

    // Sắp xếp sản phẩm theo giá
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
