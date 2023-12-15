<?php
class categoryController extends baseController{

    private $categoryModel;
    public function __construct()
    {
        $this->loadModel('categoryModel');
        $this->categoryModel = new categoryModel;
    }
    public function index(){
        if(!isset($_SESSION["taiKhoan"]) || $_SESSION['idQuyen'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        } 
        $count = 10;
        if(!isset($_GET['page'])){
            $page = 1;
        }
        else{
            $page = $_GET['page'];
        }
        $begin = ($page - 1)*$count;
        $category = $this->categoryModel->pageCategory($begin,$count);
        $allCategory = $this->categoryModel->getAll();
        return $this->loadview('categories.index',[
            'pageCategory' => $category,
            'allCategory' => $allCategory,
            'page' => $page,
        ]);
    }
    public function delete(){
        if(!isset($_SESSION['idQuyen'])){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $category = $this->categoryModel->delete($id);
            echo "<script>window.location.href='?controller=category'</script>";
            // header("location:?controller=category");
        }
        // return $this->loadview('categories.index');
    }
    public function insert(){
        if(!isset($_SESSION["taiKhoan"]) || $_SESSION['idQuyen'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        } 
        if(isset($_POST['them'])){
            $tenDanhMuc = $_POST['tenDanhMuc'];
            $category = $this->categoryModel->insert($tenDanhMuc);
            echo "<script>window.location.href='?controller=category'</script>";
        }
        return $this->loadview('categories.insert');
    }
    public function update(){
        if(!isset($_SESSION["taiKhoan"]) || $_SESSION['idQuyen'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        } 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $category = $this->categoryModel->getId($id);
            if(isset($_POST['sua'])){
                $tenDanhMuc = $_POST['tenDanhMuc'];
                $idDanhMuc = $_POST['idDanhMuc'];
                $category = $this->categoryModel->update($tenDanhMuc,$idDanhMuc);
                echo "<script>window.location.href='?controller=category'</script>";
        }
    }
        return $this->loadview('categories.update',[
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
                $txtSearch = $this->categoryModel->searchCategory($str);
                $count = mysqli_num_rows($txtSearch);
                if($count <= 0){
                    $txtErro = 'Không tìm thấy từ khóa : ' .$search;
                }
                else{
                    $txtErro = 'Tìm được với từ khóa: ' . $search;
                    $txtSearch = $this->categoryModel->searchCategory($str);
                }
            }
        }
        return $this->loadview('categories.search',[
            'txtErro' => $txtErro,
            'txtSearch' => $txtSearch,
        ]);
    }
}
?>
