<?php 
    $this->loadview('menuHome',[
    'category' => $category,
]);
?>
<form action="?controller=user&action=register" method="POST">
    <div class="container-fluid">
            <div class="container">
                <div class="row pt-2 pb-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php?controller=home">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Đăng ký</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    <div class="container bg-dark-subtle">
        <div class="row text-white text-center"><h2>Đăng ký tài khoản</h2></div>
        <div class="row mt-3 justify-content-center">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="Nhập tên người dùng" name="tenNguoiDung">
                    </div>
                    <div class="col-md-4">
                       <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="SDT">
                    </div>
                </div>

                <div class="row mt-3 mb-3">
                    <div class="col-md-4"><input type="text" class="form-control" placeholder="Nhập tên tài khoản" name="taiKhoan"></div>
                    <div class="col-md-4"><input type="password" class="form-control"  placeholder="Nhập mật khẩu" name="matKhau"></div>
                    <div class="col-md-4"><input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="nhapLaiMatKhau"></div>
                </div>

                <div class="row mt-3 mb-3">
                    <div class="col-md-12"><input type="email" class="form-control" placeholder="Nhập email" name="email"></div>
                </div>

                <div class="col-md-12">
                    <textarea class="form-control" name="diaChi" rows="3" placeholder="Nhập địa chỉ"></textarea>
                </div>
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
                    <button type="submit" name="dangky" class="btn btn-primary">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
</form>
