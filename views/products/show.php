<?php 
    $this->loadview('menuHome',[
        'category' => $category,
    ]);
?>
<?php
    $sp = mysqli_fetch_array($product);
?>
<div class="container-fluid">
    <div class="container">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php?controller=home">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $sp['tenDanhMuc'] ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container  border border-1 border-secondary-subtle">
    <div class="row mt-3 mb-3">
        <div class="col">
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <?php 
                    if(isset($_GET['sort']) && $_GET['sort'] === 'banChay'){
                        $text = '';
                    }
                    else{
                        $text = '-outline';
                    }
                ?>
                <button type="button" class="btn btn<?php echo $text ?>-danger">
                    <a href="index.php?controller=product&action=show&id=<?php echo $sp['idDanhMuc']?>&sort=banChay" class=" nav-link">Bán chạy nhất</a>
                </button>
                <?php 
                    if(isset($_GET['sort']) && $_GET['sort'] === 'noiBat'){
                        $text = '';
                    }
                    else{
                        $text = '-outline';
                    }
                ?>
                <button type="button" class="btn btn<?php echo $text ?>-danger">
                    <a href="index.php?controller=product&action=show&id=<?php echo $sp['idDanhMuc']?>&sort=noiBat" class="nav-link">Nổi bật nhất</a>
                </button>
                <?php 
                    if(isset($_GET['sort']) && $_GET['sort'] === 'tangDan'){
                        $text = '';
                    }
                    else{
                        $text = '-outline';
                    }
                ?>
                <button type="button" class="btn btn<?php echo $text ?>-danger">
                    <a href="index.php?controller=product&action=show&id=<?php echo $sp['idDanhMuc']?>&sort=tangDan" class="nav-link">Giá tăng dần</a>
                </button>
                <?php 
                    if(isset($_GET['sort']) && $_GET['sort'] === 'giamDan'){
                        $text = '';
                    }
                    else{
                        $text = '-outline';
                    }
                ?>
                <button type="button" class="btn btn<?php echo $text ?>-danger">
                <a href="index.php?controller=product&action=show&id=<?php echo $sp['idDanhMuc']?>&sort=giamDan" class=" nav-link">Giá giảm dần</a>
                </button>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-funnel-fill me-2"></i>Bộ lọc
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <div class="row justify-content-start  ">
        <?php foreach($product as $sp): ?>
        <div class="col-md-3 mb-3 shadow  bg-white boxProduct">
            <div class="row imgProduct ">
                <img src="<?php echo "./uploads/img/products/".$sp['hinhAnh'] ?>" class=" rounded" alt="">
                <?php if($sp['noiBat'] == 1) { ?>
                <div class="row hotLogo">
                    <img src="./uploads/img/logo/hot.webp" class="" alt="">
                </div>
                <?php } ?>
            </div>
            <div class="row mt-2 mb-2">
                <div class="col"><strong><?php echo $sp['tenSanPham'] ?></strong></div>
            </div>
            <div class="row mt-2 mb-2">
                <?php 
                    if($sp['khuyenMai'] == 0){
                        $sale = 0;
                    }else{
                        $sale = $sp['gia'];
                    }
                ?>
                <div class="col-md-5 text-center text-secondary "><strike class="text-start"><?php echo number_format($sale , 0,'.','.')." ₫"; ?></strike></div>
            </div>
            <div class="row mt-2 mb-2 justify-content-evenly">
                <div class="col-md-6 text-bg-danger d-flex justify-content-center align-items-center rounded-5">
                <?php 
                    $giaKM = ceil($sp['gia']*(100 - $sp ['khuyenMai'])/100);
                ?>
                    <p class=" m-0 fs-5"><?php echo number_format($giaKM , 0,'.','.')." ₫"; ?></p>
                </div>
                <div class="col-md-5 text-end iconSale">
                <?php 
                    if($sp['khuyenMai'] == 0){
                        $khuyenMai = 0;
                    }else{
                        $khuyenMai = $sp['khuyenMai'];
                    }
                ?>
                    <img src="./uploads/img/bannerSale/iconSale.webp" alt="">
                    <div class=" text-primary fs-6 capSale"><?php echo '-'.$khuyenMai.'%' ?></div>
                </div>
            </div>
            <div class="row bg-dark-subtle p-0 pt-3 pb-3 bottom">
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <a class=" link-dark text-decoration-none" href="index.php?controller=product&action=showDetail&id=<?php echo $sp['idSanPham'] ?>">Xem chi tiết...</a>
                </div>
                <div class="col-md-6 text-end">
                        <a href="index.php?controller=cart&action=store&id=<?php echo $sp['idSanPham'] ?>">
                            <button class="btn btn-primary opacity-100">Đặt hàng</button>
                        </a>
                    
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php
    $rowcount = mysqli_num_rows($allProduct);
    $trang = ceil($rowcount/8);
    ?>
    <div class="row mb-2 justify-content-center">
        <div class="col-md-4">
            <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="index.php?controller=product&action=show&id=<?php echo $sp['idDanhMuc'] ?><?php if(isset($_GET['sort'])){echo '&sort='.$sort;}?>&page=<?php $move = $page - 1;if($move > 1){echo $move;}else{echo 1;} ?>" 
                            aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for($i = 1; $i <= $trang; $i++){
                        ?>
                            <li class="page-item">
                                <a class="page-link <?php if($i == $page){echo 'text-bg-danger';} ?>" 
                                    href="index.php?controller=product&action=show&id=<?php echo $sp['idDanhMuc'] ?><?php if(isset($_GET['sort'])){echo '&sort='.$sort;}?>&page=<?php echo $i; ?>"><?php echo $i; ?>
                                </a>
                            </li>
                        <?php
                            }
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?controller=product&action=show&id=<?php echo $sp['idDanhMuc'] ?><?php if(isset($_GET['sort'])){echo '&sort='.$sort;}?>&page=<?php $move = $page + 1;if($move <= $trang){echo $move;}else{echo $trang;} ?>" 
                            aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
            </nav>
        </div>
    </div>
</div>
