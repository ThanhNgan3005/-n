
    <div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh mục</li>
                </ol>
            </nav>
        </div>
    </div>
<div class="container-fluid bg-white pt-3">
    <div class="row" style="align-items: center;">
        <div class=" input-group mb-3 p-0">
            <form action="?controller=category&action=search" method="POST" class=" d-flex container">
                <button class=" btn btn-outline-secondary dropdown-toggle rounded-0 rounded-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-funnel-fill"></i> Bộ lọc
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="admin.php?controller=product"></a></li>
                    <li>
                        <a class="dropdown-item" href="admin.php?controller=product&sort=<>"></a>
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
                <th scope="col">Tên danh mục</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <?php 
                $i = 1;
                while($dm = mysqli_fetch_array($pageCategory)): 
        ?>
        <tbody>
            <tr>
                <td scope="row"><?php echo $i ?></td>
                <td><?php echo $dm['tenDanhMuc']?></td>
                <td>
                        <button type="button" class="btn btn-primary">
                            <a class="text-white" href="admin.php?controller=category&action=update&id=<?php echo $dm['idDanhMuc']; ?>">
                                <i class="bi bi-pen-fill"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                            <a  class= "text-white" href="admin.php?controller=category&action=delete&id=<?php echo $dm['idDanhMuc'] ?>">
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

    <?php
    $rowcount = mysqli_num_rows($allCategory);
    $trang = ceil($rowcount/10);
    ?>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="admin.php?controller=category&page=<?php $move = $page - 1;if($move > 1){echo $move;}else{echo 1;} ?>"
                             aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for($i = 1; $i <= $trang; $i++){
                        ?>
                            <li class="page-item">
                                <a class="page-link <?php if($i == $page){echo 'text-bg-primary';} ?>" 
                                    href="admin.php?controller=category&page=<?php echo $i; ?>"><?php echo $i; ?>
                                </a>
                            </li>
                        <?php
                            }
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="admin.php?controller=category&page=<?php $move = $page + 1;if($move <= $trang){echo $move;}else{echo $trang;} ?>" 
                            aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>






 <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                        
                </button>
            </div>
        </div>
    </div>
</div>  -->
