<div class="container-fluid bg-white mb-2">
        <div class="row pt-2 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thống kê</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-between mb-2">
            <div class="col-md-3 b">
                <div class="row text-white">
                    <div class="col-md-4" style="background:   #ff471a;">
                        <i class="bi bi-bar-chart-line-fill" style="font-size: 80px;"></i>
                    </div>
                    <div class="col-md-8 ps-3" style="background: #ff5c33;">
                        <div class="row justify-content-start mt-3 fs-5">Doanh thu hệ thống</div>
                        <?php $tkdt = mysqli_fetch_assoc($tkTongDoanhThu) ?>
                        <div class="row mt-2"><strong class=" p-0"><?php echo number_format($tkdt['tong'],0,'.','.')." VNĐ" ?></strong></div>
                    </div>
                </div>  
            </div>
            <div class="col-md-3">
                <div class="row text-white">
                    <div class="col-md-4" style="background:  #1aa3ff;">
                        <i class="bi bi-phone-fill"style="font-size: 80px;"></i>
                    </div>
                    <div class="col-md-8 ps-3" style="background:  #33adff;">
                        <div class="row justify-content-start mt-3 fs-5">Sản phẩm đã bán</div>
                        <?php $tksp = mysqli_fetch_assoc($tkSanPham) ?>
                        <div class="row mt-2"><strong class="p-0"><?php echo $tksp['spBanDuoc']." Sản phẩm"?></strong></div>
                    </div>
                </div>  
            </div>
            <div class="col-md-3">
                <div class="row text-white">
                    <div class="col-md-4" style="background: #00e600 ;">
                    <i class="bi bi-receipt" style="font-size: 80px;"></i>
                    </div>
                    <div class="col-md-8 ps-3" style="background: #33ff33 ;">
                        <div class="row justify-content-start mt-3 fs-5">Tổng hóa đơn</div>
                        <?php $thd = mysqli_fetch_assoc($tongHoaDon) ?>
                        <div class="row mt-2"><strong class=" p-0"><?php echo $thd['tong']." Hóa đơn" ?></strong></div>
                    </div>
                </div>  
            </div>
           
        </div>
        <div class="row justify-content-between"style="height: 300px;">
            <div class=" col-md-6 p-0" id="hoaDon"></div>
            <div class=" col-md-6 ps-2 p-0"id="chart_div"></div>
        </div>
        <div class="row mt-2 bg-white">
            <div class="col-md-12 mt-2">
                <button class=" btn btn-outline-dark dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-funnel-fill"></i> Lọc thống kê
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item <?php echo $txt ?>" href="admin.php?controller=dashboard">Thống kê theo năm</a>
                    </li>
                    <li>
                        <a class="dropdown-item <?php echo $txt ?>" href="admin.php?controller=dashboard&sort=tkNgay">Thống kê theo ngày</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12 mb-3" id="chart_div1" style="height: 300px;"></div>
            <!-- <div class="col-md-12" id="thongKeDoanhThu" style="height: 400px;"></div> -->
        </div> 

    </div>


<script>
    function drawChart() {
     var data = google.visualization.arrayToDataTable([
       ['Tên danh mục', 'Số lượng sản phẩm'],
       <?php 
            foreach($countProCate as $tk){
                extract($tk);
                echo "['".$tk['tenDanhMuc']."',".$tk['tong']."],";
            }
       ?>
     ]);
     var options = {
       title: 'Tổng sản phẩm theo danh mục',
    };
     var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
     chart.draw(data, options);    
     
   }

    //phan loai hoa don
     function drawChart1() {

        var data = google.visualization.arrayToDataTable([
            ['Đơn hàng', 'Số lượng'],
            <?php 
                $cd = mysqli_fetch_array($countChoDuyet);
                $dg = mysqli_fetch_array($countDaGiao);
                $dh = mysqli_fetch_array($countDaHuy);
                echo "['Chờ duyệt',".$cd['tong']."],";
                echo "['Đã giao',".$dg['tong']."],";
                echo "['Đã hủy',".$dh['tong']."],";
            ?>
            ]);

        var options = {
            title: 'Thống kê số lượng hóa đơn',
                animation: {
                startup: true,
                duration: 1000,
                easing: 'out'
        },
        chartArea: {width: '50%'}
        };
        var chart = new google.visualization.BarChart(document.getElementById('hoaDon'));
        chart.draw(data, options);
    }
    function drawChart2() {
  // Tạo data table
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Ngày');
    data.addColumn('number', 'Tổng tiền');
    data.addRows([
        <?php 
            foreach($tkDoanhThu as $tk):
        ?>
        ['<?php echo date("d/m/y", strtotime($tk['ngayDat'])) ?>',<?php echo $tk['tong'] ?>],
    //   ['10A1', 43],
    //   ['10A2', 41],
    //   ['10A3', 41],
    //   ['10A4', 40],
    //   ['10A5', 42]
      <?php
            endforeach;
        ?>
    ]);
    
    // Set option của biểu đồ
    var options = {
      'title': 'Thống kê doanh thu <?php echo $sort ?>',
      'colors': ['#e65c00'],   
      'animation': {
        'startup': true,
        'duration': 1000,
        'easing': 'out'
        },
        'vAxis': {
        'viewWindow': {
            'min': 0
        }
        },
        'hAxis': {
        'slantedTextAngle': 45
        }
      
    };

    // Vẽ biểu đồ từ data và option đã khai báo
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
    chart.draw(data, options);
  }
</script>