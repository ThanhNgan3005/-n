<?php 
    $this->loadview('menuHome',[
        'category' => $category,
    ]);
?>
<?php 
    if (isset($_SESSION['paid']) && $_SESSION['paid'] || isset($_GET['partnerCode'])) {
    } else {
      echo "<script>window.location.href='?controller=home'</script>"; 
    } 
// echo '<pre>';
// var_dump($_SESSION['order']);
// echo '</pre>';  
?>
 
<div class="container bg-dark-subtle pt-4 pb-4">
    <div class="row">
    <div class="col-md-7 border-end border-2">
    <?php foreach($infoOrder as $dh):?>
        <div class="row"><h3>SMARTPHONESTORE.COM</h3></div>
        <div class="row"><h5>Đơn hàng đã được đặt</h5></div>
        <div class="row"><p class=" m-0">Mã đơn hàng: <strong><?php echo $dh['idDonHang'] ?></strong></div>
        <div class="row"><p class=" m-0">Cảm ơn bạn đã mua hàng của chúng tôi!</p></div>
        <div class="row mt-4 ">
            <div class="col-md-12"><h6>Thông tin đơn hàng: </h6></div>
            <div class="col-md-12">Họ tên người nhận: <?php echo $dh['tenNguoiDung'] ?></div>
            <div class="col-md-12">Số điện thoại: <?php echo $dh['SDT'] ?></div>
            <div class="col-md-12">Địa chỉ nhận: <?php echo $dh['diaChi'] ?></div>
            <div class="col-md-12">Thời gian đặt hàng: <?php echo date("d/m/Y H:i:s", strtotime($dh['ngayDat'])) ?></div>
    <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col text-end"><button class=" btn btn-primary mt-4 mb-5 text-end"><a href="index.php?controller=home" class=" nav-link">Tiếp tục mua hàng</a></button></div>
        </div>
    </div>
   <?php
// echo '<pre>';
// var_dump($_SESSION['cart']);
// echo '</pre>';  
   ?>
    <div class="col-md-5">
        <table class=" table">
                <thead class=" table border-danger">
                    <tr>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Đơn giá</th>
                    </tr>
                </thead>
                <?php 
                    $tong = 0;
                    foreach($product as $dh):
                        $tong += ($dh['gia']*(100 - $dh['khuyenMai'])/100)*$dh['qty'];
                ?>            
                <tbody>
                    <tr>
                        <td><img src="<?php echo "./uploads/img/products/".$dh['hinhAnh'] ?>" width="70" height="70" alt=""></td>
                        <td><?php echo $dh['tenSanPham']?><strong><?php echo' x'.$dh['qty'] ?></strong></td>
                        <td><strong><?php echo number_format(($dh['gia']*(100 - $dh['khuyenMai'])/100) * $dh['qty'], 0,'.','.')."₫" ?></strong></td>
                    </tr>
                </tbody>
                <?php endforeach;?>
                <tfoot class=" table border-danger">
                    <tr>
                        <td><strong>Tổng:</strong></td>
                        <td></td>
                        <td><strong class=" text-danger fs-5"><?php echo number_format($tong, 0,'.','.')."₫" ?></strong></td>
                    </tr>
                </tfoot>
            </table>
    </div>
    </div>
    
</div>