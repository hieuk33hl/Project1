<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Untitled Document</title>
</head>
<style>
  .l {
    border-spacing: 0px;
    text-align: center;
    margin: 20px 30px;
  }
</style>

<body>
  <?php
  //Mở kết nối csdl
  $con = mysqli_connect("localhost", "root", "", "da1");
  $ma_hd = $_GET["ma_hd"];
  $sql = "SELECT * FROM hoa_don INNER JOIN hoa_don_ct on hoa_don.ma_hd = hoa_don_ct.ma_don_hang INNER JOIN san_pham on hoa_don_ct.ma_sp = san_pham.ma_sp where hoa_don.ma_hd = '$ma_hd'";
  //Chạy query
  $result = mysqli_query($con, $sql);
  $hoadonct = mysqli_fetch_array($result);
  $result2 = mysqli_query($con, "SELECT * FROM hoa_don INNER JOIN hoa_don_ct on hoa_don.ma_hd = hoa_don_ct.ma_don_hang INNER JOIN san_pham on hoa_don_ct.ma_sp = san_pham.ma_sp where hoa_don.ma_hd = '$ma_hd'");
  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
  <table class="l" align="center" border="1">
    <tr>
      <td>Mã đơn hàng</td>
      <td><?php echo $hoadonct["ma_don_hang"] ?></td>
    </tr>
    <tr>
      <td>Tình trạng đơn hàng</td>
      <td>
        <?php if ($hoadonct['status_order'] == 0) {  ?>
          <span class="processing" style="color:green;">Đang chờ xử lý</span>
        <?php } elseif ($hoadonct['status_order'] == 1) { ?>
          <span class="huy" style="color:red;">Đã hủy</span>
        <?php } elseif ($hoadonct['status_order'] == 2) { ?>
          <span class="huy" style="color:blue;">Đã xác nhận</span>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td>Người nhận</td>
      <td><?= $hoadonct["ten_nguoi_nhan"] ?></td>
    </tr>
    <tr>
      <td>SĐT người nhận</td>
      <td><?= $hoadonct["sdt"] ?></td>
    </tr>
    <tr>
      <td>Đia chỉ nhận hàng</td>
      <td><?= $hoadonct["dia_chi"] ?></td>
    </tr>
    <tr>
      <td>Ngày đặt</td>
      <td><?= $hoadonct["ngay_nhap"] ?></td>
    </tr>
    <tr>
      <td>Ghi chú</td>
      <td><?= $hoadonct["ghi_chu"] ?></td>
    </tr>
  </table>
  <table cellspacing=0 cellpadding=0 border="1" class="l">
    <?php $num = 1;
    $total  = 0 ?>
    <tr align="center">
      <td class="bold-text">STT</td>
      <td class="bold-text">Mã sản phẩm</td>
      <td colspan="2" class="bold-text">Tên sản phẩm</td>
      <td class="bold-text">Giá sản phẩm</td>
      <td class="bold-text">Số lượng</td>
      <td class="bold-text">Thành tiền</td>
    </tr>
    <?php while ($list = mysqli_fetch_array($result2)) { ?>
      <tr align="center">
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
      <td>Tổng tiền: <span><?= number_format($total, 0, ",", ".") ?>&nbsp;VNĐ</span></td>
    </tr>
    <?php if ($hoadonct['status_order'] == 0) { ?>
      <tr align="center">
        <td colspan=6></td>
        <td><a href="hoadon/huy-hoa-don.php?mahd=<?= $hoadonct['ma_hd']; ?>" onclick="return confirm('Bạn có muốn hủy đơn hàng này không?');" style="color:red;">Hủy đơn hàng này</a></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>