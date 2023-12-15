<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="admin.php?controller=dashboard">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="?controller=slide&action=show">Slide</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm slide</li>
                </ol>
            </nav>
        </div>
    </div>
<?php while($row = mysqli_fetch_assoc($slide)): ?>
<form action="" method="POST">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <label for="">Đường dẫn: </label>
                <input class="form-control" type="text" name="duongDan" value="<?php echo $row['duongDan'] ?>" >
            </div>
            <div class="col-md-3">
                <label for="">Hình ảnh: </label>
                <input class="form-control" type="file" name="hinhAnh" >
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-1">
                <button type="submit" name="sua" class="btn text-bg-primary">Cập nhật</button>
            </div>
        </div>
    </div>
</form>
<?php endwhile; ?>