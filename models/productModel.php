<?php 
class productModel extends baseModel{

    public function getAll(){
        $sql = "SELECT * FROM sanpham sp, danhmuc dm WHERE sp.idDanhMuc = dm.idDanhMuc AND sp.hienThi = 1";
        $query = $this->_query($sql);
        return $query;
    }
    public function pageProduct($begin,$count){
        $sql = "SELECT * FROM danhmuc dm, sanpham sp  WHERE sp.idDanhMuc = dm.idDanhMuc AND sp.hienThi = 1 ORDER BY idSanPham DESC LIMIT $begin,$count";
        $query = $this->_query($sql);
        return $query;
    }

    public function getAllProDeleted(){
        $sql = "SELECT * FROM sanpham sp, danhmuc dm WHERE sp.idDanhMuc = dm.idDanhMuc AND sp.hienThi = 0";
        $query = $this->_query($sql);
        return $query;
    }
    public function changeDisplay($hienThi,$idSanPham){
        $sql = "UPDATE sanpham SET hienThi = $hienThi WHERE idSanPham = $idSanPham ";
        if(isset($_SESSION["taiKhoan"]) || $_SESSION['idQuyen'] == 1){
            $query = $this->_query($sql);
            return $query;
        }   
    }
    public function pageProductDeleted($begin,$count){
        $sql = "SELECT * FROM danhmuc dm, sanpham sp  WHERE sp.idDanhMuc = dm.idDanhMuc AND sp.hienThi = 0 ORDER BY idSanPham DESC LIMIT $begin,$count ";
        $query = $this->_query($sql);
        return $query;
    }

