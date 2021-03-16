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
  $sqlDemSp = "SELECT COUNT(*) AS tongSoHd FROM `hoa_don`";
  $resultDemSp = mysqli_query($con, $sqlDemSp);
  $demSp = mysqli_fetch_array($resultDemSp);
  // Lấy tổng số trang 
  $tongTrang = ceil($demSp["tongSoHd"] / $limit);
  if (isset($_GET["trang"])) {
    $trang = $_GET["trang"];
    $start = ($trang - 1) * $limit;
  }
  $sql = "SELECT * FROM hoa_don LIMIT $start,$limit";
  $search = "";
  if (isset($_GET["search"])) {
    $search = $_GET["search"];
  }
  $sql = "SELECT * FROM `hoa_don`  WHERE ma_kh LIKE '%$search%' LIMIT $start,$limit ";
  $result = mysqli_query($con, $sql);

  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
	<form action="../admin/hoadon/xem-hd.php" method="get">
		
		
    <input type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                              echo $_GET["search"];
                                            } ?>">
    <button>Tìm kiếm</button><br><br><br><br>
		
  </form><br>
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
  </table><br>
	<?php for ($i = 1; $i <= $tongTrang; $i++) {
  ?>
    &ensp; <a href="?cat=<?php echo $cat; ?>&trang=<?php echo $i; ?>"><?php echo $i; ?></a>
  <?php
  }
  ?>
  <br><br>
  <a href="../index.php"> Back </a>
</body>

</html>