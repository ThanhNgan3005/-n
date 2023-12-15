<div class="container mt-4 mb-4">
    <div class="row moinhat pt-2 shadow-sm">
        <div class="row justify-content-start border-bottom border-2 border-danger">
            <div class="col-md-12 p-0 text-danger fs-1">
                <i class="bi bi-hourglass-split me-2"></i>Sản phẩm mới nhất
            </div> 
        </div>
        <div class="row mt-4 mb-4 justify-content-between">
        <?php foreach($spMoiNhat as $sp): ?>
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
        
    </div>
    
    <div class="row khuyenmai pt-2 shadow-sm">
        <div class="row justify-content-start border-bottom border-2 border-danger">
            <div class="col-md-12 p-0 text-danger fs-1">
            <i class="bi bi-tags-fill me-2"></i>Sản phẩm khuyến mãi khủng
            </div> 
        </div>
        <div class="row mt-4 mb-4 justify-content-between">
        <?php foreach($spKhuyenMai as $sp): ?>
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
        
    </div>
    
    <div class="row banchay pt-2 shadow-sm">
        <div class="row justify-content-start border-bottom border-2 border-danger">
            <div class="col-md-12 p-0 text-danger fs-1">
            <i class="bi bi-currency-exchange me-2"></i>Sản phẩm bán chạy nhất
            </div> 
        </div>
        <div class="row mt-4 mb-4 justify-content-between">
        <?php foreach($spBanChay as $sp): ?>
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
        
    </div>
   
    <div class="row noibat pt-2 shadow-sm">
        <div class="row justify-content-start border-bottom border-2 border-danger">
            <div class="col-md-12 p-0 text-danger fs-1">
            <i class="bi bi-fire me-2"></i>Sản phẩm nổi bật nhất
            </div> 
        </div>
        <div class="row mt-4 mb-4 justify-content-between">
        <?php foreach($spNoiBat as $sp): ?>
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
        
    </div>
</div>