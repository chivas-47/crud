<?php
require_once 'SanPham.php';
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