<?php session_start(); ?>

<?php
include("../Connection/open.php");

$id_cus = $_SESSION['id_customer'];
$num = 1;
$result = mysqli_query($conn, "SELECT * FROM hoa_don INNER JOIN khach_hang on hoa_don.ma_kh = khach_hang.ma_kh where hoa_don.ma_kh = '$id_cus'");
// SELECT * FROM hoa_don_ct inner JOIN hoa_don on ma_hd = ma_don_hang where ma_kh =4 ORDER BY `hoa_don_ct`.`ma_don_hang` ASC

include("../Connection/close.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                                <td>STT</td>
                                <td>Mã đơn hàng</td>
                                <td>Người đặt</td>
                                <td>Người nhận</td>
                                <td>Đia chỉ giao hàng</td>
                                <td>Số điện thoại</td>
                                <td>Ngày đặt</td>
                                <td>Chi tiết</td>
                                <td>Trạng thái</td>
                            </tr>
                            <?php while ($row = mysqli_fetch_array($result)) { ?>

                                <tr align="center">
                                    <td><?= $rownum++ ?></td>
                                    <td><?= $row['ma_hd'] ?></td>
                                    <td><?= $row['ten_kh']  ?></td>
                                    <td><?= $row['ten_nguoi_nhan']  ?></td>
                                    <td><?= $row['dia_chi']  ?></td>
                                    <td><?= $row['sdt']  ?></td>
                                    <td><?= $row['ghi_chu']  ?></td>
                                    <td><?= $row['ngay_nhap']  ?></td>
                                    <td>Xem</td>
                                    <td>Hủy
                                        
                                    </td>
                                </tr>
                            <?php
                                $num++;
                            }
                            ?>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>