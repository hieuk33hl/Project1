<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Untitled Document</title>
</head>
<style>
  #l {
    border-spacing: 0px;
    text-align: center;
    margin: 20px 50px;
  }
</style>

<body>
  <?php
  //Mở kết nối csdl
  $con = mysqli_connect("localhost", "root", "", "da1");
  $search = "";
  if (isset($_GET["search"])) {
    $search = $_GET["search"];
  }
  $sql = "SELECT * FROM `hoa_don` WHERE ma_kh LIKE '%$search%' ORDER BY `hoa_don`.`ma_hd` DESC";
  $result = mysqli_query($con, $sql);

  //Đóng kết nối csdl
  mysqli_close($con);
  ?>

  <table id="l" align="center" border="1">
    <tr>
      <th>Mã hd</th>
      <th>Tên người nhận</th>
      <th>Địa chỉ</th>
      <th>Sđt</th>
      <th>Ngày đặt</th>
      <th>Chi tiết</th>
      <th>Trạng thái</th>
    </tr>
    <?php
    while ($hoadon = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $hoadon["ma_hd"] ?></td>
        <td><?php echo $hoadon["ten_nguoi_nhan"] ?></td>
        <td><?php echo $hoadon["dia_chi"] ?></td>
        <td><?php echo $hoadon["sdt"] ?></td>
        <td><?php echo $hoadon["ngay_nhap"] ?></td>
        <td>
          <a href="index.php?cat=7.1&ma_hd=<?= $hoadon["ma_hd"] ?>">Xem</a>
        </td>
        <td>
          <?php if ($hoadon['status_order'] == 0) {  ?>
            <span class="processing" style="color:green;">Đang chờ xử lý</span>
          <?php } elseif ($hoadon['status_order'] == 1) { ?>
            <span class="huy" style="color:red;">Đã hủy</span>
          <?php } elseif ($hoadon['status_order'] == 2) { ?>
            <span class="huy" style="color:blue;">Đã xác nhận</span>
          <?php } ?>
        </td>
      </tr>
    <?php
    }
    ?>
  </table>
</body>

</html>