    public function getId($id){
        $sql = "SELECT * FROM sanpham sp, danhmuc dm WHERE sp.idDanhMuc = dm.idDanhmuc AND idSanPham = $id";
        $query = $this->_query($sql);
        return $query;
    }
    public function delete($id){
       $sql = "DELETE  FROM sanpham WHERE idSanPham = $id";
       if(isset($_SESSION["taiKhoan"]) && $_SESSION['idQuyen'] == 1){
            $query = $this->_query($sql);
            return $query;
        }  
    }
    public function insert($idDanhMuc,$tenSanPham,$gia,$khuyenMai,$hinhAnh,$moTa,$noiBat){
        $sql = "INSERT INTO sanpham (idDanhMuc,tenSanPham,gia,KhuyenMai,hinhAnh,moTa,noiBat)
        values ('$idDanhMuc','$tenSanPham','$gia','$khuyenMai','$hinhAnh','$moTa','$noiBat')";
        $query = $this->_query($sql);
        return $query;
    }
    public function update($idDanhMuc,$tenSanPham,$gia,$khuyenMai,$hinhAnh,$moTa,$noiBat,$idSanPham){
        $sql = "UPDATE sanpham SET idDanhMuc = '$idDanhMuc',tenSanPham = '$tenSanPham',gia = '$gia',KhuyenMai = '$khuyenMai',
        hinhAnh = '$hinhAnh',moTa = '$moTa',noiBat = '$noiBat' WHERE idSanPham = '$idSanPham'";
        // echo $sql;
        // die;
        $query = $this->_query($sql);
        return $query;
    }
    public function sortCategory($sort,$begin,$count){
        $sql = "SELECT * FROM sanpham sp, danhmuc dm WHERE sp.idDanhMuc = dm.idDanhMuc AND sp.hienThi = 1 AND dm.idDanhMuc = $sort ORDER BY sp.idSanPham DESC LIMIT $begin,$count";
        $query = $this->_query($sql);
        return $query;
    }
    public function sortCategoryDeleted($sort,$begin,$count){
        $sql = "SELECT * FROM sanpham sp, danhmuc dm WHERE sp.idDanhMuc = dm.idDanhMuc AND sp.hienThi = 0 AND dm.idDanhMuc = $sort ORDER BY sp.idSanPham DESC LIMIT $begin,$count";
        $query = $this->_query($sql);
        return $query;
    }
    public function allSortCategory($id){
        $sql = "SELECT * FROM sanpham sp, danhmuc dm WHERE sp.idDanhMuc = dm.idDanhMuc AND sp.hienThi = 1 AND dm.idDanhMuc = $id";
        $query = $this->_query($sql);
        return $query;
    }
    public function allSortCategoryDeleted($id){
        $sql = "SELECT * FROM sanpham sp, danhmuc dm WHERE sp.idDanhMuc = dm.idDanhMuc AND sp.hienThi = 0 AND dm.idDanhMuc = $id";
        $query = $this->_query($sql);
        return $query;
    }
    public function searchProduct($str){
        $sql = "SELECT * FROM sanpham sp, danhmuc dm WHERE sp.idDanhMuc = dm.idDanhMuc AND sp.hienThi=1 AND MATCH(tenSanPham) against('$str' IN BOOLEAN mode)";
        $query = $this->_query($sql);
        return $query;
    }
    public function pageProductShow($idDanhMuc,$begin,$count){
        $sql = "SELECT * FROM sanpham sp, danhmuc dm WHERE sp.idDanhMuc = dm.idDanhMuc AND sp.hienThi = 1 AND sp.idDanhMuc = '$idDanhMuc'
        order by sp.idSanPham DESC LIMIT $begin,$count";
        $query = $this->_query($sql);
        return $query;
    }
    public function sortGiaGiamDan($idDanhMuc,$begin,$count){
        $sql = "SELECT * FROM sanpham sp, danhmuc dm WHERE sp.idDanhMuc = dm.idDanhMuc AND sp.hienThi = 1 AND sp.idDanhMuc = '$idDanhMuc'
        order by sp.gia DESC LIMIT $begin,$count";
        $query = $this->_query($sql);
        return $query;
    }
    public function sortGiaTangDan($idDanhMuc,$begin,$count){
        $sql = "SELECT * FROM sanpham sp, danhmuc dm WHERE sp.idDanhMuc = dm.idDanhMuc AND sp.hienThi = 1 AND sp.idDanhMuc = '$idDanhMuc'
        order by sp.gia ASC LIMIT $begin,$count";
        $query = $this->_query($sql);
        return $query;
    }
    public function sortNoiBat($idDanhMuc,$begin,$count){
        $sql = "SELECT * FROM sanpham sp, danhmuc dm WHERE sp.idDanhMuc = dm.idDanhMuc AND sp.hienThi = 1 AND sp.idDanhMuc = '$idDanhMuc'
        order by sp.noiBat DESC LIMIT $begin,$count";
        $query = $this->_query($sql);
        return $query;
    }
    public function sortBanChay($idDanhMuc,$begin,$count){
        $sql = "SELECT *,sum(ct.soLuong) FROM donhang dh, chitietdonhang ct, sanpham sp, danhmuc dm
        WHERE dh.idDonHang = ct.idDonHang AND ct.idSanPham = sp.idSanPham AND sp.idDanhMuc = dm.idDanhMuc AND sp.idDanhMuc = '$idDanhMuc' AND dh.trangThai = 1 AND sp.hienThi = 1
        GROUP BY sp.idSanPham ORDER BY sum(ct.soLuong) DESC LIMIT $begin,$count";
        $query = $this->_query($sql);
        return $query;
    }

    //ở ngoài trang chủ
    public function homeSanPhamNoiBat(){
        $sql = "SELECT * FROM sanpham where noiBat = 1 AND hienThi = 1 ORDER BY idSanPham DESC limit 4";
        $query = $this->_query($sql);
        return $query;
    }
    public function homeSanPhamMoiNhat(){
        $sql = "SELECT * FROM sanpham where hienThi = 1 ORDER BY idSanPham DESC limit 4";
        $query = $this->_query($sql);
        return $query;
    }
    public function homeSanPhamKhuyenMai(){
        $sql = "SELECT * FROM sanpham where khuyenMai >= 1 AND hienThi = 1 ORDER BY khuyenMai DESC limit 4";
        $query = $this->_query($sql);
        return $query;
    }
    public function homeSanPhamBanChay(){
        $sql = "SELECT *, SUM(ct.soLuong) FROM donhang dh, chitietdonhang ct, sanpham sp
        WHERE dh.idDonHang = ct.idDonHang AND ct.idSanPham = sp.idSanPham AND dh.trangThai = 1 AND sp.hienThi = 1 
        GROUP BY sp.idSanPham ORDER BY sum(ct.soLuong) DESC LIMIT 4";
        $query = $this->_query($sql);
        return $query;
    }
    
}
?>
