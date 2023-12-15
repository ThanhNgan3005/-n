<div class="flex-shrink-0 p-3 bg-white me-2" style="width: 280px;">
        <a href="admin.php?controller=dashboard" class=" d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom justify-content-center">
        <!-- <span class="fs-5 fw-semibold text-center">Trang Admin</span> -->
        <span class="text-center">
          <img src="./uploads/img/avarta/quochg.jpg" alt="Logo" width="150" height="150" class="rounded-circle" alt="Cinque Terre"> 
          <p class=" mt-1"><?php echo $_SESSION['tenNguoiDung'] ?></p>
        </span>

      </a>
      <ul class="list-unstyled ps-0">
        <li class="mb-1">
        <?php 
            if(isset($_GET['controller']) && $_GET['controller'] == 'dashboard'){
                $text = ' text-bg-primary"';
                $selected="selected";
            }
            else{
                $text = ' text-black';
                $selected = '';
            }
        ?>
            <a href="?controller=dashboard" class=" text-decoration-none">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed  <?php echo $text ?>" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                <i class="bi bi-house-fill me-2"></i>Dashboard
                </button>
            </a>
        </li>

        <li class="mb-1">
        <?php 
            if(isset($_GET['controller']) && $_GET['controller'] == 'category'){
                $text = ' text-bg-primary"';
                $selected="selected";
            }
            else{
                $text = ' text-black';
                $selected = '';
            }
        ?>
          <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed <?php echo $text ?>" data-bs-toggle="collapse" data-bs-target="#dm-collapse" aria-expanded="false">
          <i class="bi bi-bookmark-fill me-2" ></i>Quản lí danh mục
          </button>
          <div class="collapse" id="dm-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
              <li><a href="admin.php?controller=category" class="link-dark d-inline-flex text-decoration-none rounded p-2"><i class="bi bi-arrow-right-short me-1"></i>Tất cả danh mục</a></li>
              <li><a href="admin.php?controller=category&action=insert" class="link-dark d-inline-flex text-decoration-none rounded p-2"><i class="bi bi-arrow-right-short me-1"></i>Thêm danh mục</a></li>
            </ul>
          </div>
        </li>

        <li class="mb-1">
        <?php 
            if(isset($_GET['controller']) && $_GET['controller'] == 'product'){
                $text = ' text-bg-primary"';
            }
            else{
                $text = ' text-black';
            }
        ?>
          <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed <?php echo $text  ?>" data-bs-toggle="collapse" data-bs-target="#sp-collapse" aria-expanded="false">
          <i class="bi bi-phone-fill me-2" ></i>Quản lí sản phẩm
          </button>
          <div class="collapse" id="sp-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                <li><a href="admin.php?controller=product" class="link-dark d-inline-flex text-decoration-none rounded p-2"><i class="bi bi-arrow-right-short me-1"></i>Tất cả sản phẩm</a></li>
                <li><a href="admin.php?controller=product&action=insert" class="link-dark d-inline-flex text-decoration-none rounded p-2"><i class="bi bi-arrow-right-short me-1"></i>Thêm sản phẩm</a></li>
                <li><a href="admin.php?controller=product&action=proDeleted" class="link-dark d-inline-flex text-decoration-none rounded p-2"><i class="bi bi-arrow-right-short me-1"></i>Sản phẩm đã xóa</a></li>
            </ul>
          </div>
        </li>

        <li class="mb-1">
        <?php 
            if(isset($_GET['controller']) && $_GET['controller'] == 'slide'){
                $text = ' text-bg-primary"';
                $selected="selected";
            }
            else{
                $text = ' text-black';
                $selected = '';
            }
        ?>
          <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed <?php echo $text; ?>" data-bs-toggle="collapse" data-bs-target="#slide-collapse" aria-expanded="false">
          <i class="bi bi-image-fill me-2" ></i>Quản lí Slide
          </button>
          <div class="collapse" id="slide-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                <li><a href="admin.php?controller=slide" class="link-dark d-inline-flex text-decoration-none rounded p-2"><i class="bi bi-arrow-right-short me-1"></i>Tất cả slide</a></li>
                <li><a href="admin.php?controller=slide&action=insert" class="link-dark d-inline-flex text-decoration-none rounded p-2"><i class="bi bi-arrow-right-short me-1"></i>Thêm slide</a></li>
            </ul>
          </div>
        </li>

        <li class="mb-1">
        <?php 
            if(isset($_GET['controller']) && $_GET['controller'] == 'order'){
                $text = ' text-bg-primary"';
            }
            else{
                $text = ' text-black';
            }
        ?>
          <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed <?php echo $text  ?>" data-bs-toggle="collapse" data-bs-target="#hd-collapse" aria-expanded="false">
          <i class="bi bi-receipt-cutoff me-2"></i>Quản lí hóa đơn
          </button>
          <div class="collapse" id="hd-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                <li><a href="admin.php?controller=order" class="link-dark d-inline-flex text-decoration-none rounded p-2"><i class="bi bi-arrow-right-short me-1"></i>Tất cả hóa đơn</a></li>
            </ul>
          </div>
        </li>

        <li class="border-top my-3"></li>
        <li class="mb-1">
        <?php 
            if(isset($_GET['controller']) && $_GET['controller'] == 'user'){
                $text = ' text-bg-primary"';
                $selected="selected";
            }
            else{
                $text = ' text-black';
                $selected = '';
            }
        ?>
          <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed <?php echo $text; ?>" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
          <i class="bi bi-person-fill-gear me-2" ></i>Tài khoản
          </button>
          <div class="collapse" id="account-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                <li><a href="admin.php?controller=user&action=changeInfo" class="link-dark d-inline-flex text-decoration-none rounded p-2"><i class="bi bi-arrow-right-short me-1"></i>Thay đổi thông tin</a></li>
                <li><a href="admin.php?controller=user&action=changePass" class="link-dark d-inline-flex text-decoration-none rounded p-2"><i class="bi bi-arrow-right-short me-1"></i>Đổi mật khẩu</a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="link-dark d-inline-flex text-decoration-none rounded p-2"><i class="bi bi-arrow-right-short me-1"></i>Đăng xuất</a></li>

            </ul>
          </div>
        </li>
      </ul>
    </div>

<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span>Bạn có muốn đăng xuất ?</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                <a href="admin.php?controller=user&action=logout" class="text-white d-inline-flex text-decoration-none">
                    Đăng xuất
                </a>
                </button>
            </div>
        </div>
    </div>
</div> 