<?php
class dashboardController extends baseController{

    private $dashboardModel;
    public function __construct()
    {
        $this ->loadModel('dashboardModel');
        $this->dashboardModel = new dashboardModel;
       
    }
    public function index(){
        if(!isset($_SESSION["taiKhoan"]) || $_SESSION['idQuyen'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        } 
        $countProCate = $this->dashboardModel->countProCate();
        $countChoDuyet = $this->dashboardModel->countDHChoDuyet();
        $countDaGiao = $this->dashboardModel->countDHDaGiao();
        $countDaHuy = $this->dashboardModel->countDHHuy();
        $tkDoanhThu = $this->dashboardModel->tkTheoNam();
        $tkTongDoanhThu = $this->dashboardModel->tkTong();
        $tkSanPham = $this->dashboardModel->spDaBan();
        $tongHoaDon = $this->dashboardModel->tongHoaDon();
        $sort = '';
        if(isset($_GET['sort']) && $_GET['sort'] == 'tkNgay'){
            $tkDoanhThu = $this->dashboardModel->tkTheoNgay();
            $sort = 'theo ngày';
        }
        else{
            $tkDoanhThu = $this->dashboardModel->tkTheoNam();
            $sort = 'theo năm';
        }
        
        return $this->loadview('dashboards.index',[
            'countProCate' => $countProCate,
            'countChoDuyet' => $countChoDuyet,
            'countDaGiao' => $countDaGiao,
            'countDaHuy' => $countDaHuy,
            'tkDoanhThu' => $tkDoanhThu,
            'tkTongDoanhThu' => $tkTongDoanhThu,
            'sort' => $sort,
            'tkSanPham' => $tkSanPham,
            'tongHoaDon' => $tongHoaDon,
        ]);
    }
}
?>