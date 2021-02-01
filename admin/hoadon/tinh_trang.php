<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Untitled Document</title>
</head>

<body>
  <?php
  //Mở kết nối csdl
  $con = mysqli_connect("localhost", "root", "", "da1");

  $sql = "SELECT * FROM hoa_don";
  $result = mysqli_query($con, $sql);

  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
  <table border="1">
    <tr>
      <th>Mã hd</th>
      <th>mã kh</th>
      <th>tên người nhận</th>
      <th>địa chỉ</th>
      <th>sđt</th>
      <th>ngày </th>
      <th>Trạng Thái</th>
      <th colspan="2">Thao tác</th>

    </tr>
    <?php
    while ($hoadon = mysqli_fetch_array($result)) {
    ?>
      <tr align=center>
        <td><?php echo $hoadon["ma_hd"] ?></td>
        <td><?php echo $hoadon["ma_kh"] ?></td>
        <td><?php echo $hoadon["ten_nguoi_nhan"] ?></td>
        <td><?php echo $hoadon["dia_chi"] ?></td>
        <td><?php echo $hoadon["sdt"] ?></td>
        <td><?php echo $hoadon["ngay_nhap"] ?></td>

        <td><?php
            if ($hoadon["status_order"] == "0") {
              echo "Chưa duyệt";
            } else if ($hoadon["status_order"] == 2) {
              echo "Đã duyệt";
            } else if ($hoadon["status_order"] == 1) {
              echo "Đang chờ hủy";
            } else if ($hoadon["status_order"] == 3) {
              echo "Đã hủy";
            }
            ?></td>

        <?php
        if ($hoadon["status_order"] == 1) {
        ?>
          <td><a href="huy-hoa-don.php?mahd=<?php echo $hoadon["ma_hd"]; ?>">Hủy</a></td>
        <?php
        } else if ($hoadon["status_order"] == "0") {
        ?>
          <td colspan=2>
            <a href="duyet-hoa-don.php?mahd=<?php echo $hoadon["ma_hd"]; ?>">Duyệt</a> |
            <a href="huy-hoa-don.php?mahd=<?php echo $hoadon["ma_hd"]; ?>">Hủy</a>
          </td>
        <?php
        } else {
        ?>
          <td></td>
        <?php } ?>
      </tr>
    <?php
    }
    ?>
  </table>
  <br><br>
  <a href="../index.php"> Back </a>
</body>

</html>