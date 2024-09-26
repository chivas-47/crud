
<?php

// Lớp cơ bản SanPham
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
    function getId(){
         return $this->id ;
    }
    function setTen($value){
       return $this->ten=$value ;
    }
    
    function getTen(){
       return $this->ten ;
    }
    function getGia(){
     return $this->gia ;
    }
    function  setGia($gia){
      return  $this->gia= $gia;
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
        // foreach ($this->danhSachSanPham as $sanPham) {
        //     if ($sanPham->id == $id) {
        //         $sanPham->ten = $tenMoi;
        //         $sanPham->gia = $giaMoi;
        //         echo "Đã sửa sản phẩm ID: $id<br>";
        //         return;
        //     }
        // }
    for($i=0; $i < count($this->danhSachSanPham); $i++){
        // echo "id: $id<br>";
        // var_dump($this->danhSachSanPham[$i]->id);
       if ($this->danhSachSanPham[$i]->getId($id)==$id) {
        // $this->danhsachsanpham[$i]->getid($id);
        $this->danhSachSanPham[$i]->setTen($tenMoi);
        $this->danhSachSanPham[$i]->setGia($giaMoi);
        return;
    }else   { 
        echo "Không tìm thấy sản phẩm với ID  san: $id<br>";
    }
    }}
    // Tìm kiếm sản phẩm theo tên
    public function timKiemSanPham($ten) {
        // foreach ($this->danhSachSanPham as $sanPham) {
        //     if (stripos($sanPham->getTen, $ten) !== false) {
        //         $sanPham->hienThi();
        //     }
        // }
        

        for($i=0; $i <count($this->danhSachSanPham);$i++){
            if(strpos($this->danhSachSanPham[$i]->getTen(), $ten));
                $this->danhSachSanPham[$i]->hienThi();
                return;
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
        //    var_dump($sanPham);
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
echo "Danh sách sản phẩm `111:<br>";

// Sửa sản phẩ
echo "suasanpham";
$quanLySanPham->suaSanPham(1, "iPhone 15", 25000);
echo "hienThiDanhSach";
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
