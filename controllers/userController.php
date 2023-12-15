<?php 
class userController extends baseController
{
    private $userModel;
    private $categoryModel;
    public function __construct()
    {
        $this->loadModel('userModel');
        $this->userModel = new userModel;
        $this->loadModel('categoryModel');
        $this->categoryModel = new categoryModel;
    }
    public function index(){
        if(isset($_SESSION['taiKhoan'])){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }
        $category = $this->categoryModel->getAll();
        return $this->loadview('users.login',[
            'category' => $category,
        ]);
    }
    public function login(){
        if(isset($_SESSION['taiKhoan'])){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }
        $txtErro = '';
        $category = $this->categoryModel->getAll();
        if(isset($_POST['login'])){
            $taiKhoan = $_POST['taiKhoan'];
            $matKhau = $_POST['matKhau'];
            $check = $this->userModel->checkUser($taiKhoan,$matKhau);
            if(mysqli_num_rows($check) > 0){
                $row = mysqli_fetch_array($check);
                $_SESSION['taiKhoan'] = $taiKhoan;
                $_SESSION['idQuyen'] = $row['idQuyen'];
                $_SESSION['tenNguoiDung'] = $row['tenNguoiDung'];
                $_SESSION['maNguoiDung'] = $row['maNguoiDung'];
                $_SESSION['diaChi'] = $row['diaChi'];
                $_SESSION['SDT'] = $row['SDT'];
                $_SESSION['email'] = $row['email'];
                if($row['idQuyen'] == 1){
                    echo "<script>window.location.href='admin.php?controller=dashboard'</script>";
                } 
                elseif($row['idQuyen'] == 0){
                    echo "<script>window.location.href='index.php?controller=home'</script>";
                } 
            }
            else {
                $txtErro =  'Tài khoản hoặc mật khẩu không hợp lệ !';
            }
        }
        return $this->loadview('users.login',[
            'txtErro' => $txtErro,
            'category' => $category,
        ]);
    }
    public function register(){
        if(isset($_SESSION['taiKhoan'])){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }
        $category = $this->categoryModel->getAll();
        $txtErro = '';
        if(isset($_POST['dangky'])){
            $taiKhoan = $_POST["taiKhoan"];
            $matKhau = $_POST["matKhau"];
            $nhapLaiMatKhau = $_POST["nhapLaiMatKhau"];
            $email = $_POST["email"];
            $tenNguoiDung = $_POST["tenNguoiDung"];
            $SDT = $_POST["SDT"];
            $diaChi = $_POST["diaChi"];
            if($taiKhoan != "" && $matKhau != "" && $tenNguoiDung != ""){
                $checkTaiKhoan = $this->userModel->checkTaiKhoan($taiKhoan);
                if(mysqli_num_rows($checkTaiKhoan) > 0){
                    $txtErro = 'Tài khoản đã tồn tại';
                    // die;
                }
                elseif($matKhau != $nhapLaiMatKhau){
                    $txtErro = 'Nhập lại mật khẩu sai';
                    // die;
                }
                else{
                    $register = $this->userModel->register($tenNguoiDung,$email,$SDT,$diaChi,$taiKhoan,$matKhau);
                    $txtErro = 'Đăng kí thành công';
                }
            }
        }
        return $this->loadview('users.register',[
            'txtErro' => $txtErro,
            'category' => $category,
        ]);
    }
    public function changePass(){
        if(!isset($_SESSION["taiKhoan"])){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }
        $txtErro = '';
        $category = $this->categoryModel->getAll();
        $getInfo = $this->userModel->getInfo();
        if(isset($_POST['confirm'])){
            $matKhau = $_POST['matKhau'];
            $matKhauMoi = $_POST['matKhauMoi'];
            $matKhauMoiXacNhan = $_POST['matKhauMoiXacNhan'];
            $maNguoiDung = $_POST['maNguoiDung'];
            $checkPass = $this->userModel->checkPassword($matKhau);
            if(mysqli_num_rows($checkPass) > 0){
                if($matKhauMoi == $matKhauMoiXacNhan){
                    $changePass = $this->userModel->changePass($matKhauMoi,$maNguoiDung);
                    $txtErro = 'Thay đổi thành công';
                }
                if($matKhauMoi == $matKhau ){
                    $txtErro = 'Mật khẩu mới không được trùng với mật khẩu cũ';
                }
                if($matKhauMoi != $matKhauMoiXacNhan){
                    $txtErro = 'Xác nhận mật khẩu không trùng';
                }
            }
            else{
                $txtErro = 'Mật khẩu không chính xác';
            }
        }
        return $this->loadview('users.changePass',[
            'txtErro' => $txtErro,
            'getInfo' => $getInfo,
            'category' => $category,
        ]);    
    }
    public function changeInfo(){
        if(!isset($_SESSION["taiKhoan"])){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }
        $category = $this->categoryModel->getAll();
        $getInfo = $this->userModel->getInfo();
        if(isset($_POST['sua'])){
            $tenNguoiDung = $_POST['tenNguoiDung'];
            $SDT = $_POST['SDT'];
            $email = $_POST['email'];
            $diaChi = $_POST['diaChi'];
            $maNguoiDung = $_POST['maNguoiDung'];
            $changInfo = $this->userModel->changeInfo($tenNguoiDung,$SDT,$email,$diaChi,$maNguoiDung);
            echo "<script>window.location.href='?controller=user&action=changeInfo'</script>";
    }
        return $this->loadview('users.changeInfo',[
            'getInfo' => $getInfo,
            'category' => $category,
        ]);
    }
    public function logout(){
        if(session_status() === PHP_SESSION_NONE)
        session_start();
        unset($_SESSION['taiKhoan']);
        unset($_SESSION['idQuyen']);
        echo "<script>window.location.href='index.php?controller=home'</script>";
    }
}
?>