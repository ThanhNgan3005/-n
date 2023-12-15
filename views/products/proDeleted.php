<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="admin.php?controller=dashboard">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sản phẩm đã xóa</li>
                </ol>
            </nav>
        </div>
    </div>
<div class="container-fluid bg-white pt-3">
    <div class="row" style="align-items: center;">
        <div class=" input-group mb-3 p-0">
            <form action="?controller=product&action=search" method="POST" class=" d-flex container">
                <button class=" btn btn-outline-secondary dropdown-toggle rounded-0 rounded-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-funnel-fill"></i> Bộ lọc
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="admin.php?controller=product&action=proDeleted">Tất cả sản phẩm đã xóa</a></li>
                    <?php while($dm = mysqli_fetch_array($category)): ?>
                    <li>
                        <a class="dropdown-item" href="admin.php?controller=product&action=proDeleted&sort=<?php echo $dm['idDanhMuc'] ?>"><?php echo 'Lọc theo danh mục: '.$dm['tenDanhMuc'] ?></a>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <input type="text" class="form-control rounded-0 border-secondary border-start-0 border-end-0" id="txtSearch" onkeyup="myFunction()" name="txtSearch" aria-label="Text input with dropdown button" placeholder="Nhập tên sản phẩm cần tìm....">
                <button class="btn btn-outline-secondary rounded-0 rounded-end" name="search" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>
</div>
    <table  class="table table-light table-striped table-hover m-0">
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
            while($sp = mysqli_fetch_array($pageProduct)): 
        ?>
        <tbody id="myTable">
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
                    <button type="button" class="btn btn-warning" id="xoa">
                        <a  class= "text-white" href="admin.php?controller=product&action=changeDisplay&hienThi=1&id=<?php echo $sp['idSanPham'] ?>">
                            <i class="bi bi-arrow-clockwise"></i>
                        </a>
                    </button>
                    <button type="button" class="btn btn-danger" id="xoa">
                            <a  class= "text-white" onclick="confirmDelete(event)" href="admin.php?controller=product&action=delete&id=<?php echo $sp['idSanPham'] ?>">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                        </button>
                    <button type="button"  class="btn btn-success">
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
    <?php
    if(isset($_GET['sort'])){
        $rowcount = mysqli_num_rows($allSortCategory);
        $trang = ceil($rowcount/10);
    }
    else{
        $rowcount = mysqli_num_rows($allProduct);
        $trang = ceil($rowcount/10);
    }
    ?>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for($i = 1; $i <= $trang; $i++){
                        ?>
                            <li class="page-item">
                                <a class="page-link <?php if($i == $page){echo 'text-bg-primary';} ?>" 
                                    href="admin.php?controller=product&action=proDeleted&<?php if(isset($_GET['sort'])){echo 'sort='.$sort.'&';}?>page=<?php echo $i; ?>"><?php echo $i; ?>
                                </a>
                            </li>
                        <?php
                            }
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
<script>
     function confirmDelete(event) {
            // Hiển thị thông báo xác nhận
            var isConfirmed = confirm("Bạn chắc chắn muốn xóa sản phẩm ?");

            // Nếu người dùng đồng ý xóa sản phẩm
            if (isConfirmed) {
                // Xóa sản phẩm và ngăn chặn sự kiện mặc định của nút delete
                alert("Xóa thành công!");
            } else {
                // Ngăn chặn sự kiện mặc định của nút delete
                event.preventDefault();
            }
        }
</script>
<script>
    $(document).ready(function(){
    $("#txtSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>