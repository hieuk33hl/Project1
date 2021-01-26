<?php session_start(); ?>
<?php

include("../Connection/open.php");

$id_cus = $_SESSION['id_customer'];
// $sql = "SELECT * FROM hoa_don INNER JOIN khach_hang on hoa_don.ma_kh = khach_hang.ma_kh where hoa_don.ma_kh = '$id_cus'";
$orderObj = mysqli_query($conn, "SELECT * FROM hoa_don INNER JOIN khach_hang on hoa_don.ma_kh = khach_hang.ma_kh where hoa_don.ma_kh = '$id_cus' ORDER BY `hoa_don`.`ma_hd` DESC");
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
                <div class="grid__column10">
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
                                <td class="bold-text">Hủy đơn</td>
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
                                            <span class="processing" style="color:green;">Đang xử lý</span>
                                        <?php } elseif ($row['status_order'] == 1) { ?>
                                            <span class="huy" style="color:red;">Đã hủy</span>
                                        <?php } elseif ($row['status_order'] == 2) { ?>
                                            <span class="huy" style="color:blue;">Đã xác nhận</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($row['status_order'] == 2) { ?>
                                            <span class="huy" style="color:blue;">Đã xác nhận nên không thể hủy</span>
                                        <?php  } elseif ($row['status_order'] == 0) { ?>
                                            <a href="../process/huy_don.php?order_id=<?= $row['ma_hd']; ?>" onclick="confirm(" Bạn có muốn hủy dơn hàng này không ")">Hủy</a>
                                        <?php } elseif ($row['status_order'] == 1) { ?>
                                            <span class="huy" style="color:red;">Đã hủy</span>
                                        <?php } ?>

                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include("subcrise.php") ?>
    <?php include("footer.php") ?>
</body>

</html>