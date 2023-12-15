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
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php?controller=product&action=show&id=<?php echo $sp['idDanhMuc'] ?>"><?php echo $sp['tenDanhMuc'] ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $sp['tenSanPham'] ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container border-top border-3 mt-4">
<?php foreach($product as $sp): ?>
    <div class="row mt-3 mb-3">
        <div class="col-md-6 p-0">
        <img src="<?php echo "./uploads/img/products/".$sp['hinhAnh'] ?>"class=" img-thumbnail border border-4" style="width: 100%;"  alt="">
        </div>
        <div class="col-md-6 fs-5">
            <div class="row"><h2><?php echo $sp['tenSanPham'] ?></h2></div>
            <div class="row mt-3 mb-3">
                <div class="col">Hãng: <strong><?php echo $sp['tenDanhMuc'] ?></strong></div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col">Mã sản phẩm: <?php echo $sp['idSanPham'] ?></div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col">Tình trạng: Mới</div>
            </div>
            <div class="row mt-3 mb-3">
            <?php 
                    if($sp['khuyenMai'] == 0){
                        $sale = 0;
                    }else{
                        $sale = $sp['gia'];
                    }
                ?>
                <div class="col"><strike class="text-start text-secondary"><?php echo number_format($sale , 0,'.','.')." ₫"; ?></strike></div>
            </div>
            <div class="row">
                <?php 
                    $giaKM = ceil($sp['gia']*(100 - $sp ['khuyenMai'])/100);
                ?>
                <h3 class=" text-danger"><?php echo number_format($giaKM , 0,'.','.')." ₫"; ?></h3>
            </div>
            <div class="row mt-4">
               <a href="index.php?controller=cart&action=store&id=<?php echo $sp['idSanPham'] ?>">
                <button class="btn btn-danger fs-2" style="width: 100%;">Mua ngay</button>
               </a> 
            </div>
        </div>
    </div>
    <div class="row mt-5 border-top border-3 pt-2">
        <div class="col"><h1>Mô tả chi tiết sản phẩm: </h1></div>
        <style>
                    .hinh img{
                        display: block;
                        width: 800px;
                        margin-left: auto;
                        margin-right: auto;             
                    }
                </style>
        <div class="col-md-12 d-block hinh">
            <?php echo $sp['moTa'] ?>
        </div>
    </div>
<?php endforeach; ?>
</div>