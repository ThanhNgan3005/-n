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
                        <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
<div class="container bg-dark-subtle">
    <div class="row row-cols-3 justify-content-center pt-3 pb-3 ">
        <form action="?controller=user&action=login" method="POST">
            <h3 class=" text-center text-white">Đăng nhập</h3>
            <div class="col">
                <label for="tk" class="form-label">Tài khoản:</label>
                <input type="text" class="form-control" id="tk" placeholder="Nhập tên tài khoản" name="taiKhoan">
            </div>
            <div class="col mt-3">
                <label for="pwd" class="form-label">Mật khẩu:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="matKhau">
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
                <button type="submit" name="login" class="btn btn-primary mt-3">Đăng nhập</button>
            </div>
        </form>
    </div>
</div>
<!-- <div class="row row-cols-3 justify-content-center p-3 border">
    <form action="?controller=user&action=login" method="POST">
    <h3 class="r text-center text-white">Đăng nhập</h3>
    <div class="col">
        <label for="tk" class="form-label">Tài khoản:</label>
        <input type="text" class="form-control" id="tk" placeholder="Nhập tên tài khoản" name="taiKhoan">
    </div>
    <div class="col mt-3">
        <label for="pwd" class="form-label">Mật khẩu:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="matKhau">
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
        <button type="submit" name="login" class="btn btn-primary mt-3">Đăng nhập</button>
    </div>
    </form>
</div> -->