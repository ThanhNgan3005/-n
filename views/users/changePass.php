<?php 
     if($_SESSION['idQuyen'] !=1){       
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
                        <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
   <?php
   }
   else{
   ?>
   <div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Đổi thông tin</li>
                </ol>
            </nav>
        </div>
    </div>   
    <?php } ?>
<div class="row row-cols-3 justify-content-center p-3 ">
    <form action="" method="POST">
        <h3 class="r text-center text-black">Xác nhận thông tin</h3>
        <div class="col">
            <label for="tk" class="form-label">Mật khẩu hiện tại:</label>
            <input type="password" class="form-control" id="tk" placeholder="Nhập mật khẩu hiện tại" name="matKhau">
        </div>
        <div class="col mt-3">
            <label for="tk" class="form-label">Mật khẩu mới:</label>
            <input type="password" class="form-control" id="tk" placeholder="Nhập mật khẩu mới" name="matKhauMoi">
        </div>
        <div class="col mt-3">
            <label for="tk" class="form-label">Xác nhận mật khẩu mới:</label>
            <input type="password" class="form-control" id="tk" placeholder="Xác nhận mật khẩu mới" name="matKhauMoiXacNhan">
        </div>
        <?php while($user = mysqli_fetch_assoc($getInfo)): ?>
        <input type="hidden" name="maNguoiDung" value="<?php echo $user['maNguoiDung'] ?>">         
        <?php endwhile; ?>
        <div class="col mt-3 text-end">
            <p>
                <?Php 
                    if(isset($txtErro) && ($txtErro !='')){
                        echo $txtErro;
                    }
                ?>
            </p>
        </div>
        <div class="col mt-3 text-end">
            <button type="submit" name="confirm" class="btn btn-primary mt-3">Cập nhật</button>
        </div>
    </form>
</div>