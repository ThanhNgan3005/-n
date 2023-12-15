<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="admin.php?controller=dashboard">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</li>
                </ol>
            </nav>
        </div>
    </div>

<form action="" method="POST">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <select name="idDanhMuc" class="form-select"aria-label="default input example">
                        <option selected>Chọn mục sản phẩm</option>
                    <?php while($dm = mysqli_fetch_array($category)): ?>
                        <option value="<?php echo $dm['idDanhMuc'] ?>"><?php echo $dm['tenDanhMuc'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-6">
                <input class="form-control" type="text" name="tenSanPham" placeholder="Tên sản phẩm" aria-label="default input example">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-3">
                <input type="file" class="form-control" name="hinhAnh" >
            </div>
            <div class="col-md-3">
                <input class="form-control" type="text" name="gia" placeholder="Giá" oninput="formatPrice(this) " aria-label="default input example">
            </div>
            <div class="col-md-3">
                <input class="form-control" type="text" name="khuyenMai" placeholder="Khuyến mãi" aria-label="default input example">
            </div>
            <div class="col-md-3">
                <select name="noiBat" class="form-select"aria-label="default input example">
                    <option selected>Chọn nổi bật</option>
                    <option value="0">Không nổi bật</option>
                    <option value="1">Nổi bật</option>
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col"><textarea name="moTa" id="editor" cols="30" rows="10" >Nhập mô tả...</textarea></div>
        </div>

        <div class="row mt-4 mb-5">
            <div class="col text-center">
                <button type="submit" name="them" class="btn text-bg-primary">Thêm</button>
            </div>
        </div>
        
    </div>
</form>