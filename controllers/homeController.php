<?php
class homeController extends baseController{

    private $categoryModel;
    private $slideModel;
    private $productModel;
    public function __construct()
    {
        $this->loadModel('categoryModel');
        $this->categoryModel = new categoryModel;
        $this->loadModel('slideModel');
        $this->slideModel = new slideModel;
        $this->loadModel('productModel');
        $this->productModel = new productModel;
    }
    public function index(){
        unset($_SESSION['paid']);
        $slide = $this->slideModel->getAll();
        $category = $this->categoryModel->getAll();
        $spNoiBat = $this->productModel->homeSanPhamNoiBat();
        $spMoiNhat = $this->productModel->homeSanPhamMoiNhat();
        $spBanChay = $this->productModel->homeSanPhamBanChay();
        $spKhuyenMai = $this->productModel->homeSanPhamKhuyenMai();
        $this->loadview('home.index',[  
            'slide' => $slide,
            'category' => $category,
            'spNoiBat' => $spNoiBat,
            'spMoiNhat' => $spMoiNhat,
            'spBanChay' => $spBanChay,
            'spKhuyenMai' => $spKhuyenMai,
        ]);
    }
    public function search(){
        $txtErro = '';
        $txtSearch = '';
        if(isset($_POST['search'])){
            $search = $_POST['txtSearch'];
            if($search == ""){
                $txtErro = 'Vui lòng nhập từ khóa';
            }
            else{
                $array = explode(" ", $search);
                $str = "";
                foreach($array as $element){
                    if(!empty($element)){
                        $str .= "+". $element;
                    }
                }
                $txtSearch = $this->productModel->searchProduct($str);
                $count = mysqli_num_rows($txtSearch);
                if($count <= 0){
                    $txtErro = 'Không tìm thấy từ khóa : ' .$search;
                }
                else{
                    $txtErro = 'Tìm được với từ khóa: ' . $search;
                    $txtSearch = $this->productModel->searchProduct($str);
                }
            }
        }
        return $this->loadview('home.search',[
            'txtErro' => $txtErro,
            'txtSearch' => $txtSearch,
        ]);
    }

}
?>
