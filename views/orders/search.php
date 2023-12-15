<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="admin.php?controller=dashboard">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="?controller=order">Đơn hàng</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tìm đơn hàng</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container bg-white mb-2 ">
        <div class="col-md-4">
            <h4>Đơn hàng tìm được</h4>
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
                while($dh = mysqli_fetch_array($txtSearch)): 
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