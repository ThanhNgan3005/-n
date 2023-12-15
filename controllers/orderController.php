<?php
class orderController extends baseController{

    private $orderModel;
    private $userModel;
    private $categoryModel;
    private $slideModel;
    public function __construct()
    {   
        $this->loadModel('userModel');
        $this->userModel = new userModel;
        $this->loadModel('orderModel');
        $this->orderModel = new orderModel;
        $this->loadModel('categoryModel');
        $this->categoryModel = new categoryModel;
        $this->loadModel('slideModel');
        $this->slideModel = new slideModel;
    }
    public function index(){
        if(!isset($_SESSION["taiKhoan"]) || $_SESSION['idQuyen'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }   
        $countOrder =$this->orderModel->getAll();
        $count = 10;
        if(!isset($_GET['page'])){
            $page = 1;
        }
        else{
            $page = $_GET['page'];
        }
        $begin = ($page - 1)*$count;
        $sort = '';
        if(isset($_GET['sort'])){
            $sort = $_GET['sort'];
            $countOrder = $this->orderModel->countOrderSort($sort);
            switch($sort){
                case '0':
                    $order = $this->orderModel->getDHChoDuyet($sort,$begin,$count);
                    break;
                case '1':
                    $order = $this->orderModel->getDHDaGiao($sort,$begin,$count);
                    break;
                case '2':
                    $order = $this->orderModel->getDHHuy($sort,$begin,$count);
                    break;
                default:
                    break;
            }
        }else{
            $order = $this->orderModel->getAllPage($begin,$count);
        }
        $this->loadview('orders.index',[ 
            'countOrder' => $countOrder, 
            'order' => $order,
            'page' => $page,
            'sort' => $sort,
        ]);
    }
    public function detail(){
        if(!isset($_SESSION["taiKhoan"]) || $_SESSION['idQuyen'] != 1){
            echo "<script>window.location.href='index.php?controller=home'</script>";
        }   
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        $order = $this->orderModel->getDetail($id);
        return $this->loadview('orders.detail',[  
            'order' => $order,
        ]);
    }
    public function confirm(){  
        $id = $_GET['id'];
        $trangThai = $_GET['trangThai'];
        $confirm = $this->orderModel->confirmOrder($trangThai,$id);
        echo "<script>window.location.href='?controller=order'</script>";
    }  
    public function search(){
        $txtErro = '';
        $txtSearch = '';
        if(isset($_POST['search'])){
            $idDonHang = $_POST['txtSearch'];
            if($idDonHang == ""){
                $txtErro = "Vui lòng nhập mã hóa đơn cần tìm";
            }
            else{
                $search = $this->orderModel->searchOrder($idDonHang);
                $count = mysqli_num_rows($search);
                if($count <= 0){
                    $txtErro = 'Không tìm mã đơn hàng : ' .$idDonHang;
                }
                else{
                    $txtErro = 'Tìm được với mã đơn hàng: ' . $idDonHang;
                    $txtSearch = $this->orderModel->searchOrder($idDonHang);
                }
            }
        }
        return $this->loadview('orders.search',[  
            'txtErro' => $txtErro,
            'txtSearch' => $txtSearch,
        ]);
    }


    //trang user
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function checkout(){
        if (!empty($_SESSION['cart'])) {
            //   echo 'Session không rỗng';    
        } else {
            echo 'Session rỗng hoặc không tồn tại';
            echo "<script>window.location.href='?controller=cart'</script>";
        }
        $category = $this->categoryModel->getAll();
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }
        $product = $_SESSION['cart'];
        //truong hop dang dang nhap
        if(isset($_POST['sua'])){
            $tenNguoiDung = $_POST['tenNguoiDung'];
            $SDT = $_POST['SDT'];
            $email = $_POST['email'];
            $diaChi = $_POST['diaChi'];
            $maNguoiDung = $_POST['maNguoiDung'];
            $ghiChu = $_POST['ghiChu'];
            $changInfo = $this->userModel->changeInfo($tenNguoiDung,$SDT,$email,$diaChi,$maNguoiDung);
            $insertOrder = $this->orderModel->insertOrder($maNguoiDung,$ghiChu);
            $tong = 0;
            foreach($product as $sp){
                $tong += ($sp['gia']*(100 - $sp['khuyenMai'])/100)*$sp['qty'];
            }
            foreach($product as $sp){
                $idSanPham = $sp['idSanPham'];
                $gia = $sp['gia']*(100 - $sp['khuyenMai'])/100;
                $soLuong = $sp['qty'];
                $inserOrderDetail = $this->orderModel->insertOrderDetail($insertOrder,$idSanPham,$gia,$soLuong,$tong);
            }
            $infoOrder = $this->orderModel->getNewID($insertOrder);
            $infoOrder = mysqli_fetch_array($infoOrder);
            $_SESSION ['order'][$insertOrder] = $infoOrder;
            // echo '<pre>';
            // print_r($_SESSION['order']);
            // echo '</pre>';   
            echo "<script>window.location.href='?controller=order&action=success'</script>";
        }
        //truong hop chua dang nhap
        if(isset($_POST['them'])){
            $tenNguoiDung = $_POST['tenNguoiDung'];
            $SDT = $_POST['SDT'];
            $email = $_POST['email'];
            $diaChi = $_POST['diaChi'];
            $ghiChu = $_POST['ghiChu'];
            $insertInfo = $this->userModel->inserInfo($tenNguoiDung,$email,$SDT,$diaChi);
            $insertOrder = $this->orderModel->insertOrder($insertInfo,$ghiChu);
            $tong = 0;
            foreach($product as $sp){
                $tong += ($sp['gia']*(100 - $sp['khuyenMai'])/100)*$sp['qty'];
            }
            foreach($product as $sp){
                $idSanPham = $sp['idSanPham'];
                $gia = $sp['gia']*(100 - $sp['khuyenMai'])/100;
                $soLuong = $sp['qty'];
                $inserOrderDetail = $this->orderModel->insertOrderDetail($insertOrder,$idSanPham,$gia,$soLuong,$tong);
            }
            $infoOrder = $this->orderModel->getNewID($insertOrder);
            $infoOrder = mysqli_fetch_array($infoOrder);
            $_SESSION ['order'][$insertOrder] = $infoOrder;
            echo "<script>window.location.href='?controller=order&action=success'</script>";

        }
        // thanh toan momo 
        if(isset($_POST['payUrl'])){
            $tenNguoiDung = $_POST['tenNguoiDung'];
            $SDT = $_POST['SDT'];
            $email = $_POST['email'];
            $diaChi = $_POST['diaChi'];
            $maNguoiDung = $_POST['maNguoiDung'];
            $ghiChu = $_POST['ghiChu'];
            $changInfo = $this->userModel->changeInfo($tenNguoiDung,$SDT,$email,$diaChi,$maNguoiDung);
            $insertOrder = $this->orderModel->insertOrder($maNguoiDung,$ghiChu);
            $tong = 0;
            foreach($product as $sp){
                $tong += ($sp['gia']*(100 - $sp['khuyenMai'])/100)*$sp['qty'];
            }
            foreach($product as $sp){
                $idSanPham = $sp['idSanPham'];
                $gia = $sp['gia']*(100 - $sp['khuyenMai'])/100;
                $soLuong = $sp['qty'];
                $inserOrderDetail = $this->orderModel->insertOrderDetail($insertOrder,$idSanPham,$gia,$soLuong,$tong);
            }
            $infoOrder = $this->orderModel->getNewID($insertOrder);
            $infoOrder = mysqli_fetch_array($infoOrder);
            $_SESSION ['order'][$insertOrder] = $infoOrder;
           

            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount = $tong;
            $orderId = time() ."" ;
            // time() .""
            $redirectUrl = "http://localhost/DoAn2/index.php?controller=order&action=success";
            $ipnUrl = "http://localhost/DoAn2/index.php?controller=order&action=success";
            $extraData = "";


                $partnerCode = $partnerCode;
                $accessKey = $accessKey;
                $serectkey = $secretKey;
                $orderId = $orderId; // Mã đơn hàng
                $orderInfo = $orderInfo;
                $amount = $amount;
                $ipnUrl = $ipnUrl;
                $redirectUrl = $redirectUrl;
                $extraData = $ipnUrl;

                $requestId = time() . "";
                $requestType = "payWithATM";
                // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                //before sign HMAC SHA256 signature
                $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                $signature = hash_hmac("sha256", $rawHash, $serectkey);
                $data = array('partnerCode' => $partnerCode,
                    'partnerName' => "Test",
                    "storeId" => "MomoTestStore",
                    'requestId' => $requestId,
                    'amount' => $amount,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'redirectUrl' => $redirectUrl,
                    'ipnUrl' => $ipnUrl,
                    'lang' => 'vi',
                    'extraData' => $extraData,
                    'requestType' => $requestType,
                    'signature' => $signature);
                $result = $this->execPostRequest($endpoint, json_encode($data));
                $jsonResult = json_decode($result, true);  // decode json
                echo "<script>window.location.href='".$jsonResult['payUrl']."'</script>";  
    }
        return $this->loadview('orders.checkout',[  
           'product' => $product,
           'category' => $category,
        ]);
    }



