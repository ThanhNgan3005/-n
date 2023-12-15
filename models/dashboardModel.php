<?php 
class dashboardModel extends baseModel{
    //dem so san pham theo tung dann muc
    public function countProCate(){
        $sql = "SELECT sp.tenSanPham, dm.tenDanhMuc,COUNT(dm.tenDanhMuc) as tong
        FROM sanpham sp, danhmuc dm
        WHERE sp.idDanhMuc = dm.idDanhMuc AND sp.hienThi = 1 GROUP BY dm.tenDanhMuc ORDER BY SUM(dm.tenDanhMuc)";
        $query = $this->_query($sql);
        return $query;
    }
    //dem thong ke loai hoa don
    public function countDHChoDuyet(){
        $sql = "SELECT *,COUNT(idDonhang) AS tong FROM donhang WHERE trangThai = 0";
        $query = $this->_query($sql);
        return $query;
    }
    public function countDHDaGiao(){
        $sql = "SELECT COUNT(idDonhang) AS tong FROM donhang WHERE trangThai = 1";
        $query = $this->_query($sql);
        return $query;
    }
    public function countDHHuy(){
        $sql = "SELECT COUNT(idDonhang) AS tong FROM donhang WHERE trangThai = 2";
        $query = $this->_query($sql);
        return $query;
    }

    public function tkTheoNam(){
        $sql = "SELECT *,sum(ct.tongTien) AS tong FROM donhang dh, chitietdonhang ct
        WHERE dh.idDonHang = ct.idDonHang AND dh.trangThai = 1
        GROUP BY year(ngayDat)";
         $query = $this->_query($sql);
         return $query;
    }
    public function tkTheoNgay(){    
        $sql = "SELECT DISTINCT dh.ngayDat,sum(ct.giaTien*ct.soLuong) as tong
        FROM donhang dh, chitietdonhang ct
        WHERE dh.idDonHang = ct.idDonHang AND dh.trangThai = 1
        GROUP BY date(dh.ngayDat)
        ORDER BY date(dh.ngayDat) ASC LIMIT 30 ";

        $query = $this->_query($sql);
        return $query;
    }
    public function tkTong(){
        $sql = "SELECT *,sum(ct.tongTien) AS tong FROM donhang dh, chitietdonhang ct
        WHERE dh.idDonHang = ct.idDonHang AND dh.trangThai = 1";
         $query = $this->_query($sql);
         return $query;
    }
    public function spDaBan(){
        $sql = "SELECT sum(ct.soLuong) as spBanDuoc FROM chitietdonhang ct, donhang dh
        WHERE dh.idDonHang = ct.idDonHang AND dh.trangThai = 1";
         $query = $this->_query($sql);
         return $query;
    }
    public function tongHoaDon(){
        $sql = "SELECT COUNT(idDonHang) as tong FROM donhang";
        $query = $this->_query($sql);
        return $query;
    }
}
?>