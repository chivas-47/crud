<?php
// Lớp SanPham đại diện cho một sản phẩm
class SanPham {
    public $id;
    public $name;
    public $price;
    public $description;
    public $image;

    // Hàm khởi tạo cho sản phẩm, nhận vào các thông tin như id, tên, giá, mô tả, và hình ảnh
    public function __construct($id, $name, $price, $description, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
    }
    

    // Setter cho ID
    public function setID($id) {
        $this->id = $id;
    }

    // Getter cho ID
    public function getID() {
        return $this->id;
    }

    // Setter cho Tên
    public function setName($name) {
        $this->name = $name;
    }

    // Getter cho Tên
    public function getName() {
        return $this->name;
    }

    // Setter cho Giá
    public function setPrice($price) {
        $this->price = $price;
    }

    // Getter cho Giá
    public function getPrice() {
        return $this->price;
    }

    // Setter cho Mô tả
    public function setDescription($description) {
        $this->description = $description;
    }

    // Getter cho Mô tả
    public function getDescription() {
        return $this->description;
    }

    // Setter cho Hình ảnh
    public function setImage($image) {
        $this->image = $image;
    }

    // Getter cho Hình ảnh
    public function getImage() {
        return $this->image;
    }

    // Phương thức hiển thị thông tin sản phẩm
    public function hienthithongtin() {
        echo "ID: " . $this->id . "<br>";
        echo "Tên sản phẩm: " . $this->name . "<br>";
        echo "Giá: " . $this->price . "<br>";
        echo "Mô tả: " . $this->description . "<br>";
        echo "Hình ảnh: " . $this->image . "<br>";
    }
}

// Tạo đối tượng SanPham và hiển thị thông tin sản phẩm
$SanPham = new SanPham('1', 'iPhone 11', '14tr', 'Sản phẩm hot', 'image.jpg');
$SanPham->hienthithongtin();

// Lớp Themthongtin để quản lý thông tin bổ sung
class Themthongtin {
    private $new = [];

    // Hàm khởi tạo nhận vào mảng chứa thông tin mới
    public function __construct($new = []) {
        // Kiểm tra nếu $new là chuỗi thì chuyển thành mảng
        $this->new = $new;
    }

    // Phương thức hiển thị thông tin mới
    public function hienthinew() {
        foreach ($this->new as $item) {
            echo $item . "<br>";
        }
    }
}

// Tạo đối tượng Themthongtin và hiển thị thông tin bổ sung
echo " <br>theem thông  tin  mới  <br>";
$Themthongtin = new Themthongtin(['IP 16 promax']);
$Themthongtin->hienthinew();
?>
