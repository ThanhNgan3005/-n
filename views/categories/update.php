<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a class="text-decoration-none" href="admin.php?controller=category">Danh mục</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sửa danh mục</li>
            </ol>
        </nav>
    </div>
 </div>
<?php 
    while($dm = mysqli_fetch_assoc($category)): ?>
<form action="" method="POST">
    <div class="row justify-content-center">
    
            <div class="col-md-3">
                <input class="form-control" type="text" name="tenDanhMuc" value="<?php echo $dm['tenDanhMuc'] ?>" aria-label="default input example">
                <input type="hidden" name="idDanhMuc" value="<?php echo $dm['idDanhMuc'] ?>">
            </div>
            <div class="col-md-3">
                <button type="submit" name="sua" class="btn text-bg-primary">Cập nhật</button>
            </div>
    </div>
</form>
<?php
    endwhile;
?>