<?php 
class userModel extends baseModel{

    public function checkUser($taiKhoan,$matKhau){
        $sql = "SELECT * FROM nguoidung WHERE taiKhoan = '$taiKhoan' AND matKhau = '$matKhau'";
        $query = $this->_query($sql);
        return $query;
    }
    public function checkTaiKhoan($taiKhoan){
        $sql = "SELECT * FROM nguoidung WHERE taiKhoan = '$taiKhoan'";
        $query = $this->_query($sql);
        return $query;
    }
    public function checkPassword($matKhau){
        $sql = "SELECT * FROM nguoidung WHERE matKhau = '$matKhau'";
        $query = $this->_query($sql);
        return $query;
    }
    public function changePass($matKhauMoi,$maNguoiDung){
        $sql = "UPDATE nguoidung SET matKhau = '$matKhauMoi' WHERE maNguoiDung = '$maNguoiDung'";
        $query = $this->_query($sql);
        return $query;
    }
    public function register($tenNguoiDung,$email,$SDT,$diaChi,$taiKhoan,$matKhau){
        $sql = "INSERT INTO nguoidung (tenNguoiDung,email,SDT,diaChi,taiKhoan,matKhau)
        values ('$tenNguoiDung','$email','$SDT','$diaChi','$taiKhoan','$matKhau')";
        $query = $this->_query($sql);
        return $query;
    }
    public function inserInfo($tenNguoiDung,$email,$SDT,$diaChi){
        $sql = "INSERT INTO nguoidung (tenNguoiDung,email,SDT,diaChi)
        values ('$tenNguoiDung','$email','$SDT','$diaChi')";
        $query = $this->_query($sql);
        $maNguoiDung = mysqli_insert_id($this->conn);
        // echo '<prev>';
        // print_r($maNguoiDung);
        // die;
        return $maNguoiDung;
    }
    public function getAll(){
        $sql = "SELECT * FROM nguoidung";
        $query = $this->_query($sql);
        return $query;
    }
    public function getInfo(){
        $sql = "SELECT * FROM nguoidung WHERE maNguoiDung = ".$_SESSION['maNguoiDung'];
        $query = $this->_query($sql);
        return $query;
    }
    public function changeInfo($tenNguoiDung,$SDT,$email,$diaChi,$maNguoiDung){
        $sql = "UPDATE nguoidung set tenNguoiDung = '$tenNguoiDung', SDT = '$SDT', email = '$email', diaChi = '$diaChi' WHERE maNguoiDung = '$maNguoiDung'";
        $query = $this->_query($sql);
        return $query;
    }
}
?>