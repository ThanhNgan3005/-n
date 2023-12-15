<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="admin.php?controller=dashboard">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hóa đơn</li>
                </ol>
            </nav>
        </div>
    </div>
<div class="container-fluid bg-white pt-3">
    <div class="row" style="align-items: center;">
        <div class=" input-group mb-3 p-0">
            <form action="?controller=order&action=search" method="POST" class=" d-flex container">
                <button class=" btn btn-outline-secondary dropdown-toggle rounded-0 rounded-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-funnel-fill"></i> Bộ lọc
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <?php 
                        $txt ='';
                            if(!isset($_GET['sort'])){
                                $txt = 'active';
                            }
                        ?>
                        <a class="dropdown-item <?php echo $txt ?>" href="admin.php?controller=order">Tất cả đơn hàng</a>
                    </li>
                    <li>
                        <?php 
                        $txt ='';
                            if(isset($_GET['sort']) && $_GET['sort'] === "0"){
                                $txt = 'active';
                            }
                        ?>
                        <a class="dropdown-item <?php echo $txt ?>" href="admin.php?controller=order&sort=0">Đơn hàng chờ duyệt</a>
                    </li>
                    <li>
                    <?php 
                        $txt ='';
                            if(isset($_GET['sort']) && $_GET['sort'] === "1"){
                                $txt = 'active';
                            }
                        ?>
                        <a class="dropdown-item <?php echo $txt ?>" href="admin.php?controller=order&sort=1">Đơn hàng đã giao</a>
                    </li>
                    <li>
                    <?php 
                        $txt ='';
                            if(isset($_GET['sort']) && $_GET['sort'] === "2"){
                                $txt = 'active';
                            }
                        ?>
                        <a class="dropdown-item <?php echo $txt ?>" href="admin.php?controller=order&sort=2">Đơn hàng đã hủy</a>
                    </li>
                </ul>
                <input type="text" class="form-control rounded-0 border-secondary border-start-0 border-end-0" name="txtSearch" aria-label="Text input with dropdown button" placeholder="Nhập tên sản phẩm cần tìm....">
                <button class="btn btn-outline-secondary rounded-0 rounded-end" name="search" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>
</div>
<table class="table table-light table-striped table-hover m-0">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã đơn</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Trạng thái</th>
                <th class=" text-center">Xử lí</th>
                <th scope="col">Tác vụ</th>
            </tr>
        </thead>
        <?php 
                $i = 1;
                while($dh = mysqli_fetch_array($order)): 
        ?>
        <tbody>
            <tr>
                <td scope="row"><?php echo $i ?></td>
                <td><?php echo $dh['idDonHang']?></td>
                <td><?php echo date("d/m/Y", strtotime($dh['ngayDat'])) ?></td>
                <td><?php echo $dh['tenNguoiDung']?></td>
                <td><?php echo $dh['SDT']?></td>
                <td>
                     <strong>
                    <?php
                        switch($dh['trangThai']){
                            case '0':
                                echo "Đang chờ duyệt";
                                break;
                            case '1':
                                echo "Đã giao";
                                break;    
                            case '2':
                                echo "Đã hủy";
                                break;
                        }
                    ?>
                    </strong>
                </td>
                <td class=" text-center">
                    <?php
                       if($dh['trangThai'] === '0'){ ?>
                        <button class="btn btn-primary"><a class=" nav-link" href="?controller=order&action=confirm&id=<?php echo $dh['idDonHang'] ?>&trangThai=1">Duyệt đơn</a></button>
                    <?php  
                       }
                    ?>
                    <?php
                       if($dh['trangThai'] === '0'){ ?>
                        <button class="btn btn-danger"><a onclick="confirmDelete(event)" class=" nav-link" href="?controller=order&action=confirm&id=<?php echo $dh['idDonHang'] ?>&trangThai=2">Hủy đơn</a></button>
                    <?php  
                       }
                    ?>
                </td>
                <td>
                    <button type="button" class="btn btn-success">
                        <a class="text-white" href="admin.php?controller=order&action=detail&id=<?php echo $dh['idDonHang']; ?>">
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
    $count = mysqli_num_rows($countOrder);
    $trang = ceil($count/10);
?>
<div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="admin.php?controller=order&<?php if(isset($_GET['sort'])){echo 'sort='.$sort.'&';}?>page=<?php $move = $page - 1;if($move > 1){echo $move;}else{echo 1;} ?>" 
                                aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for($i = 1; $i <= $trang; $i++){
                        ?>
                            <li class="page-item">
                                <a class="page-link <?php if($i == $page){echo 'text-bg-primary';} ?>" 
                                    href="admin.php?controller=order&<?php if(isset($_GET['sort'])){echo 'sort='.$sort.'&';}?>page=<?php echo $i; ?>"><?php echo $i; ?>
                                </a>
                            </li>
                        <?php
                            }
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="admin.php?controller=order&<?php if(isset($_GET['sort'])){echo 'sort='.$sort.'&';}?>page=<?php $move = $page + 1;if($move <= $trang){echo $move;}else{echo $trang;}?>"
                                 aria-label="Next">
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
            var isConfirmed = confirm("Bạn chắc chắn muốn hủy đơn hàng?");

            // Nếu người dùng đồng ý xóa sản phẩm
            if (isConfirmed) {
                // Xóa sản phẩm và ngăn chặn sự kiện mặc định của nút delete
                alert("Đơn hàng đã bị hủy!");
            } else {
                // Ngăn chặn sự kiện mặc định của nút delete
                event.preventDefault();
            }
        }
    </script>