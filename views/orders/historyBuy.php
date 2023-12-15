<?php 
    $this->loadview('menuHome',[
        'category' => $category,
    ]);
?>
    <div class="container bg-white mb-2">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="admin.php?controller=home">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lịch sử mua hàng</li>
                </ol>
            </nav>
        </div>
    </div>
<div class="container">
    <div class="row text-danger"><h1>Lịch sử mua hàng</h1></div>

    <table class=" table table-bordered border-secondary">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Ngày đặt</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <?php while($row = mysqli_fetch_array($historyBuy)):?>
        <tbody>
            <tr>
                <td><strong><?php echo $row['idDonHang'] ?></strong></td>
                <td><img src="<?php echo "./uploads/img/products/".$row['hinhAnh'] ?>" width="70" height="70" alt=""></td>
                <td>
                    <a class=" text-black" href="index.php?controller=product&action=showDetail&id=<?php echo $row['idSanPham'] ?>">
                        <?php echo $row['tenSanPham'] ?>
                    </a>
                </td>
                <td><?php echo date("d/m/Y", strtotime($row['ngayDat'])) ?></td>
                <td><?php echo number_format ($row['giaTien'], 0,'.','.') ?></td>
                <td><?php echo $row['soLuong'] ?></td>
                <td>
                <strong>
                    <?php
                        switch($row['trangThai']){
                            case '0':
                                echo "Đang chờ duyệt";
                                break;
                            case '1':
                                echo "Đã giao";
                                break;    
                            case '2':
                                echo "Đã hủy";
                                break;
                        }
                    ?>
                    </strong>
                </td>
            </tr>
        </tbody>
        <?php endwhile; ?>
    </table>
<?php 
$rowcount = mysqli_num_rows($countHistory);
// echo $rowcount
$trang = ceil($rowcount/8);
?>
<div class="row mb-2 justify-content-center">
        <div class="col-md-4">
            <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="index.php?controller=order&action=history&page=<?php $move = $page - 1;if($move > 1){echo $move;}else{echo 1;} ?>" 
                            aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for($i = 1; $i <= $trang; $i++){
                        ?>
                            <li class="page-item">
                                <a class="page-link <?php if($i == $page){echo 'text-bg-danger';} ?>" 
                                    href="index.php?controller=order&action=history&page=<?php echo $i; ?>"><?php echo $i; ?>
                                </a>
                            </li>
                        <?php
                            }
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?controller=order&action=history&page=<?php $move = $page + 1;if($move <= $trang){echo $move;}else{echo $trang;} ?>" 
                            aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
            </nav>
        </div>
    </div>
</div>
</div>