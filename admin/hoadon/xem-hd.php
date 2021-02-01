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
  $search = "";
  if (isset($_GET["search"])) {
    $search = $_GET["search"];
  }
  $sql = "SELECT * FROM `hoa_don` WHERE ma_kh LIKE '%$search%'";
  $result = mysqli_query($con, $sql);

  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
  <form action="../admin/hoadon/xem-hd.php" method="get">
    <input type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                              echo $_GET["search"];
                                            } ?>">
    <button>Tìm kiếm</button>
  </form>
  <table border="1">
    <tr>
      <th>Mã hd</th>
      <th>mã kh</th>
      <th>tên người nhận</th>
      <th>địa chỉ</th>
      <th>sđt</th>
      <th>ngày </th>
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

      </tr>
    <?php
    }
    ?>
  </table>
  <br><br>
  <a href="../index.php"> Back </a>
</body>

</html>