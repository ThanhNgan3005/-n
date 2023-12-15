<?php
class slideController extends baseController{

    private $slideModel;
    public function __construct()
    {
        $this->loadModel('slideModel');
        $this->slideModel = new slideModel;
    }
    public function index(){
        if(!isset($_SESSION["taiKhoan"]) || $_SESSION['idQuyen'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        } 
        $slide = $this->slideModel->getAll();
        return $this->loadview('slide.index',[  
            'slide' => $slide
        ]);
    }
    public function insert(){
        if(!isset($_SESSION["taiKhoan"]) || $_SESSION['idQuyen'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }   
        if(isset($_POST['them'])){
            $duongDan = $_POST['duongDan'];
            $hinhAnh = $_POST['hinhAnh'];
            $slide = $this->slideModel->insert($duongDan,$hinhAnh);
            echo "<script>window.location.href='?controller=slide'</script>";
        }
        return $this->loadview('slide.insert',[  
        ]);
    }
    public function delete(){
        if(!isset($_SESSION["taiKhoan"]) || $_SESSION['idQuyen'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }   
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $slide = $this->slideModel->delete($id);
            echo "<script>window.location.href='?controller=slide'</script>";
        }
    }
    public function update(){
        if(!isset($_SESSION["taiKhoan"]) || $_SESSION['idQuyen'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }   
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $slide = $this->slideModel->getId($id);
            if(isset($_POST['sua'])){
                $duongDan = $_POST['duongDan'];
                $hinhAnh = $_POST['hinhAnh'];
                $updateSlide = $this->slideModel->update($duongDan,$hinhAnh,$id);
                echo "<script>window.location.href='?controller=slide'</script>";
        }
            }
        return $this->loadview('slide.update',[
            'slide' => $slide,
        ]);
    }
    
    // trang chu home page = hp
   
}
?>
