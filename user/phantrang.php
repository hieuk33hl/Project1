<?php
  session_start();
    $con = mysqli_connect('localhost','root','','do_an1');
    // Set sẵn số sản phẩm trên 1 trang
	$limit = 8;
	$start = 0;
	// Viết câu sql đếm tổng sản phẩm
	$sqlDemSp = "SELECT COUNT(*) AS tongSoSp FROM `san_pham`";
	$resultDemSp = mysqli_query($con, $sqlDemSp);
	$demSp = mysqli_fetch_array($resultDemSp);
	// Lấy tổng số trang 
	$tongTrang = ceil($demSp["tongSoSp"] / $limit);
	if (isset($_GET["trang"])) {
	$trang = $_GET["trang"];
	$start = ($trang - 1) * $limit;
	}
	$sql = "SELECT * FROM san_pham LIMIT $start,$limit";
	$result = mysqli_query($con, $sql);
	mysqli_close($con); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../Font/fontawesome-free-5.15.1-web/css/all.min.css"/>
	<link rel="stylesheet" href="../CSS/main.css" />
	<link rel="stylesheet" href="../CSS/base.css" />
</head>
<body>
	<!-- Grid -- Row-- Colum  -->
	<div class="main-container">
		<div class="grid">
			<div class="grid__row">
				<div class="grid__column2" style="display:none;">   <!-- chia ra 2 cot lam category -->
					<nav class="category">
						<ul class="category-menu_doc">
							<li class="category-li">
								<h2 class="category-heading">
									<i class="icon fas fa-list-ul"></i>  Danh mục
								</h2>
								<ul class="category-list">
									<li class="category-items">
										<a href="" class="category-items_link">Giày leo núi</a>
									</li>
									<li class="category-items">
										<a href="" class="category-items_link">Giày	chạy bộ</a>
									</li>
									<li class="category-items">
										<a href="" class="category-items_link">Giày	chạy thể thao</a>
									</li>
								</ul>
							</li>
						</ul>
						
						
					</nav>
				</div>
                
				<div class="grid__column10">
					<div class="products">
						<div class="grid__row grid__row__2">
                        <?php
                            while ($sanPham = mysqli_fetch_array($result)) {
                        ?>
							<div class="grid__column2_4"> <!-- chia ra 5sp trên 1 hàng -->
								<div class="product-item">  
									<a href="detail.php?ma_sp=<?php echo $sanPham["ma_sp"] ?>">
										<div class="product-item__img" style="background-image: url(<?php echo $sanPham["anh_sp"]; ?>);"></div>
									</a>
									<h4 class="product-item__name"><a href=""><?php echo $sanPham["ten_sp"]; ?></a></h4>
									<div class="product-item__price"><span class=""><?= number_format($sanPham['gia_sp'], 0, ",",".") ?>&nbsp;VNĐ</span></div>
									<div class="product-item__star">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star-half-alt"></i>
										<i class="far fa-star"></i>
									</div>
								</div>
							</div>
                            <?php } ?>
						</div>
					</div>
				</div>
		</div>
	</div>
    </div>
</body>
</html>
                