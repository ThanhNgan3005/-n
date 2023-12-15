<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="?controller=category">Danh mục</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tìm danh mục</li>
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
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <?php 
                $i = 1;
                while($dm = mysqli_fetch_array($txtSearch)): 
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
