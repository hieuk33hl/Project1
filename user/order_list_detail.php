<?php session_start(); ?>
<?php
include("../Connection/open.php");
$id_order = $_GET['order_id'];
$id_cus = $_SESSION['id_customer'];
$sql = "SELECT * FROM hoa_don INNER JOIN hoa_don_ct on hoa_don.ma_hd = hoa_don_ct.ma_don_hang INNER JOIN san_pham on hoa_don_ct.ma_sp = san_pham.ma_sp where hoa_don.ma_hd = '$id_order'";
$orderObj = mysqli_query($conn, $sql);
$list_detail =  mysqli_query($conn, "SELECT * FROM hoa_don INNER JOIN hoa_don_ct on hoa_don.ma_hd = hoa_don_ct.ma_don_hang INNER JOIN san_pham on hoa_don_ct.ma_sp = san_pham.ma_sp where hoa_don.ma_hd = '$id_order'");
$row = mysqli_fetch_array($orderObj);
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
                    <div class="order-list-detail-page">
                        <div class="">
                            <h2>Đơn hàng chi tiết</h2>
                        </div>
                        <div>
                            <table cellspacing=0 cellpadding=0 class="order">
                                <tr>
                                    <td class="lefttd">Mã đơn hàng</td>
                                    <td><?= $row['ma_hd'] ?></td>
                                </tr>
                                <tr>
                                    <td class="lefttd">Tình trạng đơn hàng</td>
                                    <td>
                                        <?php if ($row['status_order'] == 0) {  ?>
                                            <span class="processing" style="color:green; font-weight:bold;">Đang chờ xử lý</span>
                                        <?php } elseif ($row['status_order'] == 1) { ?>
                                            <span class="huy" style="color:red;font-weight:bold;">Đã hủy</span>
                                        <?php } elseif ($row['status_order'] == 2) { ?>
                                            <span class="huy" style="color:blue;font-weight:bold;">Đã xác nhận</span>
                                        <?php }  ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="lefttd">Người đặt</td>
                                    <td><?= $_SESSION['fullname'] ?></td>
                                </tr>
                                <tr>
                                    <td class="lefttd">Người nhận</td>
                                    <td><?= $row['ten_nguoi_nhan'] ?></td>
                                </tr>
                                <tr>
                                    <td class="lefttd">Địa chỉ nhận hàng</td>
                                    <td><?= $row['dia_chi'] ?></td>
                                </tr>
                                <tr>
                                    <td class="lefttd">Số điện thoại người nhận</td>
                                    <td><?= $row['sdt'] ?></td>
                                </tr>
                                <tr>
                                    <td class="lefttd">Ngày đặt</td>
                                    <td><?= $row['ngay_nhap'] ?> </td>
                                </tr>
                                <tr>
                                    <td class="lefttd">Ghi chú</td>
                                    <td><?= $row['ghi_chu'] ?></td>
                                </tr>
                            </table>
                        </div>

                        <div class="order-detail-list">
                            <table cellspacing=0 cellpadding=0>
                                <?php $num = 1;
                                $total  = 0 ?>
                                <tr>
                                    <td class="bold-text">STT</td>
                                    <td class="bold-text">Mã sản phẩm</td>
                                    <td colspan="2" class="bold-text">Tên sản phẩm</td>
                                    <td class="bold-text">Giá sản phẩm</td>
                                    <td class="bold-text">Số lượng</td>
                                    <td class="bold-text">Thành tiền</td>

                                </tr>
                                <?php while ($list = mysqli_fetch_array($list_detail)) { ?>
                                    <tr>
                                        <td><?= $num++ ?></td>
                                        <td><?= $list['ma_sp'] ?></td>
                                        <td>
                                            <img src="../upload/<?= preg_replace('/\s+/', '', $list["anh_sp"]) ?>" width="80px">
                                        </td>
                                        <td><span style="text-transform: uppercase;"><?= $list['ten_sp'] ?></span></td>
                                        <td><?= number_format($list['gia_tien'], 0, ",", ".") ?>&nbsp;VNĐ </td>
                                        <td><?= $list['so_luong'] ?></td>
                                        <td><?= number_format($list['gia_tien'] * $list['so_luong'], 0, ",", ".") ?>&nbsp;VNĐ</td>

                                    </tr>
                                <?php $total += ($list['gia_tien'] * $list['so_luong']);
                                } ?>
                                <tr>
                                    <td colspan=6></td>
                                    <td>Tổng tiền: <span class="tongtien"><?= number_format($total, 0, ",", ".") ?>&nbsp;VNĐ</span></td>
                                </tr>
                                <?php if ($row['status_order'] == 0) { ?>
                                    <tr>
                                        <td colspan=6></td>
                                        <td><a href="../process/huy_don.php?order_id=<?= $row['ma_hd']; ?>" onclick="return confirm('Bạn có muốn hủy đơn hàng này không?');" style="color:red;">Hủy đơn hàng này</a></td>
                                    </tr>
                                <?php } ?>
                                onclick="return confirm('Bạn có muốn hủy đơn hàng này không?');"
                            </table>
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