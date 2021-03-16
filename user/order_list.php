<?php session_start(); ?>
<?php
include("../Connection/open.php");
$id_cus = $_SESSION['id_customer'];
$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;   // số sp 1 trang
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
$offset = ($current_page - 1) * $item_per_page;
$orderObj = mysqli_query($conn, "SELECT * FROM hoa_don INNER JOIN khach_hang on hoa_don.ma_kh = khach_hang.ma_kh where hoa_don.ma_kh = '$id_cus' ORDER BY `hoa_don`.`ma_hd` DESC LIMIT  " . $item_per_page . " OFFSET " . $offset . "");
$totalRecords = mysqli_query($conn, "SELECT * FROM `hoa_don`INNER JOIN khach_hang on hoa_don.ma_kh = khach_hang.ma_kh ");
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $item_per_page);



// $sql = "SELECT * FROM hoa_don INNER JOIN khach_hang on hoa_don.ma_kh = khach_hang.ma_kh where hoa_don.ma_kh = '$id_cus'";

// SELECT * FROM hoa_don_ct inner JOIN hoa_don on ma_hd = ma_don_hang where ma_kh =4 ORDER BY `hoa_don_ct`.`ma_don_hang` ASC

include("../Connection/close.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng </title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.ico" />
</head>

<body>
    <?php include("header.php") ?>
    <?php include("menu.php") ?>
    <section class="order-list">
        <div class="grid">
            <div class="grid__row">
                <div class="grid__column11">
                    <div class="order-list-page">
                        <h2>Danh sách đơn hàng</h2>

                        <table cellspacing="0" cellpadding="0">
                            <tr align="center">
                                <td class="bold-text">STT</td>
                                <td class="bold-text">Mã đơn hàng</td>
                                <td class="bold-text">Người đặt</td>
                                <td class="bold-text">Người nhận</td>
                                <td class="bold-text">Đia chỉ giao hàng</td>
                                <td class="bold-text">Số điện thoại</td>
                                <td class="bold-text">Ngày đặt</td>
                                <td class="bold-text">Chi tiết</td>
                                <td class="bold-text">Tình trạng</td>
                            </tr>

                            <?php $num = 1; ?>
                            <?php while ($row = mysqli_fetch_array($orderObj)) { ?>

                                <tr align="center">
                                    <td><?= $num++; ?></td>
                                    <td><?= $row['ma_hd']; ?></td>
                                    <td><?= $row['ten_kh'];  ?></td>
                                    <td><?= $row['ten_nguoi_nhan'];  ?></td>
                                    <td><?= $row['dia_chi'];  ?></td>
                                    <td><?= $row['sdt'];  ?></td>
                                    <td><?= $row['ngay_nhap']; ?></td>
                                    <td><a href="order_list_detail.php?order_id=<?= $row['ma_hd'] ?>">Xem</a></td>
                                    <td>
                                        <?php if ($row['status_order'] == 0) {  ?>
                                            <span class="processing" style="color:green;">Đang chờ xử lý</span>
                                        <?php } elseif ($row['status_order'] == 1) { ?>
                                            <span class="huy" style="color:red;">Đã hủy</span>
                                        <?php } elseif ($row['status_order'] == 2) { ?>
                                            <span class="huy" style="color:blue;">Đã xác nhận</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </table>


                        <div id="pagination">
                            <?php
                            if ($current_page > 3) {
                                $first_page = 1;
                            ?>
                                <a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $first_page ?>"><i class="fas fa-angle-double-left"></i></a>
                            <?php
                            }
                            if ($current_page > 1) {
                                $prev_page = $current_page - 1;
                            ?>
                                <a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>"><i class="fas fa-angle-left"></i></a>
                            <?php }
                            ?>
                            <?php for ($num = 1; $num <= $totalPages; $num++) { ?>
                                <?php if ($num != $current_page) { ?>
                                    <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
                                        <a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a>
                                    <?php } ?>
                                <?php } else { ?>
                                    <strong class="current-page page-item"><?= $num ?></strong>
                                <?php } ?>
                            <?php } ?>
                            <?php
                            if ($current_page < $totalPages - 1) {
                                $next_page = $current_page + 1;
                            ?>
                                <a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $next_page ?>"><i class="fas fa-angle-right"></i></a>
                            <?php
                            }
                            if ($current_page < $totalPages - 3) {
                                $end_page = $totalPages;
                            ?>
                                <a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $end_page ?>"><i class="fas fa-angle-double-right"></i></a>
                            <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include("subcrise.php") ?>
    <?php include("footer.php") ?>
</body>

</html>