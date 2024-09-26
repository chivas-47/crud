<?php
require_once 'SanPham.php';
require_once 'DienThoai.php';
require_once 'LapTop.php';
 class QuanLiSanPham {
    private $themsanpham =[] ;// danh s ách sản phẩm  
    // thêm sản  phẩm 
    function  addsanpham(SanPham $sanPham) {
    $this->themsanpham[] = $sanPham;    
       
 }      
 //  // Hiển thị sản phẩm
   function  hienthisanpham(){
       foreach ($this->themsanpham as $sanpham) {
            $sanpham->xuatthongTin();

       }
   }
 //  sóa sản phẩm 
   function  deletebyname($name){
       foreach ( $this->themsanpham as $key => $item){
         if($item->getname() === $name){
            unset($this->themsanpham[$key]);
            echo "<br> Sản phẩm '$name' đã được xóa thành công <br>";
            // Sắp xếp lại chỉ số của mảng sau khi xóa
            $this->themsanpham = array_values($this->themsanpham);
            return true;
        }
    }
    $this->themsanpham = array_values($this->themsanpham);
}

 }
    //tạo đối  tượng  quản lí  sản phẩm 
    $QuanLiSanPham = new QuanLiSanPham();
    // thêm sản phẩm  vào danh  sách 
    $QuanLiSanPham->addsanpham(new DienThoai(' <br> iphone 16 promax', 'red', '512gb', 'blue '));
    $QuanLiSanPham->addsanpham(new DienThoai('<br>iphone 16 promax', 'red', '512gb', 'blue '));
    // hiển  thị  sản phẩm 
   echo "  <br> thêm sản  phẩm thành công  <br>";
   $QuanLiSanPham->hienThiSanPham();



   // Xóa sản phẩm theo tên
$QuanLiSanPham->deleteByName('iphone 16 promax');
// Hiển thị lại danh sách sản phẩm sau khi xóa
echo "<br> Danh sách sản phẩm sau khi xóa: <br>";
$QuanLiSanPham->hienthisanpham();

echo "<br> Danh sách sản phẩm sau khi xóa: <br>";
$QuanLiSanPham->hienthisanpham();
