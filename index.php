<?php 
    if(session_status() === PHP_SESSION_NONE)
    session_start();
    require './core/database.php';
    require './models/baseModel.php';
    require './controllers/baseController.php';
    require './views/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/css/header.css">
    <link rel="stylesheet" href="./views/css/showProduct.css">
    <link rel="stylesheet" href="./views/css/menuHome.css">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid  p-0">
    <?php
        if(isset($_GET['controller'])){
            $controllerName = $_GET['controller'].'Controller';
            // echo $controllerName;
            $actionName = isset($_REQUEST['action']) ? strtolower($_REQUEST['action']) : 'index';
            //include nguyen cai file controller do.
            require "./controllers/".$controllerName.".php";
            //khoi tao 1 doi tuong
            $controllerObject = new $controllerName;
            //tu doi tuong goi ham can chay
            $controllerObject->$actionName();
        }
    ?>
    
</div>
<?php  require './views/footer.php' ?>
</body>
</html>
<script src="./bootstrap-5.3.0-alpha1-dist/popper.min.js"></script>
<script src="./bootstrap-5.3.0-alpha1-dist/js/bootstrap.js"></script>
