<div class="container-fluid bg-danger-subtle pt-2 pb-2">
    <div class="container">
      <div class="row flex-nowrap">
        <div class="col-md-auto dropdown">
          <button class="btn btn-secondary dropbtn" type="button"><i class="bi bi-list"></i> Danh mục sản phẩm</button>
          <div class="dropdown-content mt-2">
            <?php foreach($category as $dm): ?>
            <a class="nav-link text-black p-2 border" href="index.php?controller=product&action=show&id=<?php echo $dm['idDanhMuc'] ?>">Danh mục: <?php echo $dm['tenDanhMuc']?></a>
            <?php endforeach; ?>
          </div>
        </div>
        <div class=" col-md-auto">
          <button class="btn btn-outline-secondary " type="button"><i class="bi bi-credit-card-2-back-fill"></i> Hướng dẫn thanh toán</button>
        </div>
        <div class="col-md-auto">
          <button class="btn btn-outline-secondary " type="button"><i class="bi bi-credit-card-2-back-fill"></i> Hướng dẫn trả góp</button>
        </div>
        <div class="col-md-auto">
          <button class="btn btn-outline-secondary " type="button"><i class="bi bi-tools"></i> Chính sách bảo hành</button>
        </div>
        <div class="col-md-auto">
          <button class="btn btn-outline-secondary " type="button"><i class="bi bi-truck"></i> Chính sách vận chuyển</button>
        </div>
        <?php if(isset($_SESSION['taiKhoan'])){ ?>
        <div class="col-md-auto">
          <?php
            if(isset($_GET['action']) && $_GET['action'] === 'history'){
              $txt = '';
            }
            else{
              $txt = '-outline';
            }
          ?>
          <button class="btn btn<?php echo $txt ?>-secondary " type="button"><a class="nav-link" href="?controller=order&action=history"><i class="bi bi-cash-coin"></i> Lịch sử mua hàng</a></button>
        </div>
        <?php } ?>
      </div>
    </div>
 </div>
