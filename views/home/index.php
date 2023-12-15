<?php 
    $this->loadview('menuHome',[
        'category' => $category ?? []
    ]);
    if(isset($_SESSION['order'])){
        echo "sds";
    }
    unset($_SESSION['order']);
    $this->loadview('slide.slideHome',[
        'slide' => $slide,
    ]);
    $this->loadview('products.homeProduct',[
        'spNoiBat' => $spNoiBat,
        'spMoiNhat' => $spMoiNhat,
        'spBanChay' => $spBanChay,
        'spKhuyenMai' => $spKhuyenMai,
    ]);
?>