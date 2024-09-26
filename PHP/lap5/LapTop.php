<?php
require_once 'SanPham.php';
 class LapTop extends SanPham {
    private $cpu;
    private $color;
    function __construct($name, $price, $cpu, $color) 
    {
        parent::__construct($name, $price );
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