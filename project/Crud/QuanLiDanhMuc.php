<?php 
class QuanLiDanhMuc{
    private $id;
    private $lattop;
    private $dienthoai;

    public function __construct($id, $lattop, $dienthoai){
        $this->id = $id;
        $this->lattop = $lattop;
        $this->dienthoai = $dienthoai;
    }
    public function  setid($id){
        $this->id = $id;
    }
    public function  getid(){
        return $this->id;
    }
    public function  setlattop($lattop){
        $this->lattop = $lattop;
    }
    public function  getlattop(){
        return $this->lattop;
    }
    public function  setdienthoai($dienthoai){
        $this->dienthoai = $dienthoai;
    }
    public function  getdienthoai(){
        return $this->dienthoai;
    }
}