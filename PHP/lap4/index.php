<?php 
 class  SanPham {
     private $name;
     private $price;

     function __construct($name, $price){
        $this->name= $name;
        $this->price= $price;
     }
     function getName(){
         return $this->name;
     }
     function setName($name){
         $this->name= $name;
     }
     function getPrice(){
         return $this->price;
     }
     function setPrice($price){
         $this->price= $price;
     }
     function xuatthongtin(){
      echo   $this->name;
      echo   $this->price;
     }
    }
//   $MySanPham= new  SanPham('laptop',' 14');
//   $MySanPham->xuatthongtin();
class DienThoai extends SanPham{
    private $iphone;
    private $samsung;
     function __construct($name, $price,$iphone,$samsung)
     {
        parent::__construct($name, $price);
        $this->iphone = $iphone;
        $this->samsung = $samsung;
     }
     function setIphone($iphone){
        $this->iphone = $iphone;
     }
     function getIphone(){
        return $this->iphone;
     }
     function setSamsung($samsung){
        $this->samsung = $samsung;
     }
     function getSamsung(){
        return $this->samsung;
     }
     function xuatthongtin(){
        parent::xuatthongtin();
     echo    $this->iphone;
     echo    $this->samsung;
 }
}   
    $DienThoai=new DienThoai('lattop','14','ip16','samsung s21');
    $DienThoai->xuatthongtin();

 class LapTop extends SanPham {
    private $cpu;
    private $color;
    function __construct($name, $price, $cpu, $color) 
    {
        parent::__construct($name, $price, );
        $this->cpu = $cpu;
        $this->color = $color;
    }
    function setcpu($cpu){
        $this->cpu = $cpu;
    }
    function getcpu(){
        return $this->cpu;
    }
    function setcolor($color){
        $this->color = $color;
    }
    function getcolor(){
        return $this->color;
    }
    function xuatthongtin(){
     parent::xuatthongtin();
    echo     $this->cpu ;
      echo   $this->color;
    }

 }
 $LapTop = new LapTop('lattop','dienthoai','inter','blue');
 $LapTop->xuatthongtin();



 class QuanLiSanPham {
    private $themsanpham =[] ;// danh s ách sản phẩm  
    // thêm sản  phẩm 
    function  addsanpham(SanPham $sanPham) {
    $this->themsanpham[] = $sanPham;    
       
 }      
 //  // Hiển thị sản phẩm
   function  hienthisanpham(){
       foreach ($this->themsanpham as $sanpham) {
            $sanpham->xuatThongTin();

       }
   }

   function  delete(SanPham $sanPham){
      
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

