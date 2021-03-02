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
  }
</style>

<body>
  <?php
  //Mở kết nối csdl
  $con = mysqli_connect("localhost", "root", "", "da1");

  $sql = "SELECT * FROM hoa_don ORDER BY `hoa_don`.`ma_hd` DESC";
  $result = mysqli_query($con, $sql);

  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
  <table id="l" align="center" border="1">
    <tr>
      <th>Mã hd</th>
      <th>mã kh</th>
      <th>tên người nhận</th>
      <th>địa chỉ</th>
      <th>sđt</th>
      <th>Email</th>
      <th>ghi chú </th>
      <th>ngày </th>
      <th>Trạng Thái</th>
      <th colspan="2">Thao tác</th>
    </tr>
    <?php
    while ($hoadon = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $hoadon["ma_hd"] ?></td>
        <td><?php echo $hoadon["ma_kh"] ?></td>
        <td><?php echo $hoadon["ten_nguoi_nhan"] ?></td>
        <td><?php echo $hoadon["dia_chi"] ?></td>
        <td><?php echo $hoadon["sdt"] ?></td>
        <td><?php echo $hoadon["email"] ?></td>
        <td><?php echo $hoadon["ghi_chu"] ?></td>
        <td><?php echo $hoadon["ngay_nhap"] ?></td>
        <td><?php
            if ($hoadon["status_order"] == 0) {
              echo "Chưa duyệt";
            } else if ($hoadon["status_order"] == 2) {
              echo "Đã duyệt";
            } else {
              echo "Đã hủy";
            }
            ?></td>
        <?php
        if ($hoadon["status_order"] == 0) {
        ?>
          <td><a href="hoadon/duyet-hoa-don.php?mahd=<?php echo $hoadon["ma_hd"]; ?>">Duyệt</a></td>
          <td><a href="hoadon/huy-hoa-don.php?mahd=<?php echo $hoadon["ma_hd"]; ?>">Hủy</a></td>
        <?php
        } else {
        ?>
          <td colspan="2"></td>
        <?php
        }
        ?>
      </tr>
    <?php
    }
    ?>
  </table>
  <br><br>
  <a href="../index.php"> Back </a>
</body>

</html>