    public function success(){
        $category = $this->categoryModel->getAll();
        $infoOrder = $_SESSION['order'];
        $product = $_SESSION['cart'];
        if(isset($_GET['partnerCode'])){
            $partnerCode = $_GET['partnerCode'];
            $orderId = $_GET['orderId'];
            $requestId = $_GET['requestId'];
            $amount = $_GET['amount'];
            $orderInfo = $_GET['orderInfo'];
            $orderType = $_GET['orderType'];
            $transId = $_GET['transId'];
            $payType = $_GET['payType'];
            $signature = $_GET['signature'];
            // foreach($infoOrder as $infoOrder ){
            //     $idDonHang = $infoOrder['idDonHang'];
            // }
            $insertMomo = $this->orderModel->insertMomo($partnerCode,$orderId,$requestId,$amount,$orderInfo,$orderType,$transId,$payType,$signature);
        }
        unset($_SESSION['order']);
        unset($_SESSION['cart']);
        return $this->loadview('orders.thank',[  
            'category' => $category,
            'infoOrder' => $infoOrder,
            'product' => $product,
         ]);
    }
    public function history(){
        if(!isset($_SESSION['taiKhoan'])){
            echo "<script>window.location.href='?controller=home'</script>";
        }
        $category = $this->categoryModel->getAll();
        $count = 8;
        if(!isset($_GET['page'])){
            $page = 1;
        }
        else{
            $page = $_GET['page'];
        }
        $begin = ($page - 1)*$count;
        $maNguoiDung = $_SESSION['maNguoiDung'];
        $countHistory = $this->orderModel->layAllDHTHEOND($maNguoiDung);
        $historyBuy = $this->orderModel->layDHTHEOND($maNguoiDung,$begin,$count);
        return $this->loadview('orders.historyBuy',[  
            'category' => $category,
            'historyBuy' => $historyBuy,
            'page' => $page,
            'countHistory' => $countHistory,
        ]);
    }
   
}
