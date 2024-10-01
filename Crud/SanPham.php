<?php

// Lớp cơ bản SanPham
class SanPham
{
    public $id;
    public $name;
    public $gia;
    public $mota;
    public $image;
    public $danhmuc;

    public function __construct($id, $name, $gia)
    {
        $this->id = $id;
        $this->name = $name;
        $this->gia = $gia;
    }

    public function hienThi()
    {
        echo "ID: $this->id - Tên: $this->name - Giá: $this->gia<br>";
    }
    function getId()
    {
        return $this->id;
    }
    function setname($value)
    {
        return $this->name = $value;
    }

    function getname()
    {
        return $this->name;
    }
    function getGia()
    {
        return $this->gia;
    }
    function  setGia($gia)
    {
        return  $this->gia = $gia;
    }
}
