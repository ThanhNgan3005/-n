<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../bootstrap-5.3.0-alpha1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Trang chủ</title>
</head>
<body>
  <div class="container-fluid bg-black border-bottom border-danger">
    <div class="container">
      <div class="row">
        <div class="col-md-2 p-0 align-self-center">
          <a class="navbar-brand" href="index.php?controller=home">
            <img src="./uploads/img/logo/logoshop.jpg" alt="Logo" width="150" class="d-inline-block align-text-top">
          </a>
        </div>
        <div class="col-md-10">

          <div class="row mt-2">
            <div class="col-md-6 p-0">
              <form class="d-flex" action="?controller=home&action=search" method="POST">
                <input type="text" class="form-control border-end-0 rounded-0 rounded-start" placeholder="Nhập tên sản phẩm cần tìm..." name="txtSearch" id="">
                <button class="btn btn-danger rounded-0 rounded-end" name="search" type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div>
            <div class="col md-6 p-0">
              <ul class="nav flex-nowrap" >
                <?php 
                  if(isset($_SESSION['taiKhoan'])) {?>
                  <li class="nguoidung">
                    <a class="nav-link text-secondary-emphasis p-1" href="index.php?controller=user"><i class="bi bi-person-circle m-2 " style="font-size: 17px;"></i><?php echo $_SESSION['tenNguoiDung'] ?></a>
                    <ul class="doitt nav-item ps-1 pe-1">
                      <li class="  border-bottom p-0"><a class="nav-link text-dark" href="?controller=user&action=changeInfo">Đổi thông tin</a></li>
                      <li><a class="nav-link text-dark" href="?controller=user&action=changepass">Đổi mật khẩu</a></li>
                    </ul>
                  </li>
                  <li class="">
                    <a class="nav-link text-secondary-emphasis p-1" href="index.php?controller=user&action=logout"><i class="bi bi-box-arrow-right m-2 " style="font-size: 17px;"></i>Đăng xuất</a>
                  </li>
                <?php 
                }else{ 
                ?>
                  <li class="">
                    <a href="index.php?controller=user" class="nav-link text-secondary-emphasis p-1"><i class="bi bi-person-circle m-2" style="font-size: 17px;"></i>Đăng nhập</a>
                  </li>
                  <li class="">
                    <a class="nav-link text-secondary-emphasis p-1" href="index.php?controller=user&action=register"><i class="bi bi-file-text m-2 " style="font-size: 17px;"></i>Đăng kí</a>
                  </li>
                  <?php } ?>
                  <li class="">
                    <a class="nav-link text-secondary-emphasis p-1" href="#"><i class="bi bi-tags m-2 " style="font-size: 17px;"></i>Khuyến mãi</a>
                  </li>
                  <li class="">
                    <a class="nav-link text-secondary-emphasis p-1" href="index.php?controller=cart"><i class="bi bi-cart4 m-2 " style="font-size: 17px;"></i>Giỏ hàng</a>
                  </li>
              </ul>
            </div>
          </div>
          <div class="row mb-1 mt-2">
            <ul class="nav flex-nowrap">
              <li class=" border-end border-danger border-3">
                <a href="#" class="nav-link text-danger p-1 me-4" ><i class="bi bi-telephone-fill me-2" style="font-size: 18px;"></i>Tổng đài</a>
              </li>
              <li class=" border-end border-danger border-3">
                <a href="#" class="nav-link text-danger p-1 ms-4 me-4" ><i class="bi bi-play-btn-fill me-2" style="font-size: 18px;"></i>Video</a>
              </li>
              <li class=" border-end border-danger border-3">
                <a href="#" class="nav-link text-danger p-1 ms-4 me-4" ><i class="bi bi-newspaper me-2" style="font-size: 18px;"></i>Tin tức công nghệ</a>
              </li>
              <li class=" border-end border-danger border-3">
                <a href="#" class="nav-link text-danger p-1 ms-4 me-4" ><i class="bi bi-geo-alt-fill me-2" style="font-size: 18px;"></i>Địa chỉ</a>
              </li>
            </ul>
          </div>
        </div>        
      </div>
    </div>
  </div>
</body>
<script src="../bootstrap-5.3.0-alpha1-dist/js/bootstrap.js"></script>
</html>

