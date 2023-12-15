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
                        <li class="breadcrumb-item active" aria-current="page">Đổi thông tin</li>
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
<?php 
   }
    while($user = mysqli_fetch_assoc($getInfo)): ?>
<div class="row row-cols-3 justify-content-center p-3">
    <form action="" method="POST">
        <h3 class="r text-center text-black">Đổi thông tin</h3>
        <div class="col">
            <label for="tk" class="form-label">Tên người dùng:</label>
            <input type="text" class="form-control" id="tk" value="<?php echo $user['tenNguoiDung'] ?>" name="tenNguoiDung">
        <div class="col mt-3">
            <label for="tk" class="form-label">Số điện thoại:</label>
            <input type="text" class="form-control" id="tk" value="<?php echo $user['SDT'] ?>" name="SDT">
        </div>
        <div class="col mt-3">
            <label for="tk" class="form-label">Email:</label>
            <input type="email" class="form-control" id="tk" value="<?php echo $user['email'] ?>" name="email">
        </div>
        <div class="col mt-3">
            <label for="tk" class="form-label">Địa chỉ:</label>
            <input type="text" class="form-control" id="tk" value="<?php echo $user['diaChi'] ?>" name="diaChi">
        </div>
        <input type="hidden" name="maNguoiDung" value="<?php echo $user['maNguoiDung'] ?>">         
        <div class="col mt-3 text-end">
            <button type="submit" name="sua" class="btn btn-primary mt-3">Cập nhật</button>
        </div>
    </form>
</div>
<?php 
    endwhile; 
?>
