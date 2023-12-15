<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="admin.php?controller=dashboard">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="?controller=product">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tìm sản phẩm</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container bg-white mb-2 ">
        <div class="col-md-4">
            <h4>Sản phẩm tìm được</h4>
        </div>
    </div>
    <p>
        <?Php 
            if(isset($txtErro) && ($txtErro !='')){
                echo $txtErro;
            }
        ?>
    </p>
    <table class="table table-light table-striped table-hover m-0">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Mã sản phẩm</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Khuyến mãi</th>
                <th scope="col">Nổi bật</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <?php 
                $i = 1;
                while($sp = mysqli_fetch_array($txtSearch)): 
        ?>
        <tbody>
            <tr>
                <td scope="row"><?php echo $i ?></td>
                <td><?php echo $sp['tenDanhMuc']?></td>
                <td><?php echo $sp['idSanPham'] ?></td>
                <td><?php echo $sp['tenSanPham'] ?></td>
                <td><img src="<?php echo "./uploads/img/products/".$sp['hinhAnh'] ?>" width="50" height="50" alt=""></td>
                <td><?php echo number_format($sp['gia'],0,'.','.') ?></td>
                <td><?php echo $sp['khuyenMai'].'%' ?></td>
                <td><?php echo $sp['noiBat'] ?></td>
                <td>
                        <button type="button" class="btn btn-primary">
                            <a class="text-white" href="admin.php?controller=product&action=update&id=<?php echo $sp['idSanPham']; ?>">
                                <i class="bi bi-pen-fill"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                            <a  class= "text-white" href="admin.php?controller=product&action=delete&id=<?php echo $sp['idSanPham'] ?>">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                            <a  class= "text-white" href="admin.php?controller=product&action=detail&id=<?php echo $sp['idSanPham'] ?>">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                        </button>                        
                    </td>
                </tr>
            </tbody>
        <?php 
            $i++;
            endwhile;
        ?>
    </table>