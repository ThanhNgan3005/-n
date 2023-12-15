<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="admin.php?controller=dashboard">Trang chủ</a></li>
                <li class="breadcrumb-item"><a class="text-decoration-none" href="admin.php?controller=product">Sản phẩm</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sửa sản phẩm</li>
            </ol>
        </nav>
    </div>
 </div>
<?php while($sp = mysqli_fetch_assoc($product)): ?>
<form action="" method="POST">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <label for="dm" class="form-label">Danh mục:</label>
                <select name="idDanhMuc" class="form-select"aria-label="default input example">
                        <option value="<?php echo $sp['idDanhMuc'] ?>"><?php echo $sp['tenDanhMuc'] ?></option>
                    <?php while($dm = mysqli_fetch_array($category)): ?>
                        <option value="<?php echo $dm['idDanhMuc'] ?>"><?php echo $dm['tenDanhMuc'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="tsp" class="form-label">Tên sản phẩm:</label>
                <input class="form-control" id="tsp" type="text" name="tenSanPham" value="<?php echo $sp['tenSanPham'] ?>" aria-label="default input example">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-3">
                <label for="ha" class="form-label">Hình ảnh:</label>
                <input class="form-control" id="ha" type="file" name="hinhAnh" value="<?php echo "./uploads/img/products/".$sp['hinhAnh'] ?>" >
                <img src="<?php echo "./uploads/img/products/".$sp['hinhAnh'] ?>" alt="" width="150" class=" mt-2">
            </div>
            <div class="col-md-3">
                <label for="tk" class="form-label">Giá:</label>
                <input class="form-control" id="gia" type="text" name="gia" value="<?php echo number_format($sp['gia'], 0,'.','.') ?>" oninput="formatPrice(this) " aria-label="default input example">
            </div>
            <div class="col-md-3">
                <label for="km" class="form-label">Khuyến mãi:</label>
                <input class="form-control" id="km" type="text" name="khuyenMai" value="<?php echo $sp['khuyenMai'] ?>" aria-label="default input example">
            </div>
            <div class="col-md-3">
                <label for="tk" class="form-label">Nổi bật:</label>
                <select name="noiBat" id="nb" class="form-select"aria-label="default input example">
                    <?php 
                        if($sp['noiBat'] == 1){
                            $noiBat = "Nổi bật";
                        }
                        else{
                            $noiBat = "Không nổi bật";
                        }
                    ?>
                    <option selected ><?php echo $noiBat ?></option>
                    <option value="0">Không nổi bật</option>
                    <option value="1">Nổi bật</option>
                </select>
            </div>
        </div>

        <div class="row mt-4">
            <label  class="form-label">Mô tả:</label>
            <div class="col"><textarea name="moTa" id="editor" cols="30" rows="10" ><?php echo $sp['moTa']; ?></textarea></div>
        </div>

        <div class="row mt-4 mb-5">
            <div class="col text-center">
                <input type="hidden" name="idSanPham" value="<?php echo $sp['idSanPham'] ?>">
                <button type="submit" name="sua" class="btn text-bg-primary">Cập nhật</button>
            </div>
        </div>

    </div>
</form>
<?php endwhile; ?>