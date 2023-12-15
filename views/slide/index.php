<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="admin.php?controller=dashboard">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Slide</li>
                </ol>
            </nav>
        </div>
    </div>
    <table class="table table-light table-striped table-hover m-0">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Đường dẫn</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <?php 
                $i = 1;
                while($row = mysqli_fetch_array($slide)): 
        ?>
        <tbody>
            <tr>
                <td scope="row"><?php echo $i ?></td>
                <td><?php echo $row['duongDan']?></td>
                <td><img src="<?php echo "./uploads/img/slide/".$row['hinhAnh'] ?>" width="350" alt=""></td>
                <td>
                        <button type="button" class="btn btn-primary">
                            <a class="text-white" href="admin.php?controller=slide&action=update&id=<?php echo $row['idSlide']; ?>">
                                <i class="bi bi-pen-fill"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                            <a  class= "text-white" href="admin.php?controller=slide&action=delete&id=<?php echo $row['idSlide'] ?>">
                                <i class="bi bi-trash3-fill"></i>
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
