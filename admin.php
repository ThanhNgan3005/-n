<?php 
    if(session_status() === PHP_SESSION_NONE)
    session_start();
    if(!isset($_SESSION["taiKhoan"]))
        header("Location:index.php");
    else if($_SESSION["idQuyen"]!= 1)
        header("Location:index.php");
    require './core/database.php';
    require './models/baseModel.php';
    require './controllers/baseController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"\ integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Trang Admin</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary p-0  " style="height: 100px;">
            <div class="container-fluid bg-black bg-opacity-90 ">
                <a class="navbar-brand" href="admin.php?controller=dashboard">
                    <img src="./uploads/img/logo/logoShop.jpg" alt="Logo" width="130" height="100" class="d-inline-block align-text-top">
                </a>
                <!-- <div class="row d-flex">
                    <div class="col">
                    <a class="navbar-brand text-white" href="#">
                        <img src="./uploads/img/avarta/avt.jpg" alt="Logo" width="40" height="40" class="rounded-circle" alt="Cinque Terre">
                        <span class=" fs-6"><?php echo $_SESSION['tenNguoiDung'] ?></span>
                    </a>
                    </div> -->
                </div>
            </div>
        </nav>
    </header>
<home>
  <div class="container-fluid bg-dark-subtle p-0 d-flex ">
    <?php require './views/menuAdmin.php' ?>
    <div class="container-fluid p-0">
      <?php
        if(isset($_GET['controller'])){
          $controllerName = $_GET['controller'].'Controller';
          // echo $controllerName;
          $actionName = isset($_REQUEST['action']) ? strtolower($_REQUEST['action']) : 'index';
          require "./controllers/".$controllerName.".php";
          $controllerObject = new $controllerName;
          $controllerObject->$actionName();
        }
        else{ ?>
          <?php require 'admin.php' ?>
        <?php
        }
        ?>
      </div>
  </div>
</home>
</body>
<script src="./bootstrap-5.3.0-alpha1-dist/popper.min.js"></script>
<script src="./bootstrap-5.3.0-alpha1-dist/js/bootstrap.js"></script>
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   google.charts.setOnLoadCallback(drawChart1);
   google.charts.setOnLoadCallback(drawChart2);

</script>
<script> 
    CKEDITOR.replace("editor")
</script>
<script>
    CKEDITOR.replace("editor");
    function formatPrice(inputElement){
    if(inputElement.value !== ''){
        const values = inputElement.value.replaceAll('.','');
        let price = parseInt(values);
        let priceFormat = price.toLocaleString('vi');
        inputElement.value = priceFormat;
    }
}
</script>

</html>
