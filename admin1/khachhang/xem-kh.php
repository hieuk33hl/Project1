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
	$limit = 8;
  $start = 0;
  // Viết câu sql đếm tổng sản phẩm
  $sqlDemSp = "SELECT COUNT(*) AS tongSoKh FROM `khach_hang`";
  $resultDemSp = mysqli_query($con, $sqlDemSp);
  $demSp = mysqli_fetch_array($resultDemSp);
  // Lấy tổng số trang 
  $tongTrang = ceil($demSp["tongSoKh"] / $limit);
  if (isset($_GET["trang"])) {
    $trang = $_GET["trang"];
    $start = ($trang - 1) * $limit;
  }
  $sql = "SELECT * FROM khach_hang LIMIT $start,$limit";
  $search = "";
  if (isset($_GET["search"])) {
    $search = $_GET["search"];
  }
  $sql = "SELECT * FROM `khach_hang` WHERE ten_kh LIKE '%$search%' LIMIT $start,$limit ";
  //Chạy query
  $result = mysqli_query($con, $sql);

  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
  <form action="../admin/khachhang/xem-kh.php" method="get">
    <input type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                              echo $_GET["search"];
                                            } ?>">
    <button>Tìm kiếm</button><br><br>
  </form>
  <table id="l" align="center" border="1">
    <tr>
      <th>Mã</th>
      <th>Tên</th>
      <th>Tài khoản</th>
      <th>Mật khẩu</th>
      <th>email</th>
      <th>sdt</th>
      <th>Giới tính</th>
      <th>địa chỉ</th>
      <th>Trạng thái</th>
    </tr>
    <?php
    while ($khachhang = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $khachhang["ma_kh"] ?></td>
        <td><?php echo $khachhang["ten_kh"] ?></td>
        <td><?php echo $khachhang["username"] ?></td>
        <td><?php echo $khachhang["password"] ?></td>
        <td><?php echo $khachhang["email"] ?></td>
        <td><?php echo $khachhang["sdt"] ?></td>
        <td><?php if ($khachhang["gt"] == 0) {
              echo "Nữ";
            } else {
              echo "Nam";
            } ?></td>
        <td><?php echo $khachhang["diachi"] ?></td>
        <td><?php if ($khachhang["status"] == 0) {
              echo ("");
            } else {
              echo ("Đã vô hiệu hóa");
            }
            ?></td>
      </tr>
    <?php
    }
    ?>

  </table>
  <br><br>
	<?php for ($i = 1; $i <= $tongTrang; $i++) {
  ?>
    &ensp; <a href="?cat=<?php echo $cat; ?>&trang=<?php echo $i; ?>"><?php echo $i; ?></a>
  <?php
  }
  ?>
  <a href="../index.php"> Back </a>
</body>

</html>