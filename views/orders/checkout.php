<?php 
    $this->loadview('menuHome',[
        'category' => $category,
    ]);
?>
<?php 
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Khi người dùng submit form, đặt biến session "paid" thành "true"
    $_SESSION['paid'] = true;
   }
?>
<div class="container bg-dark-subtle pt-3">
    <div class="row ">
        <div class="col-md-7 border-end border-2">
            <div class="row"><h3>SMARTPHONESTORE.COM</h3></div>
            <div class="row mb-3 mt-3"><strong>Thông tin giao hàng</strong></div>
            <?php 
                if(isset($_SESSION['taiKhoan'])){ ?>
                <!-- co tai khoan -->
            <form action="" id="order-form" method="POST">
                <div class="row">
                    <div class="col-md-8">
                        <label for="">Họ tên:</label>
                        <input class=" form-control mt-1" name="tenNguoiDung" type="text" value="<?php echo $_SESSION['tenNguoiDung'] ?>">
                        <input type="hidden" name="maNguoiDung" value="<?php echo $_SESSION['maNguoiDung'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="">Số điện thoại:</label>
                        <input class=" form-control mt-1" name="SDT" type="text" value="<?php echo $_SESSION['SDT'] ?>">
                    </div>
                </div>
                <div class="rơw mt-3">
                    <div class="col-md-12">
                        <label for="">Email:</label>
                        <input type="email" name="email" class=" form-control mt-1" value="<?php echo $_SESSION['email'] ?>"> 
                    </div>
                </div>
                <div class="rơw mt-3">
                    <div class="col-md-12">
                    <label for="">Địa chỉ:</label>
                        <textarea class="form-control" name="diaChi" id=""  rows="3"><?php echo $_SESSION['diaChi'] ?></textarea>
                    </div>
                </div>
                <div class="rơw mt-3 mb-3">
                    <div class="col-md-12">
                        <label for="">Ghi chú:</label>
                        <textarea class="form-control" name="ghiChu" id=""  rows="3"></textarea>
                    </div>
                </div>
                <div class="row mb-4 mt-4">
                    <div class="col-md-12">
                        <h5>Chọn phương thức thanh toán: </h5>
                    </div>
                    <div class="col-md-12">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" id="radio1" name="myRadio">
                            <label class="form-check-label" for="radio1">Nhận hàng thanh toán:</label>
                        </div>
                        <button id="button1" name="sua" type="submit" class="btn btn-primary d-none">Tiến hành thanh toán</button>
                    </div>
                    <div class="col-md-12">
                        <div class="form-check mb-3 mt-3">
                            <input class="form-check-input" type="radio" id="radio2" name="myRadio">
                            <label class="form-check-label" for="radio2">Thanh toán qua cổng momo:</label>
                        </div>
                        <button id="button2" name="payUrl" type="submit" class="btn btn-primary d-none">Tiến hành thanh toán</button>
                    </div>
                    
                    <!-- <div class="col-md-3"><button  name="sua" type="submit" class=" btn btn-primary">Hoàn tất đơn hàng</button></div>
                    <div class="col-md-3"><button  name="payUrl" type="submit" class=" btn btn-primary">momo</button></div> -->
                </div>
            </form>

            <?php
            }else{?>
            <!-- ko co tai khoan -->
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-8">
                        <label for="">Họ tên:</label>
                        <input class=" form-control mt-1" name="tenNguoiDung" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="">Số điện thoại:</label>
                        <input class=" form-control mt-1" name="SDT" type="text">
                    </div>
                </div>
                <div class="rơw mt-3">
                    <div class="col-md-12">
                        <label for="">Email:</label>
                        <input type="email" name="email" class=" form-control mt-1"> 
                    </div>
                </div>
                <div class="rơw mt-3">
                    <div class="col-md-12">
                    <label for="">Địa chỉ:</label>
                        <textarea class="form-control" name="diaChi" id=""  rows="3"></textarea>
                    </div>
                </div>
                <div class="rơw mt-3 mb-3">
                    <div class="col-md-12">
                        <label for="">Ghi chú:</label>
                        <textarea class="form-control" name="ghiChu" id=""  rows="3"></textarea>
                    </div>
                </div>
                <div class="row mb-4 justify-content-end">
                    <div class="col-md-3"><button  name="them" type="submit" class=" btn btn-primary">Hoàn tất đơn hàng</button></div>
                </div>
            </form>
            <?php 
            }
            ?> 
        </div>
        <div class="col-md-5">
            <div class="row"><h3 class=" text-danger">Đơn hàng của bạn</h3></div>
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
                foreach ($product as $sp): 
                    $tong += ($sp['gia']*(100 - $sp['khuyenMai'])/100)*$sp['qty'];
                ?>
                <tbody>
                    <tr>
                        <td><img src="<?php echo "./uploads/img/products/".$sp['hinhAnh'] ?>" width="70" height="70" alt=""></td>
                        <td><?php echo $sp['tenSanPham']?><strong><?php echo' x'.$sp['qty'] ?></strong></td>
                        <td><strong><?php echo number_format(($sp['gia']*(100 - $sp['khuyenMai'])/100) * $sp['qty'], 0,'.','.')."₫" ?></strong></td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
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
    </div>
</div>
<script>
const radios = document.querySelectorAll('.form-check-input');
const buttons = document.querySelectorAll('button');

radios.forEach(radio => {
radio.addEventListener('change', () => {
    const selectedRadio = document.querySelector('input[name="myRadio"]:checked');
    
    buttons.forEach(button => {
      if (radio.id === button.id.replace('button', 'radio')) {
        if (radio.checked) {
          button.classList.remove('d-none');
        } else {
          button.classList.add('d-none');
        }
      } else {
        button.classList.add('d-none');
      }
    }); 
    if (!selectedRadio) {
      buttons.forEach(button => {
        button.classList.add('d-none');
      });
    }
  });
});
</script>