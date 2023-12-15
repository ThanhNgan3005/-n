    <div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="admin.php?controller=dashboard">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="?controller=product">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-fluid bg-white">
        <?php while($sp = mysqli_fetch_assoc($product)): ?>
        <div class="row">
            <h2 class="text-center">Chi tiết: <?php echo '"'.$sp['tenSanPham'].'"'; ?> </h2>
        </div>
        <div class="row mt-4 mb-4">
            <div class="col-md-6">
                <img src="<?php echo "./uploads/img/products/".$sp['hinhAnh'] ?>" style="width: 100%;" alt="">
            </div>
            <div class="col-md-6 fs-5">
                <p><?php echo 'Hãng: '.$sp['tenDanhMuc'] ?></p>
                <p><strong>Mã sản phẩm: <?php echo $sp['idSanPham'] ?></strong></p>
                <p><strong>Tên sản phẩm: <?php echo $sp['tenSanPham'] ?></strong></p>
                <p>Giá gốc: <?php echo number_format($sp['gia'],0,'.','.').' VNĐ' ?></p>
                <p>Mức khuyến mãi: <?php echo $sp['khuyenMai'].'%' ?></p>
                <p>Giá khuyến mãi: <strong> <?php echo number_format(ceil($sp['gia']*(100 - $sp['khuyenMai'])/100),0,'.','.').' VNĐ' ?></strong></p>
                <p>Nổi bật: <?php if($sp['noiBat'] == 1){echo 'Có nổi bật';} else{echo 'Không nổi bật';} ?></p>
                <p>Ngày tạo: <?php echo date("d/m/Y H:i:s", strtotime($sp['ngayTao'])) ?></p>
                <?php 
                    if($sp['ngayTao'] != $sp['ngaySua']){?>
                        <p>Ngày sửa: <?php echo date("d/m/Y H:i:s", strtotime($sp['ngaySua'])) ?></p>
                    <?php    
                    }
                    ?>
            </div>
        </div>
        <div class="row">
                <div class="col-md-12">
                    <strong><h1>Mô tả chi tiết sản phẩm:</h1></strong>
                </div>
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
        <?php endwhile; ?>
    </div>
    