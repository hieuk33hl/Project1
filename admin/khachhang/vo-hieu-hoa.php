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
  //Tạo câu query
  $sql = "SELECT * FROM `khach_hang`";
  //Chạy query
  $result = mysqli_query($con, $sql);

  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
  <table id="l" align="center" border="1">
    <th>Khách hàng </th>
    <th>vô hiệu hóa </th>
    <th></th>
    </tr>
    <?php
    while ($khachhang = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?= $khachhang["username"] ?></td>
        <td><?php if ($khachhang["status"] == 0) {
              echo ("");
            } else {
              echo ("Đã vô hiệu hóa");
            }
            ?></td>
        <td><a href="../admin/khachhang/suakh.php?ma_kh=<?php echo $khachhang["ma_kh"] ?>">Sửa</a></td>
      </tr>
    <?php
    }
    ?>

  </table>
</body>

</html>