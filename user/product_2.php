<?php session_start(); ?>
<?php

$id = $_GET['id_category'];
$con = mysqli_connect('localhost', 'root', '', 'da1');
$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 8;   // số sp 1 trang
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
$offset = ($current_page - 1) * $item_per_page;
$products = mysqli_query($con, "SELECT * FROM `san_pham` where the_loai = '$id'  ORDER BY `ma_sp` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
$totalRecords = mysqli_query($con, "SELECT * FROM `san_pham` where the_loai = '$id'");
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $item_per_page);
//category
$category = mysqli_query($con, "SELECT * FROM `the_loai` ");

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Font/fontawesome-free-5.15.1-web/css/all.min.css" />
    <link rel="stylesheet" href="../CSS/main.css" />
    <link rel="stylesheet" href="../CSS/base.css" />
    <link rel="shortcut icon" type="image/png" href="../img/logo.ico" />
</head>

<body>
    <?php include("header.php"); ?>
    <?php include("menu.php"); ?>

    <!-- Grid -- Row-- Colum  -->
    <div class="main-container">
        <div class="grid">
            <div class="grid__row">
                <div class="grid__column2">
                    <!-- chia ra 2 cot lam category -->
                    <nav class=" category">
                        <ul class="category-menu_doc">
                            <li class="category-li">
                                <h2 class="category-heading">
                                    <i class="icon fas fa-list-ul"></i> Danh mục
                                </h2>
                                <ul class="category-list">
                                    <?php
                                    while ($tl = mysqli_fetch_array($category)) {
                                    ?>
                                        <li class="category-items">
                                            <a href="product_2.php?id_category=<?= $tl['ma_tl'] ?>" class="category-items_link"><?= $tl['ten_tl'] ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="grid__column10">
                    <div class="category_heading">
                        <a href="">
                            <h3 class="category_heading-title">- danh sách Sản phẩm</h3>
                        </a>
                        <div class="select">
                            <form method="GET">
                                <select name="" id="sel" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                    <option>Sắp xếp</option>
                                    <option value="?<?= $sortlink ?>field=gia_sp&sort=asc" name="asc" <?php if (isset($_GET['sort']) && $_GET['sort'] == "asc") { ?> selected <?php } ?>>Giá thấp đến cao</option>
                                    <option value="?<?= $sortlink ?>field=gia_sp&sort=desc" name="desc" <?php if (isset($_GET['sort']) && $_GET['sort'] == "desc") { ?> selected <?php } ?>>Giá cao đến thấp</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="products">
                        <div class="grid__row grid__row__2">
                            <?php
                            while ($row = mysqli_fetch_array($products)) {
                            ?>
                                <div class="grid__column2_4">
                                    <!-- chia ra 5sp trên 1 hàng -->
                                    <div class="product-item">
                                        <a href="product_detail.php?ma_sp=<?= $row["ma_sp"] ?>">
                                            <div class="product-item__img" style="background-image: url(../upload/<?= preg_replace('/\s+/', '', $row["anh_sp"]) ?>);"></div>
                                        </a>
                                        <h4 class="product-item__name"><a href=""><?= $row["ten_sp"]; ?></a></h4>
                                        <div class="product-item__price"><span class=""><?= number_format($row['gia_sp'], 0, ",", ".") ?>&nbsp;VNĐ</span></div>
                                        <div class="product-item__star">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <!-- <div class="product-item-new">
											<span class="">New</span>
										</div> -->
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div id="pagination">
            <?php
            if ($current_page > 3) {
                $first_page = 1;
            ?>
                <a class="page-item" href="?id_category=<?= $id ?>?per_page=<?= $item_per_page ?>&page=<?= $first_page ?>"><i class="fas fa-angle-double-left"></i></a>
            <?php
            }
            if ($current_page > 1) {
                $prev_page = $current_page - 1;
            ?>
                <a class="page-item" href="?id_category=<?= $id ?>?per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>"><i class="fas fa-angle-left"></i></a>
            <?php }
            ?>
            <?php for ($num = 1; $num <= $totalPages; $num++) { ?>
                <?php if ($num != $current_page) { ?>
                    <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
                        <a class="page-item" href="?id_category=<?= $id ?>?per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a>
                    <?php } ?>
                <?php } else { ?>
                    <strong class="current-page page-item"><?= $num ?></strong>
                <?php } ?>
            <?php } ?>
            <?php
            if ($current_page < $totalPages - 1) {
                $next_page = $current_page + 1;
            ?>
                <a class="page-item" href="?id_category=<?= $id ?>?per_page=<?= $item_per_page ?>&page=<?= $next_page ?>"><i class="fas fa-angle-right"></i></a>
            <?php
            }
            if ($current_page < $totalPages - 3) {
                $end_page = $totalPages;
            ?>
                <a class="page-item" href="?id_category=<?= $id ?>?per_page=<?= $item_per_page ?>&page=<?= $end_page ?>"><i class="fas fa-angle-double-right"></i></a>
            <?php
            }
            ?>
        </div>
        <?php include("subcrise.php"); ?>
        <?php include("footer.php"); ?>

</body>

</html>