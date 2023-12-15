<?php 
    $this->loadview('menuHome',[
        'category' => $category ?? []
    ]);
?>
<div class="container-fluid">
    <div class="container">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php?controller=home">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sản phẩm tìm được</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container bg-dark-subtle">
    <?php
     echo $txtErro;
    ?>
</div>
<div class="container  border border-1 border-secondary-subtle">
    <div class="row justify-content-start  ">
        <?php while ($sp =mysqli_fetch_assoc($txtSearch)): ?>
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
        <?php endwhile; ?>
    </div>
</div>