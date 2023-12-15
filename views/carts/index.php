<?php 
    $this->loadview('menuHome',[
        'category' => $category,
    ]);
?>

<div class="container-fluid">
    <div class="container">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php?controller=home">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container bord-2">
<form action="index.php?controller=cart&action=update" method="post" enctype="multipart/form-data">
    <table class="table table-bordered text-center">
    <thead class=" table-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Đơn giá</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Thành tiền</th>
            <th scope="col">Tác vụ</th>
        </tr>
    </thead>
    <?php 
    $i = 1;
    $tong = 0;
    foreach ($product as $sp): 
        $tong += ($sp['gia']*(100 - $sp['khuyenMai'])/100)*$sp['qty'];
    ?>

    <tbody class="">
        <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><img src="<?php echo "./uploads/img/products/".$sp['hinhAnh'] ?>" width="100" height="100" alt=""></td>
            <td><?php echo $sp['tenSanPham']; ?></td>
            <td><strong><?php echo number_format($sp['gia']*(100 - $sp['khuyenMai'])/100, 0,'.','.')."₫" ?></strong></td>
            <td>              
                <input type="number" class="form-control" value="<?php echo $sp['qty']; ?>"  name="qty[<?php echo $sp['idSanPham'] ?>]" min="1" max="100">                  
            </td>
            <td><strong><?php echo number_format(($sp['gia']*(100 - $sp['khuyenMai'])/100) * $sp['qty'], 0,'.','.')."₫" ?></strong></td>
            <td class=" text-center">
                <button type="button" class="btn btn-danger" >
                        <a  class= "text-white" href="index.php?controller=cart&action=delete&id=<?php echo $sp['idSanPham'] ?>">
                            <i class="bi bi-trash3-fill"></i>
                        </a>
                </button>
            </td>
        </tr>
    </tbody>
    <?php $i++;endforeach; ?>
    <tfoot>
        <tr class=" text-center">
            <th scope="row"> <strong class="">Tổng tiền:</strong></th>
            <td colspan="6"><strong class="fs-4  text-danger"><?php echo number_format($tong, 0,'.','.')."₫" ?></strong></td>
        </tr>
    </tfoot>
    </table>
    <?php 
        if(isset($_SESSION['cart'])){
    ?>
    <div class="row mt-3 mb-3">
        <div class="col-md-6">
            <button type="submit" class=" btn btn-success">Cập nhật</button>
            <button type="button" class=" btn btn-danger"><a class=" nav-link" href="index.php?controller=cart&action=deleteAll">Xóa tất cả</a></button>
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-primary"><a href="index.php?controller=order&action=checkout" class="nav-link">Thanh toán</a></button>
        </div>
    </div>
    <?php } ?>
</form>
</div>
