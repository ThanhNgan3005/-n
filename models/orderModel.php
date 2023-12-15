<?php 
class orderModel extends baseModel{
    public function searchOrder($idDonHang){
        $sql = "SELECT * FROM donhang dh, nguoidung nd
        WHERE dh.maNguoiDung = nd.maNguoiDung AND dh.idDonHang = '$idDonHang'";
        $query = $this->_query($sql);
        return $query;
    }
    public function insertOrder($maNguoiDung,$ghichu){
        $sql = "INSERT INTO donhang (maNguoiDung,ghiChu) VALUES ('$maNguoiDung','$ghichu')";
        $query = $this->_query($sql);
        $idDonhang = mysqli_insert_id($this->conn);
        // echo $idDonhang;
        // die;
        return $idDonhang;
    }
    public function insertOrderDetail($idDonhang,$idSanPham,$gia,$soLuong,$tongTien){
        $sql = "INSERT INTO chitietdonhang (idDonHang,idSanPham,giaTien,soLuong,tongTien)  VALUES ('$idDonhang','$idSanPham','$gia','$soLuong','$tongTien')";
        $query = $this->_query($sql);
        return $query;
    }
    public function getIdOrDerDesc1(){
        $sql = "SELECT * FROM donhang dh, sanpham sp, nguoidung nd, chitietdonhang ct
        WHERE dh.idDonHang = ct.idDonHang AND dh.maNguoiDung = nd.maNguoiDung
        AND ct.idSanPham = sp.idSanPham ORDER BY dh.idDonHang DESC LIMIT 1";
        $query = $this->_query($sql);
        return $query;      
    }
    public function insertMomo($partnerCode,$orderId,$requestId,$amount,$orderInfo,$orderType,$transId,$payType,$signature){
        $sql = "INSERT INTO momo (partnerCode,orderId,requestId,amount,orderInfo,orderType,transId,payType,signature)  VALUES ('$partnerCode','$orderId','$requestId','$amount','$orderInfo','$orderType','$transId','$payType','$signature')";
        // die;
        $query = $this->_query($sql);
        return $query;
    }
    public function getAll(){
        $sql = "SELECT * FROM donhang dh, nguoidung nd WHERE dh.maNguoiDung = nd.maNguoiDung ";
        $query = $this->_query($sql);
        return $query;
    }
    public function getAllPage($begin,$count){
        $sql = "SELECT * FROM donhang dh, nguoidung nd WHERE dh.maNguoiDung = nd.maNguoiDung ORDER BY dh.idDonHang DESC LIMIT $begin,$count ";
        $query = $this->_query($sql);
        return $query;
    }
    public function confirmOrder($trangThai,$idDonHang){
        $sql = "UPDATE donhang SET trangThai = $trangThai WHERE idDonHang = $idDonHang ";
        if(isset($_SESSION["taiKhoan"]) || $_SESSION['idQuyen'] == 1){
            $query = $this->_query($sql);
            return $query;
        }   
    }
    public function getDetail($idDonHang){
        $sql = "SELECT * FROM donhang dh, nguoidung nd, chitietdonhang ct, sanpham sp 
        WHERE dh.maNguoiDung = nd.maNguoiDung AND dh.idDonHang = ct.idDonHang AND ct.idSanPham = sp.idSanPham
        AND dh.idDonHang = $idDonHang ";
        $query = $this->_query($sql);
        return $query;
    }
    public function getDHHuy($sort,$begin,$count){
        $sql = "SELECT * FROM donhang dh, nguoidung nd WHERE dh.maNguoiDung = nd.maNguoiDung AND dh.trangThai=$sort ORDER BY dh.idDonHang DESC LIMIT $begin,$count";
        $query = $this->_query($sql);
        return $query;
    }
    public function getDHDaGiao($sort,$begin,$count){
        $sql = "SELECT * FROM donhang dh, nguoidung nd WHERE dh.maNguoiDung = nd.maNguoiDung AND dh.trangThai=$sort ORDER BY dh.idDonHang DESC LIMIT $begin,$count ";
        $query = $this->_query($sql);
        return $query;
    }
    public function getDHChoDuyet($sort,$begin,$count){
        $sql = "SELECT * FROM donhang dh, nguoidung nd WHERE dh.maNguoiDung = nd.maNguoiDung AND dh.trangThai=$sort ORDER BY dh.idDonHang DESC LIMIT $begin,$count ";
        $query = $this->_query($sql);
        return $query;
    } 
    public function countOrderSort($sort){
        $sql = "SELECT * FROM donhang dh, nguoidung nd WHERE dh.maNguoiDung = nd.maNguoiDung AND dh.trangThai=$sort ORDER BY dh.idDonHang DESC";
        $query = $this->_query($sql);
        return $query;
    } 
    public function layAllDHTHEOND($maNguoiDung){
        $sql = "SELECT * FROM donhang dh, chitietdonhang ct, sanpham sp, nguoidung nd
        WHERE dh.maNguoiDung = nd.maNguoiDung AND
        dh.idDonHang = ct.idDonHang AND
        ct.idSanPham = sp.idSanPham AND nd.maNguoiDung = '$maNguoiDung'";
        $query = $this->_query($sql);
        return $query;
    }
    public function layDHTHEOND($maNguoiDung,$begin,$count){
        $sql = "SELECT * FROM donhang dh, chitietdonhang ct, sanpham sp, nguoidung nd
        WHERE dh.maNguoiDung = nd.maNguoiDung AND
        dh.idDonHang = ct.idDonHang AND
        ct.idSanPham = sp.idSanPham AND nd.maNguoiDung = '$maNguoiDung' 
        ORDER BY dh.idDonHang DESC LIMIT $begin,$count";
        $query = $this->_query($sql);
        return $query;
    }
    public function getNewID($idDonHang){
        $sql = "SELECT * FROM donhang dh, sanpham sp, nguoidung nd, chitietdonhang ct
        WHERE dh.idDonHang = ct.idDonHang AND dh.maNguoiDung = nd.maNguoiDung
        AND ct.idSanPham = sp.idSanPham  AND dh.idDonHang = $idDonHang";
        // echo $sql;
        // die;
        $query = $this->_query($sql);
        return $query;      
    }
    // public function getNewIdOrderDetailOrder($idDonHang){
    //     $sql = "SELECT * FROM sanpham sp, chitietdonhang ct
    //     WHERE  ct.idSanPham = sp.idSanPham  AND ct.idDonHang = $idDonHang";
    //     // echo $sql;
    //     // die;
    //     $query = $this->_query($sql);
    //     return $query;      
    // }

}
?>