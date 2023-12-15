<?php $dh = mysqli_fetch_array($order) ?>
<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="admin.php?controller=dashboard">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="?controller=order">Hóa đơn</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết hóa đơn</li>
                </ol>
            </nav>
        </div>
    </div>
<div class="container bg-white">
    <div class="row justify-content-between">
       <div class="col-md-3 mt-3 mb-3">
         <button class=" btn btn-dark"><a href="?controller=order" class=" nav-link"><i class="bi bi-arrow-left me-2"></i>Quay lại</a></button>
       </div>
       <div class="col-md-3 mt-3 text-end">
         <button class=" btn btn-dark"><a onclick="window.print(); return false;" href="#" class=" nav-link"><i class="bi bi-printer-fill"></i></a></button>
       </div>
    </div>
    <div class="row p-2">
        <div class="col border border-2 border-dark">
            <div class="row justify-content-center">
                <div class=" col-md-4">
                    <img src="./uploads/img/logo/logo_shop-removebg-preview.png" width="300"class="" alt="">
                </div>
                <div class=" col-md-6 ms-5 mt-2 fs-5">
                    <h1>SMART PHONE STORE</h1>
                    <p class=" mb-2">Chuyên bán phụ kiện và điện thoại di động</p>
                    <p class=" mb-2">Địa chỉ: Xã Long Thạnh, huyện Phụng Hiệp, tỉnh Hậu Giang</p>
                    <p class=" mb-2">SĐT: 0852348684</p>
                    <p class=" mb-2">Email: nnphuc2000378@student.ctuet.edu.vn</p>
                </div>
            </div>
            <div class="row text-center mt-3">
                <h2>HÓA ĐƠN BÁN HÀNG</h2>
            </div>
            <div class="row fs-5">
                <div class="col">
                    Tên khách hàng: <strong><?php echo $dh['tenNguoiDung'] ?></strong>
                </div>
            </div>
            <div class="row fs-5">
                <div class="col">
                   Số điện thoại: <?php echo $dh['SDT'] ?>
                </div>
            </div>
            <div class="row fs-5">
                <div class="col">
                    Địa chỉ: <?php echo $dh['diaChi'] ?>
                </div>
            </div>
            <div class="row fs-5">
                <div class="col">
                    Ngày đặt: <?php echo date("d/m/Y H:i:s", strtotime($dh['ngayDat'])) ?>
                </div>
            </div>
            <div class="row fs-5 mb-3">
                <div class="col">
                    Mã đơn hàng: <strong><?php echo $dh['idDonHang'] ?></strong>
                </div>
            </div>
            <table class=" table table-bordered border-dark">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                    </tr>
                </thead>
                <?php
                 $i = 1; 
                 foreach($order as $dh):
                    $tong = number_format( $dh['tongTien'],0,'.','.'); 
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $dh['tenSanPham'] ?></td>
                        <td><?php echo number_format($dh['giaTien'], 0,'.','.') ?></td>
                        <td><?php echo $dh['soLuong'] ?></td>
                        <td><?php echo number_format($dh['giaTien']* $dh['soLuong'], 0,'.','.') ?></td>
                    </tr>
                </tbody>
                <?php $i++;endforeach; ?>
                <tfoot style="border: none;" class=" border border-white fs-5">
                    <tr>
                        <td><strong>Tổng tiền:</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong><?php echo $tong." đồng" ?></strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    
</div>
<script>
function printPage() {
  window.print();
}
</script>