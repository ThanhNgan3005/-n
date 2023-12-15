<?php 
class cartController extends baseController{
    private $productModel;
    private $categoryModel;
    public function __construct()
    {
        $this ->loadModel('productModel');
        $this->productModel = new productModel;
        $this ->loadModel('categoryModel');
        $this->categoryModel = new categoryModel;
    }
    public function index(){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }
        // echo '<pre>';
        //     print_r($_SESSION['order']);
        //     echo '</pre>';    
        $category = $this->categoryModel->getAll();
        $product = $_SESSION['cart'];
        return $this->loadview('carts.index',[
            'category' => $category,
            'product' => $product,
        ]);
    }
    public function store(){
        if(isset($_GET['id']));
        $id = $_GET['id'];
        $product = $this->productModel->getId($id);
        $product = mysqli_fetch_assoc($product);
        if( empty($_SESSION['cart']) || !array_key_exists($id, $_SESSION['cart'])){
            $product['qty'] = 1;
            $_SESSION['cart'][$id] = $product;
        }
        else{
            $product['qty'] = $_SESSION['cart'][$id]['qty'] + 1;
            $_SESSION['cart'][$id] = $product;      
        }
        echo "<script>window.location.href='?controller=cart'</script>";
            // echo '<pre>';
            // var_dump($_SESSION['cart']);
            // echo '</pre>';    
    }  
    public function delete(){
        $idSanPham = $_GET['id'];
        unset($_SESSION['cart'][$idSanPham]);
        echo "<script>window.location.href='?controller=cart'</script>";
    }
    public function deleteAll(){
        unset($_SESSION['cart']);
        echo "<script>window.location.href='?controller=cart'</script>";
    }
    public function update(){
        foreach($_POST['qty'] as $id => $qty){
            $_SESSION['cart'][$id]['qty'] = $qty;
        }
        echo "<script>window.location.href='?controller=cart'</script>";
        // echo '<pre>';
        // print_r($_POST);
    }
}
?>