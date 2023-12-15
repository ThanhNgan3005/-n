<?php 

class productController extends baseController
{
    private $productModel;
    private $categoryModel;
    public function __construct()
    {
        $this->loadModel('productModel');
        $this->productModel = new productModel;
        $this->loadModel('categoryModel');
        $this->categoryModel = new categoryModel;
    }
    // admin

    public function index(){
        if(!isset($_SESSION["taiKhoan"]) || $_SESSION['idQuyen'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }   
        $allProduct = $this->productModel->getAll();
        $category = $this->categoryModel->getAll();
        $count = 10;
        if(!isset($_GET['page'])){
            $page = 1;
        }
        else{
            $page = $_GET['page'];
        }
        $begin = ($page - 1)*$count;
        $sort = '';
        $allSortCategory = '';
        if(isset($_GET['sort'])){
            $sort = $_GET['sort'];
            $allSortCategory = $this->productModel->allSortCategory($sort);
            $pageProduct = $this->productModel->sortCategory($sort,$begin,$count);
        }
        else{
            $pageProduct = $this->productModel->pageProduct($begin,$count);
        }     
        return $this->loadview('products.index',[
            'allProduct' => $allProduct,
            'pageProduct' => $pageProduct,
            'category' => $category,
            'page' => $page,
            'sort' => $sort,
            'allSortCategory' => $allSortCategory,
        ]);
    }
    public function proDeleted(){
        if(!isset($_SESSION["taiKhoan"]) || $_SESSION['idQuyen'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        } 
        $allProduct = $this->productModel->getAllProDeleted();
        $category = $this->categoryModel->getAll();
        $count = 10;
        if(!isset($_GET['page'])){
            $page = 1;
        }
        else{
            $page = $_GET['page'];
        }
        $begin = ($page - 1)*$count;
        $sort = '';
        $allSortCategory = '';
        if(isset($_GET['sort'])){
            $sort = $_GET['sort'];
            $allSortCategory = $this->productModel->allSortCategoryDeleted($sort);
            $pageProduct = $this->productModel->sortCategoryDeleted($sort,$begin,$count);
        }
        else{
            $pageProduct = $this->productModel->pageProductDeleted($begin,$count);
        }     
        return $this->loadview('products.proDeleted',[
            'allProduct' => $allProduct,
            'category' => $category,
            'pageProduct' => $pageProduct,
            'page' => $page,
            'sort' => $sort,
            'allSortCategory' => $allSortCategory,
        ]);
    }
    public function changeDisplay(){   
        $id = $_GET['id'];
        $hienThi = $_GET['hienThi'];
        $change = $this->productModel->changeDisplay($hienThi,$id);
        echo "<script>window.location.href='?controller=product'</script>";   
    }

    public function detail(){
        if(!isset($_SESSION["taiKhoan"]) || $_SESSION['idQuyen'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }   
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $product = $this->productModel->getId($id);
        }
        return $this->loadview('products.detail',[
            'product' => $product,
        ]);
    }
    public function delete(){
        if(!isset($_SESSION["taiKhoan"]) || $_SESSION['idQuyen'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }   
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $product = $this->productModel->delete($id);
            echo "<script>window.location.href='?controller=product&action=proDeleted'</script>";
        }
        // return $this->loadview('categories.index');
    }
    public function insert(){
        if(!isset($_SESSION["taiKhoan"]) || $_SESSION['idQuyen'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }   
        $category = $this->categoryModel->getAll();
        if(isset($_POST['them'])){
            $idDanhMuc = $_POST['idDanhMuc'];
            $tenSanPham = $_POST['tenSanPham'];
            $gia = str_replace('.','',$_POST['gia']);
            $khuyenMai = $_POST['khuyenMai'];
            $hinhAnh = $_POST['hinhAnh'];
            $moTa = $_POST['moTa'];
            $noiBat = $_POST['noiBat'];
            $product = $this->productModel->insert($idDanhMuc,$tenSanPham,$gia,$khuyenMai,$hinhAnh,$moTa,$noiBat);
            echo "<script>window.location.href='?controller=product'</script>";
        }
        return $this->loadview('products.insert',[
            'category' => $category,
        ]);
    }
    public function update(){
        if(!isset($_SESSION["taiKhoan"]) || $_SESSION['idQuyen'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }   
        $category = $this->categoryModel->getAll();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $product = $this->productModel->getId($id);
            if(isset($_POST['sua'])){
                $idDanhMuc = $_POST['idDanhMuc'];
                $tenSanPham = $_POST['tenSanPham'];
                $gia = str_replace('.','',$_POST['gia']);
                $khuyenMai = $_POST['khuyenMai'];
                $hinhAnh = $_POST['hinhAnh'];
                $moTa = $_POST['moTa'];
                $noiBat = $_POST['noiBat'];
                $idSanPham = $_POST['idSanPham'];
                $updateProduct = $this->productModel->update($idDanhMuc,$tenSanPham,$gia,$khuyenMai,$hinhAnh,$moTa,$noiBat,$idSanPham);
                echo "<script>window.location.href='?controller=product'</script>";
        }
    }
        return $this->loadview('products.update',[
            'product' => $product,
            'category' => $category,
        ]);
    }
    public function search(){
        if(!isset($_SESSION["taiKhoan"]) || $_SESSION['idQuyen'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }   
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
        return $this->loadview('products.search',[
            'txtErro' => $txtErro,
            'txtSearch' => $txtSearch,
        ]);
    }


    // trang user
    public function show(){
        $category = $this->categoryModel->getAll();
        $count = 8;
        if(!isset($_GET['page'])){
            $page = 1;
        }
        else{
            $page = $_GET['page'];
        }
        $begin = ($page - 1)*$count;
        $sort = '';
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $allProduct = $this->productModel->allSortCategory($id);
            if(isset($_GET['sort'])){
                $sort = $_GET['sort'];
                switch($sort){
                    case 'giamDan':
                        $product = $this->productModel->sortGiaGiamDan($id,$begin,$count);
                        break;
                    case 'tangDan':
                        $product = $this->productModel->sortGiaTangDan($id,$begin,$count);
                        break;
                    case 'noiBat':
                        $product = $this->productModel->sortNoiBat($id,$begin,$count);
                        break;
                    case 'banChay':
                        $product = $this->productModel->sortBanChay($id,$begin,$count);
                        break;
                    default:
                        break;
                }
            }else{
                $product = $this->productModel->pageProductShow($id,$begin,$count);
            }
           
        }
        return $this->loadview('products.show',[
            'allProduct' => $allProduct,
            'category' => $category,
            'product' => $product,
            'page' => $page,
            'sort' => $sort,
        ]);
    }
    public function showDetail(){
        $category = $this->categoryModel->getAll();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $product = $this->productModel->getId($id);
        }
        return $this->loadview('products.showDetail',[
            'product' => $product,
            'category' => $category,
        ]);
    }
    
}
?>