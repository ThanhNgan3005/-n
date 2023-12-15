

<!-- slide -->
<div class="container-fluid p-0">
    <div id="carouselExampleIndicators" class="carousel slide carousel-dark" data-bs-ride="carousel">
        <div class="carousel-inner">
        <?php 
            $i = 0;
            while($row = mysqli_fetch_array($slide)):
        ?>
            <div class="carousel-item <?php if ($i == 0){echo 'active';} ?>">
                <a href="<?php echo $row['duongDan'] ?>"><img src= "<?php echo "./uploads/img/slide/".$row['hinhAnh'] ?>" class="d-block w-100" alt="..."></a>
            </div>
        <?php $i++; endwhile; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
