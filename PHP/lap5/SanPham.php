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